<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Sell;
use App\Models\Rent;
use App\Models\Rent_Order;
use App\Models\Sell_Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Dotenv\Store\File\Paths;

class AdminController extends Controller
{
    public function __construct() {
      $this->middleware('auth');
    }

    public function index() 
    {
      $total_User = user::paginate();
      $total_Sell = Sell::paginate();
      $total_Rent = Rent::paginate();
      $total_rentOrders = Rent_Order::paginate();
      $total_sellOrders = Sell_Order::paginate();

      return view('admin.index', compact('total_User', 'total_Sell', 'total_Rent', 'total_rentOrders', 'total_sellOrders'));
    }

    public function user_index()
    {
      $title = "Daftar User | Dila F-fashion";
      $result = User::all();
      return view('admin.user', compact('title', 'result'));
    }

    public function edit_user_index($id)
    {
      $title = "Edit User | Dila F-fashion";
      $data = user::find($id);

      return view('admin.edit_user', compact('title', 'data'));
    }

    public function update_user_query($id, Request $request)
    {
      $request->validate([
        'nama' => 'required|string',
        'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
        'password' => 'required|min:8|string',
        'alamat' => 'required|string',
        'no_hp' => 'required|numeric',
      ], [
        'nama.required' => 'nama tidak boleh kosong',
        'email.required' => 'email tidak boleh kosong',
        'password.required' => 'password tidak boleh kosong',
        'alamat.required' => 'alamat tidak boleh kosong',
        'no_hp.required' => 'nomor hp tidak boleh kosong',
        'email.regex' => 'format email salah. Format email yang benar: [a-z][0-9]@[a-z].[a-z]',
        'password.min' => 'password minimal 8 karakter',
        'no_hp.numeric' => 'nomor hp tidak boleh diisi dengan karakter',
      ]);

      $user = user::find($id);
      $user->name = htmlspecialchars($request->nama);
      $user->email = htmlspecialchars($request->email);
      $user->password = Hash::make($request->password);
      $user->alamat = htmlspecialchars($request->alamat);
      $user->no_hp = htmlspecialchars($request->no_hp);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->updated_at = $time;
      $user->save();

      return Redirect('/admin/user')->with('success', 'User telah diubah');
    }

    public function hapus_user_query($id)
    {
      $user = user::find($id);
      $user->delete();

      return Redirect('/admin/user')->with('success', 'User telah dihapus');
    }

    public function barang_jual_index()
    {
      $title = "Daftar Barang Jual | Dila F-fashion";
      $result = sell::all();
      return view('admin.barang_jual', compact('title', 'result'));
    }

    public function barang_sewa_index()
    {
      $title = "Daftar Barang Sewa | Dila F-fashion";
      $result = rent::all();
      return view('admin.barang_sewa', compact('title', 'result'));
    }

    public function tambah_barang_sewa_index()
    {
      $title = "Tambah Barang (Sewa) | Dila F-fashion";
      return view('admin.tambah_barang_sewa', compact('title'));
    }

    public function tambah_barang_sewa_query(Request $request)
    {
      $request->validate([
        'nama' => 'required|string',
        'stok' => 'required|numeric',
        'ukuran' => 'required|string',
        'warna' => 'required|string',
        'harga' => 'required|numeric',
        'gambar' => 'required|image|mimes:jpg,png,jpeg'
      ], [
        'nama.required' => 'Nama barang tidak boleh kosong',
        'stok.required' => 'stok tidak boleh kosong',
        'ukuran.required' => 'ukuran tidak boleh kosong',
        'warna.required' => 'warna tidak boleh kosong',
        'harga.required' => 'harga tidak boleh kosong',
        'gambar.required' => 'gambar tidak boleh kosong',
        'gambar.image' => 'File bukan gambar. Format gambar seperti: JPG, PNG, JPEG',
        'gambar.mimes:jpg,png,jpeg' => 'Format yang tersedia: JPG, PNG, JPEG'
      ]);

      $user = new Rent;
      $user->nama = htmlspecialchars($request->nama);
      $user->stok = htmlspecialchars($request->stok);
      $user->ukuran = htmlspecialchars($request->ukuran);
      $user->warna = htmlspecialchars($request->warna);
      $user->harga = htmlspecialchars($request->harga);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->created_at = $time;
      $user->updated_at = $time;

      if ($request->hasFile('gambar')) {
        $location = public_path('images');
        $request->file('gambar')->move($location, $request->file('gambar')->getClientOriginalName());
        $user->gambar = $request->file('gambar')->getClientOriginalName();
        $user->save();
      }

      return Redirect('/admin/barang(sewa)/')->with('success', 'Barang telah ditambah');
    }

