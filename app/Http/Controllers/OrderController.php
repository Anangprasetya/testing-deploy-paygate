<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function order(Request $request)
    {
        $order = Order::create([
            'nama' => $request->orderNama,
            'alamat' => $request->orderAlamat,
            'telepon' => $request->orderTelepon,
            'jumlah' => $request->orderJumlahPesan,
            'total' => 1000 * $request->orderJumlahPesan,
            'status' => 'Belum Bayar'
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.ServerKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total,
            ),
            'customer_details' => array(
                'nama' => $order->nama,
                'telepon' => $order->telepon,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', ['snap' => $snapToken, 'dataOrder' => $order]);
    }
}
