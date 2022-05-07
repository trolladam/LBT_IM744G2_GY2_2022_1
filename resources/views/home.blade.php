@extends('layouts.main')

@section('content')
<h1 class="display-1">Home page</h1>
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-8 col-lg-6 mx-auto">
        @include('posts._item')
    </div>
    @endforeach
    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
@endsection
