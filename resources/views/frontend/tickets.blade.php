<!--<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <title>$title</title>
        <link href="/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-custom">
            <div class="container">
                <a href="/" class="navbar-brand">Ticketing System</a>

                <div class=" pull-right">
                    <a class="custom-logo"><i class="fas fa-ticket-alt"></i>Tickets</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <p class="mt-4">You can create a ticket or search for a ticket previously created.
            <div class="row">
                <div class="col-sm-8 mb-3">
                    <a href="/create" type="button" class="btn btn-success">Create Ticket</a>
                </div>
                <div class="col-sm-4 mb-3">
                    <form class="form-inline">
                        <div class="form-group mr-2 mb-2">
                            <input type="text" class="form-control" placeholder="Reference no">
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                    </form>
                </div>
            </div>
        </div>-->
<!--        <div class="content home">

            <h2>Tickets</h2>

            <p>Welcome to the index page. You can view the list of tickets below.</p>

            <div class="btns">
                <a href="/create" class="btn">Create Ticket</a>
            </div>

            <div class="tickets-list">
                <a href="view.php?id=" class="ticket">
                    <span class="con">

                    </span>
                    <span class="con">
                        <span class="title"></span>
                        <span class="msg"></span>
                    </span>
                    <span class="con created"></span>
                </a>
            </div>

        </div>-->
<!--</body>
</html>-->

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
                <p>dsdd</p>
	</div>
        @endif
    </div>
    
    
<!--    <span class="con">
        <i class="far fa-clock fa-2x"></i>
    </span>
    <span class="con">
        <div class="title">Ticket</div>
        <div class="msg">Message</div>
    </span>
    <span class="con created">Date</sp-->
</div>
@stop