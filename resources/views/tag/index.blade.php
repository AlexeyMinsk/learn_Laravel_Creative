@php
    $title = 'Tags list';
    $h1 = $title;
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <ul>
            @foreach($tags as $tag)
                <li>
                    {{$tag->title}}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
