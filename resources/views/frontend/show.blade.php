@extends('frontend.layout')
@extends('frontend.header')
@section('title')
    Wishlist
@endsection

<style>
    p { font-size: 20px; }
    div {text-align: center}
    .description { max-width: 40%; margin: 20px auto; text-align: center}
    h2:hover { font-size: 65px}
    img {max-width: 25%}
    .link {font-size: 12px; color: #0e8435}
</style>

@section('content')
    <div>
        <hr style="color: #0e8435; margin: 35px auto; width: 40%">
        <h1> {{$wishlist->name}} </h1>
        <img src="{{ asset('uploads/image/'. $wishlist->image) }}"/>
        <p class="description">{{$wishlist->description}}</p>
        <h2><a href="{{ $wishlist->link_to_site }}"> €{{ $wishlist->price }}*</a></h2>
        <p class="link">*price is the link!</p>
        <td>
            <a href="{{ route('edit', $wishlist->id) }}" class="btn btn-success">Edit</a>
            <a href="{{ url('wishlist/'.$wishlist->id.'/edit') }}" class="btn btn-danger">Delete</a>
        </td>
        <hr style="color: #0e8435; margin:15px auto; width: 40%">
                <p><a href="{{ route('index') }}"> Back</a></p>
    </div>
@endsection
