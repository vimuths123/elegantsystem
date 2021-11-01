@extends('frontend.layouts.default')

@section('content')
<h4>Create Ticket</h4>
@if(Session::has('message'))
<div class="alert alert-{{session('message')['type']}}">
    {{session('message')['text']}}
</div>
@endif
@if ($errors->any())
<h5>You have these errors</h5>
<ul>
    @foreach ($errors->all() as $error)
    <li class="input-error">{{ $error }}</li>
    @endforeach
</ul>
@endif

<form action="/create" method="post">
    @csrf

    <div class="row">
        <div class="col-sm-6 mb-3">
            <input type="text" name="customer_name" class="form-control" placeholder="Name">
        </div>
        <div class="col-sm-6 mb-3">
            <input type="text" name="email" class="form-control" placeholder="Email">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <input type="text" name="phone" class="form-control" placeholder="Phone">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-3">
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 mb-3">
            <textarea name="description" placeholder="Enter your Message" class="form-control" rows="3"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mb-3">Create</button>
</form>
@stop

@push('custom-scripts')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

{!! JsValidator::formRequest('App\Http\Requests\TicketStoreRequest') !!}
@endpush