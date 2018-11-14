@extends('master')

@section('title', '| Create New User')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="page-header">User
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-md-8 col-md-offset-2" style="padding-bottom:120px">                   
                    <!-- FORM-->
                    {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'files' => true]) !!}
                        <div class="form-group">
                            {!! Form::label('avatar', __('translate.avatar')) !!}<br>
                            <img src="" id="img" class="image-avatar">
                            {!! Form::file('avatar', ['id' => 'upload']) !!}
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="name" placeholder="Username" value="{{old('name')}}" />
                             @if($errors->has('name'))
                                <span style="color: red;"><i>{{$errors->first('name')}}</i></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" name="first_name" placeholder="First Name" value="{{old('first_name')}}" />
                             @if($errors->has('first_name'))
                                <span style="color: red;"><i>{{$errors->first('first_name')}}</i></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" name="last_name" placeholder="Last Name" value="{{old('last_name')}}" />
                             @if($errors->has('last_name'))
                                <span style="color: red;"><i>{{$errors->first('last_name')}}</i></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input class="form-control" name="phone_number" placeholder="Phone Number" value="{{old('phone_number')}}" />
                             @if($errors->has('phone_number'))
                                <span style="color: red;"><i>{{$errors->first('phone_number')}}</i></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" placeholder="Address" value="{{old('address')}}" />
                             @if($errors->has('address'))
                                <span style="color: red;"><i>{{$errors->first('address')}}</i></span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}" />
                            @if($errors->has('email'))
                                <span style="color: red;"><i>{{$errors->first('email')}}</i></span>
                            @endif
                        </div>
                       <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                            @if($errors->has('password'))
                                <span style="color: red;"><i>{{$errors->first('password')}}</i></span>
                            @endif
                        </div> 
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password" />
                            @if($errors->has('password_confirmation'))
                                <span style="color: red;"><i>{{$errors->first('password_confirmation')}}</i></span>
                            @endif
                        </div> 
                        <div class="form-group">
                            <label>Level</label>
                            <label class="radio-inline">
                                <input name="role_id" value="1" type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="role_id" value="2" checked="" type="radio">User
                            </label>
                        </div>
                       <div class="row">                                
                            <div class="col-sm-6">
                                <input type="submit" value="Create user" class="btn btn-success btn-block">
                            </div>

                            <div class="col-sm-6">
                                <input type="reset" value="Reset" class="btn btn-default btn-block" id="reset">
                            </div>
                        </div>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        // Avatar
        $(document).ready(function () {
            $('#upload').change( function () {
                $('#img').show();
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
                {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                       $('#img').attr('src', e.target.result);
                       $('#img').css({"width" : "200px", "height" : "200px"});

                    }
                   reader.readAsDataURL(input.files[0]);
                }
                else
                {
                  $('#img').attr('src', $(this).attr('src'));
                }
            });
        });
    </script>
@stop