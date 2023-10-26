<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBookingItem extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'booking_item_id',
        'full_name',
        'email',
        'check_in',
        'check_out',
        'guests',
        'price',
        'status',
    ];

    public function bookingItem() {
        return $this->belongsTo(BookingItem::class);
    }

}
