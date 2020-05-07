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
        <form action="/dosen/{{ $dosen->id }}/update" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="exampleInputEmail1">Nama Karyawan</label>
              <input name="name" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp"
              placeholder="Nama Dosen" value="{{ $dosen->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">NIK</label>
                <input name="nim" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="NIK" value="{{ $dosen->nim }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Email" value="{{ $dosen->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Alamat" value="{{ $dosen->alamat }}">
            </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Level</label>
                <select name="role" class="form-control" id="exampleFormControlSelect1">
                  <option value="Admin" @if($dosen->role == 'Admin')selected @endif>Admin</option>
                  <option value="Operator" @if($dosen->role == 'Operator')selected @endif>Operator</option>

                </select>
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





