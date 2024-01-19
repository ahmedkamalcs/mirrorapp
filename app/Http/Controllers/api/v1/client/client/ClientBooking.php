<?php

namespace App\Http\Controllers\api\v1\client\client;
use App\Http\Controllers\api\v1\client\bo\BBooking;
use App\Http\Controllers\api\v1\dto\BookingDTO;
use App\Http\Controllers\api\v1\salon\bo\BBooking as BoBBooking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class ClientBooking {
public function saveBooking(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setClientPhoneNumber($request->clientPhoneNumber);
    $bookingDTO->setSalonId($request->salonId);
    $bookingDTO->setBranchId($request->branchId);
    $bookingDTO->setEmployeeId($request->employeeId);
    $bookingDTO->setBookingFrom($request->bookingFrom);
    $bookingDTO->setBookingTo($request->bookingTo);

    $booking = new BBooking();

    return $booking->SaveBooking($bookingDTO);
}
}