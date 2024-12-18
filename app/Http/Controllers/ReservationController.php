<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'guests' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Сохранение данных о бронировании
        Reservation::create([
            'name' => $request->name,
            'guests' => $request->guests,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return response()->json(['success' => 'Столик успешно забронирован!']);
    }
}