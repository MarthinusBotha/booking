<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\BookingItem;
use App\Models\UserBookingItem;
use App\Models\BookingFile;

class BookingController extends Controller
{
    public function bookingItems() {
        return Inertia::render('BookingItems/Index', [
            'filters' => request()->all('search'),
            'bookingItems' => BookingItem::filter(request()->only('search'))
                ->sort(request()->only('column', 'direction'))
                ->paginate(request()->only('per_page'))
                ->withQueryString()
                ->through(function ($bookingItem) {
                    return [
                        'id' => $bookingItem->id,
                        'title' => $bookingItem->title,
                        'description' => $bookingItem->description,
                        'guests' => $bookingItem->guests,
                        'price' => $bookingItem->price,
                        'bedrooms' => $bookingItem->bedrooms,
                        'bathrooms' => $bookingItem->bathrooms,
                        'storeys' => $bookingItem->storeys,
                        'garages' => $bookingItem->garages,
                        'features' => $bookingItem->features,
                        'created_at' => $bookingItem->created_at,
                        'updated_at' => $bookingItem->updated_at,
                    ];
                }),
        ]);
    }

    public function makeBooking( $id ) {
        return Inertia::render('BookingItems/MakeBooking', [
            'bookingItem' => BookingItem::find($id),
        ]);
    }

    public function storeBooking( Request $request ) {
        $request->validate([
            'booking_item_id' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'guests' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        UserBookingItem::create($request->all());

        return redirect()->route('booking-items')->with('success', 'Booking created successfully.');
    }
}
