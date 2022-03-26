@extends('layouts.main')

@section('content')
<h1 class="display-1">Home page</h1>
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="display-5">{{ $post->title }}</h5>
                <p class="fw-bold">{{ $post->topic->name }}</p>
                <p>{{ $post->description }}</p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
