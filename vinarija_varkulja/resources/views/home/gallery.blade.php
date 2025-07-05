@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <h1 class="display-2 page-header">Galerija</h1>
    <hr class="divider">
    <div id="carouselExample" class="carousel slide carousel-fade">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6" aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7" aria-label="Slide 8"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/home/carousel/ulaz1.jpg" class="d-block w-100" alt="ulaz1" >
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ulaz</h5>
                    <p>Ulaz za naš vinograd i našu vinariju</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home/carousel/podrum3.jpg" class="d-block w-100" alt="podrum3.jpg" >
                <div class="carousel-caption d-none d-md-block">
                    <h5>Podrumi</h5>
                    <p>Pogled na podrume gde se naša vina prave</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home/carousel/podrum6.jpg" class="d-block w-100" alt="podrum6.jpg" >
                <div class="carousel-caption d-none d-md-block">
                    <h5>Garaža</h5>
                    <p>Mesto za našeg pudara da prikupi snagu</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home/carousel/redovi1.jpg" class="d-block w-100" alt="redovi1.jpg" >
                <div class="carousel-caption d-none d-md-block">
                    <h5>Redovi čokota</h5>
                    <p>Poređenja vinova loza gde nam grožđe raste</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home/carousel/grozde4.jpg" class="d-block w-100" alt="grozde4.jpg" >
                <div class="carousel-caption d-none d-md-block" style="color:black; font-weight: 600;">
                    <h5>Cabernet Franc</h5>
                    <p>Grozdovi Cabernet Franc na čokotu</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home/carousel/grozde3.jpg" class="d-block w-100" alt="grozde3.jpg" >
                <div class="carousel-caption d-none d-md-block" style="color:black; font-weight: 600;">
                    <h5>Rajnski Rizling</h5>
                    <p>Grozdovi Rajnskog Rizlinga na čokotu</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home/carousel/grozde2.jpg" class="d-block w-100" alt="grozde2.jpg" >
                <div class="carousel-caption d-none d-md-block">
                    <h5>Italijanski Rizling</h5>
                    <p>Grozd Italijanskog Rizlinga na čokotu</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/home/carousel/vino1.jpg" class="d-block w-100" alt="vino1.jpg" >
                <div class="carousel-caption d-none d-md-block">
                    <h5>Naše vino</h5>
                    <p>Naše flaširano vino  za vinske dane</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
@endsection
