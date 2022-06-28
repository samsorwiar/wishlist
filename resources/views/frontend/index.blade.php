@extends('frontend.layout')
@extends('frontend.header')
@section('title')
    Wishlist
@endsection

<style>
article {text-align: center;}
article p {margin: 0 auto; margin-bottom: 1rem;  text-align: center; width: 44%;}
article img {max-width: 15%; max-height: 450px;}
.create-wish {text-align: center; font-size: 35px; color: #0e8435; margin-top: 50px;}
a:hover {font-size: 35px;}
a {text-decoration: none}
/*.create-wish img */

.rotateimg180 {
    transform: rotate(90deg); /* rotate x-axis and y-axis */
    transform: rotateX(180deg); /* rotate x-axis */
    transform: rotateY(180deg); /* rotate y-axis */
}
</style>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

@section('content')
    <div class="create-wish">
        <p>Do you wish something? Click <a href="{{ route('create') }}">here</a> to let it happend!</p>
        <hr style="color: #b32113; margin: 45px auto; width: 35%">
{{--        <img src="https://www.photofunky.net/output/image/6/e/2/0/6e20cd/photofunky.gif" alt="notworking"/>--}}
    </div>
    @foreach($wishlists as $wishlist)
        <article>
            <h1>{{$wishlist->name}}</h1>
            <img src="https://thumbs.gfycat.com/AcceptableHonorableIbadanmalimbe-max-1mb.gif"/>
            <img src="{{ asset('uploads/image/'. $wishlist->image) }}"/>
            <img src="https://thumbs.gfycat.com/AcceptableHonorableIbadanmalimbe-max-1mb.gif" class="rotateimg180"/>
            <h1><a href="{{ $wishlist->link_to_site }}"> €{{ $wishlist->price }}*</a></h1>
            <p>{{ $wishlist->description }}</p>
            <td>
                <a href="{{ route('edit', $wishlist->id) }}" class="btn btn-success">Edit</a>
{{--                <a href="{{ route('destroy', $wishlist->id) }}" class="btn btn-danger">Delete</a>--}}
            </td>

{{--            @foreach($users as $user)--}}
{{--                <div class="mt-5">--}}
{{--                    <h6>Create by: {{ $user->name }}</h6>--}}
{{--                </div>--}}
{{--            @endforeach--}}
            <hr style="color: #0e8435; margin: 45px auto; width: 35%">
        </article>
    @endforeach
@endsection
