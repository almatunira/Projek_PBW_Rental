<?php

namespace App\Http\Controllers;

use App\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->get('login') === 2) {  
            $mobil = Mobil::orderBy('id', 'desc')->get();
            return view('admin', compact('mobil'));
          }

        return redirect('/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $folder_tujuan = 'img';
        $file->move($folder_tujuan, $nama_file);

        Mobil::create([
               'no_plat' => $request->no_plat,
                'merek' => $request->merek,
                'tipe' => $request->tipe,
                'harga' => $request->harga,
                'gambar' => $nama_file
        ]);

        return redirect('/admin') -> with('status','Data Mobil berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil, Request $request)
    {
        if($request->session()->get('login') === 2) { 
             return view('edit-mobil', compact('mobil'));
        }else{
            return redirect('/login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        $nama_file = $mobil->gambar;
        if($request->hasFile('gambar')){
            $nama_file = time()."_".$request->file('gambar')->getClientOriginalName();
            $folder_tujuan = 'img';
            $request->file('gambar')->move($folder_tujuan, $nama_file);
            $image_path = "img/".$mobil->gambar;
            if(File::exists($image_path))
                File::delete($image_path);
            }

            Mobil::where('id', $mobil->id)
            ->update([
                'no_plat' => $request->no_plat,
                'merek' => $request->merek,
                'tipe' => $request->tipe,
                'harga' => $request->harga,
                'gambar' => $nama_file
            ]);
             return redirect('/admin') -> with('status','Data mobil berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        $image_path = "img/".$mobil->gambar;
        if(File::exists($image_path))
            File::delete($image_path);

        Mobil::destroy($mobil->id);
        return redirect('/admin') -> with('status','Data Mobil berhasil dihapus');
    }
}
