<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <div class="container py-5">
        <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Register</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="username" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="nama_penumpang" class="form-label">Nama</label>
                <input type="string" name="nama_penumpang" class="form-control">
            </div>
            <div class="mb-3">
                <label for="alamat_penumpang" class="form-label">Alamat</label>
                <input type="text" name="alamat_penumpang" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="#"></option>
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="telfon" class="form-label">Telfon</label>
                <input type="number" class="form-control" id="telfon" name="telfon">
            </div>
           
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-outline-primary">Register</button>
            </div>
            <div class="mt-5 text-muted text-center">
                have an account? <a href="/">Login Now</a>
              </div>
        </form>
    </div> 
    </div>
</body>
</html>