@extends('layouts.app')

@section('content')
        <div class="container main-secction">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                    <img src="{{ asset('img/photo-couverture-facebook-.png') }}" defer>
                </div>
                <div class="row user-left-part">
                    <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                        <div class="row ">
                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                <img src="<?= (!empty($profil->photo)) ? asset('img/'.$profil->photo) : "https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" ; ?>" defer class="rounded-circle">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                <a id="btn-contact" class="btn btn-success btn-block follow" href="{{ route('profil.modify',['compte_di'=>$compte_demandeur->id]) }}" >Modifier le profil</a>
                            </div>
                            <div class="row user-detail-row">
                                <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                    <div class="border"></div>
                                    <p>FOLLOWER</p>
                                    <span>Allonounou</span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                        <div class="row profile-right-section-row">
                            <div class="col-md-12 profile-header">
                                <div class="row">
                                    <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                        <h1> {{ $compte_demandeur->nom }}</h1>
                                        <h5>{{ $compte_demandeur->metier }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                            <ul class="nav nav-tabs" role="tablist">
                                                    <li class="nav-item">
                                                    <a class="nav-link active" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i> Profil Professionnel</a>
                                                    </li>
                                                    <li class="nav-item">
                                                    <a class="nav-link" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Information détaillé</a>
                                                    </li>
                                                </ul>

                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div role="tabpanel" class="tab-pane fade show active" id="profile">
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span>{{ $compte_demandeur->telephone1 }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Nom</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $compte_demandeur->nom }} {{ $compte_demandeur->prenom }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>date Naissance</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p>{{ $profil->date_nais }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Nom du pere</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp1">{{ $profil->nom_pere }}</span>
                                                                        <a type="button" id="openModalLink1" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="nom_pere" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form1"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="detail"><strong>Modifier le nom</strong></label>
                                                                                            <input type="text" name="nom_pere" class="form-control" value="{{ $profil->nom_pere }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn1">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" >
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Nom de la mere</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp2">{{ $profil->nom_mere }}</span>
                                                                        <a type="button" id="openModalLink2" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="nom_mere" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form2"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="detail"><strong>Modifier le nom</strong></label>
                                                                                            <input type="text" name="nom_mere" class="form-control" value="{{ $profil->nom_mere }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn2">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class="closeModalBtn btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Lieu de naissance</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp3">{{ $profil->lieu_nais }}</span>
                                                                        <a type="button" id="openModalLink3" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="lieu_nais" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form3"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="detail"><strong>modifier</strong></label>
                                                                                            <input type="text" name="lieu_nais" class="form-control" value="{{ $profil->lieu_nais }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn3">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Nombre d'enfant</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp4">{{ $profil->nbre_enfant }}</span>
                                                                        <a type="button" id="openModalLink4" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="nbre_enfant" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form4"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="nbre_enfant"><strong>modifier</strong></label>
                                                                                            <input type="text" name="nbre_enfant" class="form-control" value="{{ $profil->nbre_enfant }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn4">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>personne proche1</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp5">{{ $profil->personne_proche1 }}</span>
                                                                        <a type="button" id="openModalLink5" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="personne_proche1" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form5"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="personne_proche1"><strong>detail sur l'Image</strong></label>
                                                                                            <input type="text" name="personne_proche1" class="form-control" value="{{ $profil->personne_proche1 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn5">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>personne proche2</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp6">{{ $profil->personne_proche2 }}</span>
                                                                        <a type="button" id="openModalLink6" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="personne_proche2" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form6"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="personne_proche2"><strong>modifier</strong></label>
                                                                                            <input type="text" name="personne_proche2" class="form-control" value="{{ $profil->personne_proche2 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn6">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>personne proche3</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp7">{{ $profil->personne_proche3 }}</span>
                                                                        <a type="button" id="openModalLink7" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="personne_proche3" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form7"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="personne_proche3"><strong>detail sur l'Image</strong></label>
                                                                                            <input type="text" name="personne_proche3" class="form-control" value="{{ $profil->personne_proche3 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn7">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>personne proche4</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp8">{{ $profil->personne_proche4 }}</span>
                                                                        <a type="button" id="openModalLink8" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="personne_proche4" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form8"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="personne_proche4"><strong>modifier</strong></label>
                                                                                            <input type="text" name="personne_proche4" class="form-control" value="{{ $profil->personne_proche4 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn8">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone personne proche1</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp9">{{ $profil->telephone_personne_proche1 }}</span>
                                                                        <a type="button" id="openModalLink9" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="telephone_personne_proche1" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form9"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="telephone_personne_proche1"><strong>modifier</strong></label>
                                                                                            <input type="text" name="telephone_personne_proche1" class="form-control" value="{{ $profil->telephone_personne_proche1 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn9">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone personne proche2</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp10">{{ $profil->telephone_personne_proche2 }}</span>
                                                                        <a type="button" id="openModalLink10" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="telephone_personne_proche2" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form10"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="telephone_personne_proche2"><strong>modifier</strong></label>
                                                                                            <input type="text" name="telephone_personne_proche2" class="form-control" value="{{ $profil->telephone_personne_proche2 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn10">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone personne proche3</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp11">{{ $profil->telephone_personne_proche3 }}</span>
                                                                        <a type="button" id="#openModalLink11" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="telephone_personne_proche3" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form11"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="telephone_personne_proche3"><strong>modifier</strong></label>
                                                                                            <input type="text" name="telephone_personne_proche3" class="form-control" value="{{ $compte_demandeur->telephone_personne_proche3 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn11">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone personne proche4</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp12">{{ $profil->telephone_personne_proche4 }}</span>
                                                                        <a type="button" id="openModalLink12" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="telephone_personne_proche4" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form12"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="telephone_personne_proche4"><strong>modifier</strong></label>
                                                                                            <input type="text" name="telephone_personne_proche4" class="form-control" value="{{ $profil->telephone_personne_proche4 }}">
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn12">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>handicape moteur</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp13"><?= ($profil->handicape_moteur==1) ? "Oui" : "Non" ; ?></span>
                                                                        <a type="button" id="openModalLink13" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="handicape_moteur" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form13"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="handicape_moteur"><strong>Handicape moteur ?</strong></label><br>
                                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                                <input type="radio" name="handicape_moteur" id="handicape_moteur1" class="custom-control-input" value="1" <?= ($profil->handicape_moteur == 1) ? "checked" : "" ; ?> >
                                                                                                <label for="handicape_moteur1" class="custom-control-label">Oui</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                                <input type="radio" name="handicape_moteur" id="handicape_moteur2" class="custom-control-input" value="0" <?= ($profil->handicape_moteur == 0) ? "checked" : "" ; ?> >
                                                                                                <label for="handicape_moteur2" class="custom-control-label">Non</label>
                                                                                            </div>
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn13">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>handicape visuel</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp14"><?= ($profil->handicape_visuel==1) ? "Oui" : "Non" ; ?></span>
                                                                        <a type="button" id="openModalLink14" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="handicape_visuel" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form14"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="handicape_visuel"><strong>Handicape visuel ?</strong></label><br>
                                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                                <input type="radio" name="handicape_visuel" id="handicape_visuel1" class="custom-control-input" value="1" <?= ($profil->handicape_visuel == 1) ? "checked" : "" ; ?> >
                                                                                                <label for="handicape_visuel1" style="padding-right: 10px" class="custom-control-label">Oui</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                                <input type="radio" name="handicape_visuel" id="handicape_visuel2" class="custom-control-input" value="0" <?= ($profil->handicape_visuel == 0) ? "checked" : "" ; ?> >
                                                                                                <label for="handicape_visuel2" class="custom-control-label">Non</label>
                                                                                            </div>
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn14">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>handicape des mains</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp15"><?= ($profil->handicape_des_mains==1) ? "Oui" : "Non" ; ?></span>
                                                                        <a type="button" id="openModalLink15" class="btn default btn-outline el-link" title="Modifier"><i class="fa fa-edit"></i></a>
                                                                    </div>
                                                                    <div class="modal fade" id="handicape_des_mains" role="dialog" aria-labelledby="image" aria-hidden="true">
                                                                        <div class="modal-dialog modal-md" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#18A4E5; color:#FFF">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                                        Modifier vos informations
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body" style="padding:25px 25px 25px 25px; background-color:#F0F3F4">
                                                                                    <form class="form-horizontal profil-form15"  method="POST" action="" enctype="multipart/form-data">
                                                                                        @csrf
                                                                                        <!-- Create the editor container -->
                                                                                        <div class="form-group col-12"   style="width: 100%;height:200px;margin-top: 1px">
                                                                                            <label for="handicape_des_mains"><strong>Handicape des mains ?</strong></label><br>
                                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                                <input type="radio" name="handicape_des_mains" id="handicape_des_mains1" class="custom-control-input" value="1" <?= ($profil->handicape_des_mains == 1) ? "checked" : "" ; ?> >
                                                                                                <label for="handicape_des_mains1" class="custom-control-label">Oui</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-radio custom-control-inline">
                                                                                                <input type="radio" name="handicape_des_mains" id="handicape_des_mains2" class="custom-control-input" value="0" <?= ($profil->handicape_des_mains == 0) ? "checked" : "" ; ?> >
                                                                                                <label for="handicape_des_mains2" class="custom-control-label">Non</label>
                                                                                            </div>
                                                                                            <input type="text" name="profil_di" class="form-control" value="{{ $profil->id }}" hidden>
                                                                                        </div>
                                                                                        <hr>
                                                                                        <div class="form-group col-12" >
                                                                                            <div class="col-md-8 text-right">
                                                                                                <button  type="submit" class="btn btn-md btn-outline-primary" id="closeModalBtn15">
                                                                                                        Valider
                                                                                                </button>
                                                                                                <button type="button" data-dismiss="modal" aria-label="Close" class=" close_DivFormAddPj btn btn-md btn-outline-dark" id="ts-dark">
                                                                                                    Annuler
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </div>

                                                </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(function(){
                for (let i = 1; i < 16; i++) {
                    $("#openModalLink2").click(function() {
                    $('#nom_mere').modal('show');
                    });
                    $("#closeModalBtn2").click(function() {
                    $('#nom_mere').modal('hide');
                    });
                    $("#openModalLink1").click(function() {
                    $('#nom_pere').modal('show');
                    });
                    $("#closeModalBtn1").click(function() {
                    $('#nom_pere').modal('hide');
                    });

                    $("#openModalLink3").click(function() {
                    $('#lieu_nais').modal('show');
                    });
                    $("#closeModalBtn3").click(function() {
                    $('#lieu_nais').modal('hide');
                    });

                    $("#openModalLink3").click(function() {
                    $('#lieu_nais').modal('show');
                    });
                    $("#closeModalBtn3").click(function() {
                    $('#lieu_nais').modal('hide');
                    });

                    $("#openModalLink4").click(function() {
                    $('#nbre_enfant').modal('show');
                    });
                    $("#closeModalBtn4").click(function() {
                    $('#nbre_enfant').modal('hide');
                    });

                    $("#openModalLink5").click(function() {
                    $('#personne_proche1').modal('show');
                    });
                    $("#closeModalBtn5").click(function() {
                    $('#personne_proche1').modal('hide');
                    });

                    $("#openModalLink6").click(function() {
                    $('#personne_proche2').modal('show');
                    });
                    $("#closeModalBtn6").click(function() {
                    $('#personne_proche2').modal('hide');
                    });

                    $("#openModalLink7").click(function() {
                    $('#personne_proche3').modal('show');
                    });
                    $("#closeModalBtn7").click(function() {
                    $('#personne_proche3').modal('hide');
                    });

                    $("#openModalLink8").click(function() {
                    $('#personne_proche4').modal('show');
                    });
                    $("#closeModalBtn8").click(function() {
                    $('#personne_proche4').modal('hide');
                    });

                    $("#openModalLink9").click(function() {
                    $('#telephone_personne_proche1').modal('show');
                    });
                    $("#closeModalBtn9").click(function() {
                    $('#telephone_personne_proche1').modal('hide');
                    });

                    $("#openModalLink10").click(function() {
                    $('#telephone_personne_proche2').modal('show');
                    });
                    $("#closeModalBtn10").click(function() {
                    $('#telephone_personne_proche2').modal('hide');
                    });

                    $("#openModalLink11").click(function() {
                    $('#telephone_personne_proche3').modal('show');
                    });
                    $("#closeModalBtn11").click(function() {
                    $('#telephone_personne_proche3').modal('hide');
                    });

                    $("#openModalLink12").click(function() {
                    $('#telephone_personne_proche4').modal('show');
                    });
                    $("#closeModalBtn12").click(function() {
                    $('#telephone_personne_proche4').modal('hide');
                    });

                    $("#openModalLink13").click(function() {
                    $('#handicape_moteur').modal('show');
                    });
                    $("#closeModalBtn13").click(function() {
                    $('#handicape_moteur').modal('hide');
                    });

                    $("#openModalLink14").click(function() {
                    $('#handicape_visuel').modal('show');
                    });
                    $("#closeModalBtn14").click(function() {
                    $('#handicape_visuel').modal('hide');
                    });

                    $("#openModalLink15").click(function() {
                    $('#handicape_des_mains').modal('show');
                    });
                    $("#closeModalBtn15").click(function() {
                    $('#handicape_des_mains').modal('hide');
                    });
                    $('.profil-form'+i).submit(function(e){
                        e.preventDefault();
                        var _token = $('input[name=_token]').val();
                        var postdata = $('.profil-form'+i).serialize();
                        // alert(postdata) ;
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("profil.update") }}',
                            data: postdata,
                            dataType: 'json',
                            success: function(result) {
                                // alert(result);
                                // console.log(result);
                                $("#nom_pere").hide(function(){
                                    $("#sp1").text(result.nom_pere);
                                });
                                $("#nom_mere").hide(function(){
                                    $("#sp2").text(result.nom_mere);
                                });
                                $("#lieu_nais").hide(function(){
                                    $("#sp3").text(result.lieu_nais);
                                });
                                $("#nbre_enfant").hide(function(){
                                    $("#sp4").text(result.nbre_enfant);
                                });
                                $("#personne_proche1").hide(function(){
                                    $("#sp5").text(result.personne_proche1);
                                });
                                $("#personne_proche2").hide(function(){
                                    $("#sp6").text(result.personne_proche2);
                                });
                                $("#personne_proche3").hide(function(){
                                    $("#sp7").text(result.personne_proche3);
                                });
                                $("#personne_proche4").hide(function(){
                                    $("#sp8").text(result.personne_proche4);
                                });
                                $("#telephone_personne_proche1").hide(function(){
                                    $("#sp9").text(result.telephone_personne_proche1);
                                });
                                $("#telephone_personne_proche2").hide(function(){
                                    $("#sp10").text(result.telephone_personne_proche2);
                                });
                                $("#telephone_personne_proche3").hide(function(){
                                    $("#sp11").text(result.telephone_personne_proche3);
                                });
                                $("#telephone_personne_proche4").hide(function(){
                                    $("#sp12").text(result.telephone_personne_proche4);
                                });
                                $("#handicape_moteur").hide(function(){
                                    $("#sp13").text(result.handicape_moteur);
                                });
                                $("#handicape_visuel").hide(function(){
                                    $("#sp14").text(result.handicape_visuel);
                                });
                                $("#handicape_des_mains").hide(function(){
                                    $("#sp15").text(result.handicape_des_mains);
                                });

                            }
                        });
                    })

                }
             })
            </script>
@endsection
