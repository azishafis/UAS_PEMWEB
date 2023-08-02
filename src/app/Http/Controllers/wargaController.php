<?php

namespace App\Http\Controllers;

use App\Models\warga;
use Illuminate\Http\Request;

class wargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = warga::where('nama', 'like', "%$katakunci%")
                    ->orWhere('alamat', 'like', "%$katakunci%")
                    ->orWhere('no_hp', 'like', "%$katakunci%")
                    ->orWhere('tanggal_lahir', 'like', "%$katakunci%")
                    ->orWhere('status', 'like', "%$katakunci%")
                    ->orWhere('agama', 'like', "%$katakunci%") 
                    ->paginate($jumlahbaris);
        }else{
            $data = warga::orderBy('nama','desc')->paginate($jumlahbaris);
        }
        return view('warga.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'tanggal_lahir' => 'required',
            'status' => 'required',
            'agama' => 'required',
        ],[
            'nama.required'=>'Nama wajib di isi',
            'alamat.required'=>'Alamat wajib di isi',
            'no_hp.required'=>'No HP wajib di isi',
            'tanggal_lahir.required'=>'Tanggal lahir wajib di isi',
            'status.required'=>'Status wajib di isi',
            'agama.required'=>'Agama wajib di isi',
        ]);
        $data = [
            'nama'=>$request->nama,
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'status'=>$request->status,
            'agama'=>$request->agama,
        ];
        warga::create($data);
        return redirect()->to('warga')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $data = warga::where('nama', $id)->first();
     return view('warga.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'alamat' => 'required',
            'no_hp' => 'required',
            'tanggal_lahir' => 'required',
            'status' => 'required',
            'agama' => 'required',
        ],[
            'alamat.required'=>'Alamat wajib di isi',
            'no_hp.required'=>'No HP wajib di isi',
            'tanggal_lahir.required'=>'Tanggal lahir wajib di isi',
            'status.required'=>'Status wajib di isi',
            'agama.required'=>'Agama wajib di isi',
        ]);
        $data = [
            'alamat'=>$request->alamat,
            'no_hp'=>$request->no_hp,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'status'=>$request->status,
            'agama'=>$request->agama,
        ];
        warga::where('nama', $id)->update($data);
        return redirect()->to('warga')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        warga::where('nama', $id)->delete();
        return redirect()->to('warga')->with('success', 'Berhasil melakukan hapus data');
    }
}
