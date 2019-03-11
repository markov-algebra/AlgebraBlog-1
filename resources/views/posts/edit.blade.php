@extends('layouts.master')

@section('content')

<div class="col-sm-8 blog-main">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" style="background-color: #3CBC8D; color: white; padding: 20px; margin-bottom: 30px; text-align: center;">Update "{{ $post->title }}" post:</h3>
        </div>

        <div class="panel-body">
            <form method="post" action="{{ route('posts.update', $post->id) }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control {{ $errors->has('title') ? 'has-error' : '' }} " id="title" name="title" value="{{ $post->title }}" />
                </div>
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea class="form-control {{ $errors->has('body') ? 'has-error' : '' }} " id="body" name="body" rows="10" cols="80">{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Confirm</button>
                <a href="{{ route('posts') }}" class="btn btn-danger" role="button">Back</a>

                @include('layouts.errors')

            </form>
        </div>
    </div>
</div>

@endsection