@extends('layout.master')
@section('content')


            <div class="row">
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i>Total Compound Test</h5>
                <h3 class="card-title">{{totalSiswa()}}</h3>
              </div>
              
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title"><i class="tim-icons icon-send text-success"></i>Jumlah Karyawan</h5>
                <h3 class="card-title">{{totalDosen()}}</h3>
              </div>
              
            </div>
          </div>
         
        </div>    
              
@stop


