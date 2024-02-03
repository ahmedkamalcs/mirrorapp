<?php

namespace App\Http\Controllers\api\v1\client\client;
use App\Http\Controllers\api\v1\client\bo\BBooking;
use App\Http\Controllers\api\v1\dto\BookingDTO;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\api\v1\salon\bo\BBooking as BoBBooking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class ClientBooking {
public function saveBooking(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setClientPhoneNumber($request['clientPhoneNumber']);
    $bookingDTO->setServiceCategory($request['serviceCategory']);
    $bookingDTO->setServiceSubCategory($request['serviceSubCategory']);
    $bookingDTO->setSalonId($request['salonId']);
    $bookingDTO->setBranchId($request['branchId']);
    $bookingDTO->setEmployeeId($request['employeeId']);
    $bookingDTO->setQuantity($request['quantity']);
    $bookingDTO->setPrice($request['price']);
    $bookingDTO->setBookingDate($request['bookingDate']);
    $bookingDTO->setBookingFrom($request['bookingTimeFrom']);
    $bookingDTO->setBookingTo($request['bookingTimeTo']);

    $booking = new BBooking();

    return $booking->SaveBooking($bookingDTO);
}
public function updateBooking(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setBookingId($request['bookingId']);
    $bookingDTO->setBookingDate($request['bookingDate']);
    $bookingDTO->setBookingFrom($request['bookingTimeFrom']);
    $bookingDTO->setBookingTo($request['bookingTimeTo']);

    $booking = new BBooking();

    return $booking->updateBooking($bookingDTO);
}
public function confirmBooking(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setBookingId($request['bookingId']);
    $booking = new BBooking();

    return $booking->ConfirmBooking($bookingDTO);
}
public function cancellBooking(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setBookingId($request['bookingId']);
    $booking = new BBooking();

    return $booking->CancellBooking($bookingDTO);
}
public function lstCategory(){
    $booking = new BBooking();

    return $booking->lstCategory();
}
public function lstSalonByCategory(Request $request){
    $serviceDTO=new ServicesDTO();
    $serviceDTO->setCategoryId($request['categoryId']);
    $booking = new BBooking();

    return $booking->lstSalonByCategory($serviceDTO);

}
public function lstAvailableTimeSlot(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setServiceCategory($request['categoryId']);
    $bookingDTO->setServicesubCategory($request['subCategoryId']);
    $bookingDTO->setBookingDate($request['bookingDate']);
    $bookingDTO->setSalonId($request['salonId']);
    $bookingDTO->setServiceDuration($request['serviceDuration']);

    $booking = new BBooking();

    return $booking->lstAvailableTimeSlot($bookingDTO);

}
}