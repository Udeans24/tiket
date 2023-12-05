    @extends('user.index')
    @section('konten')
        <div class="container mt-5">
            <div class="col-md-6">
                    <h2 class="heading-section">Tiket yang Ditemukan :</h2>
            </div>
            @foreach ($tran as $item)
            <div class="card card-body mb-5" style="background-color: #e9c836">
                <h5 class="mb-2 text-black"><b><u>{{ $item->transportasi->keterangan }}</u></b></h5>
                <h6 class="mb-0 text-black" style="font-size: 16px">Tujuan : {{ $item->tujuan }}</h6>
                <h6 class="mb-0 text-black" style="font-size: 16px">Kelas : {{ $item->transportasi->type_transportasi->keterangan }}</h6>
                <p class=" mb-0 text-black " style="font-size: 14px">{{ $item->rute_awal }} - {{ $item->rute_akhir }}</p>
                <div class="mb-0 text-black" style="font-size: 14px">{{ $item->jamberangkat }}</div>
                <div class="d-flex justify-content-between align-items-center w-100">
                    <div class="text-bold mb-0">Harga: {{ $item->harga }}</div>
                    <button type="button" data-bs-toggle="modal" data-id="{{ $item->id_rute }}" data-bs-target="#pesan" class="btn btn-primary">
                        <i class="fas fa-ticket"></i> Pesan Tiket
                    </button>
                </div>
            @endforeach
        </div>
        </div>
        <div class="modal fade" id="pesan" tabindex="-1" aria-labelledby="pesan" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="pesan">Pesan Tiket</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="{{ route('pesan.store') }}" method="POST">
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
                      <input type="submit" class="btn btn-outline-success" value="Simpan">
                      <input type="reset" class="btn btn-outline-danger" value="Reset">
                    </td>
                  </tr>
                  </div>
    </div>
    @endsection