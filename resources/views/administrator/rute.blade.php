@extends('administrator.index')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Rute</h2>
        </div>
    </div>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rute">
        Tambah Rute
    </button>
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrap">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                        <td>No</td>
                        <td>Tujuan</td>
                        <td>Rute Awal</td>
                        <td>Rute Akhir</td>
                        <td>Jam Berangkat</td>
                        <td>Harga</td>
                        <td>Nama Transportasi</td>
                        <td>Opsi</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;?>
                        @foreach ($rute as $rute)
                            <tr>
                                <th>{{ $i }}</th>
                                <th>{{ $rute->tujuan }}</th>
                                <th>{{ $rute->rute_awal }}</th>
                                <th>{{ $rute->rute_akhir }}</th>
                                <th>{{ $rute->jamberangkat }}</th>
                                <th>{{ $rute->harga }}</th>
                                <th>{{ $rute->transportasi->keterangan }}</th>
                                <td>
                                <form class="d-inline" action="{{ route('rute.destroy', $rute->id_rute)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editrute{{$rute->id_rute}}"></button>
                                <button class="btn btn-danger"></button>
                                </form>
                                </td>
                                <?php $i++; ?>
                            </tr>
                            <!-- modal Edit Type -->
                            <div class="modal fade" id="editrute{{$rute->id_rute}}" tabindex="-1" aria-labelledby="editrute" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editrute">Edit Rute</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="modal-body">
                                            <form action="{{route('rute.update', $rute->id_rute)}}" method="POST">
                                                @csrf
                                                @method('PUT')   
                                                {{-- <div class="mb-3">
                                                    <label class="form-label" for="id_rute">ID Rute</label>
                                                    <input type="integer" class="form-control" id="id_rute" name="id_rute" value="{{$rute->id_rute}}" placeholder="Masukan ID Rute">
                                                </div> --}}
                                                <div class="mb-3">
                                                    <label class="form-label" for="tujuan">Tujuan</label>
                                                    <input type="string" class="form-control" id="tujuan" name="tujuan" value="{{$rute->tujuan}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="rute_awal">Rute Awal</label>
                                                    <input type="string" class="form-control" id="rute_awal" name="rute_awal" value="{{$rute->rute_awal}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="rute_akhir">Rute Akhir</label>
                                                    <input type="string" class="form-control" id="rute_akhir" name="rute_akhir" value="{{$rute->rute_akhir}}" >
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="jamberangkat">Jam Berangkat</label>
                                                    <input type="time" class="form-control" id="jamberangkat" name="jamberangkat" value="{{ $rute->jamberangkat }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="harga">Harga</label>
                                                    <input type="string" class="form-control" id="harga" name="harga" value="{{$rute->harga}}" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="id_transportasi" class="form-label">Nama Transportasi</label>
                                                    <select name="id_transportasi" id="id_transportasi" class="form-control">
                                                        @foreach ($transportasi as $item)
                                                            <option value="{{ $item->id_transportasi }}">{{ $item->keterangan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                   
                                                    <input type="submit" class="btn btn-warning" value="Simpan">
                                                    <input type="reset" class="btn btn-danger" value="Reset">
                                                </div>
                                            </form>
                                            </div>
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
        </div>
    </div>

</div>
<!-- Content End -->
<!-- modal type -->
<div class="modal fade" id="rute" tabindex="-1" aria-labelledby="rute" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" id="rute">Tambah Rute</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="modal-body">
                <form action="/rute" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="tujuan">Tujuan</label>
                        <input type="string" class="form-control" id="tujuan" name="tujuan" placeholder="Masukan Tujuan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="rute_awal">Rute Awal</label>
                        <input type="string" class="form-control" id="rute_awal" name="rute_awal" placeholder="Masukan Rute Awal">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="rute_akhir">Rute Akhir</label>
                        <input type="string" class="form-control" id="rute_akhir" name="rute_akhir" placeholder="Masukan Rute Akhir">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jamberangkat">Jam Berangkat</label>
                        <input type="time" class="form-control" id="jamberangkat" name="jamberangkat">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="harga">Harga</label>
                        <input type="string" class="form-control" id="harga" name="harga" placeholder="Masukan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="id_transportasi" class="form-label">Nama Transportasi</label>
                        <select name="id_transportasi" id="id_transportasi" class="form-control">
                            @foreach ($transportasi as $item)
                                <option value="{{ $item->id_transportasi }}">{{ $item->keterangan }}</option>
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
  </div>

@endsection