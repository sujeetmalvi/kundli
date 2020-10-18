@extends('maintemplate')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Questions`s</h1>
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
                <h3 class="card-title">Questions List </h3>
                <a href="{{ url('/new_questionans') }}" class="btn btn-sm btn-success" style="float:right;color:#fff;" id='add'><i class="fas fa-plus"></i> New</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Question</th>
                    <!--<th>Prakrati</th>-->
                    <!--<th>Phone</th>-->
                    <!--<th>Email</th>-->
                    <!--<th>City</th>-->
                    <!--<th>Action</th>-->
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                  <tr>
                    <td>{{$d->question_english}}</td>
                    <!--<td>-->
                    <!--  <a class="btn btn-warning btn-sm" href="{{ url('/view_patient/'.$d->id) }}"><i class="fas fa-eye"></i></a>    -->
                      <!-- <a class="btn btn-info btn-sm edit" data-id="{{$d->id}}" href="#"><i class="fas fa-pencil-alt"></i></a>-->
                    <!--  <a class="btn btn-danger btn-sm delete" href="{{ url('/delete_patient/'.$d->id) }}"><i class="fas fa-trash"></i></a>-->
                    <!--</td>-->
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
        <form action="{{ url('/save_questionans') }}" method='post' />
        {{ csrf_field() }}
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Questions</h3>
                <a href="{{ url('/questionans_list') }}" class="btn btn-sm btn-success" style="float:right;color:#fff;" id='add'><i class="fas fa-plus"></i>List</a>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-4'>
                            <label for="agegroup">Category*</label>
                            <select class="form-control custom-select" id='category_id' multiple='multiple' name='category_id[]' required='required'>
                                <!--<option selected disabled>Select one</option>-->
                                <option value='1' selected>Infant (0 - 2 years)</option>
                                <option value='2' selected>Child (Above 2 – 14 years)</option>
                                <option value='3' selected>Adult (15 – 60 years)</option>
                                <option value='4' selected>Old (Above 60 years)</option>
                            </select>
                        </div>
                        <div class='col-md-4'>
                            <label for="gender">Group*</label>
                            <select class="form-control custom-select" id='group_id' name='group_id' required='required'>
                                <!--<option selected disabled>Select one</option>-->
                                <option value='1' selected>Anatomy</option>
                                <option value='2'>Physiology</option>
                                <option value='3'>Psychology</option>
                            </select>
                        </div>
                        <div class='col-md-4'>
                            <label for="gender">Gender*</label>
                            <select class="form-control custom-select" id='gender_id' name='gender_id[]'  multiple='multiple'  required='required'>
                                <!--<option selected disabled>Select one</option>-->
                                <option value='1' selected>Male</option>
                                <option value='2' selected>Female</option>
                                <option value='3'>Other</option>
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label for="name">Question English*</label>
                            <input type="text" id="question_english" name='question_english' class="form-control" required='required' placeholder='English'>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            <label for="name">Question Hindi*</label>
                            <input type="text" id="question_hindi" name='question_hindi' class="form-control"  placeholder='Hindi'>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-8'>
                            <label for="phone">Answer*</label>
                            <input type="text" name="answer[]" class="form-control">
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Prakrati*</label>
                            <select class="form-control custom-select" id='prakrati' name='prakrati[]'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaat</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kapha</option>
                            </select>
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Weight*</label>
                            <input type="text" name="weightage[]" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <label for="phone">Answer*</label>
                            <input type="text" name="answer[]" class="form-control">
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Prakrati*</label>
                            <select class="form-control custom-select" id='prakrati' name='prakrati[]'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaat</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kapha</option>
                            </select>
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Weight*</label>
                            <input type="text" name="weightage[]" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <label for="phone">Answer*</label>
                            <input type="text" name="answer[]" class="form-control">
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Prakrati*</label>
                            <select class="form-control custom-select" id='prakrati' name='prakrati[]'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaat</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kapha</option>
                            </select>
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Weight*</label>
                            <input type="text" name="weightage[]" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <label for="phone">Answer*</label>
                            <input type="text" name="answer[]" class="form-control">
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Prakrati*</label>
                            <select class="form-control custom-select" id='prakrati' name='prakrati[]' >
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaat</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kapha</option>
                            </select>
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Weight*</label>
                            <input type="text" name="weightage[]" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <label for="phone">Answer*</label>
                            <input type="text" name="answer[]" class="form-control">
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Prakrati*</label>
                            <select class="form-control custom-select" id='prakrati' name='prakrati[]' >
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaat</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kapha</option>
                            </select>
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Weight*</label>
                            <input type="text" name="weightage[]" class="form-control">
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <label for="phone">Answer*</label>
                            <input type="text" name="answer[]" class="form-control">
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Prakrati*</label>
                            <select class="form-control custom-select" id='prakrati' name='prakrati[]'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaat</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kapha</option>
                            </select>
                        </div>
                        <div class='col-md-2'>
                            <label for="phone">Weight*</label>
                            <input type="text" name="weightage[]" class="form-control">
                        </div>
                    </div>
                    
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


@if($view=='list')
@section('javascript')
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
@endif


@if($view=='new')  
@section('javascript')
  <script language="JavaScript">
    <!--
//-->
</script>
@endsection

@section('style')
@endsection
@endif




