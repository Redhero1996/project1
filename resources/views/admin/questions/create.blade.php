@extends('master')
@section('title', 'Create New Question')
@section('content')
    <div class="card">
        <div class="tab-content">
            <div class="card-body">
                <h3 class="page-title">Create Question</h3>
                <div class="portlet-body form">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    <!-- BEGIN FORM-->
                    {!! Form::open(['method' => 'POST', 'route' => 'questions.store', 'class' => 'form-horizontal']) !!}
                        <div class="form-body">
                            <div class="form-group">
                                {!! Form::label('category_id', 'Category', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::select('category_id', $categories->pluck('name', 'id'), null, ['class' => 'browser-default custom-select']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('topic_id', 'Topic', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::select('topic_id', $topics->pluck('name', 'id'), null, ['class' => 'browser-default custom-select']) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('content', 'Content', ['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-12">
                                    {!! Form::textarea('content', old('content'), ['class' => 'editor']) !!}
                                </div>
                            </div>
                            <div class="form-group ml-3">
                                <input type="checkbox" name="correct_ans[]" value="0">
                                <label>Answer A:</label>
                                <input type="text" name="answer[]" class="form-control" value="{!! old('answer[0]') !!}">
                            </div>
                            <div class="form-group ml-3">
                                 <input type="checkbox" name="correct_ans[]" value="1">
                                 <label>Answer B:</label>
                                <input type="text" name="answer[]" class="form-control" value="{!! old('answer[1]') !!}">
                            </div>
                            <div class="form-group ml-3">
                                 <input type="checkbox" name="correct_ans[]" value="2">
                                 <label>Answer C:</label>
                                <input type="text" name="answer[]" class="form-control" value="{!! old('answer[2]') !!}">
                            </div>
                            <div class="form-group ml-3">
                                <input type="checkbox" name="correct_ans[]" value="3">
                                <label>Answer D:</label>
                                <input type="text" name="answer[]" class="form-control" value="{!! old('answer[3]') !!}">
                            </div>
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
