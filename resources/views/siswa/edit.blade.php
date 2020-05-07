@extends('layout.master')
@section('content')



    <h1>Edit Data</h1>
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
      </div>
      @endif
    <div class="row">
        <div class ="col-lg-12">
        <form action="/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Depan</label>
              <input name="nama_depan" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Email" value="{{ $siswa->email }}">
            </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                  <option value="Laki-Laki" @if($siswa->jenis_kelamin == 'Laki-Laki')selected @endif>LAKI-LAKI</option>
                  <option value="Perempuan" @if($siswa->jenis_kelamin == 'Perempuan')selected @endif>PEREMPUAN</option>

                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Agama</label>
                <input name="agama" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder=" Agama" value="{{ $siswa->agama }}">
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" > {{ $siswa->alamat }}</textarea>
              </div>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Avatar</label>
                <input type="file" name="avatar" class="form-control">
              </div>
              <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
        </div>
    </div>

    @endsection





