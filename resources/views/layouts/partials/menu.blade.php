        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Tableau de bord</span></a></li>
                        @if ($statutCaisse->etat == 0)
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('ouverture_caisse.get')}}" aria-expanded="false"><i class="fas fa-folder-open"></i><span class="hide-menu">Ouvrir la caisse</span></a></li>
                        @else
                            <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('fermeture_caisse.get')}}" aria-expanded="false"><i class="fas fa-window-close"></i><span class="hide-menu">Fermer la caisse</span></a></li>
                        @endif
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Approvisionnements </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('approvisionnement.list')}}" class="sidebar-link"><i class="fas fa-list-ul"></i><span class="hide-menu"> Liste des approvisionnements </span></a></li>
                                <li class="sidebar-item"><a href="{{route('approvisionnement.get')}}" class="sidebar-link"><i class="fas fa-plus"></i><span class="hide-menu"> Ajouter un approvisionnement </span></a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Dépenses </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="{{route('depense.list')}}" class="sidebar-link"><i class="fas fa-list-ul"></i><span class="hide-menu"> Liste des dépenses </span></a></li>
                                <li class="sidebar-item"><a href="{{route('depense.get')}}" class="sidebar-link"><i class="fas fa-plus"></i><span class="hide-menu"> Saisir des pièces </span></a></li>
                            </ul>
                        </li>
                        @if(checkRole(['admin','superadmin']))
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-check-square"></i><span class="hide-menu">Validations </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{route('approvisionnement_to_validate.get')}}" class="sidebar-link"><i class="fas fa-building"></i><span class="hide-menu"> Approvisionnement </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('depense_to_validate.get')}}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Saisie de dépenses </span></a></li>
                                </ul>
                            </li>
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-cog"></i><span class="hide-menu">Paramètres </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="{{route('project.get')}}" class="sidebar-link"><i class="fas fa-building"></i><span class="hide-menu"> Projets </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('nature_depense.get')}}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Types de dépenses </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('type_approvisionnement.get')}}" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Types d'approvisionnement </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('pole.get')}}" class="sidebar-link"><i class="fas fa-map"></i><span class="hide-menu"> Poles </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('agent.get')}}" class="sidebar-link"><i class="fas fa-venus"></i><span class="hide-menu"> Agents </span></a></li>
                                    <li class="sidebar-item"><a href="{{route('user.get')}}" class="sidebar-link"><i class="fas fa-users"></i><span class="hide-menu"> Utilisateurs </span></a></li>
                                    <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-building"></i><span class="hide-menu"> Changer le mot de passe </span></a></li>
                                </ul>
                            </li>
                        @endif
                        @if (checkRole(['user']))
                            <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-cog"></i><span class="hide-menu">Paramètres </span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li class="sidebar-item"><a href="#" class="sidebar-link"><i class="fas fa-building"></i><span class="hide-menu"> Changer le mot de passe </span></a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->