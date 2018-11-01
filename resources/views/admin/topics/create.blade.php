@extends('master')

@section('title', 'Create New Topic')

@section('content')
    <div class="card">
        <div class="tab-content">
            <div class="card-body">
                <h3 class="page-title">Create Topic</h3>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::open(['method' => 'POST', 'route' => 'topics.store', 'class' => 'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group last">
                                {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::text('name', null, ['class' => 'form-control input-circle', 'placeholder' => 'Enter name']) !!}
                                    @if($errors->has('name'))
                                        <span class="help-block" style="color: red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('category_id', 'Category', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::select('category_id', $categories->pluck('name', 'id'), null, ['class' => 'browser-default custom-select']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Status', ['class' => 'col-md-3 control-label']) !!}
                                <div class="custom-control custom-radio">
                                    {!! Form::radio('status', 1, true, ['class' => 'mr-2']) !!}Publish
                                    {!! Form::radio('status', 0, null, ['class' => 'ml-5 mr-2']) !!}Waitting
                                    {!! Form::radio('status', 2, null, ['class' => 'ml-5 mr-2']) !!}Edit
                                    {!! Form::radio('status', 3, null, ['class' => 'ml-5 mr-2']) !!}Close
                                </div>
                            </div>
                        </div>
                        <div class="form-actions pl-2">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                                    <a href="{{ route('topics.index') }}" class="btn btn-light">
                                        {{ __('translate.cancel') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
@endsection