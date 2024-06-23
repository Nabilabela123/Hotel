<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch bookings data
        $bookings = Booking::all();

        // Ensure you're passing an array to the view
        return view('user.index', ['bookings' => $bookings]);
    }



    public function room_details($id){
        $room=Room::find($id);
        return view('home.room_details',compact('room'));
    }
    public function add_booking(Request $request,$id){
        $request->validate([
            'startDate'=> 'required|date',

            'endDate'=> 'date|after:startDate',
        ]);
        


        $data=new booking;
        $data->room_id =$id;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;

        $startDate=$request->startDate;
        $endDate=$request->endDate;
        $isBooked=Booking::where('room_id',$id)->where('start_date','<=',$endDate)
        ->where('end_date','>=',$startDate)->exists();
        if($isBooked)
            return redirect()->back()->with('message','Room is already booked please try different date');
        
        else{
            $data->start_date=$request->startDate;
            $data->end_date=$request->endDate;
            $data->save();
            return redirect()->route('facture');
        }
    }
    public function contact(Request $request){
        $contact=new Contact;
        $contact->name=$request->name;
        $contact->email=$request->email;
        $contact->phone=$request->phone;
        $contact->message=$request->message;

        $contact->save();
        return redirect()->back()->with('message','Message Sent Sucessfully');

    }
    public function our_rooms(){
        $room=Room::all();
        return view('home.our_rooms',compact('room'));
    }

    public function hotel_gallary(){
        $gallary=Gallary::all();
        return view('home.hotel_gallary',compact('gallary'));
    }
    public function contact_us(){
       
        return view('home.contact_us');
    }
    public function facture()
    {
        // Récupérer l'utilisateur authentifié
        $user = Auth::user();
    
        // Récupérer les réservations de l'utilisateur connecté basées sur son email
        $bookings = Booking::where('email', $user->email)->get();
    
        // Récupérer les chambres et calculer le nombre de jours pour chaque réservation
        $rooms = [];
        foreach ($bookings as $booking) {
            $room = Room::find($booking->room_id);
            if ($room) {
                $startDate = new \DateTime($booking->start_date);
                $endDate = new \DateTime($booking->end_date);
                $days = $startDate->diff($endDate)->days;
                $totalPrice = $days * $room->price;
    
                $rooms[] = (object) [
                    'name' => $room->room_title,
                    'days' => $days,
                    'price_per_day' => $room->price,
                    'total_price' => $totalPrice
                ];
            }
        }
    
        // Passer les données à la vue
        return view('home.facture', [
            'rooms' => $rooms,
        ]);
    }
    

    
    
}

