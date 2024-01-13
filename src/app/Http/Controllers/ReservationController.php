<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Store;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReservationRequest;

class ReservationController extends Controller
{
    //予約処理
    public function reservation(ReservationRequest $request)
    {
        $store_id = $request->input('store_id');
        $store = Store::find($store_id);

        if (Auth::check()){

            $reservation = new Reservation();
            $reservation->user_id = auth()->id();
            $reservation->store_id = $request->input('store_id');
            $reservation->date = $request->input('date');
            $reservation->time = $request->input('time');
            $reservation->number = $request->input('number');
            $reservation->save();

            return redirect()->route('done', compact('store', 'reservation'));
        }else{
            return redirect('/login');
        }
    }

    //予約の変更
    public function update(ReservationRequest $request)
    {
        $reservation_id = $request->input('id');
        // dd($reservation_id);

        $reservation = Reservation::find($reservation_id);

        $reservation->update([
            'date'=> $request->date,
            'time'=> $request->time,
            'number'=> $request->number,
        ]);


        return redirect('/mypage')->with('message', '予約を変更しました');
    }

    //予約の確認
    public function showReservation($id)
    {
        $store = Store::find($id);
        $user = auth()->user();
        $reservations = Reservation::where('store_id', $id)->get();

        return view('reservation_list', compact('store','user', 'reservations'));
    }

    //予約削除
    public function delete(Request $request)
    {
        $reservationId = $request->input('id');
        reservation::find($reservationId)->delete();

        return redirect('/mypage');
    }

    //予約ありがとうページ
    public function done()
    {
        return view('done');
    }
}
