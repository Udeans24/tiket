@extends('administrator.index')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Transportasi</h2>
        </div>
    </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transportasi">
            Tambah Transportasi
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <td>No</td>
                          <td>Kode</td>
                          <td>Jumlah Kursi</td>
                          <td>Keterangan</td>
                          <td>Type Transportasi</td>
                          <td>Opsi</td>
                        </tr>
                      </thead>
                      
                        <tbody>
                            <?php $i = 1;?>
                            @foreach ($datatransportasi as $transport)
                            <tr>
                                <th>{{ $i }}</th>
                                <th>{{ $transport->kode }}</th>
                                <th>{{ $transport->jumlah_kursi }}</th>
                                <th>{{ $transport->keterangan }}</th>
                                <th>{{ $transport->type_transportasi->nama_type }}</th>
                                <td>
                                    <button type="button"  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edittransportasi{{ $transport->id_transportasi }}"><i class="bi bi-pencil-fill"></i></button>
                                    <form class="d-inline" action="{{ 'transportasi/' .$transport->id_transportasi }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                                </td>
                                <?php $i++; ?>
                            </tr>
                            {{-- Modal Edit --}}
                          <div class="modal fade" id="edittransportasi{{$transport->id_transportasi}}" tabindex="-1" aria-labelledby="edittransportasi" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="edittransportasi">Edit Data</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('transportasi.update', $transport->id_transportasi)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{-- <div class="mb-3">
                                          <label class="form-label" for="id_transportasi">ID Transportasi</label>
                                          <input type="string" class="form-control" id="id_transportasi" name="id_transportasi" value="{{ $transport->id_transportasi }}">
                                        </div> --}}
                                        {{-- <div class="mb-3">
                                            <label class="form-label" for="kode">Kode</label>
                                            <input type="integer" class="form-control" id="kode" name="kode" value="{{$transport->kode}}">
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="jumlah_kursi">Jumlah Kursi</label>
                                            <input type="string" class="form-control" id="jumlah_kursi" name="jumlah_kursi" value="{{$transport->jumlah_kursi}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <input type="string" class="form-control" id="keterangan" name="keterangan" value="{{$transport->keterangan}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="id_type_transportasi">ID Type Transportasi</label>
                                            <select class="form-select" name="id_type_transportasi" id="id_type_transportasi" required>
                                              @foreach ($typetransportasi as $item)
                                                  <option value="{{ $item->id_type_transportasi }}">{{ $item->nama_type }}</option>
                                              @endforeach
                                            </select>
                                        </div>

                                            <div class="modal-footer">
                                               
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
            </div>
        </div>
    </div>
</section>
{{-- Contennt End --}}

{{-- Modal Petugas --}}
    <div class="modal fade" id="transportasi" tabindex="-1" aria-labelledby="transportasi" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="transportasi">Tambah</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="{{ route('transportasi.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="jumlah_kursi">Jumlah Kursi</label>
                    <input type="string" class="form-control" id="jumlah_kursi" name="jumlah_kursi" placeholder="Masukan Jumlah Kursi">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keterangan">Keterangan</label>
                    <input type="string" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="id_type_transportasi">Type Transportasi</label>
                    <select class="form-select" name="id_type_transportasi" id="id_type_transportasi" required>
                      @foreach ($typetransportasi as $item)
                          <option value="{{ $item->id_type_transportasi }}">{{ $item->nama_type }}</option>
                      @endforeach
                    </select>
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
</div>


{{-- Modal Edit Sampai Sini --}}
@endsection