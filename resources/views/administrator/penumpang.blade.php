@extends('administrator.index')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">Penumpang</h2>
        </div>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-wrap">
                    <table class="table">
                      <thead class="thead-dark">
                        <tr>
                          <td>No</td>
                          <td>Username</td>
                          <td>Nama Penumpang</td>
                          <td>Alamat Penumpang</td>
                          <td>Tanggal Lahir</td>
                          <td>Jenis Kelamin</td>
                          <td>Telfon</td>
                          <td>Opsi</td>
                        </tr>
                      </thead>
                        <tbody>
                            <?php $i = 1;?>
                            @foreach ($datapenumpang as $p)
                            <tr>
                                <th>{{ $i }}</th>
                                <th>{{ $p->username }}</th>
                                <th>{{ $p->nama_penumpang }}</th>
                                <th>{{ $p->alamat_penumpang }}</th>
                                <th>{{ $p->tanggal_lahir }}</th>
                                <th>{{ $p->jenis_kelamin }}</th>
                                <th>{{ $p->telfon }}</th>
                                <td>
                                    {{-- <button type="button"  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editpenumpang{{ $p->id_penumpang }}"><i class="bi bi-pencil-fill"></i></button> --}}
                                    <form class="d-inline" action="{{ 'penumpang/' .$p->id_penumpang }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                </form>
                                </td>
                                <?php $i++; ?>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
</div>

@endsection