    public function edit_barang_sewa_index($id)
    {
      $title = "Edit Barang (Sewa)";
      $data = rent::find($id);

      return view('admin.edit_barang_sewa', compact('title', 'data'));
    }

    public function edit_barang_sewa_query($id, Request $request)
    {
      $request->validate([
        'nama' => 'required|string',
        'stok' => 'required|numeric',
        'ukuran' => 'required|string',
        'warna' => 'required|string',
        'harga' => 'required|numeric',
      ], [
        'nama.required' => 'Nama barang tidak boleh kosong',
        'stok.required' => 'stok tidak boleh kosong',
        'ukuran.required' => 'ukuran tidak boleh kosong',
        'warna.required' => 'warna tidak boleh kosong',
        'harga.required' => 'harga tidak boleh kosong',
      ]);

      $user = rent::find($id);
      $user->nama = htmlspecialchars($request->nama);
      $user->stok = htmlspecialchars($request->stok);
      $user->ukuran = htmlspecialchars($request->ukuran);
      $user->warna = htmlspecialchars($request->warna);
      $user->harga = htmlspecialchars($request->harga);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->updated_at = $time;
      $user->save();

      return Redirect('/admin/barang(sewa)')->with('success', 'Barang telah diubah');
    }

    public function hapus_barang_sewa($id)
    {
      $user = rent::find($id);
      unlink("images/".$user->gambar);
      $user->delete();

      return Redirect('/admin/barang(sewa)')->with('success', 'Barang telah dihapus');
    }

    public function tambah_barang_jual_index()
    {      
      $title = "Tambah Barang (Jual) | Dila F-fashion";
      return view('admin.tambah_barang_jual', compact('title'));
    }

    public function tambah_barang_jual_query(Request $request)
    {
      $request->validate([
        'nama' => 'required|string',
        'stok' => 'required|numeric',
        'ukuran' => 'required|string',
        'warna' => 'required|string',
        'harga' => 'required|numeric',
        'gambar' => 'required|image|mimes:jpg,png,jpeg'
      ], [
        'nama.required' => 'Nama barang tidak boleh kosong',
        'stok.required' => 'stok tidak boleh kosong',
        'ukuran.required' => 'ukuran tidak boleh kosong',
        'warna.required' => 'warna tidak boleh kosong',
        'harga.required' => 'harga tidak boleh kosong',
        'gambar.required' => 'gambar tidak boleh kosong',
        'gambar.image' => 'File bukan gambar. Format gambar seperti: JPG, PNG, JPEG',
        'gambar.mimes:jpg,png,jpeg' => 'Format yang tersedia: JPG, PNG, JPEG'
      ]);

      $user = new Sell;
      $user->nama = htmlspecialchars($request->nama);
      $user->stok = htmlspecialchars($request->stok);
      $user->ukuran = htmlspecialchars($request->ukuran);
      $user->warna = htmlspecialchars($request->warna);
      $user->harga = htmlspecialchars($request->harga);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->created_at = $time;
      $user->updated_at = $time;

      if ($request->hasFile('gambar')) {
        $location = public_path('images');
        $request->file('gambar')->move($location, $request->file('gambar')->getClientOriginalName());
        $user->gambar = $request->file('gambar')->getClientOriginalName();
        $user->save();
      }

      return Redirect('/admin/barang(jual)/')->with('success', 'Barang telah ditambah');
    }

