@extends('layouts.layout')

@section('title', 'Blog posts')

@section('content')

    <div class="blog-posts">
    @foreach ($posts as $p)
        <div class="post-card">
            <a href="blog/{{ $p->id }}" alt="">
                @if($p->image_path)
                    <img class="post-card__img" src="{{ $p->image_path }}" alt="">
                @endif
                <h2 class="post-card__title">{{ $p->title }}</h2>
                <p class="post-card__content">{{ Illuminate\Support\Str::limit($p->content) }}</p>
                <div class="post-card__footer">
                    <span class="post-card__author">{{ $p->user->name }}</span>
                    <span class="post-card__datetime">{{date('d/m/y', strtotime($p->created_at))}}</span>
                    <span class="post-card__comments">Comments: {{count($p->comments)}}</span>
                </div>
            </a>
        </div>
    @endforeach
    </div>
    <div class="blog-post-navigation">
        {{ $posts->links() }}
    </div>

@endsection
