@extends('app')
@section('content')
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><a class="breadcrumb-item" href="{{ route('grade') }}">Grade</h1>
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
          @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong style="color: #ffffff;">{{ $message }}</strong>
              </div>
            @endif

            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong style="color: #ffffff;">{{ $message }}</strong>
              </div>
            @endif

            @if ($message = Session::get('warning'))
              <div class="alert alert-warning alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>	
              <strong style="color: #ffffff;">{{ $message }}</strong>
            </div>
            @endif
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><a class="btn btn-info" href="{{ route('grade.add') }}"><i class="fa fa-plus fa-1x"> </i> Grade</a></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
              <table class="table">
                  <thead>
                      <tr>
                          <th>NIP</th>
                          <th>NAMA</th>
                          <th>GAJI</th>
                          <th>ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach($grades as $p)
                      <tr>
                          <td>{{ $p->id }}</td>
                          <td>{{ $p->grade }}</td>
                          <td>{{ $p->gaji }}</td>
                        <td>
                          <a href="{{ route('grade.del', ['id' => $p->id]) }}">hapus</i></a>
                          |
                          <a href="{{ route('grade.edit', ['id' => $p->id]) }}">edit</i></a>
                        </td>
                      
                      </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>

@endsection
