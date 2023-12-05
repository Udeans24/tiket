@extends('administrator.index')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Pemesanan</h2>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pemesanan">Pesan Sekarang</button>

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
					  <td>
						<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editpemesanan{{ $pemesanan->id_pemesanan }}"><i class="bi bi-pencil-fill"></i></button>
						<form class="d-inline" action="{{'pemesanan/'.$pemesanan->id_pemesanan}}" method="POST">
						@csrf
						@method('DELETE')
						<button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
						</form>
					  </td>
					  <?php $i++; ?>
					</tr>
					<div class="modal fade" id="editpemesanan{{$pemesanan->id_pemesanan}}" tabindex="-1" aria-labelledby="editpemesanan" aria-hidden="true">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h1 class="modal-title fs-5" id="editpemesanan">Edit Data</h1>
							  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="{{route('pemesanan.update', $pemesanan->id_pemesanan)}}" method="POST">
									@csrf
									
									<div class="mb-3">
										<label class="form-label" for="kode_kursi">Kode Kursi</label>
										<input type="integer" class="form-control" id="kode_kursi" name="kode_kursi" value="{{$pemesanan->kode_kursi}}">
									</div>
									<div class="mb-3">
										<label for="id_rute" class="form-label">Rute</label>
										<select class="form-select" id="id_rute" name="id_rute" aria-label="Default select example" required>
						  				@foreach ($rute as $item)
											<option value="{{ $item->id_rute }}">{{ $item->rute_awal }}</option>
										@endforeach
										</select>
									</div>
									<div class="mb-3"><div class="mb-3">
										<label for="tujuan" class="form-label">Tujuan</label>
										<input type="string" class="form-control" id="tujuan" name="tujuan" value="{{ $pemesanan->tujuan }}">
									</div>
									<div class="mb-3">
										<label class="form-label" for="tanggal_berangkat">Tanggal Berangkat</label>
										<input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" value="{{$pemesanan->tanggal_berangkat}}">
									</div>
									<div class="mb-3">
										<label class="form-label" for="jam_berangkat">Jam Berangkat</label>
										<input type="time" class="form-control" id="jam_berangkat" name="jam_berangkat" value="{{$pemesanan->jam_berangkat}}">
									</div>
										<div class="modal-footer">
											@method('PUT')
												<input class="btn btn-warning" type="submit" value="Simpan">
												<input class="btn btn-danger" type="reset" value="Reset">
										</div>
								</form>
							</div>
						  </div>
						</div>
					  </div>
				@endforeach
			</tbody>
		  </table>
	</div>
	<!-- Content End -->

	<!-- Modal pemesanan-->
	<div class="modal fade" id="pemesanan" tabindex="-1" aria-labelledby="pemesanan" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="pemesanan">Pesan Tiket</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form action="/pemesanan" method="POST">
					@csrf
					<div class="mb-3">
						<label class="form-label" for="tanggal_pemesanan">Tanggal Pemesanan</label>
						<input type="date" class="form-control" id="tanggal_pemesanan" name="tanggal_pemesanan" placeholder="dd/mm/yyyy">
					</div>
					<div class="mb-3">
						<label for="tempat_pemesanan" class="form-label">Tempat Pemesanan</label>
						<select class="form-select" id="tempat_pemesanan" name="tempat_pemesanan" aria-label="Default select example" required>
						  <option name="tempat_pemesanan" value="Stasiun KA TanahAbang">Stasiun KA TanahAbang</option>
						  <option name="tempat_pemesanan" value="Stasiun KA Bandung">Stasiun KA Bandung</option>
						  <option name="tempat_pemesanan" value="Stasiun KA Yogyakarta">Stasiun KA Yogyakarta</option>
						  <option name="tempat_pemesanan" value="Stasiun KA Malang">Stasiun KA Malang</option>
						  <option name="tempat_pemesanan" value="Stasiun KA Cilacap">Stasiun KA Cilacap</option>
						  <option name="tempat_pemesanan" value="Stasiun KA Purwokerto">Stasiun KA Purwokerto</option>
						  <option name="tempat_pemesanan" value="Stasiun KA Cirebon">Stasiun KA Cirebon</option>
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label" for="id_penumpang">Nama Penumpang</label>
						<select name="id_penumpang" id="id_penumpang" class="form-control">
							@foreach ($penumpang as $item)
								<option value="{{ $item->id_penumpang }}">{{ $item->nama_penumpang }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label class="form-label" for="kode_kursi">Kode Kursi</label>
						<input type="string" class="form-control" id="kode_kursi" name="kode_kursi" placeholder="Masukan Kode Kursi">
					</div>
					<div class="mb-3">
						<label for="id_rute" class="form-label">Rute</label>
						<select class="form-select" id="id_rute" name="id_rute" aria-label="Default select example" required>
							@foreach ($rute as $item)
								<option value="{{ $item->id_rute }}">{{ $item->rute_awal }}</option>
							@endforeach
						</select>
					</div>
					<div class="mb-3">
						<label for="tujuan" class="form-label">Tujuan</label>
						<input type="string" class="form-control" id="tujuan" name="tujuan" placeholder="Masukan Tujuan">
					</div>
					<div class="mb-3">
						<label class="form-label" for="tanggal_berangkat">Tanggal Berangkat</label>
						<input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" placeholder="dd/mm/yyyy">
					</div>
					<div class="mb-3">
						<label class="form-label" for="jam_cekin">Jam Cekin</label>
						<input type="time" class="form-control" id="jam_cekin" name="jam_cekin" placeholder="hh/mm/ss">
					</div>
					<div class="mb-3">
						<label class="form-label" for="jam_berangkat">Jam Berangkat</label>
						<input type="time" class="form-control" id="jam_berangkat" name="jam_berangkat" placeholder="hh/mm/ss">
					</div>
					<div class="mb-3">
						<label class="form-label" for="total_bayar">Total Bayar</label>
						<input type="string" class="form-control" id="total_bayar" name="total_bayar" placeholder="Rp.">
					</div>
					<div class="mb-3">
						<label class="form-label" for="id_petugas">Petugas</label>
						<select name="id_petugas" id="id_petugas" class="form-control">
							@foreach ($petugas as $item)
								<option value="{{ $item->id_petugas }}">{{ $item->nama_petugas }}</option>
							@endforeach
						</select>
					</div>
				  </div>
				  <div class="modal-footer">
					<tr>
						<td>
							<input type="submit" class="btn btn-warning" value="Simpan">
							<input type="reset" class="btn btn-danger" value="Reset">
						</td>
					</tr>
				  </div>
				</form>
			</div>
		</div>
	</div>
	@endsection	