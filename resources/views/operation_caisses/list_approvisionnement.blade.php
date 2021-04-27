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
            <div class="row mt-2">
                <div class="col-lg-6">
                    <h2 class="text-center">Liste des approvisionnements</h2>
                </div>
                <div class="col-lg-4">
                <a href="{{route('approvisionnement.get')}}" class="btn btn-primary btn-la float-right"> <i class="fas fa-plus"></i> Nouveau </a>
                </div>
                <div class="col-lg-2"></div>
            </div>
            @if ($appros->isNotEmpty())
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th >Type </th>
                            <th >Montant</th>
                            <th >Date</th>
                            <th >Source</th>
                            <th >Solde</th>
                            {{-- <th >Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appros as $item)
                            <tr>
                                <td>{{$item->libelle}}</td>
                                <td>{{$item->montantAppro}}</td>
                                <td>{{$item->dateAppro}}</td>
                                <td>
                                    @if ($item->source == 1)
                                        Banque
                                    @else
                                        Remboursement
                                    @endif
                                </td>
                                <td>{{$item->nouveauSolde}}</td>
                                {{-- <td>
                                    <a href="#" class="btn btn-sm btn-success"> <i class="fas fa-edit"></i> Modifier </a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Aucun approvisionnement valide trouvé!</h3>
            @endif
        </div>
    </div>
</div>
@endsection
