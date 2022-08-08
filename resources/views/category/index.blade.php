@php
    $title = 'Categories list';
    $h1 = $title;
@endphp
@extends('layouts.main')
@section('content')
        <div class="container">
            <form action="{{route('category.destroy')}}" method="POST">
                @csrf
                @method('delete')
            @foreach($categories as $category)
                <div class="row">
                    <div class="col-12 col-sm-6">
                        {{$category->title}}
                    </div>
                    <div class="col-12 col-sm-6">
                        <button type="submit" class="btn-close" aria-label="Close"
                            name="delete" value="{{$category->id}}"></button>
                    </div>
                </div>
            @endforeach
            </form>
        </div>
@endsection
