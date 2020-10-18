<div style='font-size:12px;font-family:"Source Sans Pro",-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol"'>
<table width="100%" border="0" cellspacing="4" cellpadding="5">
  <tr>
    <td colspan="2">
        <h4>
            Arogya Kundli.
            <small style="float:right">Date: {{$data->created_at}}</small>
        </h4>
    </td>
  </tr>
  <tr>
    <td style='width:50%;color:#00f' >
        <b>Doctor</b>
          <address>
            <strong>{{strtoupper($data->doctorname)}}</strong><br>
            -<br>
            -<br>
            Phone: -<br>
            Email: {{$data->doctoremail}}
          </address>
    </td>
    <td style='width:50%;color:#00f'>
        <b>Patient</b>
          <address>
            <strong>{{strtoupper($data->name)}}</strong><br>
            {{$data->address}}<br>
            {{$data->city}}, {{$data->state}}<br>
            Phone: {{$data->phone}}<br>
            Email: {{$data->email}}
          </address>
    </td>
    <td style='width:0%'>
    <!--<b>Invoice #007612</b><br>-->
      <!--<br>-->
      <!--<b>Order ID:</b> 4F3S8J<br>-->
      <!--<b>Payment Due:</b> 2/22/2014<br>-->
      <!--<b>Account:</b> 968-34567-->
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <h4>Diagnose</h4>
        <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
            {{$data->diagnose}}
        </div>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <h4>Prescription</h4>
        <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
            {{$data->prescription}}
        </div>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <h4>Suggestions</h4>
        <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
            {{$data->suggestions}}
        </div>
    </td>
  </tr>
  <tr>
    <td colspan="3">
        <h4>Remarks</h4>
        <div style='width:100%;border:solid 1px #ddd;min-height:100px'>
            {{$data->precautions}}
        </div>
    </td>
  </tr>
</table>
</div>