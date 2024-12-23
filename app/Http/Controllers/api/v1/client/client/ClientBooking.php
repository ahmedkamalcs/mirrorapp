<?php

namespace App\Http\Controllers\api\v1\client\client;
use App\Http\Controllers\api\v1\client\bo\BBooking;
use App\Http\Controllers\api\v1\dto\BookingDTO;
use App\Http\Controllers\api\v1\dto\ServicesDTO;
use App\Http\Controllers\api\v1\dto\SalonInvoiceDTO;
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
public function paymentDetails(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setSalonId($request["SalonId"]);
    $bookingDTO->setClientPhoneNumber($request["ClientPhoneNumber"]);
    $booking = new BBooking();

    return $booking->paymentDetails($bookingDTO);
}

public function bookingDetails(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setSalonId($request["SalonId"]);
    $bookingDTO->setClientPhoneNumber($request["ClientPhoneNumber"]);
    $booking = new BBooking();

    return $booking->lstSalonBooking($bookingDTO);
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
public function savePayment(Request $request){
    $salonInvoiceDTO=new SalonInvoiceDTO();
    $salonInvoiceDTO->setClientId($request["client_id"]);
    $salonInvoiceDTO->setClientMobile($request["client_mob_num"]);
    $salonInvoiceDTO->setSalonMobile($request["salon_mob_num"]);
    $salonInvoiceDTO->setSalonId($request["salon_id"]);
    $salonInvoiceDTO->setInvoiceAmount($request["amount"]);
    $salonInvoiceDTO->setBookingId($request["booking_id"]);
    $salonInvoiceDTO->setClientId($request["client_id"]);
    $salonInvoiceDTO->setPaymentStatus($request["payment_status"]);
    $salonInvoiceDTO->setPaymentResponse($request["payment_response"]);
   
    $booking = new BBooking();
    if($salonInvoiceDTO->getPaymentStatus()=="Not Paid"){
        return $booking->savePayment($salonInvoiceDTO);
    }else{
        return $booking->updatePayment($salonInvoiceDTO);
    }
}
public function saveBookingNotes(Request $request){
    $bookingDTO= new BookingDTO();
    $bookingDTO->setBookingId($request["bookingId"]);
    $bookingDTO->setbookingNotes($request["notes"]);
    $booking = new BBooking();
    return $booking->saveBookingNotes($bookingDTO);

}
}