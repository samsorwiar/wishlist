@extends('frontend.layout')
@extends('frontend.header')
@section('title')
    Home
@endsection

<style>
    h1 {font-size: 50px; color: #0e8435; text-align: center;}
    p {font-size: 25px; text-align: center; width: 50%; margin: auto; color: #0e8435}
    img {display: flex; margin: auto}
</style>

@section('content')
    <h1 style="margin-top: 50px">Welcome</h1>

    <img src="https://www.thechristmastreeproject.org/wp-content/uploads/2021/02/favicon.png" alt="tree">

    <p> Lorem Ipsum is slechts een proeftekst uit het drukkerij- en zetterijwezen. Lorem Ipsum is de standaard proeftekst
        in deze bedrijfstak sinds de 16e eeuw, toen een onbekende drukker een zethaak met
        letters nam en ze door elkaar husselde om een font-catalogus te maken.
    </p>
@endsection
