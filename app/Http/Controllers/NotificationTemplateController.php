<?php

namespace App\Http\Controllers;

use App\NotificationTemplate;
use Illuminate\Http\Request;

class NotificationTemplateController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('send_notification')) {
            abort(403, 'Unauthorized action.');
        }

        $business_id = request()->session()->get('user.business_id');

        $customer_notifications = NotificationTemplate::customerNotifications();
        foreach ($customer_notifications as $key => $value) {
            $notification_template = NotificationTemplate::getTemplate($business_id, $key);
            $customer_notifications[$key]['subject'] = $notification_template['subject'];
            $customer_notifications[$key]['email_body'] = $notification_template['email_body'];
            $customer_notifications[$key]['sms_body'] = $notification_template['sms_body'];
            $customer_notifications[$key]['auto_send'] = $notification_template['auto_send'];
            $customer_notifications[$key]['auto_send_sms'] = $notification_template['auto_send_sms'];
        }

        $supplier_notifications = NotificationTemplate::supplierNotifications();
        foreach ($supplier_notifications as $key => $value) {
            $notification_template = NotificationTemplate::getTemplate($business_id, $key);
            $supplier_notifications[$key]['subject'] = $notification_template['subject'];
            $supplier_notifications[$key]['email_body'] = $notification_template['email_body'];
            $supplier_notifications[$key]['sms_body'] = $notification_template['sms_body'];
            $supplier_notifications[$key]['auto_send'] = $notification_template['auto_send'];
            $supplier_notifications[$key]['auto_send_sms'] = $notification_template['auto_send_sms'];
        }

        $tags = NotificationTemplate::notificationTags();
        $booking_tags = NotificationTemplate::bookingNotificationTags();

        return view('notification_template.index')
                ->with(compact('customer_notifications', 'supplier_notifications', 'tags', 'booking_tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('send_notification')) {
            abort(403, 'Unauthorized action.');
        }

        $template_data = $request->input('template_data');
        $business_id = request()->session()->get('user.business_id');

        foreach ($template_data as $key => $value) {
            NotificationTemplate::updateOrCreate(
                [
                    'business_id' => $business_id,
                    'template_for' => $key
                ],
                [
                    'subject' => $value['subject'],
                    'email_body' => $value['email_body'],
                    'sms_body' => $value['sms_body'],
                    'auto_send' => !empty($value['auto_send']) ? 1 : 0,
                    'auto_send_sms' => !empty($value['auto_send_sms']) ? 1 : 0
                ]
            );
        }

        return redirect()->back();
    }
}
