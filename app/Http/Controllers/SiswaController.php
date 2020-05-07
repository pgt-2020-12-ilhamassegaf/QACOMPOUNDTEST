<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SiswaController extends Controller
{
    public function index(Request $request){
        if($request->has('cari')){
            $data_siswa =\App\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa =\App\Siswa::all();

        }

        return view('siswa.index', ['data_siswa'=>$data_siswa]);
    }

    public function create(Request $request){
//insert ke table users
        $user=new\App\User;
        $user->name=$request->nama_depan;
        $user->role='siswa';
        $user->nim=$request->nim;
        $user->email=$request->email;
        $user->password=bcrypt('12345678');
        $user->remember_token=Str::random(60);
        $user->save();


        //insert ke table siswa
        $request->request->add(['user_id'=>$user->id]);
        $siswa=\App\siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();}
        return redirect('/siswa')->with('sukses','Data Berhasil di Input');
        //return $request->all();
    }
    public function edit ($id){
        $siswa=\App\Siswa::find($id);
        return view('siswa/edit',['siswa'=> $siswa]);

    }
    public function update(Request $request,$id){
        //dd($request->all());
        $siswa= \App\Siswa::find($id);
       $siswa-> update($request->all());
       if($request->hasFile('avatar')){
           $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
           $siswa->avatar = $request->file('avatar')->getClientOriginalName();
           $siswa->save();
       }
        return redirect('/siswa')->with('sukses','Data Berhasil di Edit');
    }
    public function delete ($id){
        $siswa=\App\Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data Berhasil di Hapus');

    }
    public function profile ($id){
        $siswa=\App\Siswa::find($id);
        $matapelajaran=\App\Mapel::all();
        //menyiapkan data chart
        $categories=[];
        $data=[];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $categories[]=$mp->nama;
            $data[]=$siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
        }
    }
       // dd(json_encode($categories));
        return view('siswa.profile',['siswa'=> $siswa,'matapelajaran'=>$matapelajaran,'categories'=>$categories,'data'=>$data]);

    }
    public function addnilai (Request $request,$idsiswa){
        $siswa=\App\Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('siswa/'.$idsiswa.'/profile')->with('Gagal','Nilai sudah di masukkan');

        }
        $siswa->mapel()->attach($request->mapel,['nilai'=>$request->nilai]);
        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Nilai Berhasil di masukkan');


    }
    public function exportpdf($id){
        $siswa=\App\Siswa::find($id);
        $matapelajaran=\App\Mapel::all();
        $categories=[];
        $data=[];

        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
            $categories[]=$mp->nama;
            $data[]=$siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        }

        $pdf = PDF::loadView('export.disposisipdf',['siswa'=> $siswa,'matapelajaran'=>$matapelajaran,'categories'=>$categories,'data'=>$data])->setPaper('a4', 'landscape');
        return $pdf->download('disposisi.pdf');
    }
    public function mapel(){
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai'])->withTimeStamps();
    }

    public function exportsemuapdf(){
        $siswa=\App\Siswa::all();
        

        $pdf = PDF::loadView('export.Laporanharian',['siswa'=>$siswa])->setPaper('a4', 'horizontal');
        return $pdf->download('Laporanharian.pdf');
    }
}
