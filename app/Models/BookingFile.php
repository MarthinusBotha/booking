<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingFile extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'name',
        'path',
        'type',
        'booking_item_id',
    ];

    public function bookingItem() {
        return $this->belongsTo(BookingItem::class);
    }

}
