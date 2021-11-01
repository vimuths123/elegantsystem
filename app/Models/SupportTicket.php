<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SupportTicket extends \TCG\Voyager\Models\User {

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'customer_name',
        'title',
        'status',
        'description',
        'email',
        'phone',
        'reference',
        'reply',
    ];

    public function getStatusAttribute() {
        return ($this->attributes['status']== 2) ? "Replied" : "Not replied";
    }

}
