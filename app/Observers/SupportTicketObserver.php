<?php

namespace App\Observers;

use App\Models\SupportTicket;

class SupportTicketObserver {

    /**
     * Handle the SupportTicket "created" event.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return void
     */
    public function created(SupportTicket $supportTicket) {
        //
    }

    /**
     * Handle the SupportTicket "updated" event.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return void
     */
    public function updated(SupportTicket $supportTicket) {
        if ($supportTicket->reply && $supportTicket->status == 'Not replied') {
            $supportTicket->status = 2;
            $supportTicket->save();

            $details = [
                'ticket' => $supportTicket,
            ];

            \Mail::to($supportTicket->email)->send(new \App\Mail\TicketRepliedMail($details));
        }
    }

    /**
     * Handle the SupportTicket "deleted" event.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return void
     */
    public function deleted(SupportTicket $supportTicket) {
        //
    }

    /**
     * Handle the SupportTicket "restored" event.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return void
     */
    public function restored(SupportTicket $supportTicket) {
        
    }

    /**
     * Handle the SupportTicket "force deleted" event.
     *
     * @param  \App\Models\SupportTicket  $supportTicket
     * @return void
     */
    public function forceDeleted(SupportTicket $supportTicket) {
        //
    }

}
