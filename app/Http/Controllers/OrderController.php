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

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.ServerKey');
        $hasilHash = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hasilHash == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Order::find($request->order_id);
                $order->update(['status' => 'Sudah Terbayar']);
            }
        }
    }

    public function invoice($id)
    {
        dd(Order::find($id));
    }
}
