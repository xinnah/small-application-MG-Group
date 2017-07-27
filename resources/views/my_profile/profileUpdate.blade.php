
@extends('layout.app')
    @section('content')
    <style type="text/css">
        .chosen-container {width: 736px !important;}
    </style>
    <!-- begin #content -->
    <div id="content" class="content">

        <!-- begin page-header -->
        <h1 class="page-header"></h1>
        <!-- end page-header -->
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a class="btn btn-info btn-xs" href="{{URL::to('/change-my-password')}}">Change Password</a>
                        </div>
                        <h4 class="panel-title">My Profil Page </h4>
                    </div>
                    <div class="panel-body">
                        {!! Form::open(array('route' => ['my-profile.update',$getMyProfile->id],'class'=>'form-horizontal author_form','method'=>'PUT','files'=>'true', 'id'=>'commentForm','role'=>'form','data-parsley-validate novalidate')) !!}
                            <div class="company_info_section">
                                <div class="form-group col-sm-12">
                                    <label class="control-label col-sm-3">Name * </label>
                                    <div class="col-sm-9">
                                        <input name="name" type="text" class="form-control" id="banner-image-select" required="required"  value="<?php echo $getMyProfile->name; ?>">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label col-sm-3">Email * </label>
                                    <div class="col-sm-9">
                                        <input name="email" type="email" class="form-control" required="required" id="banner-image-select" value="<?php echo $getMyProfile->email; ?>">
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label class="control-label col-sm-3">Phone Number * </label>
                                    <div class="col-sm-9">
                                        <input name="phone_number" type="text" class="form-control" required="required" id="banner-image-select" value="<?php echo $getMyProfile->phone_number; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <label class="col-sm-3 control-label">Gender* :</label>
                                  <div class="col-sm-9">
                                      
                                      {{ Form::select('gender', array('Male' => 'Male', 'Female' => 'Female', 'other' => 'Other'),  $getMyProfile->gender,['class'=> 'form-control','data-title'=> 'Single Select','data-style'=> 'btn-default btn-block','data-menu-style'=>'dropdown-blue']) }}
                                  </div>
                                </div>
                                
                            
                                
                                <div class="form-group col-md-12 {{ $errors->has('profile') ? 'has-error' : ''}} ">
                                    <label class="control-label col-sm-3">Profile * </label>
                                    <div class="col-md-5">
                                      <label class="slide_upload" for="file">
                                          <!--  -->
                                          <img id="image_load" src='{{asset("images/users/$getMyProfile->profile")}}'>
                                      </label>
                                      <input type="file" id="file" name="profile" onchange="readURL(this,this.id)" style="display:none">
                                       @if ($errors->has('profile'))
                                          <span class="help-block" style="display:block">
                                              <strong>{{ $errors->first('profile') }}</strong>
                                          </span>
                                        @endif
                                    </div>
                                </div>
                                <input type="hidden" name="password" value="{{$getMyProfile->password}}">
                                
                                <div class="form-group">
                                    <label class="control-label col-md-4 col-sm-4"></label>
                                    <div class="col-md-6 col-sm-6">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                            
                        {!! Form::close(); !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end #content -->
    
<script src="{{asset('public/plugins/jquery/jquery-1.9.1.min.js')}}"></script>  
<script type="text/javascript">

     /*end chosen select option */
        function readURL(input,image_load) {
          var target_image='#'+$('#'+image_load).prev().children().attr('id');

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $(target_image).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        

</script>      
<script type="text/javascript">
    $(document).ready(function() {
        App.init();
        DashboardV2.init();
        //
    });
</script>
@endsection
