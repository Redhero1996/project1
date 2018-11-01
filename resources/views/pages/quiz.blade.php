@extends('main')
@section('title', ' Test')
@section('content')
    <div class="form-group quiz">
        @if (Auth::check())
            @if (!empty($data))
                <div class="form-group">
                    <h3 id="title-quiz">{!! trans('translate.title_topic') !!} {{ $topic->name }}</h3>
                    <div class="form-group text-center font-weight-bold mt-5 alert-secondary btn-test">
                        <h2 class="pt-1">Đề thi gồm 6 câu hỏi</h2>
                        <p>Bạn có thời gian 15 phút đề làm bài</p>
                        <p class="pb-1">Click {!! Form::button(trans('translate.start_test'), ['class' => 'btn btn-warning btn-test']) !!} để bắt đầu làm bài</p>
                    </div>
                    <div class="form-group do-test">
                        <div class="fb-share-button text-center" data-href="http://localhost:8000/{{ $topic->category->slug }}/{{ $topic->slug }}" data-layout="button_count" data-size="small" data-mobile-iframe="true">
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%3A8000%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a>
                        </div>
                        <h3 class="mt-3" id="currentQuestionNumberText"> {!! trans('translate.title_question_num', ['count' => count($data)]) !!}
                            <span class="btn btn-default btn-refresh" id="restart-test">{!! trans('translate.restart_test') !!}</span>
                        </h3>
                        <hr>
                        <div class="form-group" id="score"></div>
                        <div class="form-group" id="check-all">
                            @foreach ($data as $key => $value)
                                <ol class="questions">
                                    <li class="alert alert-info title-question">
                                        <span class="question-num">{!! trans('translate.number', ['number' => $key + config('constants.number_ques')]) !!} </span>
                                        <span id="question"> {!! $value['question']->content !!}</span>
                                    </li>
                                    <ul class="answer">
                                        @foreach ($value['answers'] as $key => $answer)
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    {!! Form::checkbox($answer->id, $answer->id, null, ['class' => 'form-check-input']) !!}
                                                    <span class="answers">({{ $alphabet[$key] }}) {{ $answer->content }} </span>
                                                </label>

                                            </div>
                                        @endforeach
                                    </ul>
                                    <li class="alert alert-secondary explain">
                                        <h4 class="font-weight-bold font-italic explain">{{ trans('translate.explain') }}</h4>
                                        <span class="ml-4">{{ $value['question']->explain }}</span>
                                    </li>
                                </ol>
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                {!! trans('translate.empty_data') !!}
            @endif
        @else
            <div class="form-group text-center">
                {!! trans('translate.permission') !!}
            </div>
        @endif
    </div>
