@extends('layouts.master')
@section('content')
    <!-- Tabs -->
    <div class="card" style="background-color: #eeeeee;">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#hist_caisse" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Historique de la caisse</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#list_appro" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Liste des approvisionnements</span></a> </li>
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#list_dep" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Listes des dépenses</span></a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabcontent-border">
            <div class="tab-pane active" id="hist_caisse" role="tabpanel">
                <div class="p-20">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date ouverture</th>
                                    <th>solde ouverture</th>
                                    <th>Date de fermeture</th>
                                    <th>Solde de fermeture</th>
                                    <th>Montant approvisionnement</th>
                                    <th>Montant dépense</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date ouverture</th>
                                    <th>solde ouverture</th>
                                    <th>Date de fermeture</th>
                                    <th>Solde de fermeture</th>
                                    <th>Montant approvisionnement</th>
                                    <th>Montant dépense</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane  p-20" id="list_appro" role="tabpanel">
                <div class="p-20">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date ouverture</th>
                                    <th>solde ouverture</th>
                                    <th>Date de fermeture</th>
                                    <th>Solde de fermeture</th>
                                    <th>Montant approvisionnement</th>
                                    <th>Montant dépense</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date ouverture</th>
                                    <th>solde ouverture</th>
                                    <th>Date de fermeture</th>
                                    <th>Solde de fermeture</th>
                                    <th>Montant approvisionnement</th>
                                    <th>Montant dépense</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-20" id="list_dep" role="tabpanel">
                <div class="p-20">
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Date ouverture</th>
                                    <th>solde ouverture</th>
                                    <th>Date de fermeture</th>
                                    <th>Solde de fermeture</th>
                                    <th>Montant approvisionnement</th>
                                    <th>Montant dépense</th>
                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Michael Bruce</td>
                                    <td>Javascript Developer</td>
                                    <td>Singapore</td>
                                    <td>29</td>
                                    <td>2011/06/27</td>
                                    <td>$183,000</td>
                                </tr>
                                <tr>
                                    <td>Donna Snider</td>
                                    <td>Customer Support</td>
                                    <td>New York</td>
                                    <td>27</td>
                                    <td>2011/01/25</td>
                                    <td>$112,000</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date ouverture</th>
                                    <th>solde ouverture</th>
                                    <th>Date de fermeture</th>
                                    <th>Solde de fermeture</th>
                                    <th>Montant approvisionnement</th>
                                    <th>Montant dépense</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection