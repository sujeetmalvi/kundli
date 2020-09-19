@extends('maintemplate')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Patient`s</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if($view=='list')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Patient List </h3>
                <a href="{{ url('/new_patient') }}" class="btn btn-sm btn-success" style="float:right;color:#fff;" id='add'><i class="fas fa-plus"></i> New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td>{{$d->name}}</td>
                    <td>{{$d->phone}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->city}}</td>
                    <td>
                      <!-- <a class="btn btn-info btn-sm edit" data-id="{{$d->id}}" href="#"><i class="fas fa-pencil-alt"></i></a>
                      <a class="btn btn-danger btn-sm delete" data-id="{{$d->id}}" href=""><i class="fas fa-trash"></i></a> -->
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div> <!-- list row -->
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    @endif

    @if($view=='new')
    @if(isset($message))
        {{ $message }}
    @endif
    <!-- Main content  form-->
    <section class="content">
        <form action="{{ url('/save_patient') }}" method='post' />
        {{ csrf_field() }}
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General Info</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-6'>
                            <label for="name">Patient Name*</label>
                            <input type="text" id="name" name='name' class="form-control" required='required'>
                        </div>
                        <div class='col-md-6'>
                            <label for="gender">Prakrati*</label>
                            <select class="form-control custom-select" id='prakrati' name='prakrati' required='required'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaat</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kafa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-6'>
                            <label for="gender">Gender*</label>
                            <select class="form-control custom-select" id='gender' name='gender' required='required'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Male</option>
                                <option value='2'>Female</option>
                                <option value='3'>Other</option>
                            </select>
                        </div>
                        <div class='col-md-6'>
                            <label for="age">Age*</label>
                            <input type="number" id="age" name="age" class="form-control" required='required'>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-6'>
                            <label for="phone">Phone*</label>
                            <input type="number" id="phone" name="phone" class="form-control" required='required'>
                        </div>
                        <div class='col-md-6'>
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-6'>
                            <label for="weight">Weight</label>
                            <input type="number" id="weight" name="weight"  class="form-control">
                        </div>
                        <div class='col-md-6'>
                            <label for="height">Height</label>
                            <input type="number" id="height" name="height" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" class="form-control">
                </div>
                <div class="form-group">
                    <label for="city">City*</label>
                    <input type="text" id="city" name="city" class="form-control" required='required'>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
            <div class="card card-secondary">
                <div class="card-header">
                  <h3 class="card-title">Prescription</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="diagnose">Diagnose</label>
                        <textarea id="diagnose" name="diagnose" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="prescription">Prescription</label>
                        <textarea id="prescription" name="prescription" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precautions">Precaution(s)</label>
                        <textarea id="precautions" name="precautions" class="form-control" rows="4"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="#" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Save & next" class="btn btn-success float-right">
            </div>
        </div>
      </form>
    </section>
    <!-- /.content -->
    @endif


  </div>
  <!-- /.content-wrapper -->
@endsection



