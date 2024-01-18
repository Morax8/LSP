@extends('layout.main')
@section('title', 'Formulir Aspirasi')

@section('container')

<div class="carousel-container">
    <div id="hero-carousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <!-- Slides -->
        <div class="carousel-inner">
            <div class="item">
                <div class="hero-header" style="background-image: url('{{ asset('images/space.jpg') }}')">
                </div>
            </div>

        </div>

    </div>
    <div class="intro-text text-center">
        <div class="intro-lead-in">Formulir Aspirasi </div>
        <div class="intro-heading">Warga RT 03</div>
    </div>

</div>
<div class="container">
    <h1>Welcome to our landing page!</h1>
    <p>This is a basic landing page with a navbar.</p>
</div>

<style>
    .carousel-control {
        display: none;
    }

    /* Position the carousel container */
    #hero-carousel {
        position: relative;
    }

    /* Ensure the carousel images cover the entire container */
    .hero-header {
        background-size: cover;
        background-position: center;
        height: 75vh;
        /* Adjust the height as needed */
    }

    /* Style the container for carousel and text */
    .carousel-container {
        position: relative;
    }

    /* Position the intro-text on top of the carousel images */
    .intro-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }

    /* Optional: Add padding or margin to adjust the text position */
    .intro-heading {
        margin-bottom: 20px;
    }

    .intro-text .intro-lead-in {

        font-style: italic;
        font-size: 40px;
        line-height: 40px;
        margin-bottom: 25px;
        color: #fff;

    }

    .intro-text .intro-heading {
        font-weight: 700;
        font-size: 75px;
        line-height: 75px;
        margin-bottom: 50px;
        color: #fff;
    }
</style>

@endsection