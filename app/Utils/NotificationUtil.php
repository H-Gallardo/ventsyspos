<?php

namespace App\Utils;

use Illuminate\Support\Facades\DB;

use App\Business;
use App\NotificationTemplate;
use App\Transaction;
use App\Restaurant\Booking;

use \Notification;

use App\Notifications\CustomerNotification;
use App\Notifications\SupplierNotification;

class NotificationUtil extends Util
{
    /**
     * Replaces tags from notification body with original value
     *
     * @param  text  $body
     * @param  int  $transaction_id
     *
     * @return array
     */
    public function replaceTags($business_id, $data, $transaction)
    {
        if (!is_object($transaction)) {
            $transaction = Transaction::where('business_id', $business_id)
                            ->with(['contact', 'payment_lines'])
                            ->findOrFail($transaction);
        }
        
        $business = Business::findOrFail($business_id);

        foreach ($data as $key => $value) {
             //Replace contact name
            if (strpos($value, '{contact_name}') !== false) {
                $contact_name = $transaction->contact->name;

                $data[$key] = str_replace('{contact_name}', $contact_name, $data[$key]);
            }

            //Replace invoice number
            if (strpos($value, '{invoice_number}') !== false) {
                $invoice_number = $transaction->type == 'sell' ? $transaction->invoice_no : $transaction->ref_no;

                $data[$key] = str_replace('{invoice_number}', $invoice_number, $data[$key]);
            }
            //Replace total_amount
            if (strpos($value, '{total_amount}') !== false) {
                $total_amount = $this->num_f($transaction->final_total, true);

                $data[$key] = str_replace('{total_amount}', $total_amount, $data[$key]);
            }

            $total_paid = 0;
            foreach ($transaction->payment_lines as $payment) {
                if ($payment->is_return != 1) {
                    $total_paid += $payment->amount;
                }
            }
            //Replace total_amount
            if (strpos($value, '{paid_amount}') !== false) {
                $paid_amount = $this->num_f($total_paid, true);

                $data[$key] = str_replace('{paid_amount}', $paid_amount, $data[$key]);
            }

            //Replace due_amount
            if (strpos($value, '{due_amount}') !== false) {
                $due = $transaction->final_total - $total_paid;
                $due_amount = $this->num_f($due, true);

                $data[$key] = str_replace('{due_amount}', $due_amount, $data[$key]);
            }

            //Replace business_name
            if (strpos($value, '{business_name}') !== false) {
                $business_name = $business->name;
                $data[$key] = str_replace('{business_name}', $business_name, $data[$key]);
            }

            //Replace business_logo
            if (strpos($value, '{business_logo}') !== false) {
                $logo_name = $business->logo;
                $business_logo = !empty($logo_name) ? '<img src="' . url('storage/business_logos/' . $logo_name) . '" alt="Business Logo" >' : '';

                $data[$key] = str_replace('{business_logo}', $business_logo, $data[$key]);
            }
        }

        return $data;
    }

    /**
     * Automatically send notification to customer/supplier if enabled in the template setting
     *
     * @param  int  $business_id
     * @param  string  $notification_type
     * @param  obj  $transaction
     * @param  obj  $contact
     *
     * @return void
     */
    public function autoSendNotification($business_id, $notification_type, $transaction, $contact)
    {
        $notification_template = NotificationTemplate::where('business_id', $business_id)
                                                ->where('template_for', $notification_type)
                                                ->first();

        $business = Business::findOrFail($business_id);
        $data['email_settings'] = $business->email_settings;
        $data['sms_settings'] = $business->sms_settings;

        if (!empty($notification_template)) {
            //Auto send email
            if (!empty($notification_template->auto_send)) {
                $orig_data = [
                    'email_body' => $notification_template->email_body,
                    'sms_body' => $notification_template->sms_body,
                    'subject' => $notification_template->subject
                ];
                $tag_replaced_data = $this->replaceTags($business_id, $orig_data, $transaction);

                $data['email_body'] = $tag_replaced_data['email_body'];
                $data['sms_body'] = $tag_replaced_data['sms_body'];
                $data['subject'] = $tag_replaced_data['subject'];
                $data['to_email'] = $contact->email;

                $customer_notifications = NotificationTemplate::customerNotifications();
                $supplier_notifications = NotificationTemplate::supplierNotifications();
                if (array_key_exists($notification_type, $customer_notifications)) {
                    Notification::route('mail', $data['to_email'])
                                    ->notify(new CustomerNotification($data));
                } else if (array_key_exists($notification_type, $supplier_notifications)) {
                    Notification::route('mail', $data['to_email'])
                                    ->notify(new SupplierNotification($data));
                }
            }

            //Auto send sms
            if (!empty($notification_template->auto_send_sms)) {
                $data['mobile_number'] = $contact->mobile;
                if (!empty($contact->mobile)) {
                    $this->sendSms($data);
                }
            }
        }
    }

    /**
     * Replaces tags from notification body with original value
     *
     * @param  text  $body
     * @param  int  $booking_id
     *
     * @return array
     */
    public function replaceBookingTags($business_id, $data, $booking_id)
    {

        $business = Business::findOrFail($business_id);
        $booking = Booking::where('business_id', $business_id)
                            ->with(['customer', 'table', 'correspondent', 'waiter', 'location', 'business'])
                            ->findOrFail($booking_id);
        foreach ($data as $key => $value) {
            //Replace contact name
            if (strpos($value, '{contact_name}') !== false) {
                $contact_name = $booking->customer->name;

                $data[$key] = str_replace('{contact_name}', $contact_name, $data[$key]);
            }

            //Replace table
            if (strpos($value, '{table}') !== false) {
                $table = !empty($booking->table->name) ?  $booking->table->name : '';

                $data[$key] = str_replace('{table}', $table, $data[$key]);
            }

            //Replace start_time
            if (strpos($value, '{start_time}') !== false) {
                $start_time = $this->format_date($booking->booking_start, true);

                $data[$key] = str_replace('{start_time}', $start_time, $data[$key]);
            }

            //Replace end_time
            if (strpos($value, '{end_time}') !== false) {
                $end_time = $this->format_date($booking->booking_end, true);

                $data[$key] = str_replace('{end_time}', $end_time, $data[$key]);
            }
            //Replace location
            if (strpos($value, '{location}') !== false) {
                $location = $booking->location->name;

                $data[$key] = str_replace('{location}', $location, $data[$key]);
            }

            //Replace service_staff
            if (strpos($value, '{service_staff}') !== false) {
                $service_staff = !empty($booking->waiter) ? $booking->waiter->user_full_name : '';

                $data[$key] = str_replace('{service_staff}', $service_staff, $data[$key]);
            }

            //Replace service_staff
            if (strpos($value, '{correspondent}') !== false) {
                $correspondent = !empty($booking->correspondent) ? $booking->correspondent->user_full_name : '';

                $data[$key] = str_replace('{correspondent}', $correspondent, $data[$key]);
            }

            //Replace business_name
            if (strpos($value, '{business_name}') !== false) {
                $business_name = $business->name;
                $data[$key] = str_replace('{business_name}', $business_name, $data[$key]);
            }

            //Replace business_logo
            if (strpos($value, '{business_logo}') !== false) {
                $logo_name = $business->logo;
                $business_logo = !empty($logo_name) ? '<img src="' . url('storage/business_logos/' . $logo_name) . '" alt="Business Logo" >' : '';

                $data[$key] = str_replace('{business_logo}', $business_logo, $data[$key]);
            }
        }
        return $data;
    }
}
