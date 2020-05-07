@extends('layout.master')
@section('content')


    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
      </div>
      @endif
    <div class="row">
        <div class="col-6">
            <h1> Daftar Karyawan </h1>
            <div>
                <form class="form-inline" method="GET" action="/dosen">
                    <input class="form-control mr-sm-2" name ="cari" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
        </div>
        <div class="col-6">
<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
    Tambah Data Karyawan
  </button>
        </div>



        <div class="card-body">
            <div class="table-responsive">
              <table class="table tablesorter " id="">
                <thead class=" text-primary">
                 <tr>

                    <th><center>Nama Karyawan</center></th>
                    <th><center>NIK</center></th>
                    <th><center>Level</center></th>
                    <th><center>Email</center></th>
                    <th><center>Alamat</center></th>
                    <th><center>Aksi</center></th>

                </tr>
            </thead>
            <tbody>

                @foreach ($data_dosen as $dosen )

                <tr>
                    <td><center><a href="/dosen/{{ $dosen->id }}/profile">{{ $dosen->name }}</a></center></td>
                    <td><center><a href="/dosen/{{ $dosen->id }}/profile">{{ $dosen->nim}}</a></center></td>
                <td><center>{{ $dosen->role}}</center></td>
                <td><center>{{ $dosen->email }}</center></td>
                <td><center>{{ $dosen->alamat }}</center></td>
                <td><center> <a href = "/dosen/{{ $dosen->id }}/edit" class="btn btn-warning btn-sm">Edit</a>

                    <a href = "/dosen/{{ $dosen->id }}/delete" class="btn btn-danger btn-sm" onclick="return confirm('yakin mau ente hapus ?')">Delete</a></td>

                </center>
            </td>

                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>

    </div>
</div>
          <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Operator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <form action="/dosen/create" method="POST" class="white-content" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="exampleInputEmail1">Nama </label>
                  <input  name="name" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp"
                  placeholder="Nama Operator">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">NIK</label>
                    <input  name="nim" type="text" class="form-control"  id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="nim">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Level</label>
                    <select name="role" class="form-control" id="exampleFormControlSelect1">
                      <option value="Admin">Admin</option>
                      <option value="Operator">Operator</option>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                  </div>

        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </form>
        </div>
      </div>
    </div>
  </div>


@endsection
