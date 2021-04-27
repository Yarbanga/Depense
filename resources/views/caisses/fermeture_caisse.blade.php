@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <form class="form-horizontal" id="fermeture_caisse_form" action="{{route('caisse.fermer')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Fermeture de la caisse</legend>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="dateOuverture" class="col-12 col-lg-4 text-right control-label col-form-label">Date d'ouverture:</label>
                                <div class="col-12 col-lg-8">
                                <input type="date" class="form-control date-inputmask" id="date-mask" placeholder="Saisir la date d'ouverture" name="dateOuverture" value="{{ $dateSoldeOuv->dateOuverture}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="soldeOuverture" class="col-12 col-lg-3 text-right control-label col-form-label">Solde ouverture:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="soldeOuverture" placeholder="Saisir le solde à l'ouverture" name="soldeOuverture" value="{{ $dateSoldeOuv->soldeOuverture}}">
                                    <p class="text-danger">{{ $errors->first('soldeOuverture') }}</p>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="dateFermeture" class="col-12 col-lg-4 text-right control-label col-form-label">Date de fermeture:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="date" class="form-control date-inputmask" id="date-mask" placeholder="Saisir la date de fermeture" name="dateFermeture">
                                    <span class="text-danger">{{ $errors->first('dateFermeture') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="soldeFermeture" class="col-12 col-lg-3 text-right control-label col-form-label">Solde de fermeture:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="soldeFermeture" placeholder="Saisir le solde de fermeture" name="soldeFermeture" value="{{$soldeTheo}}">
                                    <span class="text-danger">{{ $errors->first('soldeFermeture') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="totalAppro" class="col-12 col-lg-4 text-right control-label col-form-label">Approvisionnements:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="totalAppro" placeholder="Saisir le total des approvisionnements" name="totalAppro" value="{{$totalApprov}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('totalAppro') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="totalDepense" class="col-12 col-lg-3 text-right control-label col-form-label">Depenses réalisées:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="totalDepense" placeholder="Saisir le total des depenses" name="totalDepense" value="{{$totalDep}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('totalDepense') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="soldeTheorique" class="col-12 col-lg-4 text-right control-label col-form-label">Solde théorique:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="soldeTheorique" placeholder="Saisir le solde théorique" name="soldeTheorique" value="{{$soldeTheo}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('soldeTheorique') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="soldePhysique" class="col-12 col-lg-3 text-right control-label col-form-label">Solde physique:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="soldePhysique" placeholder="Saisir le solde physique" name="soldePhysique" value="{{old('soldePhysique')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('soldePhysique') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ecart" class="col-12 col-lg-2 text-right control-label col-form-label">Ecart:</label>
                        <div class="col-12 col-lg-8">
                            <input type="number" class="form-control" id="ecart" placeholder="Saisir l'écart" name="ecart" value="{{old('ecart')}}" autocomplete="off">
                            <span class="text-danger">{{ $errors->first('ecart') }}</span>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-7">
                                </div>
                                <div class="col-lg-2">
                                    <button type="submit" class="btn btn-lg btn-primary text-center"><i class="fas fa-lock"></i> Fermer</button>
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
        if ($("#fermeture_caisse_form").length > 0) {
            $("#fermeture_caisse_form").validate({
        
                rules: {
                    dateOuverture: {
                        required: true,
                    },
                
                    soldeOuverture: {
                        required: true,
                        number: true,
                    },

                    dateFermeture: {
                        required: true,
                    },

                    soldeFermeture: {
                        required: true,
                        number: true,
                    },

                    totalAppro: {
                        required: true,
                        number: true,
                    },

                    totalDepense: {
                        required: true,
                        number: true,
                    },

                    soldeTheorique: {
                        required: true,
                        number: true,
                    },

                    soldePhysique: {
                        required: true,
                        number: true,
                    },

                    ecart: {
                        required: true,
                        number: true,
                    },

                },

                messages: {
        
                    dateOuverture: {
                        required: "La date d'ouverture est obligatoire",
                    },
                
                    soldeOuverture: {
                        required: "Le solde d'ouverture est obligatoire",
                        number: "Le solde d'ouverture doit être un nombre valide",
                    },

                    dateFermeture: {
                        required: "Vous devez saisir la date de fermeture",
                    },

                    soldeFermeture: {
                        required: "Vous devez indiquer le solde de fermeture",
                        number: "Le solde de fermeture doit être un nombre valide",
                    },

                    totalAppro: {
                        required: "Vous devez saisir le montant total des approvisionnements",
                        number: "Le montant total des approvisionnement doit être un nombre valide",
                    },

                    totalDepense: {
                        required: "Vous devez saisir le montant total des depenses",
                        number: "Le montant total des depense doit être un nombre valide",
                    },

                    soldeTheorique: {
                        required: "Vous devez saisir le solde théorique de la caisse",
                        number: "Le solde théorique de la caisse doit être un nombre valide",
                    },

                    soldePhysique: {
                        required: "Vous devez saisir le solde physique de la caisse",
                        number: "Le solde physique de la caisse doit être un nombre valide",
                    },

                    ecart: {
                        required: "Vous devez l'écart entre le solde physique et le solde théorique",
                        number: "L'écart doit être un nombre valide",
                    },
                    
                },
            });
        }
        $('#soldePhysique').change(function(){
            var soldePhysique = $(this).val()
            var soldeTheorique = $('#soldeTheorique').val()
            var ecart = Number(soldeTheorique) - Number(soldePhysique)
            $('#ecart').val(ecart)
        }); 
    });
</script>
@endsection