@vite(['resources/js/angular.min.js', 'resources/js/angular.js', 'resources/js/jquery-3.7.1.js', 'resources/js/reciept.js'])
@extends('layouts.admin')
@section('content')
<div ng-app="reciept_list" ng-controller="RecieptController">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col col-md-11"><b>Vino Podaci</b></div>
               <!-- <div class="col col-md-5">
                    <button ng-click="formToggle()" class="btn btn-success btn-sm float-end">Dodaj Novo Vino</button> 
                </div>-->
                <div class="col col-sm-1 col-auto">
                    <button ng-click="refresh()" class="btn btn-light btn-sm float-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                        </svg>
                    </button> 
                </div>
            </div>
        </div>
        <div class="card-body"  id="reciept_list">
            <div class="message-box" style="display: none">
                <div class="alert alert-success"></div>
                <div class="alert alert-danger"></div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Korisnik</th>
                        <th scope="col">Artikli</th>
                        <th scope="col">Ukupno</th>
                        <th scope="col">Status</th>
                        <th scope="col">Datum</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr ng-if="receipts.length != 0" ng-repeat="receipt in receipts">
                        <td>@{{ receipt.id }}</td>
                        <td ng-repeat="user in users | filter : {id: receipt.user_id}">@{{user.id}} | @{{ user.name }}</td>
                        <td>
                            <div ng-repeat="article in articles | filter : {reciept_id: receipt.id}">
                                <div ng-repeat="bottle in bottles | filter : {id: article.bottle_id}">
                                    @{{bottle.name}}, x@{{article.bottle_quantity}} 
                                </div>
                            </div>
                        </td>
                        <td>@{{ receipt.total_RSD }}</td>
                        <td ng-repeat="status in statuses | filter : {id: receipt.status}">
                            <div ng-if="status.id == 1">
                                @{{ status.name }} <span class="text-info">&#9679<!--&#9679--></span>
                            </div>
                            <div ng-if="status.id == 2">
                                @{{ status.name }} <span class="text-success">&#9679<!--&#9679--></span>
                            </div>
                            <div ng-if="status.id == 3">
                                @{{ status.name }} <span class="text-danger">&#9679<!--&#9679--></span>
                            </div>
                        </td>
                        <td>
                            @{{ receipt.created_at | date:'dd/MM/yyyy'}}
                        </td>
                        <td>
                            
                            <button class="btn btn-primary" ng-click='editInfo(receipt)'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                                Promeni Status
                            </button>
                           <!-- <button class="btn btn-danger" ng-click='deleteInfo(receipt)'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                Briši
                            </button>-->
                            
                        </td>
                    </tr>
                    
                    <tr ng-if="wines.length == 0">
                        <td colspan="5" class="text-center">Nema podataka</td>
                    </tr>
                    
                </tbody>
            </table>
            
        </div>
    </div>
   <!-- <div ng-include="'wine_files/create_wine.html'"></div>-->
    <div ng-include="'reciept_files/edit_reciept.html'"></div>
</div>

@endsection