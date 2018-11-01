@extends('master')

@section('title', 'Edit Topic')

@section('content')
    <div class="card">
        <div class="tab-content">
            <div class="card-body">
                <h3 class="page-title">Edit Topic</h3>
                <div class="portlet-body form">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <!-- BEGIN FORM-->
                    {!! Form::model($topic, ['method' => 'PUT', 'route' => ['topics.update', $topic->id], 'class' => 'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group last">
                                {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::text('name', $topic->name, ['class' => 'form-control input-circle', 'placeholder' => 'Enter name']) !!}
                                    {{-- @if($errors->has('name'))
                                        <span class="help-block" style="color: red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif --}}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('category_id', 'Category', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::select('category_id', $categories->pluck('name', 'id'), $topic->category_id, ['class' => 'browser-default custom-select']) !!}
                                </div>
                            </div>
                            <div class="form-body question-form">
                                @foreach ($questions as $k => $question)
                                    <div class="form-group">
                                        <label for="question" class="col-md-3 control-label question">{!! __('translate.question'). ' ' . $k+=1 !!}</label>
                                        <div class="col-md-12">
                                            {!! Form::textarea("content[$question->id]", $question->content, ['class' => 'editor']) !!}
{{--                                             @if($errors->has('content'))
                                                <span class="help-block" style="color: red;">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif --}}
                                        </div>
                                    </div>
                                    @foreach ($question->answers as $key => $answer)
                                        <div class="form-group ml-4">
                                            {!! Form::checkbox("correct_ans[$question->id][]", $answer->id, in_array($answer->id, $question->correct_ans) ?? true) !!}
                                            <label>{{ __('translate.answer'). ' ' .$alphabet[$key] }}</label>
                                            {!! Form::text("answer[$question->id][]", $answer->content, ['class' => 'form-control']) !!}
                                            {{-- @if($errors->has('correct_ans'))
                                                <span class="help-block" style="color: red;">
                                                    <strong>{{ $errors->first('correct_ans') }}</strong>
                                                </span>
                                            @endif --}}
                                        </div>
                                    @endforeach
                                <div class="form-group ml-3">
                                    <label for="explain"><i>{{ __('translate.explain') }}:</i> </label>
                                    <div class="col-md-12">
                                        {!! Form::textarea("explain[$question->id][]", $question->explain, ['class' => 'editor']) !!}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                {!! Form::label('status', 'Status', ['class' => 'col-md-3 control-label']) !!}
                                <div class="custom-control custom-radio">
                                    {!! Form::radio('status', 1, $topic->status == 1 ? true : null, ['class' => 'mr-2']) !!}Publish
                                    {!! Form::radio('status', 0, $topic->status == 0 ? true : null, ['class' => 'ml-5 mr-2']) !!}Waitting
                                    {!! Form::radio('status', 2, $topic->status == 2 ? true : null, ['class' => 'ml-5 mr-2']) !!}Edit
                                    {!! Form::radio('status', 3, $topic->status == 3 ? true : null, ['class' => 'ml-5 mr-2']) !!}Close
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