@extends('layouts.app')
@section('title', __('lang_v1.notification_templates'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>{{ __('lang_v1.notification_templates')}}</h1>
</section>

<!-- Main content -->
<section class="content">
    {!! Form::open(['url' => action('NotificationTemplateController@store'), 'method' => 'post' ]) !!}
    <div class="row">
        <div class="col-md-12">
            <div class="callout callout-warning">
                <h4>@lang('lang_v1.available_tags'):</h4>
                <p>{{implode(', ', $tags)}}</p>
            </div>
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">@lang('lang_v1.customer_notifications'):</h3>
                </div>
                <div class="box-body">
                    @include('notification_template.partials.tabs', ['templates' => $customer_notifications])
                </div> <!-- /box-body -->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header">
                    <h3 class="box-title">@lang('lang_v1.supplier_notifications'):</h3>
                </div>
                <div class="box-body">
                    @include('notification_template.partials.tabs', ['templates' => $supplier_notifications])
                </div> <!-- /box-body -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-danger pull-right">@lang('messages.save')</button>
        </div>
    </div>
    {!! Form::close() !!}

</section>
<!-- /.content -->
@stop
@section('javascript')
<script type="text/javascript">
    $('textarea.ckeditor').each( function(){
        var editor_id = $(this).attr('id');
        CKEDITOR.replace(editor_id);
    });
</script>
@endsection