@extends('master')

@section('title', '| Edit User')

@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="page-header"> Edit
                        <small>{{$user->name}}</small>
                    </h2>

                </div>
                <!-- /.col-lg-12 -->
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                    <div class="col-md-8 col-md-offset-2" style="padding-bottom:120px">                 
                        <div class="form-group">
                            <label>Avatar</label><br>
                            @if ($user->avatar == null )
                                <img id="img" class="avatar profile" src="{{ config('view.image_paths.images') . 'avatar-default-icon.png' }}" />
                            @else
                                <img id="img" class="avatar profile" src="{{ config('view.image_paths.images') . $user->avatar }}" />
                            @endif
                            {!! Form::file('avatar', ['id' => 'upload']) !!}
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="name" value="{{$user->name}}" />
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" name="first_name" value="{{$user->first_name}}" />
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" name="last_name" value="{{$user->last_name}}" />
                        </div>
                        <div class="form-group">
                            <label>Phone number</label>
                            <input class="form-control" name="phone_number" value="{{$user->phone_number}}"/>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" value="{{$user->address}}"/>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}"/>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="changePassword" id="changePassword">
                            <label>Change Password</label>
                            <input type="password" class="form-control password" name="password" placeholder="Password" disabled=""/>
                            @if($errors->has('password'))
                                <span style="color: red;"><i>{{$errors->first('password')}}</i></span>
                            @endif
                        </div> 
                        <div class="form-group">
                            <label>Confirm password</label>
                            <input type="password" class="form-control password" name="password_confirmation" placeholder="Confirm password" disabled="" />
                            @if($errors->has('password_confirmation'))
                                <span style="color: red;"><i>{{$errors->first('password_confirmation')}}</i></span>
                            @endif
                        </div> 
                        <div class="form-group">
                            <label>Level</label>
                            <label class="radio-inline">
                                <input name="role_id" value="1" 
                                    @if($user->role_id == 1)
                                        {{'checked'}}
                                    @endif  
                                type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="role_id" value="2"
                                    @if($user->role_id == 2)
                                        {{'checked'}}
                                    @endif  
                                type="radio">User
                            </label>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                            </div>
                            <div class="col-sm-6">      
                                <a href="{{route('users.show', $user->id)}}" class="btn btn-danger btn-block">Cancel</a>
                            </div>
                        </div><br>                       
                    </div>
                {!! Form::close() !!}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $('#changePassword').change(function(){
                if($(this).is(':checked')){
                    $('.password').removeAttr('disabled');
                }else{
                    $('.password').attr('disabled', '');
                }
            });
        });
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
                    $('#img').attr('src', avatar.avatar);
                }
            });
        });
    </script>
@stop
