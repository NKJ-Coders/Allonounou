@extends('layouts.app')

@section('content')
    <body>
        <div class="container main-secction">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 image-section">
                    <img src="{{ asset('img/photo-couverture-facebook-.png') }}">
                </div>
                <div class="row user-left-part">
                    <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left">
                        <div class="row ">
                            <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                                <img src="<?= (!empty($profil->photo)) ? asset('img/'.$profil->photo) : "https://www.jamf.com/jamf-nation/img/default-avatars/generic-user-purple.png" ; ?>" class="rounded-circle">
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                                <?php if (empty($profil)) { ?>
                                <a id="btn-contact" class="btn btn-success btn-block follow" href="{{ route('compte.modify',['compte_di'=>$compte_demandeur->id]) }}" >Modifier le compte</a>
                                <?php } ?>
                                <button style="margin-top: 15px" class="btn btn-warning btn-block">{{ (empty($profil)) ? 'En attente de creation de profil' : (($profil->statut == 1) ? '(Validé)' : (($profil->statut == 0) ? '(En attente)' : '(Rejeté)')) }}</button>
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
                                                                        <a type="button" id="openModalLink11" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->telephone1)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectTelephone1')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Nom</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp2">{{ $compte_demandeur->nom }}</span>
                                                                        <a type="button" id="openModalLink12" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->nom)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                        @include('include/modalSelectNom')
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Prenom</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp3">{{ $compte_demandeur->prenom }}</span>
                                                                        <a type="button" id="openModalLink22" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->nom)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectPrenom')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>date Naissance</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp4">{{ $compte_demandeur->date_nais }}</span>
                                                                        <a type="button" id="openModalLink13" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->date_nais)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Situation matrimoniale</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp5">{{ $compte_demandeur->situation_matrimoniale }}</span>
                                                                        <a type="button" id="openModalLink14" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->situation_matrimoniale)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectMatrimoniale')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Profesion</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp6">{{ $compte_demandeur->metier }}</span>
                                                                        <a type="button" id="openModalLink15" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->metier)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectProfesion')
                                                                </div>
                                                    </div>
                                                    <div role="tabpanel" class="tab-pane fade" id="buzz">
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone 2</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp7">{{ $compte_demandeur->telephone2 }}</span>
                                                                        <a type="button" id="openModalLink16" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->telephone2)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectTelephone2')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>telephone 3</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp8">{{ $compte_demandeur->telephone3 }}</span>
                                                                        <a type="button" id="openModalLink17" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->telephone3)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectTelephone3')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Date d'arret du dernier metier</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp9">{{ $compte_demandeur->date_arret_dernier_metier }}</span>
                                                                        <a type="button" id="openModalLink18" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->date_arret_dernier_metier)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectDatemetier')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Age du dernier enfant</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp10">{{ $compte_demandeur->age_dernier_enfant }}</span>
                                                                        <a type="button" id="openModalLink19" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->age_dernier_enfant)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectAge')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Niveau d'etude</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp11">{{ $compte_demandeur->niveau_etude }}</span>
                                                                        <a type="button" id="openModalLink20" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->niveau_etude)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectEtude')
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Langue</label>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <span id="sp12">{{ $compte_demandeur->langue }}</span>
                                                                        <a type="button" id="openModalLink21" class="btn default btn-outline el-link" title="Modifier"><?= (empty($compte_demandeur->langue)) ? '<button class="btn btn-warning btn-block">editer</button>' : '<i class="fa fa-edit"></i>' ; ?></i></a>
                                                                    </div>
                                                                    @include('include/modalSelectLangue')
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
                for (let i = 1; i < 12; i++) {
                    $("#openModalLink11").click(function() {
                    $('#tel1').modal('show');
                    });
                    $("#closeModalBtn2").click(function() {
                    $('#nom_mere').modal('hide');
                    });
                    $("#openModalLink12").click(function() {
                    $('#nom').modal('show');
                    });
                    $("#closeModalBtn1").click(function() {
                    $('#nom_pere').modal('hide');
                    });

                    $("#openModalLink14").click(function() {
                    $('#situation_matrimoniale').modal('show');
                    });
                    $("#closeModalBtn3").click(function() {
                    $('#lieu_nais').modal('hide');
                    });

                    $("#openModalLink15").click(function() {
                    $('#metier').modal('show');
                    });
                    $("#openModalLink16").click(function() {
                    $('#tel2').modal('show');
                    });
                    $("#openModalLink17").click(function() {
                    $('#tel3').modal('show');
                    });
                    $("#openModalLink18").click(function() {
                    $('#datemetier').modal('show');
                    });
                    $("#closeModalBtn3").click(function() {
                    $('#lieu_nais').modal('hide');
                    });

                    $("#openModalLink19").click(function() {
                    $('#age_enfant').modal('show');
                    });

                    $("#openModalLink20").click(function() {
                    $('#niveau_etude').modal('show');
                    });
                    $("#openModalLink21").click(function() {
                    $('#langue').modal('show');
                    });
                    $("#openModalLink22").click(function() {
                    $('#prenom').modal('show');
                    });
                    $('.demandeur-form'+i).submit(function(e){
                        e.preventDefault();
                        var _token = $('input[name=_token]').val();
                        var postdata = $('.demandeur-form'+i).serialize();
                        // alert(postdata) ;
                        $.ajax({
                            type: 'POST',
                            url: '{{ route("update") }}',
                            data: postdata,
                            dataType: 'json',
                            success: function(result) {
                                // alert(result.nom);
                                // console.log(result.nom);
                                $('#nom').modal('hide');
                                $("#sp2").text(result.nom);

                                $('#prenom').modal('hide');
                                $("#sp3").text(result.prenom);

                                $('#situation_matrimoniale').modal('hide');
                                $("#sp5").text(result.situation_matrimoniale);

                                $('#metier').modal('hide');
                                $("#sp6").text(result.metier);

                                $('#tel2').modal('hide');
                                $("#sp7").text(result.telephone2);

                                $('#tel3').modal('hide');
                                $("#sp8").text(result.telephone3);

                                $('#datemetier').modal('hide');
                                $("#sp9").text(result.date_arret_dernier_metier);

                                $('#age_enfant').modal('hide');
                                $("#sp10").text(result.age_dernier_enfant);

                                $('#niveau_etude').modal('hide');
                                $("#sp11").text(result.niveau_etude);

                                $('#langue').modal('hide');
                                $("#sp12").text(result.langue);
                                // $("#nom").hide(function(){
                                //     $("#sp1").text(result.nom_pere);
                                // });
                                // $("#lieu_nais").hide(function(){
                                //     $("#sp3").text(result.lieu_nais);
                                // });
                                // $("#nbre_enfant").hide(function(){
                                //     $("#sp4").text(result.nbre_enfant);
                                // });
                                // $("#personne_proche1").hide(function(){
                                //     $("#sp5").text(result.personne_proche1);
                                // });
                                // $("#personne_proche2").hide(function(){
                                //     $("#sp6").text(result.personne_proche2);
                                // });
                                // $("#personne_proche3").hide(function(){
                                //     $("#sp7").text(result.personne_proche3);
                                // });
                                // $("#personne_proche4").hide(function(){
                                //     $("#sp8").text(result.personne_proche4);
                                // });
                                // $("#telephone_personne_proche1").hide(function(){
                                //     $("#sp9").text(result.telephone_personne_proche1);
                                // });
                                // $("#telephone_personne_proche2").hide(function(){
                                //     $("#sp10").text(result.telephone_personne_proche2);
                                // });
                                // $("#telephone_personne_proche3").hide(function(){
                                //     $("#sp11").text(result.telephone_personne_proche3);
                                // });
                                // $("#telephone_personne_proche4").hide(function(){
                                //     $("#sp12").text(result.telephone_personne_proche4);
                                // });
                                // $("#handicape_moteur").hide(function(){
                                //     $("#sp13").text(result.handicape_moteur);
                                // });
                                // $("#handicape_visuel").hide(function(){
                                //     $("#sp14").text(result.handicape_visuel);
                                // });
                                // $("#handicape_des_mains").hide(function(){
                                //     $("#sp15").text(result.handicape_des_mains);
                                // });

                            }
                        });
                    })

                }
             })
            </script>

    </body>
@endsection
