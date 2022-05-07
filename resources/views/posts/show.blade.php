@extends('layouts.main')

@section('content')
<div>
    <h1 class="display-1">
        {{ $post->title }}
    </h1>
    <div class="d-flex">
        <a href="{{ route('profile.details', $post->author) }}">
            <img class="rounded-circle" width="25" src="{{ $post->author->avatar }}" alt="{{ $post->author->name }}">
            {{ $post->author->name }}
        </a>
        <span class="ms-3">{{ $post->created_at->diffForHumans() }}</span>
        <span class="ms-3">{{ $post->minutes_to_read }} {{ __('minutes to read') }}</span>
        <a href="{{ route('topic.details', $post->topic) }}" class="fw-bold ms-3">{{ $post->topic->name }}</a>
    </div>
    <div class="fw-bold my-5">
        {{ $post->description }}
    </div>
    @if ($post->has_cover)
    <img class="img-fluid mb-5" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
    @endif
    <div>
        {!! $post->content !!}
    </div>
    <div class="row">
        <div class="col-md-8 col-lg-6 mx-auto">
            <h5 class="display-5">
                {{ __('Comments') }}
            </h5>
            @auth
                <form action="{{ route('post.comment', $post) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <textarea name="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : ''}}">{{ old('comment') }}</textarea>
                        @if ($errors->has('comment'))
                            <p class="invalid-feedback">
                                {{ $errors->first('comment') }}
                            </p>
                        @endif
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary btn-lg">
                            {{ __('Comment') }}
                        </button>
                    </div>
                </form>
            @endauth
            <div class="mt-5">
                @foreach($post->comments as $comment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3 d-flex">
                                <a href="{{ route('profile.details', $comment->user) }}">
                                    <img class="rounded-circle" width="25" src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}">
                                    {{ $comment->user->name }}
                                </a>
                                <span class="ms-3">
                                    {{ $comment->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div style="white-space: pre-line; ">
                                {{ $comment->message }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
