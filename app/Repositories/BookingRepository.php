<?php

namespace App\Repositories;

use App\Models\SubscribeTransaction;
use App\Repositories\Contracts\BookingRepositoryInterface;
use Illuminate\Support\Facades\Session;

class BookingRepository implements BookingRepositoryInterface
{

    public function createBooking($data)
    {
        return SubscribeTransaction::create($data);
    }

    public function findByTrxIdAndPhoneNumber($bookingTrxId, $phoneNumber)
    {
        return SubscribeTransaction::where('booking_trx_id', $bookingTrxId)
            ->where('phone', $phoneNumber)->first();
    }

    public function saveToSession($booking)
    {
        Session::put('bookingData', $booking);
    }

    public function updateSessiondata($data)
    {
        $bookingData = session('bookingData', []);
        $updatedData = array_merge($bookingData, $data);
        Session::put('bookingData', $updatedData);
    }

    public function getBookingFromSession()
    {
        return session('bookingData', []);
    }

    public function clearSession()
    {
        Session::forget('bookingData');
    }
}
