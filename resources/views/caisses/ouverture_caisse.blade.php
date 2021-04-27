@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <form class="form-horizontal" id="ouverture_caisse" action="{{route('caisse.ouvrir')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Ouverture de la caisse</legend>
                    <div class="form-group row">
                        <label for="dateOuverture" class="col-12 col-lg-2 text-right control-label col-form-label">Date d'ouverture:</label>
                        <div class="col-12 col-lg-8">
                            <input type="date" class="form-control date-inputmask" id="date-mask" placeholder="Saisir la date d'ouverture" name="dateOuverture">
                            <span class="text-danger">{{ $errors->first('dateOuverture') }}</span>
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label for="soldeOuverture" class="col-12 col-lg-2 text-right control-label col-form-label">Solde ouverture:</label>
                        <div class="col-12 col-lg-8">
                        <input type="number" class="form-control" id="soldeOuverture" placeholder="Saisir le solde à l'ouverture" name="soldeOuverture" value="{{$statutCaisse->solde}}">
                            <p class="text-danger">{{ $errors->first('soldeOuverture') }}</p>
                        </div>
                    </div><br>
                    <div class="form-group row">
                        <label for="code" class="col-12 col-lg-2 text-right control-label col-form-label">Caisier (ère):</label>
                        <div class="col-12 col-lg-8">
                            <input type="text" class="form-control" id="code" placeholder="Nom de l'agent" name="code" value="{{Auth::user()->username}}" disabled>
                            <span class="text-danger">{{ $errors->first('code') }}</span>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-lg btn-primary text-center"><i class="fas fa-folder-open"></i> Ouvrir</button>
                                </div>
                                <div class="col-lg-2">
                                    <button type="reset" class="btn btn-lg btn-warning text-center"><i class="fas fa-window-close"></i> Annuler</button>
                                </div>
                                <div class="col-lg-1">
                                </div>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        if ($("#ouverture_caisse").length > 0) {
            $("#ouverture_caisse").validate({
        
                rules: {
                    dateOuverture: {
                        required: true,
                    },
        
                    soldeOuverture: {
                        required: true,
                    },
        
                    nom: {
                        required: true,
                        maxlength: 50,
                    },
                },
                messages: {
        
                    dateOuverture: {
                        required: "Vous devez saisir la date d'ouverture de la caisse",
                    },
        
                    soldeOuverture: {
                        required: "Vous devez saisir le solde à l'ouverture de la caisse",
                    },
        
                    nom: {
                        required: "Vous devez saisir le nom de la caissière",
                        maxlength: "Le nom de la caissière a au plus 50 caractères",
                    },
        
                },
            });
        } 
    });
</script>
@endsection