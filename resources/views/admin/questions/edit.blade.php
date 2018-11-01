@extends('master')
@section('title', 'Edit Question')
@section('content')
    <div class="card">
        <div class="tab-content">
            <div class="card-body">
                <h3 class="page-title">Edit Question</h3>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    {!! Form::model($question, ['method' => 'PUT', 'route' => ['questions.update', $question->id], 'class' => 'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                {!! Form::label('category_id', 'Category', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {{-- @foreach ($question->topics as $topic) --}}
                                    {!! Form::select('category_id', $categories->pluck('name', 'id'), $category, ['class' => 'browser-default custom-select']) !!}
                                    {{-- @endforeach --}}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('topic_id', 'Topic', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::select('topic_id', $question->topics->pluck('name', 'id'), $topic_name, ['class' => 'browser-default custom-select']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', 'Content', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::textarea('content', old('content'), ['class' => 'editor']) !!}
                                    @if($errors->has('content'))
                                        <span class="help-block" style="color: red;">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @foreach ($answers as $key => $answer)
                                <div class="form-group ml-3">
                                    @if(in_array($answer->id, $question->correct_ans))
                                        <input type="checkbox" name="correct_ans[]" value="{{$answer->id}}" checked="">
                                    @else
                                        <input type="checkbox" name="correct_ans[]" value="{{$answer->id}}">
                                    @endif
                                        <label>Answer {{$alphabet[$key]}}:</label>
                                        <input type="text" name="answer[]" class="form-control" value="{{$answer->content}}">
                                </div>
                            @endforeach
                            <div class="form-group ml-3">
                                {!! Form::label('explain', 'Explain') !!}
                                <div class="col-md-12">
                                    {!! Form::textarea('explain', old('explain'), ['class' => 'editor']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-actions pl-2">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    {!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}
                                    <a href="{{ route('questions.index') }}" class="btn btn-light">
                                        Cancel
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
@section('scripts')
    <script type="text/javascript">
        $('select[name="category_id"]').on('click', function() {
            var category_id = $(this).val();
            $.ajax({
                url: '/admin/select-ajax/' + category_id,
                type: 'GET',
                dataType: 'json',
                success:function(data) {
                    $('select[name="topic_id"]').empty();
                    $.each(data, function(key, topic) {
                        $('select[name="topic_id"]').append(
                        "<option value='" + topic.id + "'>" + topic.name + "</option>"
                    );
                  });
                }
            });
        });
    </script>
@stop
