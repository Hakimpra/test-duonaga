@extends('app')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><a class="btn btn-info" href="{{ route('produk') }}"><i class="fa fa-arrow-circle-left fa-1x"> </i> back</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Form Produk</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
            <form method="POST" action="#" >
            <!-- <form method="POST" action="#" enctype="multipart"> -->
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control"value="{{ old('nama').@$produk->nama ?? '' }}" name="nama">
                @if ($errors->has('nama'))
                  <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Deskripsi</label>
                <input type="text" class="form-control"value="{{ old('deskripsi').@$produk->deskripsi ?? '' }}" name="deskripsi">
                @if ($errors->has('deskripsi'))
                  <span class="text-danger">{{ $errors->first('deskripsi') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Harga</label>
                <input type="number" class="form-control"value="{{ old('nama').@$produk->harga ?? '' }}" name="harga">
                @if ($errors->has('harga'))
                  <span class="number-danger">{{ $errors->first('harga') }}</span>
                @endif
            </div>
            <!-- <div class="form-group">
              
                <label for="exampleFormControlInput1">Gambar</label>
                <input type="file" accept="image/*" name="gambar">
            </div> -->
            <div class="form-group">
                <label for="exampleFormControlSelect1">Kategori</label>
                <select class="form-control" name="kategori" id="exampleFormControlSelect1" required>
                  <option value=""> - Pilih Kategori - </option>
                  @foreach($kategori as $kategoris)
                  @if($produk != '')
                   <option value="{{ $kategoris->id }}" {{ $produk->kategori_id == $kategoris->id ? 'selected' : '' }}>{{ $kategoris->nama }}</option>
                   @else
                   <option value="{{ $kategoris->id }}" {{ $produk->kategori_id ?? '' == $kategoris->id ? 'selected' : '' }}>{{ $kategoris->nama }}</option>
                @endif
              @endforeach  
              </select>
                @if ($errors->has('kategori'))
                  <span class="text-danger">{{ $errors->first('kategori') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info" style="margin-left: 10px;">Simpan</button>
            </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
