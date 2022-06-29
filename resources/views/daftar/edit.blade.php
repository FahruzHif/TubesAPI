<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ubah - Daftar Beasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Ubah</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('daftar.index') }}" enctype="multipart/form-data"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('daftar.update',$daftar->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Beasiswa:</strong>
                        <input type="text" name="nama_beasiswa" value="{{ $daftar->nama_beasiswa }}" class="form-control" placeholder="Masukkan Nama Beasiswa" autocomplete="off">
                        @error('nama_beasiswa')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jenis Beasiswa:</strong>
                        <input type="text" name="jenis_beasiswa" class="form-control" value="{{ $daftar->jenis_beasiswa }}" placeholder="Masukkan Jenis Beasiswa" autocomplete="off">
                        @error('jenis_beasiswa')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Siswa:</strong>
                        <input type="text" name="nama" value="{{ $daftar->nama }}" class="form-control" placeholder="Masukkan Nama Siswa" autocomplete="off">
                        @error('nama')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>NIS:</strong>
                        <input type="text" name="nis" value="{{ $daftar->nis }}" class="form-control" placeholder="Masukkan NIS" autocomplete="off">
                        @error('nis')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
