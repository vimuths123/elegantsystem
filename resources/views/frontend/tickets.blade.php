@extends('frontend.layouts.default')

@section('content')
<p class="mt-4">You can create a ticket or search for a ticket previously created.
<div class="row">
    <div class="col-sm-8 mb-3">
        <a href="/create" type="button" class="btn btn-success">Create Ticket</a>
    </div>
    <div class="col-sm-4 mb-3">
        <form method="post" action="/search" class="form-inline">
            @csrf
            <div class="form-group mr-2 mb-2">
                <input type="text" name="reference" value="{{ (isset($reference)) ? $reference : "" }}" class="form-control" placeholder="Reference no">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Search</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @if(isset($searched))
        <h3>Search results</h3>
        @if(isset($ticket))
        <div class="clearfix search-result"><!-- item -->
            <h4 class="mb-0 mt-0"><a>{{ $ticket->title }}</a></h4>
            <small class="text-success">Created at - {{ \Carbon\Carbon::parse($ticket->created_at)->isoFormat('MMM Do YYYY')  }}</small>
            <p>{{ $ticket->description }}</p>
            @if($ticket->reply)
            <p class="mb-1"><b>Reply</b></p>
            <p>dsdd</p>
            @endif
            <p class="mb-1"><b>Status</b></p>
            <p>{{ $ticket->status }}</p>
        </div>
        @else
        <p>Sorry, We couldn't find any results</p>
        @endif
        @endif
    </div>
</div>
@stop