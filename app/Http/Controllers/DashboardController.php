<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function viewBookings() {
        return Inertia::render('Dashboard/ViewBookings', [
            'filters' => request()->all('search'),
            'userBookingItems' => UserBookingItem::filter(request()->only('search'))
                ->sort(request()->only('column', 'direction'))
                ->paginate(request()->only('per_page'))
                ->withQueryString()
                ->through(function ($userBookingItem) {
                    return [
                        'id' => $userBookingItem->id,
                        'booking_item_id' => $userBookingItem->booking_item_id,
                        'full_name' => $userBookingItem->full_name,
                        'email' => $userBookingItem->email,
                        'check_in' => $userBookingItem->check_in,
                        'check_out' => $userBookingItem->check_out,
                        'guests' => $userBookingItem->guests,
                        'price' => $userBookingItem->price,
                        'status' => $userBookingItem->status,
                        'created_at' => $userBookingItem->created_at,
                        'updated_at' => $userBookingItem->updated_at,
                    ];
                }),
        ]);
    }

    public function viewBooking( $id ) {
        return Inertia::render('Dashboard/ViewBooking', [
            'userBookingItem' => UserBookingItem::find($id),
        ]);
    }

    public function updateBooking( Request $request ) {
        $request->validate([
            'booking_item_id' => 'required',
            'status' => 'required',
        ]);

        UserBookingItem::find($id)->update($request->all());

        return redirect()->route('view-booking', $id)->with('success', 'Booking updated successfully.');
    }

    public function updatebookingStatus( Request $request, $id ) {
        $request->validate([
            'status' => 'required',
        ]);

        UserBookingItem::find($id)->update($request->all());

        return response()->json([
            'message' => 'Booking updated successfully.',
        ]);
    }
}
