@extends('layouts.master')
@section('css')
    <style>
        .table {
            margin: auto;
            width: 50% !important;  
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <form class="form-horizontal" id="pole_form" action="{{route('pole.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Poles</legend>
                    <div class="form-group row">
                        <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Code:</label>
                        <div class="col-12 col-lg-9">
                        <input type="text" class="form-control" id="code" placeholder="Saisir le code ici" name="code" autocomplete="off" value="{{old('code')}}">
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="libelle" class="col-12 col-lg-2 text-right control-label col-form-label">Libellé:</label>
                        <div class="col-12 col-lg-9">
                            <input type="text" class="form-control" id="libelle" placeholder="Saisir le libellé ici" name="libelle" autocomplete="off" value="{{old('libelle')}}">
                            <span class="text-danger">{{ $errors->first('libelle') }}</span>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-lg btn-primary text-center"><i class="fas fa-plus"></i> Ajouter</button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form><br>
            @if ($poles->isNotEmpty())
                <h2 class="text-center">Natures dépense enregistrées</h2>
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th >Code</th>
                            <th >Libellé</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($poles as $item)
                            <tr>
                                <td>{{$item->code}}</td>
                                <td>{{$item->libelle}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="{{'#agent'.$item->id}}" data-backdrop="static"> <i class="fas fa-edit"></i> Modifier </button>
                                    @include('parametres.modals.pole_modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Aucun pole enregistré!</h3>
            @endif
            <div class="row mt-2 mb-2">
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                <a href="{{route('dashboard')}}" class="btn btn-lg btn-warning">Fermer</a>
                </div>
                <div class="col-lg-5"></div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#pole_form").length > 0) {
            $("#pole_form").validate({
        
                rules: {
                    code: {
                        required: true,
                        unique: true,
                    },

                    libelle: {
                        required: true,
                        unique: true,
                    },
                },
                messages: {
        
                    code: {
                        required: "Le code est obligatoire",
                        unique: "Le code ne doit pas être dupliqué"
                    },

                    libelle: {
                        required: "Le libellé est obligatoire",
                    },
                },
            });
        } 
    });
</script>
@endsection