@extends('administrator.index')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Type Transportasi</h2>
        </div>
    </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#type_transportasi">
            Tambah Type Transportasi
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <td>No</td>
                          <td>Nama Type</td>
                          <td>Keterangan</td>
                          <td>Opsi</td>
                        </tr>
                      </thead>
                      
                        <tbody>
                            <?php $i = 1;?>
                            @foreach ($datatype_transportasi as $type)
                            <tr>
                                <th>{{ $i }}</th>
                                <th>{{ $type->nama_type }}</th>
                                <th>{{ $type->keterangan }}</th>
                                <td>
                                    <button type="button"  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edittype_transportasi{{ $type->id_type_transportasi }}"><i class="bi bi-pencil-fill"></i></button>
                                    <form class="d-inline" action="{{ 'typetransportasi/' .$type->id_type_transportasi }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                                </td>
                                <?php $i++; ?>
                            </tr>
                            {{-- Modal Edit --}}
                          <div class="modal fade" id="edittype_transportasi{{$type->id_type_transportasi}}" tabindex="-1" aria-labelledby="edittype_transportasi" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="edittype_transportasi">Edit Data</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('typetransportasi.update', $type->id_type_transportasi)}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        {{-- <div class="mb-3">
                                            <label class="form-label" for="id_type_transportasi">ID Type Transportasi</label>
                                            <input type="integer" class="form-control" id="id_type_transportasi" name="id_type_transportasi" value="{{$type->id_type_transportasi}}" readonly>
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="form-label" for="nama_type">Nama Type</label>
                                            <input type="string" class="form-control" id="nama_type" name="nama_type" value="{{$type->nama_type}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="keterangan">Keterangan</label>
                                            <input type="string" class="form-control" id="keterangan" name="keterangan" value="{{$type->keterangan}}">
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
    <div class="modal fade" id="type_transportasi" tabindex="-1" aria-labelledby="type_transportasi" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="type_transportasi">Tambah</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/typetransportasi" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nama_type">Nama Type</label>
                    <input type="string" class="form-control" id="nama_type" name="nama_type" placeholder="Masukan Nama Type">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="keterangan">Keterangan</label>
                    <input type="string" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan">
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