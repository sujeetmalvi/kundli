@extends('maintemplate')
@section('content')

  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>1st Degree Endangered</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- <div class="card-header">
                <h3 class="card-title">User Locations</h3>
              </div> -->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Near By Person</th>
                    <th>Distance(in Meter)</th>
                    <th>Datetime</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{$d->user2name}}</td>
                    <td>{{$d->distance}}</td>
                    <td>{{$d->created_at}}</td>
                  </tr>
                @endforeach
                  </tbody>
                  <!--<tfoot>
                  <tr>
                    <th>User Name</th>
                    <th>Near By Person</th>
                    <th>Distance(in Meter)</th>
                    <th>Datetime</th>
                  </tr>
                  </tfoot>-->
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
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
      "order": [[ 2, "desc" ]],
    });
  });
</script>
@endsection
