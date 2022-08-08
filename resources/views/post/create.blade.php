@php
    $title = $h1 ='Create new post';
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <form name="create-post" action="{{route("post.store")}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content" value="{{old('content')}}"></textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="text" id="image" name="image" value="{{old('image')}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <label for="category" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example"
                    id="category" name="category_id">
                <option value="0"></option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"{{old('category_id') == $category->id? " selected": ""}}>
                        {{$category->title}}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="tags" class="form-label">Tags</label>
            <select class="form-select" aria-label="Default select example"
                    name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}"
                        {{ is_array(old("tags")) && in_array($tag->id, old("tags"))? " selected": ""}}>
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>
            @error('tags')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="detached-block-1">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection
