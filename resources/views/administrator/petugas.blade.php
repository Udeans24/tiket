@extends('administrator.index')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Petugas</h2>
        </div>
    </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#petugas">
            Tambah Petugas
        </button>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <td>No</td>
                          <td>ID Petugas</td>
                          <td>Nama Petugas</td>
                          <td>ID Level</td>
                          <td>Opsi</td>
                        </tr>
                      </thead>
                        <tbody>
                            <?php $i = 1;?>
                            @foreach ($datapetugas as $petugas)
                            <tr>
                                <th>{{ $i }}</th>
                                <th>{{ $petugas->id_petugas }}</th>
                                <th>{{ $petugas->nama_petugas }}</th>
                                <th>{{ $petugas->id_level }}</th>
                                <td>
                                    <button type="button"  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editpetugas{{ $petugas->id_petugas }}"><i class="bi bi-pencil-fill"></i></button>
                                    <form class="d-inline" action="{{ 'petugas/' .$petugas->id_petugas }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                                </td>
                                <?php $i++; ?>
                            </tr>
                            {{-- Modal Edit --}}
                          <div class="modal fade" id="editpetugas{{$petugas->id_petugas}}" tabindex="-1" aria-labelledby="editpetugas" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h1 class="modal-title fs-5" id="editpetugas">Edit Data</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{route('petugas.update', $petugas->id_petugas)}}" method="POST">
                                        @csrf
                                        
                                        <div class="mb-3">
                                            <label class="form-label" for="id_petugas">ID Petugas</label>
                                            <input type="integer" class="form-control" id="id_petugas" name="id_petugas" value="{{$petugas->id_petugas}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="username" class="form-control" id="username" name="username" value="{{$petugas->username}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="{{$petugas->password}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="nama_petugas">Nama Petugas</label>
                                            <input type="varchar" class="form-control" id="nama_petugas" name="nama_petugas" value="{{$petugas->nama_petugas}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="id_level">Level</label>
                                            <input type="integer" class="form-control" id="id_level" name="id_level" value="{{$petugas->id_level}}">
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
            </div>
        </div>
    </div>
</section>
{{-- Contennt End --}}

{{-- Modal Petugas --}}
    <div class="modal fade" id="petugas" tabindex="-1" aria-labelledby="petugas" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="petugas">Tambah</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="/petugas" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="string" class="form-control" id="username" name="username" placeholder="Masukan Username">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nama_petugas">Nama Petugas</label>
                    <input type="string" class="form-control" id="nama_petugas" name="nama_petugas" placeholder="Masukan Nama Petugas">
                </div>
                <div class="mb-3">
                    <label for="id_level" class="form-label">Level</label>
                    <select class="form-select" id="id_level" name="id_level" aria-label="Default select example" required>
                      <option name="id_level" value="1">Petugas</option>
                      <option name="id_level" value="2">Administrator</option>
                      <option name="id_level" value="3">Penumpang</option>
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
</div>


{{-- Modal Edit Sampai Sini --}}
@endsection