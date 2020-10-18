@extends('maintemplate')


@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="background: #17a2b8;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6" style="color:#ffffff;">
            <h1>{{ strtoupper('Doctor Profile') }}</h1>
          </div>
          <!--<div class="col-sm-6">-->
          <!--  <ol class="breadcrumb float-sm-right">-->
          <!--    <li class="breadcrumb-item"><a href="#">Home</a></li>-->
          <!--    <li class="breadcrumb-item active">User Profile</li>-->
          <!--  </ol>-->
          <!--</div>-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-dark card-outline">
              <div class="card-body box-profile" style="background:#343a40;color:#ffffff;">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ url('/dist/img/santoshpatel.jpg') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">Dr. {{ ucwords($data->name) }}</h3>

                <p class="text-muted text-center">Doctor</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item" style="background:transparent;">
                    <b>Patient Today</b> <a class="float-right">1,322</a>
                  </li>
                  <li class="list-group-item" style="background:transparent;">
                    <b>Pending</b> <a class="float-right">543</a>
                  </li>
                  <li class="list-group-item" style="background:transparent;">
                    <b>Total Patient </b> <a class="float-right">13,287</a>
                  </li>
                </ul>

                <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary" style='display:none;'>
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <!--<li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a></li>-->
                  <!--<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>-->
                  <li class="nav-item"><a class="nav-link active" href="#personal" data-toggle="tab">Personal Details</a></li>
                  <li class="nav-item"><a class="nav-link" href="#clinic" data-toggle="tab">Clinic Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ url('/dist/img/user1-128x128.jpg') }}" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
                        <a href="#" class="link-black text-sm"><i class="far fa-thumbs-up mr-1"></i> Like</a>
                        <span class="float-right">
                          <a href="#" class="link-black text-sm">
                            <i class="far fa-comments mr-1"></i> Comments (5)
                          </a>
                        </span>
                      </p>

                      <input class="form-control form-control-sm" type="text" placeholder="Type a comment">
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{ url('/dist/img/user7-128x128.jpg') }}" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.
                      </p>

                      <form class="form-horizontal">
                        <div class="input-group input-group-sm mb-0">
                          <input class="form-control form-control-sm" placeholder="Response">
                          <div class="input-group-append">
                            <button type="submit" class="btn btn-danger">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                            <img src="http://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="active tab-pane" id="personal">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-4">
                          <input type="text"  class="form-control" id="name" name="name" placeholder="Name" value='{{ $data->name }}'>
                        </div>
                        <label for="Gender" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-4">
                          <input type="radio" class="" id="gender" name="gender" value='M'> Male
                          <input type="radio" class="" id="gender" name="gender" value='M'> Female
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="aadharno" class="col-sm-2 col-form-label">Aadhar No.</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="aadharno" name="aadharno" placeholder="Aadhar Number" value=''>
                        </div>
                        <label for="dob" class="col-sm-2 col-form-label">DOB</label>
                        <div class="col-sm-4">
                          <input type="date" class="form-control" id="dob" name="dob" placeholder="dob" value=''>
                        </div>
                        </div>
                      <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" id="mobile" name="mobile" placeholder="mobile" value='' onfocus='this.blur();'>
                        </div>
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" value='{{ $data->email }}' onfocus='this.blur();'>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="state" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="state" name="state" placeholder="State" value=''>
                        </div>
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value='{{ $data->city_name }}'>
                        </div>
                        </div>
                        
                        <div class="form-group row">
                        <label for="RegNo" class="col-sm-2 col-form-label">Registration No.</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="RegNo" name="RegNo" placeholder="Registration No">
                        </div>
                      </div>
                        
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="degree" class="col-sm-2 col-form-label">Degree</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="degree" name="degree" placeholder="Degree">
                        </div>
                      </div>
                      <!--<div class="form-group row">-->
                      <!--  <div class="offset-sm-2 col-sm-10">-->
                      <!--    <div class="checkbox">-->
                      <!--      <label>-->
                      <!--        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>-->
                      <!--      </label>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="clinic">
                    <form class="form-horizontal">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-4">
                          <input type="text"  class="form-control" id="name" name="name" placeholder="Clinic Name" value=''>
                        </div>
                        <label for="Gender" class="col-sm-2 col-form-label">No. of Staff</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" id="noofstaff" name="noofstaff" value='1'>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="clinictype" class="col-sm-2 col-form-label">Clinic Type</label>
                        <div class="col-sm-4">
                          <select name="clinictype" id="clinictype" class="form-control">
                              <option value="self">Self</option>
                              <option value="ak">Arogya Kundli</option>
                          </select>
                        </div>
                        <label for="noofbeds" class="col-sm-2 col-form-label">No. of Beds</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" id="noofbeds" name="noofbeds" placeholder="no. of beds" value=''>
                        </div>
                        </div>
                      <div class="form-group row">
                        <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control" id="mobile" name="mobile" placeholder="mobile" value='' >
                        </div>
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-4">
                          <input type="email" class="form-control" id="inputEmail" placeholder="Email" value=''>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="state" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="state" name="state" placeholder="State" value=''>
                        </div>
                        <label for="city" class="col-sm-2 col-form-label">City</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" value=''>
                        </div>
                        </div>
                      <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="address" name="address" placeholder="address"></textarea>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="wardno" class="col-sm-2 col-form-label">Ward No.</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="wardno" name="wardno" placeholder="ward no.">
                        </div>
                        <label for="Pincode" class="col-sm-2 col-form-label">Pincode</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" id="Pincode" name="Pincode" placeholder="Pincode">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="landmark" class="col-sm-2 col-form-label">Landmark</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="landmark" name="landmark" placeholder="landmark">
                        </div>
                      </div>
                      <!--<div class="form-group row">-->
                      <!--  <div class="offset-sm-2 col-sm-10">-->
                      <!--    <div class="checkbox">-->
                      <!--      <label>-->
                      <!--        <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>-->
                      <!--      </label>-->
                      <!--    </div>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<style>
    .nav-pills .nav-link.active{
        background:#c82333;
    }
</style>
@endsection



