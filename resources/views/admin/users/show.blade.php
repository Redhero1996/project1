@extends('master')

@section('title', '| Imformation User')

@section('content')
    <div class="page-content">
        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-sm-10"><h1>{{ $user->username }}</h1></div>
            </div>
            @if(Session::has('success'))
                <div class="portlet-title">
                    <div class="alert alert-success">
                        {!! Session::get('success') !!}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-3"><!--left col-->
                    <div class="text-center">
                        @if ( $user->avatar !== null )
                            <img src="{{ asset('images/'.$user->avatar) }}" class="avatar img-circle img-thumbnail" alt="avatar">
                        @else
                            <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
                        @endif
                    </div></hr><br>
                </div><!--/col-3-->
                <div class="col-sm-9">
                    <!-- BEGIN FORM-->
                    <form class="form-horizontal" role="form">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">User Name:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">
                                                 {{ $user->username }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Address:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">
                                                @if ( $user->address !== null )
                                                    {{ $user->address }}
                                                @else
                                                    NULL
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">First Name:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">
                                                @if ( $user->first_name !== null )
                                                    {{ $user->first_name }}
                                                @else
                                                    NULL
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Email:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">
                                                {{ $user->email }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Last Name:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">
                                                @if ( $user->last_name !== null )
                                                    {{ $user->last_name }}
                                                @else
                                                    NULL
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Role:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">
                                                {{ $user->role->name}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Phone:</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">
                                                @if ( $user->phone_number !== null )
                                                    {{ $user->phone_number }}
                                                @else
                                                    NULL
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <!--/row-->
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn green">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="{{ route('users.index') }}" class="btn default">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div><!--/tab-content-->

            </div><!--/col-9-->
        </div><!--/row-->
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">

        // $(document).ready(function(){
        //     $('#reset').on('click', function(){
        //         $('#form').trigger("reset");
        //     });
        // });
        // Avatar
        $(function(){
          $('#upload').change(function(){
            $('#img').css('display', '');
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