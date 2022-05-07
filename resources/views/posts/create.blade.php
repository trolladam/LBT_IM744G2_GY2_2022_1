@extends('layouts.main')

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endpush

@section('content')
<div class="row">
    <div class="col-md-8 col-lg-6 mx-auto">
        <div class="card">
            <div class="card-body">
                <h3 class="display-3">{{ __('Publish') }}</h3>
                <form action="{{ route('post.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">{{ __('Title') }}</label>
                        <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" type="text" name="title" value="{{ old('title') }}">
                        @if ($errors->has('title'))
                            <p class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="cover">{{ __('Cover image') }}</label>
                        <input class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}" type="file" name="cover">
                        @if ($errors->has('cover'))
                            <p class="invalid-feedback">
                                {{ $errors->first('cover') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="topic_id">{{ __('Topic') }}</label>
                        <select class="form-control{{ $errors->has('topic_id') ? ' is-invalid' : '' }}" name="topic_id">
                            <option value="">{{ __('Please choose') }}</option>
                            @foreach ($topics as $topic)
                                <option value="{{ $topic->id }}" {{ $topic->id == old('topic_id') ? 'selected' : '' }}>
                                    {{ $topic->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('topic_id'))
                            <p class="invalid-feedback">
                                {{ $errors->first('topic_id') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="description">{{ __('Description') }}</label>
                        <textarea class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                            <p class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea id="editor" name="content">{{ old('content') }}</textarea>
                        @if ($errors->has('content'))
                            <p class="d-block invalid-feedback">
                                {{ $errors->first('content') }}
                            </p>
                        @endif
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            {{ __('Publish') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
