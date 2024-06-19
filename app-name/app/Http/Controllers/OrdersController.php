<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'asc')->get();

        foreach ($orders as $order) {
            $order->gry = explode(',', $order->gry);
        }

        return view('orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $order = new Order();
        return view('ordersForm', ['order' => $order]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'gry' => ['required', 'array'],
            'imie_i_nazwisko' => ['required', 'string', 'min:5', 'max:100'],
            'ulica_i_nr_domu' => ['required', 'string', 'min:3', 'max:200'],
            'kod_pocztowy' => ['required', 'string', 'size:6'],
            'miejscowosc' => ['required', 'string', 'min:2', 'max:100'],
            'telefon' => ['required', 'string', 'min:9', 'max:11'],
            'email' => ['required', 'string', 'email'],
            'platnosc' => ['required'],
        ]);

        if (\Auth::user() == null)
        {
            return view('home');
        }

        $gry = implode(',', $request->gry);

        $order = new Order();
        $order->user_id = \Auth::user()->id;
        $order->gry = $gry;
        $order->imie_i_nazwisko = $request->imie_i_nazwisko;
        $order->ulica_i_nr_domu = $request->ulica_i_nr_domu;
        $order->kod_pocztowy = $request->kod_pocztowy;
        $order->miejscowosc = $request->miejscowosc;
        $order->telefon = $request->telefon;
        $order->email = $request->email;
        $order->platnosc = $request->platnosc;

//        dd($order->toArray());

        if ($order->save())
        {
            return redirect('orders');
        }
        return view('orders');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = Order::find($id);

        if (\Auth::user()->id != $order->user_id)
        {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzania tej operacji.'
            ]);
        }
        return view('ordersEditForm', ['order' => $order]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'gry' => ['required', 'array'],
            'imie_i_nazwisko' => ['required', 'string', 'min:5', 'max:100'],
            'ulica_i_nr_domu' => ['required', 'string', 'min:3', 'max:200'],
            'kod_pocztowy' => ['required', 'string', 'size:6'],
            'miejscowosc' => ['required', 'string', 'min:2', 'max:100'],
            'telefon' => ['required', 'string', 'min:9', 'max:11'],
            'email' => ['required', 'string', 'email'],
            'platnosc' => ['required', 'string'],
        ]);

        $order = Order::find($id);

        if (\Auth::user()->id != $order->user_id)
        {
            return back()->with([
                'success' => false,
                'message_type' => 'danger',
                'message' => 'Nie posiadasz uprawnień do przeprowadzania tej operacji.'
            ]);
        }

        $gry = implode(',', $request->gry);

        $order->gry = $gry;
        $order->imie_i_nazwisko = $request->imie_i_nazwisko;
        $order->ulica_i_nr_domu = $request->ulica_i_nr_domu;
        $order->kod_pocztowy = $request->kod_pocztowy;
        $order->miejscowosc = $request->miejscowosc;
        $order->telefon = $request->telefon;
        $order->email = $request->email;
        $order->platnosc = $request->platnosc;

        if ($order->save())
        {
//            return redirect->route('orders');
            return redirect('orders');
        }
        return "Wystąpił błąd!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (\Auth::user()->id != $order->user_id)
        {
            return back();
        }

        if ($order->delete())
        {
            return redirect()->route('orders');
        }
        else
            return back();
    }

    public function showForm(Request $request)
    {
        // Pobierz nazwę gry z parametru w adresie URL
        $gameName = $request->query('game');


        // Przekaż nazwę gry do widoku
        return view('ordersForm')->with('gameName', $gameName);
    }
}
