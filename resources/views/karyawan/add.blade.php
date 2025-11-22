@extends('app')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><a class="btn btn-info" href="{{ route('karyawan') }}"><i class="fa fa-arrow-circle-left fa-1x"> </i> back</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
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
                <h3 class="card-title">Form Karyawan</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
            <form method="POST" action="#" >
            @csrf
            <div class="form-group">
                <label for="exampleFormControlInput1">NIP</label>
                <input type="text" class="form-control"value="{{ $nip->invoice }}" name="nip" readonly>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama</label>
                <input type="text" class="form-control"value="{{ old('nama').@$karyawan->nama ?? '' }}" name="nama">
                @if ($errors->has('nama'))
                  <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Tgl Lahir</label>
                <input type="date" class="js-date-input form-control"value="{{ old('tgllahir').@$karyawan->tgllahir ?? '' }}" name="tgllahir">
                @if ($errors->has('tgllahir'))
                  <span class="text-danger">{{ $errors->first('tgllahir') }}</span>
                @endif
            </div> 
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Tgl Masuk</label>
                <input type="date" class="form-control"value="{{ old('tglmasuk').@$karyawan->tglmasuk ?? '' }}" name="tglmasuk">
                @if ($errors->has('tglmasuk'))
                  <span class="text-danger">{{ $errors->first('tglmasuk') }}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlInput1">Gander</label>
                <div class="form-check">
                <input type="radio" name="gander" value="M" id="gander"   @isset($karyawan->gander) {{$karyawan->gander == 'M'? 'checked' : ''}} @endisset>
                <label class="form-check-label" for="exampleRadios1">
                  MALE
                </label>
              </div>
              <div class="form-check">
                <input type="radio" name="gander" value="F" id="gander" @isset($karyawan->gander) {{$karyawan->gander == 'F'? 'checked' : ''}} @endisset>
                <label class="form-check-label" for="exampleRadios2">
                  FAMALE
                </label>
                @if ($errors->has('gander'))
                <span class="text-danger">{{ $errors->first('gander') }}</span>
                @endif
              </div>    
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlSelect1">Grade</label>
                <select class="form-control" name="grade" id="exampleFormControlSelect1" required>
                  <option value=""> - Pilih Grade - </option>
                  @foreach($grade as $grades)
                  @if($karyawan != '')
                   <option value="{{ $grades->id }}" {{ $karyawan->grade_id == $grades->id ? 'selected' : '' }}>{{ $grades->grade }}</option>
                   @else
                   <option value="{{ $grades->id }}" {{ $karyawan->grade_id ?? '' == $grades->id ? 'selected' : '' }}>{{ $grades->grade }}</option>
                @endif
              @endforeach  
              </select>
                @if ($errors->has('grade'))
                  <span class="text-danger">{{ $errors->first('grade') }}</span>
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
