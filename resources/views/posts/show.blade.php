@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">
    <div class="blog-post">
        <a href="{{ route('posts.show', $post->id) }}">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
        </a>
        <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} by <a href="#">{{ $post->user->name }}</a></p>

        <section>{{ $post->body }}</section>
    </div>
</div>
@endsection