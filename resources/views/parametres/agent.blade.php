@extends('layouts.master')
@section('css')
    <style>
        .table {
            margin: auto;
            width: 90% !important;  
        }
    </style>
@endsection
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <form class="form-horizontal" id="agent_form" action="{{route('agent.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Enregistrement d'un agent</legend>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="code" class="col-12 col-lg-4 text-right control-label col-form-label">Code:</label>
                                <div class="col-12 col-lg-8">
                                <input type="text" class="form-control" id="code" placeholder="Saisir le code" name="code" value="{{old('code')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('code') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="nom" class="col-12 col-lg-3 text-right control-label col-form-label">Nom:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="text" class="form-control" id="nom" placeholder="Saisir le nom de l'agent" name="nom" value="{{old('nom')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="prenom" class="col-12 col-lg-4 text-right control-label col-form-label">Prénom:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="text" class="form-control" id="prenom" placeholder="Saisir le prénom de l'agent" name="prenom" value="{{old('prenom')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="pole_id" class="col-12 col-lg-3 text-right control-label col-form-label">Pole:</label>
                                <div class="col-12 col-lg-8">
                                    <select name="pole_id" class="form-control" id="pole_id">
                                        <option selected>------Choisir le pole de l'agent---------</option>
                                        @foreach ($poles as $pole)
                                            <option value="{{$pole->id}}">{{$pole->libelle}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('pole_id') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-12 col-lg-2 text-right control-label col-form-label">Adresse email:</label>
                        <div class="col-12 col-lg-9">
                            <input type="email" class="form-control" id="email" placeholder="Saisir l'email ici" name="email" value="{{old('prenom')}}" autocomplete="off">
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-lg btn-primary text-center"><i class="fas fa-check"></i> Valider</button>
                                </div>
                                <div class="col-lg-2">
                                    <button type="reset" class="btn btn-lg btn-warning text-center"><i class="fas fa-window-close"></i> Annuler</button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </form><br>
            @if ($agents->isNotEmpty())
                <h2 class="text-center">Liste des agents enregistrés</h2>
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th >Code</th>
                            <th >Nom</th>
                            <th >Prénom</th>
                            <th >Pole</th>
                            <th >Adresse email</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agents as $item)
                            <tr>
                                <td>{{$item->code}}</td>
                                <td>{{$item->nom}}</td>
                                <td>{{$item->prenom}}</td>
                                <td>{{$item->libelle}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="{{'#agent'.$item->id}}" data-backdrop="static"> <i class="fas fa-edit"></i> Modifier </button>
                                    @include('parametres.modals.agent_modal')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Aucun agent enregistré!</h3>
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#agent_form").length > 0) {
            $("#agent_form").validate({
        
                rules: {
                    code: {
                        required: true,
                        maxlength: 6,
                    },
                
                    nom: {
                        required: true,
                        maxlength: 50,
                    },

                    prenom: {
                        required: true,
                        maxlength: 50,
                    },

                    pole_id: {
                        required: true,
                        number: true,
                    },

                },
                messages: {
        
                    code: {
                        required: "Vous devez saisir le code de l'agent",
                        maxlength: "Le code de la l'agent a au plus 6 caractères"
                    },
                
                    nom: {
                        required: "Vous devez saisir le nom de la caissière",
                        maxlength: "Le nom de la l'agent a au plus 50 caractères",
                    },

                    prenom: {
                        required: "Vous devez saisir le nom de la caissière",
                        maxlength: "Le nom de l'agent a au plus 50 caractères",
                    },

                    pole_id: {
                        required: "Vous devez choisir le pole de l'agent",
                        number: "Vous devez choisir le pole de l'agent",
                    },
                    
                },
            });
        } 
    });
</script>
@endsection