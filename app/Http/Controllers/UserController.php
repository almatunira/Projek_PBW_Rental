<?php

namespace App\Http\Controllers;

use App\DaftarUser;
use App\Transaksi;
use App\Mobil;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

     public function cek_login(Request $request){

        $result = DaftarUser::where('email', $request->email)->get();

          if($result->isEmpty()){
            return redirect('/login')->with('error','Email belum terdaftar');
          }

        $pass = Hash::check($request->password, $result[0]->password);

        if(!$pass){
            return redirect('/login')->with('error','Password Salah');
        }

        $request->session()->put('nama', $result[0]->nama);
        $request->session()->put('id', $result[0]->id);

        if($result[0]->status == 'admin'){
            $request->session()->put('login', 2);
             return redirect('/admin');
        }

        $request->session()->put('login', 1);
        return redirect('/user');
    }

     public function daftar(){
        return view('daftar');
    }

    public function buat_akun(Request $request){
        $isExist = DaftarUser::where('email', $request->email)->get();

        if(!$isExist->isEmpty()){
            return redirect ('/daftar')->with('status', 'Email sudah terdaftar');
        }

        DaftarUser::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'password' => Hash::make($request->password),
            'status' => 'user'
        ]);
            return redirect('/login')->with('status', 'Akun berhasil dibuat');
    }

     public function edit(DaftarUser $user, Request $request)
    {
        if($request->session()->get('login') > 0) { 
             return view('edit-user', compact('user'));
        }else{
            return redirect('/login');
        }
    }

  public function update(Request $request, DaftarUser $user)
    {
        // $nama_file = $mobil->gambar;
        // if($request->hasFile('gambar')){
        //     $nama_file = time()."_".$request->file('gambar')->getClientOriginalName();
        //     $folder_tujuan = 'img';
        //     $request->file('gambar')->move($folder_tujuan, $nama_file);
        //     $image_path = "img/".$mobil->gambar;
        //     if(File::exists($image_path))
        //         File::delete($image_path);
        //     }

            DaftarUser::where('id', $request->session()->get('id'))
            ->update([
              'nama' => $request->nama,
              'email' => $request->email,
              'nomor_hp' => $request->nomor_hp,
              'password' => $user->password,
              'status' => $request->status
                // 'gambar' => $nama_file
            ]);

            if($request->nama !== $user->nama)
                $request->session()->put('nama', $request->nama);
         
            if($request->session()->get('login') === 2) { 
               return redirect('/admin') -> with('status','Data berhasil diedit');
           }else{
               return redirect('/user') -> with('status','Data berhasil diedit');
           }
    }

     public function ubah_password(Request $request)
    {
        if($request->session()->get('login') > 0) { 
             return view('edit-password');
        }else{
            return redirect('/login');
        }
    }

    public function update_password(Request $request, DaftarUser $user)
    {
         $result = DaftarUser::where('id', $user->id)->get();

        $pass = Hash::check($request->password_sekarang, $result[0]->password);

        if(!$pass){
            return redirect('user/password/'.$user->id.'/edit')->with('error','Password Salah');
        }

        if($request->password_baru != $request->konfirmasi_password_baru){
            return redirect('user/password/'.$user->id.'/edit')->with('error','Password Konfirmasi Tidak sama');
        }

            DaftarUser::where('id', $request->session()->get('id'))
            ->update([
              'password' => Hash::make($request->password_baru)
            ]);
         
            if($request->session()->get('login') === 2) { 
               return redirect('/admin') -> with('status','Data berhasil diedit');
           }else{
               return redirect('/user') -> with('status','Password berhasil diubah');
           }
    }

    public function admin_data_pelanggan(Request $request){
         if($request->session()->get('login') === 2) { 
              $transaksi = Transaksi::orderBy('id', 'desc')->get();
              return view('admin-data-pelanggan', compact('transaksi'));
        }else{
            return redirect('/login');
        }
    }

     public function admin_riwayat(Request $request){
        if($request->session()->get('login') === 2) { 
             $hari_ini = date("Y-m-d");
             $transaksi = Transaksi::orderBy('id', 'desc')->where('created_at','like',$hari_ini.'%')->get();
              return view('admin-riwayat', compact('transaksi'));
        }else{
            return redirect('/login');
        }
    }

    public function admin_profil(Request $request){
         if($request->session()->get('login') === 2) { 
             return view('admin-profil');
        }else{
            return redirect('/login');
        }
    }

    public function pemesanan(Request $request){
        if($request->session()->get('login') === 1) { 
            $mobil = Mobil::all();
            return view('user', compact('mobil','request'));
          }

        return redirect('/login');
    }

     public function user_riwayat( Request $request){
        if($request->session()->get('login') === 1) { 
             $transaksi = Transaksi::orderBy('id', 'desc')->where('id_user',$request->session()->get('id'))->get();
              return view('user-riwayat', compact('transaksi'));
        }else{
            return redirect('/login');
        }
    }

    public function user_profil( Request $request, DaftarUser $user){
        if($request->session()->get('login') === 1) { 
             return view('user-profil', compact('user'));
        }else{
            return redirect('/login');
        }
    }

    public function order(Mobil $mobil, Request $request){

        if($request->session()->get('login') === 1) { 
            return view('order', compact('mobil'));
          }
        return redirect('/login');
    }

      public function kirim_order(Request $request){
            Transaksi::create([
                'nama_pelanggan' => $request->nama_pelanggan,
                'id_user' => $request->id_user,
                'no_plat' => $request->no_plat,
                'merek' => $request->merek,
                'tipe' => $request->tipe,
                'harga' => $request->harga
        ]);
            return redirect('/user')->with('status', 'Order Berhasil');
      }

}
