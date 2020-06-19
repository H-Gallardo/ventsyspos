@extends('layouts.auth', ['no_header' => 1])
@section('title', 'Update Confirmation')

@section('content')
<div class="container">
    <div class="row">
        <h1 class="page-header text-center">{{ config('app.name', 'POS') }}</h1>

        @include('install.partials.e_license')

        <div class="col-md-8 col-md-offset-2">
        	<form action="{{route('install.update')}}" method="POST">
        		{{ csrf_field() }}
        		<button type="submit" class="btn btn-success pull-right">I Agree, Proceed to update</button>
        	</form>
        </div>
    </div>
</div>
@endsection
