@extends('maintemplate')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Prescription</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Prescription</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!--<div class="callout callout-info">-->
            <!--  <h5><i class="fas fa-info"></i> Note:</h5>-->
            <!--  This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.-->
            <!--</div>-->


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Arogya Kundli.
                    <small class="float-right">Date: {{$data->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <b>Doctor</b>
                  <address>
                    <strong>{{strtoupper($data->doctorname)}}</strong><br>
                    -<br>
                    -<br>
                    Phone: -<br>
                    Email: {{$data->doctoremail}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Patient</b>
                  <address>
                    <strong>{{strtoupper($data->name)}}</strong><br>
                    {{$data->address}}<br>
                    {{$data->city}}, {{$data->state}}<br>
                    Phone: {{$data->phone}}<br>
                    Email: {{$data->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <!--<b>Invoice #007612</b><br>-->
                  <!--<br>-->
                  <!--<b>Order ID:</b> 4F3S8J<br>-->
                  <!--<b>Payment Due:</b> 2/22/2014<br>-->
                  <!--<b>Account:</b> 968-34567-->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12">
                    <h4>Diagnose</h4>
                    <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
                        {{$data->diagnose}}
                    </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-12">
                    <h4>Prescription</h4>
                    <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
                        {{$data->prescription}}
                    </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-12">
                    <h4>Suggestions</h4>
                    <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
                        {{$data->suggestions}}
                    </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <!-- Table row -->
              <div class="row">
                <div class="col-12">
                    <h4>Remarks</h4>
                    <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
                        {{$data->precautions}}
                    </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              
              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <!--<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>-->
                  <!--<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit-->
                  <!--  Payment-->
                  <!--</button>-->
                  <a type="button" class="btn btn-primary float-right" style="margin-right: 5px;" href="{{url('/pdf_prescription/'.$data->id)}}">
                    <i class="fas fa-download"></i> Generate PDF
                  </a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('javascript')
@endsection

@section('style')
@endsection

