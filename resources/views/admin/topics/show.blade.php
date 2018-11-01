@extends('master')

@section('title', 'Detail Topic')

@section('content')
    <div class="card">
        <div class="tab-content">
            <div class="card-body">
                <h3 class="page-title">Detail Topic</h3>
                <div class="portlet-body">
                    <div class="form-body">
                        <div class="form-group last">
                            {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-12">
                                {!! Form::text('name', $topic->name, ['class' => 'form-control input-circle', 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category', ['class' => 'col-md-3 control-label']) !!}
                            <div class="col-md-12">
                                {!! Form::text('category_id', $topic->category->name, ['class' => 'form-control input-circle', 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                        <div class="form-body question-form">
                            @foreach ($questions as $k => $question)
                                <div class="form-group">
                                    <label for="question" class="ml-3 question">{!! trans('translate.question'). ' ' . $k+=1 !!}: </label>
                                    <span class="content">{!! strip_tags(htmlspecialchars_decode($question->content)) !!}</span>
                                </div>
                                @foreach ($question->answers as $key => $answer)
                                    <div class="form-group ml-4">
                                        {!! Form::checkbox('correct_ans', $answer->id, in_array($answer->id, $question->correct_ans) ?? true, ['disabled' => 'disabled']) !!}
                                        <label>{{ $alphabet[$key] }}.</label>
                                        <span>{!! $answer->content !!}</span>
                                    </div>
                                @endforeach
                            <div class="form-group ml-3">
                                <label for="explain"><i>{{ trans('translate.explain') }}:</i> </label>
                                <span>
                                    @if (!empty($question->explain))
                                        {!! strip_tags(htmlspecialchars_decode($question->explain)) !!}
                                    @else
                                        {{ trans('translate.no_explain') }}
                                    @endif    
                                </span>
                            </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            {!! Form::label('status', 'Status', ['class' => 'col-md-3 control-label']) !!}
                            <div class="custom-control custom-radio">
                                {!! Form::radio('status', 1, $topic->status == 1 ? true : null, ['class' => 'mr-2', 'disabled' => 'disabled']) !!}Publish
                                {!! Form::radio('status', 0, $topic->status == 0 ? true : null, ['class' => 'ml-5 mr-2', 'disabled' => 'disabled']) !!}Waitting
                                {!! Form::radio('status', 2, $topic->status == 2 ? true : null, ['class' => 'ml-5 mr-2', 'disabled' => 'disabled']) !!}Edit
                                {!! Form::radio('status', 3, $topic->status == 3 ? true : null, ['class' => 'ml-5 mr-2', 'disabled' => 'disabled']) !!}Close
                            </div>
                        </div>
                    </div>
                    <div class="form-actions pl-2">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <a href="{{ route('topics.edit', $topic->slug) }}" class="btn btn-warning">
                                    Edit
                                </a>
                                <a href="{{ route('topics.index') }}" class="btn btn-light">
                                    Cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection