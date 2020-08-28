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
                <button class="btn btn-sm btn-success" style="float:right;" id='add'><i class="fas fa-plus"></i> New</button>
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

        <div class="row" id="new" style="display:none;">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Create User</h3>
                <button class="btn btn-sm btn-success" style="float:right;" id='showlist'><i class="fas fa-plus"></i> List</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="/create_company" name="create_company" id="create_company" action="javascript:;" method="post">
                  {{ csrf_field() }}
                    <div class="form-group">
                      <label for="company_name">Name *</label>
                      <input type="text" id="company_name" name="company_name" class="form-control" value="" autocomplete="off" required="">
                    </div>

                    <div class="form-group">
                      <input type="submit" id="submit" class="btn btn-sm btn-success" value="Create">
                    </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div> <!-- add user -->

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


  $( "#add" ).click(function() {
    $('#list').slideUp(500);
    $('#new').slideDown(500);
  });
  // $(".edit").click(function() {
  //   $('#list').slideUp(500);
  //   $("#edit").slideDown(500);
  // });

  $("#showlist").click(function() {
    window.location.reload();
    $('#new').slideUp(500);
    $("#edit").slideUp(500);
    $('#list').slideDown(500);
  });

  /* attach a submit handler to the form */
$("#create_company").submit(function(event) {

  /* stop form from submitting normally */
  event.preventDefault();

  /* get the action attribute from the <form action=""> element */
  var $form = $(this),
    url = $form.attr('action');

  /* Send the data using post with element id name and name2*/
  var posting = $.post(url, {
    _token:$('input[name=_token]').val(),
    company_name: $('#company_name').val()
  });

  /* Alerts the results */
  posting.done(function(data) {
    $(document).Toasts('create', {
        autohide: true,
        class: 'bg-success', 
        title: 'User created',
        subtitle: 'Success',
        body: 'New Company Created Successfully.'
      });
    $('#create_company').trigger("reset");
  });
  posting.fail(function() {
    $('#result').text('failed');
  });
});

</script>
@endsection



