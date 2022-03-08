@php
    $title = $h1 ='Edit post';
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <form name="create-post" action="{{route("post.update", $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title"
                       name="title" value="{{$post->title}}">
                @error('title')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" id="content" rows="3" name="content">{{$post->content}}</textarea>
                @error('content')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="text" id="image"
                       name="image" value="{{$post->image}}">
                @error('image')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <select class="form-select" aria-label="Default select example"
                    id="category_id" name="category_id">
                <option value="0"></option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"{{$post->category_id===$category->id? " selected": ""}}>
                        {{$category->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <label for="tags" class="form-label">Tags</label>
            <select class="form-select" aria-label="Default select example"
                    name="tags[]" id="tags" multiple>
                @foreach($tags as $tag)
                    @php
                        $tagId = $tag->id;
                            $select = $post->tags->contains(function ($item) use ($tagId){
                                if($item->id === $tagId){
                                    return true;
                                }
                                return false;
                            })
                    @endphp
                    <option value="{{$tag->id}}"{{$select? " selected": ""}}>
                        {{$tag->title}}
                    </option>
                @endforeach
            </select>
            @error('tags')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <div>
                <div class="detached-block-1">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-primary">Reset</button>
                    <a type="reset" class="btn btn-primary"
                       href="{{route("post.detail", ["post" => $post->id])}}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
