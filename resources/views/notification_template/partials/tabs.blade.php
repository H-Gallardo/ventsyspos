<!-- Custom Tabs -->
<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        @foreach($templates as $key => $value)
            <li @if($loop->index == 0) class="active" @endif>
                <a href="#cn_{{$key}}" data-toggle="tab" aria-expanded="true">
                {{$value['name']}} </a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @foreach($templates as $key => $value)
            <div class="tab-pane @if($loop->index == 0) active @endif" id="cn_{{$key}}">
                @if($key == 'new_booking')
                    <strong>@lang('lang_v1.available_tags'):</strong>
                <p class="text-primary">{{implode(', ', $booking_tags)}}</p>
                @endif
                <div class="form-group">
                    {!! Form::label($key . '_subject',
                    __('lang_v1.email_subject').':') !!}
                    {!! Form::text('template_data[' . $key . '][subject]', 
                    $value['subject'], ['class' => 'form-control'
                    , 'placeholder' => __('lang_v1.email_subject'), 'id' => $key . '_subject']); !!}
                </div>
                <div class="form-group">
                    {!! Form::label($key . '_email_body',
                    __('lang_v1.email_body').':') !!}
                    {!! Form::textarea('template_data[' . $key . '][email_body]', 
                    $value['email_body'], ['class' => 'form-control ckeditor'
                    , 'placeholder' => __('lang_v1.email_body'), 'id' => $key . '_email_body', 'rows' => 6]); !!}
                </div>
                <div class="form-group">
                    {!! Form::label($key . '_sms_body',
                    __('lang_v1.sms_body').':') !!}
                    {!! Form::textarea('template_data[' . $key . '][sms_body]', 
                    $value['sms_body'], ['class' => 'form-control'
                    , 'placeholder' => __('lang_v1.sms_body'), 'id' => $key . '_sms_body', 'rows' => 6]); !!}
                </div>
                @if($key == 'new_sale')
                    <div class="form-group">
                        <label class="checkbox-inline">
                            {!! Form::checkbox('template_data[' . $key . '][auto_send]', 1, $value['auto_send'], ['class' => 'input-icheck']); !!} @lang('lang_v1.autosend_email')
                        </label>
                        <label class="checkbox-inline">
                            {!! Form::checkbox('template_data[' . $key . '][auto_send_sms]', 1, $value['auto_send_sms'], ['class' => 'input-icheck']); !!} @lang('lang_v1.autosend_sms')
                        </label>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>