    public function hapus_barang_jual($id)
    {
      $user = sell::find($id);
      unlink("images/".$user->gambar);
      $user->delete();

      return Redirect('/admin/barang(jual)')->with('success', 'Barang telah dihapus');
    }

    public function edit_barang_jual_index($id)
    {
      $title = "Edit Barang (Jual) | Dila F-fashion";
      $data = sell::find($id);

      return view('admin.edit_barang_jual', compact('title', 'data'));
    }
    
    public function edit_barang_jual_query($id, Request $request)
    {
      $request->validate([
        'nama' => 'required|string',
        'stok' => 'required|numeric',
        'ukuran' => 'required|string',
        'warna' => 'required|string',
        'harga' => 'required|numeric',
      ], [
        'nama.required' => 'Nama barang tidak boleh kosong',
        'stok.required' => 'stok tidak boleh kosong',
        'ukuran.required' => 'ukuran tidak boleh kosong',
        'warna.required' => 'warna tidak boleh kosong',
        'harga.required' => 'harga tidak boleh kosong',
      ]);

      $user = sell::find($id);
      $user->nama = htmlspecialchars($request->nama);
      $user->stok = htmlspecialchars($request->stok);
      $user->ukuran = htmlspecialchars($request->ukuran);
      $user->warna = htmlspecialchars($request->warna);
      $user->harga = htmlspecialchars($request->harga);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->updated_at = $time;
      $user->save();

      return Redirect('/admin/barang(jual)')->with('success', 'Barang telah diubah');
    }

    public function pesanan_jual_index()
    {
      $title = "Pesanan Barang (jual) | Dila F-fashion";
      $result = Sell_Order::all();

      return view('admin.pesanan_barang(jual)', compact('title', 'result'));
    }
    
    public function pesanan_jual_terima($id, $sell_id)
    {
      $user = Sell_Order::find($id);
      $sell = Sell::find($sell_id);
      $sell->stok = $sell->stok - $user->banyak;
      $user->status_konfirmasi = '1';
      $sell->save();
      $user->save();

      return Redirect('/admin/pesanan(jual)')->with('success', 'Pesanan dikonfirmasi');
    }

    public function pesanan_jual_tolak($id)
    {
      $user = Sell_Order::find($id);
      $user->status_konfirmasi = '2';
      $user->save();

      return Redirect('/admin/pesanan(jual)')->with('success', 'Pesanan ditolak');
    }

    public function pesanan_jual_tolak_balik($id, $sell_id)
    {
      $user = Sell_Order::find($id);
      $sell = Sell::find($sell_id);
      $sell->stok = $sell->stok + $user->banyak;
      $user->status_konfirmasi = '2';
      $sell->save();
      $user->save();

      return Redirect('/admin/pesanan(jual)')->with('success', 'Pesanan ditolak');
    }

    public function pesanan_jual_ubah_index($id)
    {
      $title = "Ubah Pesanan (Jual) | Dila F-fashion";
      $data = Sell_Order::find($id);
      $data->harga = $data->harga / $data->banyak;

      return view('admin.ubah_pesanan(jual)', compact('title', 'data'));
    }

    public function pesanan_jual_ubah_query($id, Request $request)
    {
      $request->validate([
        'banyak' => 'required',
        'transaksi' => 'required',
        'jenis_pesanan' => 'required'
      ], [
        'banyak.required' => 'data banyak tidak boleh kosong',
        'transaksi.required' => 'data banyak tidak boleh kosong',
        'jenis_pesanan.required' => 'data banyak tidak boleh kosong',
      ]);

      $user = Sell_Order::find($id);
      $user->banyak = htmlspecialchars($request->banyak);
      $user->harga = $request->harga * $request->banyak;
      $user->transaksi = htmlspecialchars($request->transaksi);
      $user->jenis_pesanan = htmlspecialchars($request->jenis_pesanan);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->updated_at = $time;
      $user->save();

      return Redirect('/admin/pesanan(jual)')->with('success', 'Pesanan berhasil diubah');
    }

