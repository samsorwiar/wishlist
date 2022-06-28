@extends('frontend.layout')
@extends('frontend.header')
@section('title')
    Wishlist
@endsection

<style>
    p { font-size: 20px}
    article {text-align: center}
    h1 { font-size: 35px; text-align: center}
    img {max-width: 25%}
</style>
@if ($message = Session::get('error'))
    <div class="alert alert-danger mt-1 mb-1">
        <p>{{ $message }}</p>
    </div>
@endif
@section('content')
    <div>
        <form class="container col-md-5 mt-5" action="{{ route('update', $wishlist->id) }}" method="POST" enctype=multipart/form-data>
            <hr style="color: #b32113">
            @csrf
            @method('PUT')
            <div class="form-group w-75 mx-auto">
                <div class="form-group row">
                    <div class="form-group mb-3 col">
                        <label for="name">Item Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $wishlist->name }}">
                    </div>
                    <div class="form-group mb-3 col">
                        <label for="price">Item Price:</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01"
                               value="{{ $wishlist->price }}">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group mb-3 col">
                        <label for="link_to_site">Link to the site:</label>
                        <input type="text" class="form-control" id="link_to_site" name="link_to_site"
                               value="{{ $wishlist->link_to_site }}">
                    </div>
                    <div class="form-group mb-3 col">
                        <label for="image">Item Image:</label><br>
                        <img  src="{{ asset('uploads/image/'. $wishlist->image) }}"/>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Item Image">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"
                              placeholder="Item Description">{{ $wishlist->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
            <hr style="color: #b32113; margin-top: 50px">
        </form>
        <p style="text-align: center; font-size: 20px"><a href="{{ route('index') }}">Previous page</a></p>
    </div>
@endsection
