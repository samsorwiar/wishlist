@extends('backend/backend-layout')

<style>
    p { font-size: 20px; }
    .description { max-width: 40%; margin: 20px auto; text-align: center}
    .text-center h2:hover { font-size: 65px}
    img {max-width: 25%; margin: 0 auto}
    .link {font-size: 12px; color: #0e8435}
</style>
@section('content')
    <div class="text-center">
        <hr style="color: #0e8435; margin: 35px auto; width: 40%">
        <h1> {{$article->name}} </h1>
        <img src="{{ asset('uploads/image/'. $article->image) }}"/>
        <p class="description">{{$article->description}}</p>
        <h2><a href="{{ $article->link_to_site }}"> €{{ $article->price }}*</a></h2>
        <p class="link">*price is the link!</p>
        <td>
            <a href="{{ route('edit', $article->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ url('wishlist/'.$article->id.'/edit') }}" class="btn btn-danger">Delete</a>
        </td>
        <hr style="color: #0e8435; margin:15px auto; width: 40%">
        <p><a href="{{ route('dashboard') }}"> Back</a></p>
    </div>
@endsection
