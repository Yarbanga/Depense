@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card">
            <form class="form-horizontal" id="depense_form" action="{{route('depense.save')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <legend>Enregistrement d'une depense</legend>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="dateSaisie" class="col-12 col-lg-4 text-right control-label col-form-label">Date de saisie:</label>
                                <div class="col-12 col-lg-8">
                                <input type="date" class="form-control date-inputmask" id="date-mask" placeholder="Saisir la date d'ouverture" name="dateSaisie" value="{{old('dateSaisie')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('dateSaisie') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="dateDepense" class="col-12 col-lg-3 text-right control-label col-form-label">Date depense:</label>
                                <div class="col-12 col-lg-8">
                                <input type="date" class="form-control date-inputmask" id="date-mask" placeholder="Saisir la date d'ouverture" name="dateDepense" value="{{old('dateDepense')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('dateDepense') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="montant" class="col-12 col-lg-4 text-right control-label col-form-label">Montant de la depense:</label>
                                <div class="col-12 col-lg-8">
                                    <input type="number" class="form-control" id="montant" placeholder="Saisir le montant de la depense" name="montant" value="{{old('montant')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('montant') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="nature_depense_id" class="col-12 col-lg-3 text-right control-label col-form-label">Nature de la depense:</label>
                                <div class="col-12 col-lg-8">
                                    <select name="nature_depense_id" class="form-control" id="nature_depense_id">
                                        <option selected>------Choisir la nature de depense---------</option>
                                        @foreach ($natureDep as $nature)
                                            <option value="{{$nature->id}}">{{$nature->designation}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('nature_depense_id') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="projet_id" class="col-12 col-lg-4 text-right control-label col-form-label">Projet:</label>
                                <div class="col-12 col-lg-8">
                                    <select name="projet_id" class="form-control" id="projet_id">
                                        <option selected value="0">------Choisir le projet---------</option>
                                        @foreach ($projets as $projet)
                                            <option value="{{$projet->id}}">{{$projet->intitule.' '.':'.' '.$projet->description}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('projet_id') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="nature_depense_id" class="col-12 col-lg-3 text-right control-label col-form-label">Agent:</label>
                                <div class="col-12 col-lg-8">
                                    <select name="agent_id" class="form-control" id="agent_id">
                                        <option selected value="0">------Choisir l'agent responsable---------</option>
                                        @foreach ($agents as $agent)
                                            <option value="{{$agent->id}}">{{$agent->code.' '.$agent->nom.' '.$agent->prenom}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('agent_id') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="fournisseur" class="col-12 col-lg-4 text-right control-label col-form-label">Fournisseur:</label>
                                <div class="col-12 col-lg-8">
                                <input type="text" class="form-control" id="fournisseur" placeholder="Saisir le nom du fournisseur" name="fournisseur" value="{{old('fournisseur')}}" autocomplete="off">
                                    <span class="text-danger">{{ $errors->first('fournisseur') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="form-group row">
                                <label for="description" class="col-12 col-lg-3 text-right control-label col-form-label">Description:</label>
                                <div class="col-12 col-lg-8">
                                    <textarea class="form-control" id="description" placeholder="Décrire la dépense ici" name="description" autocomplete="off">{{old('description')}}</textarea>
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-12 col-lg-2 text-right">Fichier join:</label>
                        <div class="col-lg-6">
                            <div class="custom-file db">
                                <input type="file" class="form-control-file border" id="fichier" name="fichier">
                                <span class="text-danger">{{$errors->first('fichier')}}</span>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <img id="fichier_upload_preview" src="{{asset('storage/uploads/100x100.png')}}" alt="pdf" width="100%" height="100"/>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="commentaire" class="col-12 col-lg-2 text-right control-label col-form-label">Commentaire:</label>
                        <div class="col-12 col-lg-9">
                            <textarea class="form-control" id="commentaire" placeholder="Ajouter un commentaire ici" name="commentaire" autocomplete="off">{{old('commentaire')}}</textarea>
                            <span class="text-danger">{{ $errors->first('commentaire') }}</span>
                        </div>
                    </div> --}}
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
        if ($("#depense_form").length > 0) {
            $("#depense_form").validate({
        
                rules: {
                    dateSaisie: {
                        required: true,
                    },
                
                    dateDepense: {
                        required: true,
                    },

                    montant: {
                        required: true,
                        number: true,
                    },

                    nature_depense_id: {
                        required: true,
                    },

                    fournisseur: {
                        required: true,
                    },

                    description: {
                        required: true,
                    },

                    commentaire: {
                        required: true,
                    },

                    fichier: {
                        required: true,
                        // extension: "pdf|jpg|png",
                        // maxlength: 2048,
                    },

                },

                messages: {
        
                    dateSaisie: {
                        required: "La date de saisie de la depense est obligatoire",
                    },
                
                    dateDepense: {
                        required: "La date de la depense est obligatoire",
                    },

                    montant: {
                        required: "Vous devez saisir le montant de la depense",
                        number: "Le montant de la depense doit être un nombre valide",
                    },

                    fournisseur: {
                        required: "Vous devez indiquer le nom du fournisseur",
                    },

                    description: {
                        required: "Vous devez décrire la depense",
                    },

                    Commentaire: {
                        required: "Vous devez ajouter un commentaire",
                    },

                    fichier: {
                        required: "Vous devez choisir un fichier justificatif",
                        // extension: "Le fichier doit être au format pdf, jpg ou png",
                        // maxlength: "la taille du fichier ne doit pas excéder 2 Mo",
                    },
                    
                },
            });
        }
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#fichier_upload_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#fichier").change(function () {
            readURL(this);
        }); 
    });
</script>
@endsection