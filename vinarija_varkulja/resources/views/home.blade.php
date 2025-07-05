@extends('layouts.app')

@section('content')
@vite(['resources/js/angular.min.js', 'resources/js/angular.js', 'resources/js/jquery-3.7.1.js', 
'resources/js/bootstrap.js', 'resources/js/cart.js'])
<img src="/images/home/pocetna2.png" class="img-fluid" alt="pocetna.png" />
<div class="container text-center" style="padding-top: calc(var(--bs-gutter-x) * 0.5);
padding-bottom: calc(var(--bs-gutter-x) * 0.5); margin-top: auto; margin-bottom: auto;" 
ng-app="cart_list">
<h1 class="display-4">Naša Vina</h1>
<div class="row">
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel" >
        <div class="carousel-inner"  ng-controller="CartController">
            <div ng-repeat="bottle in home_bottles | orderBy:'id':reverse">
                <div class="carousel-item active" ng-if="bottle == home_bottles[home_bottles.length-1]">
                    <div class="card" style="width: 18rem; display: block; margin-left: auto; margin-right: auto;">
                        <!--<img src="" class="card-img-top" alt="...">style="width: 50%; display: block; margin-left: auto; margin-right: auto;"-->
                        <img src="/images/@{{bottle.image}}" class="card-img-top" alt="@{{bottle.name}}"  />
                        <div class="card-body" >
                            <h5 class="card-title">@{{bottle.name}}</h5>
                            <p class="card-text">@{{bottle.size}}</p>
                            <a href="{{ route('shop.index') }}" class="btn btn-primary">Kupite</a>
                            <!--<a href="#" class="btn btn-primary">Pokaži više</a>-->
                        </div>
                    </div>
                </div>
                <div class="carousel-item"  ng-if="bottle != home_bottles[home_bottles.length-1]">
                    <div class="card" style="width: 18rem; display: block; margin-left: auto; margin-right: auto;">
                        <!--<img src="" class="card-img-top" alt="...">-->
                        <img src="/images/@{{bottle.image}}" class="card-img-top" alt="@{{bottle.name}}"  />
                        <div class="card-body" >
                            <h5 class="card-title">@{{bottle.name}}</h5>
                            <p class="card-text">@{{bottle.size}}</p>
                            <a href="{{ route('shop.index') }}" class="btn btn-primary">Kupite</a>
                            <!--<a href="#" class="btn btn-primary">Pokaži više</a>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev" style="color:black;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
            </svg>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next" style="color:black;">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708"/>
            </svg>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
</div>
</div>
</div>
<!--<script type='text/javascript' src="resources/js/angular.min.js"></script>
    <script type='text/javascript' src="..\resources\js\jquery-3.7.1.js"></script>
    <script type='text/javascript' src="..\resources\js\bootstrap.js"></script>
    <script type='text/javascript' src="..\resources\js\bottle.js"></script>-->
    
    @endsection
    