@endsection
@section('scripts')

    <script type="text/javascript">
        var config = @json(config('constants'));
        $(document).ready(function() {
            $('button.btn-test').click(function() {
                $('div.btn-test').hide();
                $('div.do-test').show();
                $('li.timer').show();
                $('.form-check-input').show();
                $('.btn-submit').show();
                $('span.btn-refresh').click(function() {
                    $('div.btn-test').hide();
                    $('div.do-test').show();
                    window.location.reload(true);
                });

                // prevent when reload page
                window.onbeforeunload = function() {
                    return "{{ trans('translate.alert') }}";
                }

                // Timer countdown
                var interval = setInterval(function() {
                    var timer = $('li.timer').html();
                    timer = timer.split(':');
                    var minutes = parseInt(timer[0], parseInt(config.ten));
                    var seconds = parseInt(timer[1], parseInt(config.ten));
                    seconds--;
                    if (minutes < parseInt(config.zero)) {
                        return clearInterval(interval);
                    }
                    if (minutes < parseInt(config.ten)) {
                        minutes = '0' + minutes;
                    }
                    if (seconds < parseInt(config.zero) && minutes != parseInt(config.zero)) {
                        minutes--;
                        seconds = parseInt(config.fifty_nine);
                    } else if (seconds < parseInt(config.ten)) {
                        seconds = '0' + seconds;
                    }
                    $('li.timer').html(minutes + ':' + seconds);
                    if (minutes == parseInt(config.zero) && seconds <= parseInt(config.ten)) {
                        $('li.timer').css('color', 'red');
                        $('li.timer').fadeOut(parseInt(config.fifty));
                        $('li.timer').fadeIn(parseInt(config.fifty));
                        if (minutes == parseInt(config.zero) && seconds == parseInt(config.zero)) {
                            clearInterval(interval);
                            $.confirm({
                                icon: 'fas fa-warning',
                                type: 'red',
                                title: '{{ trans('translate.oops') }}',
                                content: '{{ trans('translate.warn_alert') }}',
                                buttons: {
                                    ok: function () {
                                        $('div#check-all').submit();
                                        checkSubmit();
                                    },
                                }
                            });
                        }
                    }
                }, parseInt(config.one_thousand));

                // handle submit
                $('.btn-submit').click(function() {
                    window.onbeforeunload = function() {
                        return null;
                    };
                    clearInterval(interval);
                    checkSubmit();
                });
            });
        });
        function checkSubmit() {
            var data = @json($data);
            var topic = {{ $topic->id }};
            var dataRequest = {};
            for (i in data) {
                var question_id = data[i].question.id;
                var answers = data[i].answers;
                var answered = [];
                for (j in answers) {
                    if ($(`input[name="${answers[j].id}"]`).is(':checked')) {
                        var ans = parseInt($(`input[name="${answers[j].id}"]:checked`).val());
                        answered.push(ans);
                    }
                }
                one_question = {
                    'topic' : topic,
                    'question_id' : question_id,
                    'answered' : answered
                }
                dataRequest[i] = one_question;
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                url: '/question',
                type: 'GET',
                data : { dataRequest },
                success:function(dataResponse) {
                    questionArr = dataResponse.correct;
                    if (dataResponse.total >= (questionArr.length * (config.point) * (config.point_sevent))) {
                        for (var i = 0; i < questionArr.length; i++) {
                            if (questionArr[i].answer) {
                                for (var j = 0; j < questionArr[i].answered.length; j++) {
                                    $(`input[name=${questionArr[i].answered[j]}]`).closest('label').after(`
                                        <i class="fas fa-check text-success"></i>
                                    `);
                                }
                            } else {
                                for (var j = 0; j < questionArr[i].answered.length; j++) {
                                    if (jQuery.inArray(questionArr[i].answered[j], questionArr[i].correct_ans) != config.negative) {
                                        $(`input[name=${questionArr[i].answered[j]}]`).closest('label').css({' color' : '#45ba28' }).after(`
                                            <i class="fas fa-check text-success"></i>
                                        `);
                                    } else {
                                        $(`input[name=${questionArr[i].answered[j]}]`).closest('label').after(`
                                            <i class="fas fa-times text-danger"></i>
                                        `);
                                    }
                                }
                                for (var k = 0; k < questionArr[i].correct_ans.length; k++) {
                                    $(`input[name=${questionArr[i].correct_ans[k]}]`).closest('label').css({ 'color' : '#45ba28' });
                                }
                            }
                        }
                        $('div#score').addClass('alert alert-warning').append(`
                            <span class="alert-link">{{ trans('translate.score') }} ${dataResponse.score}/${questionArr.length}</span>
                            <span class="alert-link">{{ trans('translate.total') }} ${dataResponse.total}/${questionArr.length * (config.point)} (${((dataResponse.total / (questionArr.length * (config.point))) * (config.hundred)).toFixed(config.two)}%)</span>
                        `);
                        $('li.explain').show();
                    } else {
                        $('div#score').addClass('alert alert-warning').append(`
                            <span class="alert-link">{{ trans('translate.score') }} ${dataResponse.score}/${questionArr.length}</span>
                            <span class="alert-link">{{ trans('translate.total') }} ${dataResponse.total}/${questionArr.length * (config.point)} (${((dataResponse.total / (questionArr.length * (config.point))) * (config.hundred)).toFixed(config.two)}%)</span>
                            <span class="alert-link">{{ trans('translate.try_again') }} <i class="far fa-smile-wink text-success"></i>
                            </span>
                        `);
                    }
                    $('input').prop('disabled', true);
                    $('button.btn-submit').hide();
                    $('html, body').animate({
                        scrollTop : config.zero,
                    });
                }
            });
        }
    </script>
@endsection
