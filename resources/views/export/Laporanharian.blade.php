<html>
<head>
	<style type="text/css">
	td {
		border: 1px solid #CCCCCC;
		padding: 5px 15px;
	}
	</style>
</head>
<body>

<table >
<thead>
<tr >
<td>No</td>
<td>Compound</td>
<td>HasilTes</td>
<td>Waktu Tes</td>
<td>Mesin</td>
</tr>
</thead>
<tbody>
                <?php $no = 0;?>
@foreach ($siswa as $s )
                <?php $no++ ;?>
<tr>
<td>{{$no}}</td>
<td>{{$s->nama_depan}}</td>
<td>{{$s->nim}}</td>
<td>{{$s->created_at}}</td>
<td>{{$s->agama}}</td>
</tr>
@endforeach
</tbody>
</table>
</body>
</html>