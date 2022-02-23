@php
    $title = 'Posts list';
    $h1 = $title;
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <ul>
            @foreach($posts as $post)
                <li>
                    <a href="{{route("post.detail", ['post' => $post->id])}}">
                        {{$post->title}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
