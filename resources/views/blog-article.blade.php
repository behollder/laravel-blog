@extends('layouts.layout')

@section('title', 'Blog posts')

@section('content')

    <div class="post">
        <div class="post-image-wrapper">
            <img src="{{ $post->image_path  }}" alt="" class="post__image">
        </div>

        <div class="post-header">
            <span class="post__author">Author: {{$post->user->name}}</span>
            <span class="post__datetime">Created at: {{date('d/m/y', strtotime($post->created_at))}}</span>
            <span class="post__comments">Comments: {{count($post->comments)}}</span>
        </div>

        <h2 class="post__title">{{$post->title}}</h2>
        <div class="post__content">
            {{$post->content}}
        </div>

        <h2 class="post-comments-header">Comments</h2>
        <div class="post__comments">
            @foreach($post->comments as $comment)
                <div class="post-comment">
                    <div class="post-comment-header">
                        <div class="post-comment__author">{{$comment->user_name}}</div>
                        <div class="post-comment__date">{{date('d/m/y H:i', strtotime($comment->created_at))}}</div>
                    </div>
                    <div class="post-comment__content">{{$comment->comment}}</div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
