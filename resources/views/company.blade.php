@extends('maintemplate')
@section('content')
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Company</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" id="list">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Companies List </h3>
                <!-- <button class="btn btn-sm btn-success" style="float:right;" id='add'><i class="fas fa-plus"></i> New</button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Company</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td>{{$d->company_name}}</td>
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
  </div>
  <!-- /.content-wrapper -->



  <script>
  $(function () {
    $("#example2").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "ordering": true,
     // "order": [[ 3, "desc" ]],
    });
  });

</script>
@endsection



