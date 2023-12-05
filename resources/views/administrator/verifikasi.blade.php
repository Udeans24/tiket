@extends('administrator.index')
@section('content')
<a href="{{ url('cetakpdf') }}" class="btn btn-primary">Export PDF</a>
    <div class="container-fluid pt-4 px-4">
        <div class="table-wrap">
            <table class="table">
                <thead class="dark">
                  <tr>
                    <th>No</th>
                    <th>Nama Penumpang</th>
                    <th>KD Pemesanan</th>
                    <th>KD Kursi</th>
                    <th>Tanggal</th>
                    <th>Tempat</th>
                    <th>Tujuan</th>
                    <th>Tanggal Berangkat</th>
                    <th>Jam Cekin</th>
                    <th>Jam Berangkat</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1;?>
                    @foreach ($pemesanan as $pemesanan)
                        <tr>
                          <th>{{  $i }}</th>
                          <th>{{  $pemesanan->penumpang->nama_penumpang }}</th>
                          <th>{{  $pemesanan->kode_pemesanan }}</th>
                          <th>{{  $pemesanan->kode_kursi }}</th>
                          <th>{{  $pemesanan->tanggal_pemesanan }}</th>
                          <th>{{  $pemesanan->tempat_pemesanan }}</th>
                          <th>{{  $pemesanan->rute->tujuan }}</th>
                          {{-- <th>{{  $pemesanan->rute->rute_awal }} {{ $pemesanan->rute->ahir }}</th> --}}
                          <th>{{  $pemesanan->tanggal_berangkat }}</th>
                          <th>{{  $pemesanan->jam_cekin }}</th>
                          <th>{{  $pemesanan->jam_berangkat }}</th>
                          <th>{{  $pemesanan->total_bayar }}</th>
                          @if ($pemesanan->status == 0)
                              <td>Belum Bayar</td>
                            @else
                                <td>Lunas</td>
                          @endif
                          <td>
                            <div>
                                <form action="{{ route('verifikasi.update', $pemesanan->id_pemesanan)}}" method="POST">
                                    @csrf
                                    @method('Patch')
                                    <button type="submit" class="btn btn-info">validasi</button>
                                </form>
                            </div>
                          </td>
                          <?php $i++; ?>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
@endsection