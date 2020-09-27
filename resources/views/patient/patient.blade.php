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
                    @if(Auth::user()->role_id==1)
                    <th>Doctor</th>  
                    @endif
                    <th>Name</th>
                    <th>Prakrati</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $d)
                  <tr>
                    @if(Auth::user()->role_id==1)
                    <td>{{ $d->doctor }}</d>  
                    @endif
                    <td>{{$d->name}}</td>
                    <td>{{Config::get('constants.PRAKRATI.'.$d->prakrati)}}</td>
                    <td>{{$d->phone}}</td>
                    <td>{{$d->email}}</td>
                    <td>{{$d->city}}</td>
                    <td>
                      <!-- <a class="btn btn-info btn-sm edit" data-id="{{$d->id}}" href="#"><i class="fas fa-pencil-alt"></i></a>-->
                      <a class="btn btn-danger btn-sm delete" href="{{ url('/delete_patient/'.$d->id) }}"><i class="fas fa-trash"></i></a>
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
                <!--<div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                </div>-->
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-4'>
                            <label for="name">Patient Name*</label>
                            <input type="text" id="name" name='name' class="form-control" required='required'>
                        </div>
                        <div class='col-md-4'>
                            <label for="agegroup">Age Group*</label>
                            <select class="form-control custom-select" id='agegroup' name='agegroup' required='required'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Infant (0 - 2 years)</option>
                                <option value='2'>Child (Above 2 – 14 years)</option>
                                <option value='3'>Adult (15 – 60 years)</option>
                                <option value='4'>Old (Above 60 years)</option>
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
                            <label for="age">Blood Group</label>
                            <select id="bloodgroup" name="bloodgroup" class="form-control custom-select" required='required'>
                                <option selected disabled>Select one</option>
                                <option value='1'>O +ve</option>
                                <option value='2'>O -ve</option>
                                <option value='3'>A +ve</option>
                                <option value='4'>A -ve</option>
                                <option value='5'>B +ve</option>
                                <option value='6'>B -ve</option>
                                <option value='7'>AB +ve</option>
                                <option value='8'>AB -ve</option>                                
                            </select>
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
                            <label>BMI Number:= <span id='result_bmi'></span></label>
                        </div>
                        <div class='col-md-6'>
                            <label>BMI Result:= <span id='result_text'></span></label>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <label for="weight">Weight(in Kg)</label>
                            <input type="number" id="weight" name="weight" onchange='calculateBmi()'  class="form-control" value='0'>
                        </div>
                        <div class='col-md-6'>
                            <label for="height">Height(in CM)</label>
                            <input type="number" id="height" name="height" onchange='calculateBmi()' class="form-control" value='0'>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                            <label for="address">Address</label>
                            <textarea id="address" name="address" class="form-control" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <div class='row'>
                        <div class='col-md-4'>
                            <label for="city">Ward No.</label>
                            <input type="number" id="wardno" name="wardno" class="form-control">
                        </div>
                        <div class='col-md-4'>
                            <label for="city">City*</label>
                            <input type="text" id="city" name="city" class="form-control" required='required'>
                        </div>
                        <div class='col-md-4'>
                            <label for="state">State</label>
                            <input type="text" id="state" name="state" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class='col-md-4'>
                            <label for="prakrati">Prakrati*</label>
                            <button type="button" onclick='get_questionair()' class="btn btn-primary btn-xs" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#myModal">Prakrati Parikshan</button>
                              <!-- The Modal -->
                                <div class="modal" id="myModal">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Prakrati Parikshan</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class='row'>
                                                    <div class='col-md-12' id="questionair">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-success">Next</button>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            <select class="form-control custom-select" id='prakrati' name='prakrati' required='required'>
                                <option selected disabled>Select one</option>
                                <option value='1'>Vaata</option>
                                <option value='2'>Pitta</option>
                                <option value='3'>Kapha</option>
                                <option value='4'>Vaata-Pittaja</option>
                                <option value='5'>Vaata-Kapha</option>
                                <option value='6'>Pitta-Kapha</option>
                                <option value='7'>Tridosha</option>
                            </select>
                        </div>
                    </div>
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
                        <label for="prescription">Prescription*</label>
                        <textarea id="prescription" name="prescription" class="form-control" rows="4" required='required'></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precautions">Precaution(s)</label>
                        <textarea id="precautions" name="precautions" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precautions">Suggestions</label>
                        <textarea id="suggestions" name="suggestions" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="precautions">Remarks</label>
                        <textarea id="remarks" name="remarks" class="form-control" rows="4"></textarea>
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
    function calculateBmi() {
    var weight = parseInt($('#weight').val());
    var height = parseInt($('#height').val());
    var result_bmi='';
    var result_text='';
        if(weight > 0 && height > 0){	
        var finalBmi = weight/(height/100*height/100)
        result_bmi = finalBmi
            if(finalBmi < 18.5){
                result_text = " You are too thin."
            }
            if(finalBmi > 18.5 && finalBmi < 25){
                result_text = " You are healthy."
            }
            if(finalBmi > 25){
                result_text = " You have overweight."
            }
        }
        else{
            //alert("Please Fill in everything correctly");
        }
        
        $('#result_bmi').html(result_bmi.toFixed(2));
        $('#result_text').html(result_text);
        
    }
    
    function get_questionair(){
        
        var gender = $("#gender").val();
        var agegroup = $("#agegroup").val();
        var token = $('input[name=_token]').val();
        var html = "";
        debugger;
        $.post("{{ url('/questionair')}}", {agegroup: agegroup,gender:gender,_token:token}, function(result,status){
            debugger;
            var res = JSON.parse(result);
            if(res.status==true){
                //console.log(res.data);
                var n=1;
                $.each(res.data,function(index,row){
                    html +="<label for='question'>Q" + n +". " + row.question_english + "</label>";    
                    $.each(row.answers,function(i,r){
                        html+="<label class='container'>" + r.answer_english + "<input type='radio' name='answer"+n+"'><span class='checkmark'></span></label>";          
                    });
                    n++;
                });
                console.log(html);
                $('#questionair').html(html);
              
            }
        });
        
        <!-- 
        
        -->
        
    }
 
    

//-->
</script>
@endsection

@section('style')
<style>
/* The container */
label.container{
    font-weight:normal !important;
    padding: 0px 0px 0px 40px;
    margin: 20px 0 20px 0;
}
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  /*font-size: 22px;*/
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #2196f3;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}

</style>
@endsection
@endif




