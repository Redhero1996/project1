@extends('main')
@section('title', trans('translate.create_topic'))
@section('content')
    <div class="form-group quiz">
        <div class="form-group">
            <h3 id="title-quiz">{!! trans('translate.create_topic') !!} </h3>
            {!! Form::open(['route' => 'create-topics.store', 'method' => 'POST', 'class' => 'form-horizontal created']) !!}
                <div class="form-body">
                    <div class="form-group">
                        {!! Form::label('category_id', trans('translate.category'), ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-12">
                            {!! Form::select('category_id', $categories->pluck('name', 'id'), null, ['class' => 'browser-default custom-select']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('topic_id', trans('translate.topic'), ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-12">
                            {!! Form::text('topic_name', null, ['class' => 'form-control input-circle', 'placeholder' => 'Enter name of topic']) !!}
                            @if($errors->has('topic_name'))
                                <span class="help-block" style="color: red;">
                                    <strong>{{ $errors->first('topic_name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('number-quest', trans('translate.question_num'), ['class' => 'col-md-3 control-label']) !!}
                        <div class="row ml-1">
                            <div class="col-md-3">
                                {!! Form::text('number-quest', config('constants.zero'), ['class' => 'form-control input-circle']) !!}
                            </div>
                            <div class="col-md-9 pt-2">
                                <span class="text-success add-quest"><i class="fas fa-plus-circle"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-body question-form">
                    </div>
                </div>
                <div class="form-actions pl-2">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            {!! Form::submit(trans('translate.send'), ['class' => 'btn btn-info']) !!}
                            <a href="{{ route('create-topics.index', Auth::user()->id) }}" class="btn btn-light submit">
                                {{ trans('translate.cancel') }}
                            </a>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            var alphabet = @json($alphabet);
            $('span.add-quest').click(function() {
                var number_quest = parseInt($('input#number-quest').val());
                if (number_quest <= -1) {
                    alert('Bạn phải nhập câu hỏi lớn hơn 0');
                }
                else {
                    for (i = 1; i <= number_quest; i++) {
                        $('div.question-form').append(`
                            <div class="form-group">
                                <label for="question" class="col-md-3 control-label question">Câu hỏi ` + i +`</label>
                                <div class="col-md-12">
                                    <textarea class="editor" name="content[`+ i +`]" cols="102" id="content" required></textarea>
                                </div>
                            </div>
                            <div class="form-group ml-3">
                                <input type="checkbox" name="correct_ans[`+ i +`][]" value="0">
                                <label>Đáp án A:</label>
                                <input type="text" name="answer[`+ i +`][]" class="form-control" value="" required>
                            </div>
                            <div class="form-group ml-3">
                                 <input type="checkbox" name="correct_ans[`+ i +`][]" value="1">
                                 <label>Đáp án B:</label>
                                <input type="text" name="answer[`+ i +`][]" class="form-control" value="" required>
                            </div>
                            <div class="form-group ml-3">
                                 <input type="checkbox" name="correct_ans[`+ i +`][]" value="2">
                                 <label>Đáp án C:</label>
                                <input type="text" name="answer[`+ i +`][]" class="form-control" value="" required>
                            </div>
                            <div class="form-group ml-3">
                                <input type="checkbox" name="correct_ans[`+ i +`][]" value="3">
                                <label>Đáp án D:</label>
                                <input type="text" name="answer[`+ i +`][]" class="form-control" value="" required>
                            </div>
                            <div class="form-group ml-3">
                                <label for="explain">Explain</label>
                                <div class="col-md-12">
                                    <textarea class="editor" name="explain[`+ i +`][]" cols="102" id="explain"></textarea>
                                </div>
                            </div>
                        `);
                    }
                    // $(".ml-1").on('click', 'span.add-ans', function(e) {
                    //     e.preventDefault();
                    //     var quest_id = $(this).data('id');
                    //     var ans_question = parseInt($('input#number-ans-'+quest_id).val());
                    //     for (j = 0; j < ans_question; j++) {
                    //         $('div.ans-form-'+quest_id).append(`
                    //             <div class="form-group ml-3">
                    //                 <input type="checkbox" name="correct_ans[`+ quest_id +`][]" value="`+ j +`">
                    //                 <label>Answer `+ alphabet[j] +`:</label>
                    //                 <input type="text" name="answer[`+ quest_id +`][]" id="ans-`+ j +`" class="form-control" value="">
                    //             </div>
                    //         `);
                    //     }
                    // });
                }
            });
        });
</script>
@endsection
