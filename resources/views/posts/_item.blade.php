<div class="card mb-3">
    <div class="card-body">
        <div class="d-flex">
            <img width="120" height="120" src="{{ $post->cover_image }}" alt="{{ $post->title }}" style="object-fit: cover;">
            <div class="ms-3">
                <h6 class="display-6">{{ $post->title }}</h6>
                <div class="d-flex">
                    <a href="{{ route('profile.details', $post->author) }}">
                        <img class="rounded-circle" width="25" src="{{ $post->author->avatar }}" alt="{{ $post->author->name }}">
                        {{ $post->author->name }}
                    </a>
                    <span class="ms-3">{{ $post->minutes_to_read }} {{ __('minutes to read') }}</span>
                    <span class="ms-3">{{ $post->created_at->diffForHumans() }}</span>
                    <a href="{{ route('topic.details', $post->topic) }}" class="fw-bold ms-3">{{ $post->topic->name }}</a>
                </div>
                <p>{{ $post->description }}</p>
                <div class="text-end">
                    <a class="btn btn-primary btn-sm" href="{{ route('post.details', $post) }}">
                        {{ __('Read more') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
