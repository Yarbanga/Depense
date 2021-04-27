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
            @if ($appros->isNotEmpty())
                <h2 class="text-center">Liste des approvisionnements à valider</h2>
                <table class="table table-striped mb-2">
                    <thead>
                        <tr>
                            <th >Type </th>
                            <th >Montant</th>
                            <th >Date</th>
                            <th >Source</th>
                            <th >Solde</th>
                            <th >statut</th>
                            <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appros as $item)
                            <tr>
                                <td>{{$item->libelle}}</td>
                                <td>{{$item->montantAppro}}</td>
                                <td>{{$item->dateAppro}}</td>
                                <td>{{$item->source}}</td>
                                <td>{{$item->nouveauSolde}}</td>
                                <td>
                                    @switch($item->statut)
                                        @case(0)
                                            En cours...
                                            @break
                                        @case(1)
                                            Validée
                                            @break
                                        @default
                                            Rejetée
                                    @endswitch
                                    {{-- {{$item->nouveauSolde}} --}}
                                </td>
                                <td>
                                    <a href="{{route('approvisionnement.show', $item->id)}}" class="btn btn-sm btn-success"> <i class="fas fa-eye"></i> Détails </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class="text-center">Aucune dépense invalide trouvée!</h3>
            @endif
        </div>
    </div>
</div>
@endsection
