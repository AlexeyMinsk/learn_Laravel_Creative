@php
    $title = $h1 = $post->title;
@endphp
@extends('layouts.main')
@section('content')
    {{$post->content}}
    <div class="detached-block-1">
        <a class="btn btn-primary" role="button" href="{{route('post.index')}}">
            Back
        </a>
        <a class="btn btn-primary" role="button" href="{{route('post.edit', $post->id)}}">
            Edit
        </a>
        <form action="{{route('post.destroy', $post->id)}}" method="post" class="service-form">
            @csrf
            @method('delete')
            <button class="btn btn-danger" type="submit">
                Delete
            </button>
        </form>
    </div>
@endsection
