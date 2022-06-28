@extends('backend/backend-layout')

@section('content')
    <div class="container mt-3">
        <h1 class="text-center">All Wishlists!</h1>
        <a href="{{ route('dashboardCreate') }}" class="btn btn-success">Create Wish!</a>
        <hr/>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>description</th>
                <th>Price</th>
                <th>Image</th>
                <th>Link</th>
                <th>Edit</th>
                <th>Show</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>{{$article->id}}</td>
                    <td>{{$article->name}}</td>
                    <td>{{$article->description}}</td>
                    <td>€ {{$article->price}}</td>
                    <td style="width: 15%"><img src="{{ asset('uploads/image/'. $article->image) }}"/></td>
                    <td><a href="{{$article->link_to_site}}">Link to item</a></td>
                    <td><a href="{{ route('dashboardEdit', $article->id) }}" class="btn btn-success">Edit</a></td>
                    <td><a href="{{ route('destroy', $article->id) }}" class="btn btn-danger">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
