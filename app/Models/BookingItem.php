<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $fillable = [
        'title',
        'description',
        'guests',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
        'features',
    ];

    protected $casts = [
        'features' => 'array',
    ];

    public function userBooking() {
        return $this->hasMany(UserBookingItem::class);
    }

    public function scopeFilter($query, array $filters) {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('guests', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%')
                    ->orWhere('bedrooms', 'like', '%' . $search . '%')
                    ->orWhere('bathrooms', 'like', '%' . $search . '%')
                    ->orWhere('storeys', 'like', '%' . $search . '%')
                    ->orWhere('garages', 'like', '%' . $search . '%')
            )
        );
    }

    public function scopeSort($query, array $sorts) {
        $direction = $sorts['direction'] ?? 'asc';
        $column = $sorts['column'] ?? 'title';

        $query->orderBy($column, $direction);
    }

    public function scopePaginate($query, array $pagination) {
        $query->paginate($pagination['per_page'] ?? 10);
    }

    public function isBooked( $dateFrom, $dateTo ) {
        $booked = $this->userBooking()->where('check_in', '<=', $dateTo)
            ->where('check_out', '>=', $dateFrom)
            ->where('status', '!=', 'cancelled')
            ->count();

        return $booked;
    }

}
