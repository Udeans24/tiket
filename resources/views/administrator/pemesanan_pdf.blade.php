<div class="content">
    <h2 class="text-center">Data Pemesanan</h2>
    <table class="table table-striped table-hover">
    <tr>
      <th>No</th>
      <th>Kode Pemesanan</th>
      <th>Tanggal Pemesanan</th>
      <th>Tempat Pemesanan</th>
      <th>Nama Penumpang</th>
      <th>Kode Kursi</th>
      {{-- <th>ID Rute</th> --}}
      <th>Tujuan</th>
      <th>Tanggal Berangkat</th>
      <th>Jam Cekin</th>
      <th>Jam Berangkat</th>
      <th>Total Bayar</th>
      {{-- <th>Nama Petugas</th> --}}
      <th>Opsi</th>
    </tr>
    <tbody>
      <?php $i = 1;?>
      @foreach ($pemesanan as $p)
      <tr>
          <th>{{ $i }}</th>
          <th>{{ $p->kode_pemesanan }}</th>
          <th>{{ $p->tanggal_pemesanan }}</th>
          <th>{{ $p->tempat_pemesanan }}</th>
          <th>{{ $p->penumpang->nama_penumpang }}</th>
          <th>{{ $p->kode_kursi }}</th>
          {{-- <th>{{ $p->id_rute }}</th> --}}
          <th>{{ $p->tujuan }}</th>
          <th>{{ $p->tanggal_berangkat }}</th>
          <th>{{ $p->jam_cekin }}</th>
          <th>{{ $p->jam_berangkat }}</th>
          <th>{{ $p->total_bayar }}</th>
          <td>
        </form>
        </td>
          <?php $i++; ?>
      </tr>
    @endforeach
  </tbody>
</table>