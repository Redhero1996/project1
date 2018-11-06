@extends('main')
@section('title', '| Comments')
@section('content')
    <div class="form-group quiz">
        <div class="form-group mt-5">
            <h3 id="title-quiz" ><a href="{{ route('review', [$topic->category->slug, $topic->slug, $user->pivot->id]) }}">{!! trans('translate.title_topic') !!} {{ $topic->name }}</h3></a>
            <h4> 
                <span class="question">{{ __('translate.question') }}</span>: <span class="content">{!! strip_tags(htmlspecialchars_decode($question->content)) !!}</span>
            </h4>
            <hr>
            <div class="fb-comments" data-href="{{ route('comments', $question->id) }}" data-width="100%" data-numposts="10" data-order-by="time"></div>
        </div>
        <div></div>
    </div>
@endsection
