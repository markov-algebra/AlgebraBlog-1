@extends('layouts.master')

@section('content')
<div class="col-sm-8 blog-main">

    @if(session()->has('flash_message'))
        <div class="alert alert-success alert-dismissible">
            {{ session()->get('flash_message') }}
        </div>
    @endif

    <div class="blog-post">
        <a href="{{ route('posts.show', $post->id) }}">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
        </a>
        <p class="blog-post-meta"> {{ $post->created_at->toFormattedDateString() }} by <a href="#">{{ $post->user->name }}</a></p>

        <section>
            {{ $post->body }}
        </section>

        <form action="{{ route('posts.destroy', $post->id) }}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <a href="{{ route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm" role="button" style="margin-top: 20px">Edit</a>
            <button class="btn btn-danger btn-sm" style="margin-top: 20px">Delete</button>
            <a href="{{ route('posts') }}" class="btn btn-info btn-sm" role="button" style="margin-top: 20px">Back</a>
        </form>

        <hr />

        {{-- Add a comment --}}

        <div class="card">
            <div class="card-block">
                <form action="/posts/{{ $post->id }}/comment" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" placeholder="Your comment here" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>                
            </div>
        </div>

        @if (count($post->comments))
            <hr />
            <div class="comments">
                <h3>Comments:</h3>
                <ul>
                    @foreach($post->comments as $comment)

                        <li class="list-group-item">
                            <b>{{ $comment->user->name }}</b>&nbsp;
                            <i>{{ $comment->created_at->diffForHumans() }}</i>:&nbsp;
                            {{ $comment->body }}
                        </li>
                        
                    @endforeach
                </ul>            
            </div>
        @else
            <hr />
            <p>This post still doesnt have any comments!</p>
        @endif

    </div>
</div>
@endsection