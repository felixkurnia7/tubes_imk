<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Rent;
use App\Models\Rent_Order;
use App\Models\Sell_Order;
use App\Models\Sell;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function index()
    {
      $title = "Dila F-fashion Shop";
      $result1 = sell::orderBy('id', 'desc')->take(3)->get();
      $result2 = Rent::orderBy('id', 'desc')->take(3)->get();

      return view('home', compact('title', 'result1', 'result2'));
    }

    public function welcome()
    {
      $title = "Dila F-fashion Shop";
      // $result1 = sell::orderBy('id', 'desc')->take(3)->get();
      // $result2 = Rent::orderBy('id', 'desc')->take(3)->get();

      return view('welcome', compact('title'));
    }

    public function index_pesanan_jual_query($user_id, $id, $harga, Request $request)
    {
      $request->validate([
        'banyak' => 'required|string',
        'transaksi' => 'required',
        'jenis_pesanan' => 'required'
      ], [
        'banyak.required' => 'Pengisian pesanan Anda kurang lengkap',
        'transaksi.required' => 'Pengisian pesanan Anda kurang lengkap',
        'jenis_pesanan.required' => 'Pengisian pesanan Anda kurang lengkap',
      ]);

      $user = new Sell_Order;
      $user->user_id = $user_id;
      $user->sell_id = $id;
      $user->banyak = htmlspecialchars($request->banyak);
      $user->harga = $request->banyak * $harga;
      $user->transaksi = htmlspecialchars($request->transaksi);
      $user->jenis_pesanan = htmlspecialchars($request->jenis_pesanan);
      $user->status_konfirmasi = '0';
      $user->status_bayar = '0';
      $user->status_kirim = '0';
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->created_at = $time;
      $user->updated_at = $time;
      $user->save();

      return Redirect('/index')->with('success', 'Pesanan Anda telah terkirim');
    }

    public function index_pesanan_sewa_query($user_id, $id, $harga, Request $request)
    {
      $request->validate([
        'banyak' => 'required|string',
        'transaksi' => 'required|string',
        'jenis_pesanan' => 'required|string'
      ], [
        'banyak.required' => 'Pengisian pesanan Anda kurang lengkap',
        'transaksi.required' => 'Pengisian pesanan Anda kurang lengkap',
        'jenis_pesanan.required' => 'Pengisian pesanan Anda kurang lengkap',
      ]);

      $user = new Rent_Order;
      $user->user_id = $user_id;
      $user->rent_id = $id;
      $user->banyak = htmlspecialchars($request->banyak);
      $user->harga = $request->banyak * $harga;
      $user->transaksi = htmlspecialchars($request->transaksi);
      $user->jenis_pesanan = htmlspecialchars($request->jenis_pesanan);
      $user->status_konfirmasi = '0';
      $user->status_bayar = '0';
      $user->status_kirim = '0';
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->created_at = $time;
      $user->updated_at = $time;
      $user->save();

      return Redirect('/index')->with('success', 'Pesanan Anda telah terkirim');
    }

    public function user_dashboard()
    {
      $title = "User Dashboard | Dila F-fashion";
      $rent_Order = Rent_Order::paginate();
      $sell_Order = Sell_Order::paginate();

      return view('user.dashboard', compact('title', 'rent_Order', 'sell_Order'));
    }

    public function profile($id)
    {
      $title = "Profile User | Dila F-fashion";
      $data = user::find($id);

      return view('user.profile', compact('title', 'data'));
    }

    public function edit_profile(Request $request, $id)
    {
      $request->validate([
        'nama' => 'required|string',
        'alamat' => 'required|string',
        'no_hp' => 'required|numeric',
      ], [
        'nama.required' => 'Nama tidak boleh kosong',
        'alamat.required' => 'Alamat tidak boleh kosong',
        'no_hp.required' => 'Nomor telephone tidak boleh kosong',
        'no_hp.numeric' => 'Nomor telephone tidak boleh diisi dengan karakter',
      ]);

      $user = user::find($id);
      $user->name = htmlspecialchars($request->nama);
      $user->alamat = htmlspecialchars($request->alamat);
      $user->no_hp = htmlspecialchars($request->no_hp);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->updated_at = $time;
      $user->save();

      return Redirect('/user/profile/$id')->with('success', 'Akun Anda telah diubah');
    }

    public function pesanan_user_jual_index($id)
    {
      $title = "Riwayat Pesanan (Jual) | Dila F-fashion";
      $result = Sell_Order::where('user_id', $id)->get();

      return view('user.pesanan(jual)', compact('title', 'result'));
    }

    public function pesanan_user_sewa_index($id)
    {
      $title = "Riwayat Pesanan (Sewa) | Dila F-fashion";
      $result = Rent_Order::where('user_id', $id)->get();

      return view('user.pesanan(sewa)', compact('title', 'result'));
    }

    public function penjualan_index()
    {
      $title = "Penjualan Pakaian | Dila F-fashion";
      $result = sell::paginate(12);

      return view('penjualan', compact('title', 'result'));
    }

    public function pesanan_jual_query($user_id, $id, $harga, Request $request)
    {
      $request->validate([
        'banyak' => 'required',
        'transaksi' => 'required',
        'jenis_pesanan' => 'required'
      ], [
        'banyak.required' => 'Pengisian pesanan Anda kurang lengkap',
        'transaksi.required' => 'Pengisian pesanan Anda kurang lengkap',
        'jenis_pesanan.required' => 'Pengisian pesanan Anda kurang lengkap',
      ]);

      $user = new Sell_Order;
      $user->user_id = $user_id;
      $user->sell_id = $id;
      $user->banyak = htmlspecialchars($request->banyak);
      $user->harga = $request->banyak * $harga;
      $user->transaksi = htmlspecialchars($request->transaksi);
      $user->jenis_pesanan = htmlspecialchars($request->jenis_pesanan);
      $user->status_konfirmasi = '0';
      $user->status_bayar = '0';
      $user->status_kirim = '0';
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->created_at = $time;
      $user->updated_at = $time;
      $user->save();

      return Redirect('/penjualan')->with('success', 'Pesanan Anda telah terkirim');
    }

    public function penyewaan_index()
    {
      $title = "Penyewaan Pakaian | Dila F-fashion";
      $result = rent::paginate(12);

      return view('penyewaan', compact('title', 'result'));
    }

    public function pesanan_sewa_query($user_id, $id, $harga, Request $request)
    {
      $request->validate([
        'banyak' => 'required',
        'transaksi' => 'required',
        'jenis_pesanan' => 'required'
      ], [
        'banyak.required' => 'Pengisian pesanan Anda kurang lengkap',
        'transaksi.required' => 'Pengisian pesanan Anda kurang lengkap',
        'jenis_pesanan.required' => 'Pengisian pesanan Anda kurang lengkap',
      ]);

      $user = new Rent_Order;
      $user->user_id = $user_id;
      $user->rent_id = $id;
      $user->banyak = htmlspecialchars($request->banyak);
      $user->harga = $request->banyak * $harga;
      $user->transaksi = htmlspecialchars($request->transaksi);
      $user->jenis_pesanan = htmlspecialchars($request->jenis_pesanan);
      $user->status_konfirmasi = '0';
      $user->status_bayar = '0';
      $user->status_kirim = '0';
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->created_at = $time;
      $user->updated_at = $time;
      $user->save();

      return Redirect('/penyewaan')->with('success', 'Pesanan Anda telah terkirim');
    }

    public function tentang_kami()
    {
      $title = "Tentang Kami | Dila F-fashion";

      return view('aboutus', compact('title'));
    }

    public function search_penjualan(Request $request)
    {
      $title = "Cari di Penjualan | Dila F-fashion";
      $search = $request->search;
      $result = Sell::when($request->search, function ($query) use ($request){
        $query->where('nama', 'like', "%{$request->search}%");
      })->paginate(12);

      return view('search_penjualan', compact('title', 'search', 'result'));
    }

    public function search_penyewaan(Request $request)
    {
      $title = "Cari di Penyewaan | Dila F-fashion";
      $search = $request->search;
      $result = Rent::when($request->search, function ($query) use ($request){
        $query->where('nama', 'like', "%{$request->search}%");
      })->paginate(12);

      return view('search_penyewaan', compact('title', 'search', 'result'));
    }

    public function masukkan_email()
    {
      $title = "Forgot Password | Dila F-fashion";

      return view('user.email', compact('title'));
    }

}
