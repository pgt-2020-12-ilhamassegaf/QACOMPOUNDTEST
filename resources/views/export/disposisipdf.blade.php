  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Disposisi</title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <style>
          body{
              font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
              color:#333;
              text-align:left;
              font-size:18px;
              margin:0;
          }
          .container{
              margin:0 auto;
              margin-top:35px;
              padding:40px;
              width:750px;
              height:auto;
              background-color:#fff;
          }
          caption{
              font-size:28px;
              margin-bottom:15px;
          }
          table{
              border:1px solid #333;
              border-collapse:collapse;
              margin:0 auto;
              width:740px;
          }
          td, tr, th{
              padding:12px;
              border:1px solid #333;
              width:185px;
          }
          th{
              background-color: #f0f0f0;
          }
          h4, p{
              margin:0px;
          }
      </style>
  </head>
  <body>
      <div class="container">
          <table>
              <caption>
                  Kartu Disposisi
              </caption>
              <thead>
                  <tr>
                    <th>No.Mesin:{{ $siswa->agama}}</th>
                    <th>{{ $siswa->created_at->format('D, d M Y') }}</th>
                  </tr>
              </thead>
              <thead>
                <tr>
                    <th colspan="1"><strong>SPEK</strong> </th>
                    <th colspan="1"><strong>NILAI</strong></th>

                </tr>
            </thead>
              <tbody>
                @foreach ($siswa->mapel as $mapel )

                  <tr>
                      <th>{{ $mapel->nama }} </th>
                      <th>{{ $mapel->pivot->nilai }}</th>

                  </tr>
                  @endforeach

              </tbody>

          </table>
      </div>

      @section('piechart')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<!-- optional -->
<script src="https://code.highcharts.com/modules/offline-exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>
<script>
    Highcharts.chart('chartNilai', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Hasil Tes Compound'
    },

    xAxis: {
        categories:{!! json_encode($categories) !!} ,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Nilai'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Nilai',
        data: {!! json_encode($data) !!}

    }]
});
</script>
@stop

  </body>
  </html>
