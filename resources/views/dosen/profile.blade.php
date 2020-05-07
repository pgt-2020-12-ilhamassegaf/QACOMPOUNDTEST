@extends('layout.master')
@section('content')
<div class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card card-user">
          <div class="card-body">
            <p class="card-text">
              </p><div class="author">
                <div class="block block-one"></div>
                <div class="block block-two"></div>
                <div class="block block-three"></div>
                <div class="block block-four"></div>
                <a href="javascript:void(0)">
                    <img class="avatar" src="{{ $dosen->getAvatar() }}" alt="avatar">
                    <h5 class="title">{{ $dosen->name }}</h5>
                  </a>
                <p class="description">
                    {{ $dosen->nim }}
                </p>
              </div>
            <p></p>
            <div class="card-description">

<div class="profile-info">
<h4 class="heading">Informasi</h4>
<div class="card-body">
    <div class="table-responsive">
      <table class="table tablesorter " id="">
        <thead class=" text-primary">
         <tr>
            <th><center>LEVEL</center></th>
           <th><center>EMAIL</center></th>
            <th><center>ALAMAT</center></th>
            <th><center>MASUK</center></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <td><center>{{ $dosen->role }}</center></td>
        <td><center>{{ $dosen->email }}</center></td>
        <td><center>{{ $dosen->alamat }}</center></td>
        <td><center>{{ $dosen->created_at }}</center></td>
        </tr>
    </tbody>
</table>
<a href="/dosen/{{ $dosen->id }}/edit" type="submit" class="btn btn-fill btn-primary">edit</a>

</div>
          </div>
          <div class="card-footer">
            <div class="button-container">
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-facebook">
                <i class="fab fa-facebook"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-twitter">
                <i class="fab fa-twitter"></i>
              </button>
              <button href="javascript:void(0)" class="btn btn-icon btn-round btn-google">
                <i class="fab fa-google-plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
