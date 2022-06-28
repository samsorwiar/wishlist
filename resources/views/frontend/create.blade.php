@extends('frontend.layout')
@extends('frontend.header')
@section('title')
    Create Wishlist
@endsection

@section('content')
    <div>
        <form class="container col-md-5 mt-5" action="{{ route('store') }}" method="post" enctype=multipart/form-data>
            <hr style="color: #b32113">
            @csrf
            <div class="form-group w-75 mx-auto">
                <div class="form-group row">
                    <div class="form-group mb-3 col">
                        <label for="name">Item Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    </div>
                    <div class="form-group mb-3 col">
                        <label for="price">Item Price:</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01"
                               placeholder="Enter price">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group mb-3 col">
                        <label for="link_to_site">Link to the site:</label>
                        <input type="text" class="form-control" id="link_to_site" name="link_to_site"
                               placeholder="Item Link">
                    </div>
                    <div class="form-group mb-3 col">
                        <label for="image">Item Image:</label>>
                        <input type="file" class="form-control" id="image" name="image" placeholder="Item Image">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description"
                              placeholder="Item Description"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </div>
            <hr style="color: #b32113; margin-top: 50px">
        </form>
        <p style="text-align: center; font-size: 20px"><a href="{{ route('index') }}">Previous page</a></p>
    </div>

@endsection
