@extends('layouts.backend')

@section('backendcontent')


    <div class="data-table-area mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sparkline13-list">
                        <div class="sparkline13-hd">
                            <div class="main-sparkline13-hd">
                                <h1>Liste des chantiers (Projet de construction)</h1>
                            </div>
                        </div>
                        <div class="sparkline13-graph">
                            <div class="datatable-dashv1-list custom-datatable-overright">
                                <table id="myTable" class="display">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Code</th>
                                        <th>Ville</th>
                                        <th>Fin chantier</th>
                                        <th>Chef chantier</th>
                                        <th>Budget chantier</th>
                                        <th>Debut chantier</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($chantiers as $chantier)
                                    <tr>
                                        <td>{{$chantier->id}}</td>
                                        <td>{{$chantier->chantier_name}}</td>
                                        <td>{{$chantier->chantier_code}}</td>
                                        <td>{{$chantier->chantier_ville}}</td>
                                        <td>{{$chantier->chantier_time}} </td>
                                        <td>{{$chantier->chief_name}}</td>
                                        <td>{{$chantier->chantier_budget}} FCFA</td>
                                        <td>{{$chantier->chantier_debut}}</td>
                                        <td>
                                            @if($chantier->chantier_status==0) <button class="btn btn-primary">En cours</button> @else <button class="btn btn-success">Terminer</button> @endif
                                        </td>
                                        <td>
                                            <a href="{{URL::to('dashboard/view-chantier/'.$chantier->chantier_code)}}" style="color: gold"><i class="fa fa-eye"></i></a>
                                            <a href="{{URL::to('dashboard/edit-chantier/'.$chantier->id)}}" style="color: greenyellow"><i class="fa fa-edit"></i></a>
                                            <a href="{{URL::to('dashboard/delete-chantier/'.$chantier->id)}}" style="color: red"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
