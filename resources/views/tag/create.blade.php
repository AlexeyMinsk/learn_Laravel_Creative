@php
    $title = $h1 ='Create new tag';
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <form name="create-category" action="{{route("tag.store")}}" method="post">
            @csrf
            <label for="category" class="form-label">Tag list</label>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example"
                        id="category" name="">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Tag</label>
                <input type="text" class="form-control" id="title" name="title" autofocus>
            </div>

            <div class="detached-block-1">
                <button type="submit" class="btn btn-primary">Create</button>
                <a type="reset" class="btn btn-primary"
                   href="{{route("tag.index")}}">List</a>
            </div>
        </form>
    </div>
@endsection
