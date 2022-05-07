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
    <div>
        {!! $post->content !!}
    </div>
</div>
@endsection
