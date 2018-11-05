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
                        <div class="social">
                            <div class="fb-share-button" data-href="{!! route('quiz', [$topic->category->slug, $topic->slug])!!}" data-layout="button_count" data-size="small" data-mobile-iframe="true">Share</div>
                            <span class="ml-5 icon-like" >
                                <i class="far fa-eye"></i>
                                <span>0</span>
                            </span>
                            <span class="ml-3 like" value="1">
                                @if ($like != null && $like->status == 1)
                                    <span class="icon-up icon-like"><i class="far fa-thumbs-up"></i></span>
                                @else
                                    <span class="icon-up"><i class="far fa-thumbs-up"></i></span>
                                @endif    
                                <span class="up">{!! count($topic->likes()->where('status', 1)->get()) !!}</span>
                            </span>
                            <span class="ml-3 like" value="0">
                                @if ($like != null && $like->status == 0)
                                    <span class="icon-down icon-like"><i class="far fa-thumbs-down"></i></span>
                                @else
                                    <span class="icon-down"><i class="far fa-thumbs-down"></i></span>
                                @endif   
                                <span class="down">{!! count($topic->likes()->where('status', 0)->get()) !!}</span>
                            </span>
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
    {!! Html::script('bower_components/jquery-confirm2/dist/jquery-confirm.min.js') !!}
    <script>
        var quiz_request = {
            config: @json(config('constants')),
            data : @json($data),
            topic : {!! $topic->id !!},
            trans: {
                alert: '{{ __('translate.alert') }}',
                opps: '{{ __('translate.oops') }}',
                warn_alert: '{{ __('translate.warn_alert') }}',
                score: '{{ __('translate.score') }}',
                total: '{{ __('translate.total') }}',
                try_again: '{{ __('translate.try_again') }}',
            }
        }
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';
    </script>
    {!! Html::script('js/quiz.js') !!}
    {!! Html::script('js/like.js') !!}
@endsection
