@include('headsection');
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Active Cases</h1>
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
                    <th>User Name</th>
                    <th>1st Level Report</th>
                    <th>2nd Level Report</th>
                    <th>Datetime</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach($data as $d)
                  <tr>
                    <td>{{$d->name}}</td>
                    <td><a href='/rpt_1stdegree_endangered/{{$d->id}}' target="_blank">Click here</a></td>
                    <td><a href='/rpt_2nddegree_endangered/{{$d->id}}' target="_blank">Click here</a></td>
                    <td>{{date('d-M-Y',strtotime($d->infected_reportedon))}}</td>
                  </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <!-- <tr>
                    <th>User Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Datetime</th>
                  </tr> -->
                  </tfoot>
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
  @include('footersection');