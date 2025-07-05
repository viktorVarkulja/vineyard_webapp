@vite(['resources/js/angular.min.js', 'resources/js/angular.js', 'resources/js/jquery-3.7.1.js', 'resources/js/cart.js',
'resources/css/shop.css'])
@extends('layouts.app')

@section('content')
<div class="container text-center" ng-app="cart_list" ng-controller="CartController" ng-init="getParameters();">
    <br>
    <h1 class="display-6">Hvala na Kupovini! <br> Vaš Račun</h1>
    <br>
    <div class="row">
        <table class="table table-bordered" ng-repeat="reciept in reciepts | filter: { id: reciept_id }">
            <tbody>
                <tr ng-repeat="user in users | filter: { id: reciept.user_id }">
                    <th scope="row">Ime i Prezime</th>
                    <td>@{{user.name}}</td>
                </tr>
                <tr ng-repeat="user in users | filter: { id: reciept.user_id }">
                    <th scope="row">Email</th>
                    <td>@{{user.email}}</td>
                </tr>
                <tr ng-if="address!='undefined'">
                    <th scope="row">Adresa</th>
                    <td>@{{address}}</td>
                </tr>
                <tr ng-if="address=='undefined'" ng-repeat="user in users | filter: { id: reciept.user_id }">
                    <th scope="row">Adresa</th>
                    <td>@{{user.address}}</td>
                </tr>
                <tr>
                    <th scope="row">Prozvodi</th>
                    <td> 
                        <div ng-repeat="article in articles | filter: { reciept_id: reciept.id }">
                            <div ng-repeat="bottle in bottles | filter: { id: article.bottle_id }">
                                <div class="row p-3">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <b>Naziv:</b> @{{bottle.name}}
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <b>Količina:</b> @{{article.bottle_quantity}}
                                            </div> 
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <b>Cena:</b> @{{article.bottle_quantity * bottle.cost_RSD}}
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-auto">
                                        <img src="/images/@{{bottle.image}}" class="rounded-2 col-md-5 float-md-end"  alt="@{{bottle.name}}" />
                                    </div> 
                                </div>
                            </div>
                        </div>
                        
                    </td>
                </tr>
                <tr>
                    <th scope="row">Ukupno</th>
                    <td style="text-align: right;">@{{reciept.total_RSD}}</td>
                </tr>
                <tr>
                    <th scope="row" colspan="2">Plaćanje pouzećem</th>
                </tr>
                <tr>
                    <th scope="row" colspan="2"><a href="/home">Vratite se na početnu</a></th>
                </tr>
            </tbody>
        </table>
    </div>
</div>


@endsection