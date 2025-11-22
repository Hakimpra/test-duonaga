@extends('app')
@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><a class="btn btn-info" href="{{ route('grade') }}"><i class="fa fa-arrow-circle-left fa-1x"> </i> back</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Grade</a></li>
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
                <h3 class="card-title">Form Grade</h3>

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
                <label for="exampleFormControlInput1">Nama Grade</label>
                <input type="text" class="form-control"value="{{ old('grade').@$grade->grade ?? '' }}" name="grade">
                @if ($errors->has('grade'))
                  <span class="text-danger">{{ $errors->first('grade') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Gaji</label>
                <input type="text" class="form-control"value="{{ old('gaji').@$grade->gaji ?? '' }}" name="gaji">
                @if ($errors->has('gaji'))
                  <span class="text-danger">{{ $errors->first('gaji') }}</span>
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