    public function pesanan_jual_bayar($id)
    {
      $user = Sell_Order::find($id);
      $user->status_bayar = '1';
      $user->save();

      return Redirect('/admin/pesanan(jual)')->with('success', 'Pesanan telah dibayar');
    }

    public function pesanan_jual_kirim($id)
    {
      $user = Sell_Order::find($id);
      $user->status_kirim = '1';
      $user->save();

      return Redirect('/admin/pesanan(jual)')->with('success', 'Pesanan telah dikirim');
    }

    public function pesanan_sewa_index()
    {
      $title = "Pesanan Barang (sewa) | Dila F-fashion";
      $result = Rent_Order::all();

      return view('admin.pesanan_barang(sewa)', compact('title', 'result'));
    }
    
    public function pesanan_sewa_terima($id, $rent_id)
    {
      $user = Rent_Order::find($id);
      $rent = Rent::find($rent_id);
      $rent->stok = $rent->stok - $user->banyak;
      $user->status_konfirmasi = '1';
      $rent->save();
      $user->save();

      return Redirect('/admin/pesanan(sewa)')->with('success', 'Pesanan dikonfirmasi');
    }

    public function pesanan_sewa_tolak($id)
    {
      $user = Rent_Order::find($id);
      $user->status_konfirmasi = '2';
      $user->save();

      return Redirect('/admin/pesanan(sewa)')->with('success', 'Pesanan ditolak');
    }

    public function pesanan_sewa_tolak_balik($id, $rent_id)
    {
      $user = Rent_Order::find($id);
      $rent = Rent::find($rent_id);
      $rent->stok = $rent->stok + $user->banyak;
      $user->status_konfirmasi = '2';
      $rent->save();
      $user->save();

      return Redirect('/admin/pesanan(sewa)')->with('success', 'Pesanan ditolak');
    }

    public function pesanan_sewa_ubah_index($id)
    {
      $title = "Ubah Pesanan (Sewa) | Dila F-fashion";
      $data = Rent_Order::find($id);
      $data->harga = $data->harga / $data->banyak;

      return view('admin.ubah_pesanan(sewa)', compact('title', 'data'));
    }

    public function pesanan_sewa_ubah_query($id, Request $request)
    {
      $request->validate([
        'banyak' => 'required',
        'transaksi' => 'required',
        'jenis_pesanan' => 'required'
      ], [
        'banyak.required' => 'data banyak tidak boleh kosong',
        'transaksi.required' => 'data banyak tidak boleh kosong',
        'jenis_pesanan.required' => 'data banyak tidak boleh kosong',
      ]);

      $user = Rent_Order::find($id);
      $user->banyak = htmlspecialchars($request->banyak);
      $user->harga = $request->harga * $request->banyak;
      $user->transaksi = htmlspecialchars($request->transaksi);
      $user->jenis_pesanan = htmlspecialchars($request->jenis_pesanan);
      $myTime = Carbon::now();
      $time = $myTime->addHours(7);
      $user->updated_at = $time;
      $user->save();

      return Redirect('/admin/pesanan(sewa)')->with('success', 'Pesanan berhasil diubah');
    }

    public function pesanan_sewa_bayar($id)
    {
      $user = Rent_Order::find($id);
      $user->status_bayar = '1';
      $user->save();

      return Redirect('/admin/pesanan(sewa)')->with('success', 'Pesanan telah dibayar');
    }

    public function pesanan_sewa_kirim($id)
    {
      $user = Rent_Order::find($id);
      $user->status_kirim = '1';
      $user->save();

      return Redirect('/admin/pesanan(sewa)')->with('success', 'Pesanan telah dikirim');
    }

}
