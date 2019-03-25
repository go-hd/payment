<?php

namespace App\Http\Controllers;


use App\Payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $payments = Payment::all();

        return view('home')->with('payments', $payments);
    }

    /**
     * 特定のIDの支払い情報を表示する
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $payment = Payment::query()->find($id);

        return view('detail')->with('payment', $payment);
    }
}
