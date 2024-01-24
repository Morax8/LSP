@extends('layout.main')
@section('title', 'Pelayanan Pengaduan Masyarakat')

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
        <div class="intro-heading">Masyarakat </div>
    </div>

</div>
<div class="container">
    <h1 class="text-center">Selamat Datang di Webstie Pengaduan Masyarakat</h1>
    <div class="row text-center mt-4 mb-5">
        <div class="col-md-4">
            <i class="fa-solid fa-pencil"></i>
            <label>Website ini dibuat untuk memudahkan masyarakat dalam menyampaikan aspirasi kepada pemerintah
                setempat</label>
        </div>
        <div class="col-md-4">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <label>Website ini juga dapat digunakan untuk melihat histori aspirasi yang telah disampaikan oleh
                masyarakat
            </label>
        </div>
        <div class="col-md-4">
            <i class="fa-solid fa-images"></i>
            <label>Website ini juga dapat digunakan untuk melihat galeri foto yang telah disediakan oleh pemerintah
                setempat</label>
        </div>
    </div>
</div>

<style>
    .carousel-control {
        display: none;
    }

    #hero-carousel {
        position: relative;
    }

    .hero-header {
        background-size: cover;
        background-position: center;
        height: 75vh;
    }

    .carousel-container {
        position: relative;
    }

    .intro-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }

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