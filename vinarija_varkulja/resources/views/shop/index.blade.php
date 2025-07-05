@vite(['resources/js/angular.min.js', 'resources/js/angular.js', 'resources/js/jquery-3.7.1.js', 'resources/js/cart.js',
'resources/css/shop.css'])
@extends('layouts.app')

@section('content')
<div class="container text-center" ng-app="cart_list" ng-controller="CartController" ng-init="fetchCart();">
    <br>
    <h1 class="display-6">Kupite Vino</h1>
    <br>
    <div class="row">
        <div class="col-sm-3" ng-repeat="bottle in bottles">
            <div class="card" ng-if="bottle.in_stock==1">
                <img src="/images/@{{bottle.image}}" class="card-img-top" alt="@{{bottle.name}}"  />
                <div class="card-body" >
                    <h5 class="card-title">@{{bottle.name}}</h5>
                    <p class="card-text">@{{bottle.size}}</p>
                    <button style="display: inline-block;" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#itemPreview" ng-click="itemPreview(bottle)" >
                        Dodaj u korpu
                        <svg  xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                            <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <br>
        </div>
    </div>
    <div class="fixed-bottom p-5 bg-none">
        <button class="btn btn-info float-start btn-cart position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#cart_list" aria-controls="cart_list">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                @{{carts.length}}
                <span class="visually-hidden">item number</span>
            </span>
            <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
            </svg>
        </button>
    </div>
    <div ng-include="'cart_files/cart_list.html'"></div>
    <div ng-include="'cart_files/item_preview.html'"></div>
</div>



@endsection