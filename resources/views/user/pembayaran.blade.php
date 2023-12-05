@extends('layouts.app')
@section('konten')
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table">
                  <thead class="thead-dark">	

				   <tr>
						<td>No</td>
						{{-- <td>ID Pemesanan</td> --}}
						<td>Kode Pemesanan</td>
						<td>Tanggal Pemesanan</td>
						<td>Tempat </td>
						<td>Nama Penumpang</td>
            			<td>Kode Kursi</td>
            			<td>Rute</td>
            			<td>Tujuan</td>
            			<td>Tanggal Berangkat</td>
            			<td>Jam Cekin</td>
            			<td>Jam Berangkat</td>
            			<td>Total Bayar</td>
            			<td>Nama Petugas</td>
						<td>Opsi</td>
					</tr>
			</thead>
			<tbody>
				<?php $i = 1;?>
				@foreach ($pemesanan as $pemesanan)
					<tr>
					  <th>{{  $i }}</th>
					  {{-- <th>{{  $pemesanan->id_pemesanan }}</th> --}}
					  <th>{{  $pemesanan->kode_pemesanan }}</th>
					  <th>{{  $pemesanan->tanggal_pemesanan }}</th>
					  <th>{{  $pemesanan->tempat_pemesanan }}</th>
					  <th>{{  $pemesanan->penumpang->nama_penumpang }}</th>
					  <th>{{  $pemesanan->kode_kursi }}</th>
					  <th>{{  $pemesanan->rute->rute_awal }}</th>
					  <th>{{  $pemesanan->tujuan }}</th>
					  <th>{{  $pemesanan->tanggal_berangkat }}</th>
					  <th>{{  $pemesanan->jam_cekin }}</th>
					  <th>{{  $pemesanan->jam_berangkat }}</th>
					  <th>{{  $pemesanan->total_bayar }}</th>
					  <th>{{  $pemesanan->petugas->nama_petugas }}</th>
                    </tr>
                    @endforeach
            </tbody>
                </table>
               
            </div>
        </div>
    </div>
    
</body>
</html>
@endsection