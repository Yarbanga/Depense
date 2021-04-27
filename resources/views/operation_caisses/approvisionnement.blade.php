@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <form class="form-horizontal" id="approvisionnement_form" action="{{route('approvisionnement.save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Enregistrement d'un approvisionnement</legend>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="dateAppro" class="col-12 col-lg-4 text-right control-label col-form-label">Date de l'approvisionnement:</label>
                                <div class="col-12 col-lg-8">
                                <input type="date" class="form-control date-inputmask" id="date-mask" placeholder="Saisir la date d'ouverture" name="dateAppro" value="{{old('dateAppro')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('dateAppro') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="soldeOuverture" class="col-12 col-lg-3 text-right control-label col-form-label">Solde actuel:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="soldeOuverture" placeholder="Saisir le solde à l'ouverture" name="soldeOuverture" value="{{$actuelSolde}}" autocomplete="off" disabled>
                                    <span class="text-danger">{{ $errors->first('soldeOuverture') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="montantAppro" class="col-12 col-lg-4 text-right control-label col-form-label">Montant d'approvisionnement:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="montantAppro" placeholder="Saisir le montant de l'approvisionnement" name="montantAppro" value="{{old('montantAppro')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('montantAppro') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                <label for="code" class="col-12 col-lg-3 text-right control-label col-form-label">Responsable:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="text" class="form-control" id="code" placeholder="Nom de l'agent" name="code" value="{{Auth::user()->username}}" disabled>
                                    <span class="text-danger">{{ $errors->first('code') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="source" class="col-12 col-lg-4 text-right control-label col-form-label">Source de l'approvisionnement:</label>
                                <div class="col-12 col-lg-8">
                                    <select name="source" class="form-control" id="role">
                                        <option selected="">-Choisir la souce de l'approvisionnement-</option>
                                        <option value="1">Banque</option>
                                        <option value="2">Remboursement</option>
                                      </select>
                                    <span class="text-danger">{{ $errors->first('source') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="nouveauSolde" class="col-12 col-lg-3 text-right control-label col-form-label">Nouveau solde:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="nouveauSolde" placeholder="Nouveau solde ici" name="nouveauSolde" value="{{old('nouveauSolde')}}">
                                    <span class="text-danger">{{ $errors->first('nouveauSolde') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="source" class="col-12 col-lg-2 text-right control-label col-form-label">Type de l'approvisionnement:</label>
                        <div class="col-12 col-lg-8">
                            <select name="type_approvisionnement_id" class="form-control" id="type_approvisionnement_id">
                                <option selected>----Choisir le type de l'approvisionnement----</option>
                                @foreach ($typeAppro as $type)
                                <option value="{{$type->id}}">{{$type->libelle}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('type_approvisionnement_id') }}</span>
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
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#approvisionnement_form").length > 0) {
            $("#approvisionnement_form").validate({
        
                rules: {
                    dateAppro: {
                        required: true,
                    },
                
                    soldeOuverture: {
                        required: true,
                        number: true,
                    },

                    montantAppro: {
                        required: true,
                        number: true,
                    },

                    source: {
                        required: true,
                        number: true,
                    },

                    nouveauSolde: {
                        required: true,
                        number: true,
                    },

                    type_approvisionnement_id: {
                        required: true,
                        number: true,
                    },
                },
                messages: {
        
                    dateAppro: {
                        required: "Vous devez saisir la date de l'approvisionnement",
                    },
                
                    soldeOuverture: {
                        required: "Vous devez saisir le solde à l'ouverture",
                        number: "Le solde à l'ouverture doit être un mombre valide",
                    },

                    montantAppro: {
                        required: "Vous devez saisir le montant de l'approvisionnement",
                        number: "Le montant de l'approvisionnement doit être un nombre valide",
                    },

                    source: {
                        required: "Vous devez choisir la source de l'approvisionnementt",
                        number:"La source d'approvisionnement doit être un nombre valide",
                    },

                    nouveauSolde: {
                        required: "Vous devez saisir le nouveau solde",
                        number:"Le nouveau solde doit être un nombre valide"
                    },

                    type_approvisionnement_id: {
                        required: "Vous devez choisir le type d'approvisionnement",
                        number:"Le type d'approvisionnement doit être un nombre valide"
                    },
                    
                },
            });
        } 
        $('#montantAppro').change(function(){
            var montantApro = $(this).val()
            var soldeOuv = $('#soldeOuverture').val()
            var newSolde = Number(montantApro) + Number(soldeOuv)
            $('#nouveauSolde').val(newSolde)
        });
    });
</script>
@endsection