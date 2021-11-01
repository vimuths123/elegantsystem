<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TicketStoreRequest;
use App\Models\SupportTicket;
use Session;

class TicketController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('frontend.tickets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('frontend.create_ticket');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TicketStoreRequest $request) {
        $ticketItems = $request->except(['_token', 'proengsoft_jsvalidation']);
        $ticketItems['reference'] = uniqid();
        $ticketItems['status'] = 1;

        SupportTicket::create($ticketItems);

        $details = [
            'reference' => $ticketItems['reference'],
            'name' => $ticketItems['customer_name']
        ];

        \Mail::to($ticketItems['email'])->send(new \App\Mail\TicketSentMail($details));
        
        Session::flash('message', ['text'=>'Your ticket received successfuly','type'=>'success']);
        
        return view('frontend.create_ticket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SupportTicket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(SupportTicket $ticket) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SupportTicket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(SupportTicket $ticket) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SupportTicket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SupportTicket $ticket) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SupportTicket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(SupportTicket $ticket) {
        //
    }

    /**
     * Return the SupportTicket witch has the reference
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function serach(Request $request) {
        $reference = $request->reference;
        $ticket = SupportTicket::where('reference', $request->reference)->first();
        
        return view('frontend.tickets', compact('ticket','reference'));
    }

}
