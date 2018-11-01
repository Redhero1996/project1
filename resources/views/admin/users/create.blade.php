@extends('master')

@section('title', '| Create New User')

@section('content')
    <div class="page-content">
        <div class="portlet light bordered form-fit">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject font-green-haze bold uppercase">Add User</span>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                {!! Form::open([ 'route' => 'users.store', 'method' => 'POST', 'class' => 'form-horizontal form-row-seperated', 'files' => true ]) !!}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Avatar</label>
                            <img src="" id="img" class="avatar img-circle" style="display: none">
                            <span class="btn green fileinput-button">
                                <i class="fa fa-plus"></i>
                                <span>Add avatar</span>
                                {!! Form::file('avatar', ['id' => 'upload']) !!}
                            </span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Usename
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']) !!}
                                @if($errors->has('username'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('first_name', 'First Name', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-9">
                                {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                                @if($errors->has('first_name'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', 'Last Name', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-9">
                                {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                                @if($errors->has('last_name'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone_number', 'Phone Number', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-9">
                                {!! Form::text('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Phone Number']) !!}
                                @if($errors->has('phone_number'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('address', 'Address', ['class' => 'control-label col-md-3']) !!}
                            <div class="col-md-9">
                                {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Address']) !!}
                                @if($errors->has('address'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                @if($errors->has('email'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                                @if($errors->has('password'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Confirm Password
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Role
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <div class="radio-list">
                                    @foreach ( $roles as $role )
                                        <label>
                                            {!! Form::radio('role_id', $role->id) !!} {{ $role->name }}
                                        </label>
                                    @endforeach
                                </div>
                                @if($errors->has('role'))
                                    <span class="help-block" style="color: red;">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                {!! Form::button('<i class="fa fa-save"></i>', ['type' => 'submit', 'class' => 'btn blue', ]) !!}
                                <a href="{{ route('users.index') }}" class="btn default">Cancel</a>
                            </div>
                        </div>
                    </div>
                {!! Form::close() !!}
                <!-- END FORM-->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- {!! Html::script('js/jquery-3.3.1.min.js') !!}                  --}}
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