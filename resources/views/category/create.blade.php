@php
    $title = $h1 ='Create new category';
@endphp
@extends('layouts.main')
@section('content')
    <div class="container">
        <form name="create-category" action="{{route("category.store")}}" method="post">
            @csrf
            <label for="category" class="form-label">Category list</label>
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example"
                        id="category" name="">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Category</label>
                <input type="text" class="form-control" id="title" name="title" autofocus>
            </div>

            <div class="detached-block-1">
                <button type="submit" class="btn btn-primary">Create</button>
                <a type="reset" class="btn btn-primary"
                   href="{{route("category.index")}}">List</a>
            </div>
        </form>
    </div>
@endsection
