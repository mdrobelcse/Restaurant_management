<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reserve.index',compact('reservations'));
    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
        Notification::route('mail',$reservation->email )
            ->notify(new ReservationConfirmed());
        Toastr::success('Reservation successfully confirmed.','Success');
        return redirect()->back();
    }
    public function destory($id){
        Reservation::find($id)->delete();
        Toastr::success('Reservation successfully deleted.','Success');
        return redirect()->back();
    }

    public function show($id)
    {
        $reserve = Reservation::find($id);
        return view('admin.reserve.show',compact('reserve'));
    }


}//end class
