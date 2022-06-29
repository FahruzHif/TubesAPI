<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah - Daftar Beasiswa</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h3>Tambah</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('daftar.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <br>

        <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Beasiswa:</strong>
                        <select class="form-control mb-1" name="nama_beasiswa" id="nama_beasiswa">
                            <option disabled selected>Pilih Beasiswa</option>
                            @foreach($beasiswas as $beasiswa)
                                <option data-row="{{$beasiswa}}" value="{{$beasiswa->nama_beasiswa}}">{{$beasiswa->nama_beasiswa}}</option>
                            @endforeach
                        </select>
                        @error('nama_beasiswa')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jenis Beasiswa:</strong>
                        <input type="text" id="jenis_beasiswa" name="jenis_beasiswa" class="form-control" placeholder="Masukkan Jenis Beasiswa" autocomplete="off">
                        @error('jenis_beasiswa')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama Siswa:</strong>
                        <select class="custom-select" id="nama" name="nama">
                            <option disabled selected>Pilih Siswa</option>
                            @foreach ($siswa as $key => $ui)
                                <tr>
                                    <option
                                    data-row="{{$ui['nis']}}">
                                        {{$ui['nama']}}
                                    </option>
                                </tr>
                            @endforeach
                        </select>
                        @error('nama')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                  <div class="form-group">
                      <strong>NIS:</strong>
                      <input type="text" id="nis" name="nis" class="form-control" placeholder="Masukkan NIS" autocomplete="off">
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
<script>
    $(document).ready(function() {
        $(document).on('change', '#nama_beasiswa', function(){
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#jenis_beasiswa').val(res.jenis_beasiswa);
        });

        $(document).on('change', '#nama', function(){
            var res   =  $(this).find(':selected').data('row');
            console.log(res);
            $('#nis').val(res);
        });
    });
</script>
</html>
