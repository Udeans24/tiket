@extends('layouts.app')

@section('content')
    <main>
        <!--=============== HOME ===============-->
        <section class="hero" id="hero" style="
            background-repeat: no-repeat;
            background-size: cover;
            background-image: url('https://media.istockphoto.com/photos/tropical-beach-with-boats-and-blue-ocean-in-tropical-island-picture-id1068291116?b=1&k=20&m=1068291116&s=170667a&w=0&h=9Bsc3HJkFdNRr0ESpdMeAlfSVLX68mVrz3UY-Ye0p0s=');
        ">
            <div class="hero-content h-100 d-flex justify-content-center align-items-center flex-column">

                <div class="row mt-5 justify-content-center">
                    <h1 class="text-center text-white display-4">Kereta</h1>
                    <hr width="40" class="text-center" />

                    <!-- Card Informasi Kelas Kereta Api -->
                    @foreach(['Eksekutif', 'Bisnis', 'Ekonomi'] as $kelas)
                        <div class="col-lg-4" style="margin-bottom: 30px">
                            <div class="card package-card">
                                <div class="package-wrapper-img overflow-hidden">
                                    <!-- Gambar {{$kelas}} -->
                                    <img src="gambar_{{$kelas}}.jpg" class="img-fluid" alt="Kelas {{$kelas}}" />
                                </div>
                                <div class="package-price d-flex justify-content-center">
                                    {{-- <span class="btn btn-light position-absolute package-btn">{{$kelas}}</span> --}}
                                </div>  
                                {{-- <h5 class="btn position-absolute w-100">Kelas {{$kelas}}</h5> --}}
                                <a href="#" class="btn btn-info btn-block mt-2 floating-info">
                                     {{$kelas}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#pesan">Pesan Sekarang</button>
                </div>
            </div>
        </section>
     


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
                  {{-- <div class="mb-3">
                    <label class="form-label" for="kode_kursi">Kode Kursi</label>
                    <input type="string" class="form-control" id="kode_kursi" name="kode_kursi" placeholder="Masukan Kode Kursi">
                  </div> --}}
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
    </main>

    <style>
        .floating-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
        /* Gunakan class pada gambar untuk memodifikasi CSS */
        .package-wrapper-img img {
           max-width: 100%; /* Membuat gambar tidak melebihi lebar kontainer */
           height: auto; /* Menjaga aspek ratio gambar */
        }

    </style>
@endsection
