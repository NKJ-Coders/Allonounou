$(document).ready(function () {

    $('#form2').hide();
    $('#form3').hide();
    $('#form4').hide();
    $('#form5').hide();
    $('#form6').hide();

    // BOUTON NEXT
    $('#step1').click(function (e) {
        e.preventDefault();
        // recuperer les donnees du 1er form
        var id_poste = $('#poste option[value="' + $('#poste_input').val() + '"]').attr('id'); // id du poste selectionner

        var id_taches = new Array();
        $('.tacheGroup').each(function (i) { // parcours taches checkbox
            var val = $(this);
            if ($(this).is(':checked')) { // les taches selectionnees
                if (id_taches.length > 0) { // si tableau des id_taches pas vides
                    for (let i = 0; i < id_taches.length; i++) {
                        const taches = id_taches[i];
                        if (taches !== val.attr('name')) { // verifie si id_tache pas encore stocké dans le tableau, puis stocke si vrai
                            id_taches.push(val.attr('name'));
                        }
                    }
                } else { // sinon on insert direct l'id_tache dans le tableau
                    id_taches.push(val.attr('name'));
                }
            }
        });

        var description = $('#description').val();
        var urgent = $('input[name="urgent"]:checked').val();
        var residente = $('input[name="residente"]:checked').val();

        // check required input in form1
        if ((urgent == 1 || urgent == 0) && (residente == 1 || residente == 0) && id_taches.length > 0 && id_poste !== '') {
            $('#is-empty').attr('class', '');
            $('#is-empty').empty();
            console.log(urgent+'\n'+residente+'\n'+id_taches+'\n'+id_poste)
            $.get("/getInputByForm",
                {
                    urgent: urgent,
                    residente: residente,
                    description: (description !== '') ? description : '',
                    id_poste: id_poste,
                    id_taches: id_taches,
                    form1: 'form1'
                },
                function (res, status) {
                    if (status === 'success') {
                        $('#form1').hide();
                        $('#form2').fadeIn();
                    }
                }
            );

        } else {
            $('#is-empty').attr('class', 'col-12 col-xs-12 col-md-12 alert alert-warning text-center');
            $('#is-empty').html('<small>Veuillez remplir les champs requis!</small>');
        }
    });

    $('#step2').click(function (e) {
        e.preventDefault();
        var lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche;
        var heure_debut_lundi, heure_fin_lundi, heure_debut_mardi, heure_fin_mardi, heure_debut_mercredi, heure_fin_mercredi, heure_debut_jeudi, heure_fin_jeudi;
        var heure_debut_vendredi, heure_fin_vendredi, heure_debut_samedi, heure_fin_samedi, heure_debut_dimanche, heure_fin_dimanche;
        $('.dayInput').each(function (i) {
            if ($(this).is(':checked')) {
                var nom = $(this).attr('id');
                if ($('.heure-debut-' + nom).val() !== '' && $('.heure-fin-' + nom).val() !== '') {
                    if (nom === 'Lundi') {
                        lundi = $(this).val();
                        heure_debut_lundi = $('.heure-debut-' + nom).val();
                        heure_fin_lundi = $('.heure-fin-' + nom).val();
                    }
                    if (nom === 'Mardi') {
                        mardi = $(this).val();
                        heure_debut_mardi = $('.heure-debut-' + nom).val();
                        heure_fin_mardi = $('.heure-fin-' + nom).val();
                    }
                    if (nom === 'Mercredi') {
                        mercredi = $(this).val();
                        heure_debut_mercredi = $('.heure-debut-' + nom).val();
                        heure_fin_mercredi = $('.heure-fin-' + nom).val();
                    }
                    if (nom === 'Jeudi') {
                        jeudi = $(this).val();
                        heure_debut_jeudi = $('.heure-debut-' + nom).val();
                        heure_fin_jeudi = $('.heure-fin-' + nom).val();
                    }
                    if (nom === 'Vendredi') {
                        vendredi = $(this).val();
                        heure_debut_vendredi = $('.heure-debut-' + nom).val();
                        heure_fin_vendredi = $('.heure-fin-' + nom).val();
                    }
                    if (nom === 'Samedi') {
                        samedi = $(this).val();
                        heure_debut_samedi = $('.heure-debut-' + nom).val();
                        heure_fin_samedi = $('.heure-fin-' + nom).val();
                    }
                    if (nom === 'Dimanche') {
                        dimanche = $(this).val();
                        heure_debut_dimanche = $('.heure-debut-' + nom).val();
                        heure_fin_dimanche = $('.heure-fin-' + nom).val();
                    }

                    $.get("/getInputByForm",
                        {
                            lundi: (lundi != '') ? lundi : '',
                            mardi: (mardi != '') ? mardi : '',
                            mercredi: (mercredi != '') ? mercredi : '',
                            jeudi: (jeudi != '') ? jeudi : '',
                            vendredi: (vendredi != '') ? vendredi : '',
                            samedi: (samedi != '') ? samedi : '',
                            dimanche: (dimanche != '') ? dimanche : '',
                            heure_debut_lundi: heure_debut_lundi,
                            heure_fin_lundi: heure_fin_lundi,
                            heure_debut_mardi: heure_debut_mardi,
                            heure_fin_mardi: heure_fin_mardi,
                            heure_debut_mercredi: heure_debut_mercredi,
                            heure_fin_mercredi: heure_fin_mercredi,
                            heure_debut_jeudi: heure_debut_jeudi,
                            heure_fin_jeudi: heure_fin_jeudi,
                            heure_debut_vendredi: heure_debut_vendredi,
                            heure_fin_vendredi: heure_fin_vendredi,
                            heure_debut_samedi: heure_debut_samedi,
                            heure_fin_samedi: heure_fin_samedi,
                            heure_debut_dimanche: heure_debut_dimanche,
                            heure_fin_dimanche: heure_fin_dimanche,
                            form2: 'form2',
                        },
                        function (res, status) {
                            if (status === 'success') {
                                $('#form2').hide();
                                $('#form3').fadeIn();
                            }
                        }
                    );
                }
            }
        // var lundi, mardi, mercredi, jeudi, vendredi, samedi, dimanche;
        // var heure_debut_lundi, heure_fin_lundi, heure_debut_mardi, heure_fin_mardi, heure_debut_mercredi, heure_fin_mercredi, heure_debut_jeudi, heure_fin_jeudi;
        // var heure_debut_vendredi, heure_fin_vendredi, heure_debut_samedi, heure_fin_samedi, heure_debut_dimanche, heure_fin_dimanche;
        // $('.dayInput').each(function (i) {
        //     if ($(this).is(':checked')) {
        //         nom = $(this).attr('id');
                // if (nom === 'Lundi') {
                //     lundi = $(this).val();
                //     heure_debut_lundi = $('.heure-debut-' + nom).val();
                //     heure_fin_lundi = $('.heure-fin-' + nom).val();
                // }
                // if (nom === 'Mardi') {
                //     mardi = $(this).val();
                //     heure_debut_mardi = $('.heure-debut-' + nom).val();
                //     heure_fin_mardi = $('.heure-fin-' + nom).val();
                // }
                // if (nom === 'Mercredi') {
                //     mercredi = $(this).val();
                //     heure_debut_mercredi = $('.heure-debut-' + nom).val();
                //     heure_fin_mercredi = $('.heure-fin-' + nom).val();
                // }
                // if (nom === 'Jeudi') {
                //     jeudi = $(this).val();
                //     heure_debut_jeudi = $('.heure-debut-' + nom).val();
                //     heure_fin_jeudi = $('.heure-fin-' + nom).val();
                // }
                // if (nom === 'Vendredi') {
                //     vendredi = $(this).val();
                //     heure_debut_vendredi = $('.heure-debut-' + nom).val();
                //     heure_fin_vendredi = $('.heure-fin-' + nom).val();
                // }
                // if (nom === 'Samedi') {
                //     samedi = $(this).val();
                //     heure_debut_samedi = $('.heure-debut-' + nom).val();
                //     heure_fin_samedi = $('.heure-fin-' + nom).val();
                // }
                // if (nom === 'Dimanche') {
                //     dimanche = $(this).val();
                //     heure_debut_dimanche = $('.heure-debut-' + nom).val();
                //     heure_fin_dimanche = $('.heure-fin-' + nom).val();
                // }

        //     }
        // });

        // $.get("/getInputByForm",
        //     {
        //         lundi: (lundi != '') ? lundi : '',
        //         mardi: (mardi != '') ? mardi : '',
        //         mercredi: (mercredi != '') ? mercredi : '',
        //         jeudi: (jeudi != '') ? jeudi : '',
        //         vendredi: (vendredi != '') ? vendredi : '',
        //         samedi: (samedi != '') ? samedi : '',
        //         dimanche: (dimanche != '') ? dimanche : '',
        //         heure_debut_lundi: heure_debut_lundi,
        //         heure_fin_lundi: heure_fin_lundi,
        //         heure_debut_mardi: heure_debut_mardi,
        //         heure_fin_mardi: heure_fin_mardi,
        //         heure_debut_mercredi: heure_debut_mercredi,
        //         heure_fin_mercredi: heure_fin_mercredi,
        //         heure_debut_jeudi: heure_debut_jeudi,
        //         heure_fin_jeudi: heure_fin_jeudi,
        //         heure_debut_vendredi: heure_debut_vendredi,
        //         heure_fin_vendredi: heure_fin_vendredi,
        //         heure_debut_samedi: heure_debut_samedi,
        //         heure_fin_samedi: heure_fin_samedi,
        //         heure_debut_dimanche: heure_debut_dimanche,
        //         heure_fin_dimanche: heure_fin_dimanche,
        //         form2: 'form2',
        //     },
        //     function (res, status) {
        //         if (status === 'success') {
        //             $('#form2').hide();
        //             $('#form3').fadeIn();
        //         }
        //     }
        // );


        //     }
        });
    });

    $('#step3').click(function (e) {
        e.preventDefault();

        var type_maison, piece, taille_maison;
        // $('#type_maisons').change(function () {
            type_maison = $('#type_maisons').val();
        // });
        // $('#pieces').change(function () {
            piece = $('#pieces').val();
        // });
        // $('#taille_maisons').change(function () {
            taille_maison = $('#taille_maisons').val();
        // });

        if (type_maison !== '' && piece !== '' && taille_maison !== '') {
            $.get("/getInputByForm",
                {
                    type_maison: type_maison,
                    piece: piece,
                    taille_maison: taille_maison,
                    form3: 'form3'
                },
                function (res, status) {
                    $('#form3').hide();
                    $('#form4').fadeIn();
                }
            );
        }

    });

    $('#step4').click(function (e) {
        e.preventDefault();
        var nbre_enfant = $('#nbre_enfant').val();
        var age_enfant = new Array();
        $('.age_enfant').each(function (i) {
            age_enfant.push($(this).val());
        });
        console.log(age_enfant)
        var enCharge = $('input[name="enCharge"]:checked').val();

        if (enCharge == 0 || enCharge == 1) {
            $('#is-empty').attr('class', '');
            $('#is-empty').empty();

            $.get("/getInputByForm",
                {
                    enCharge: enCharge,
                    nbre_enfant: nbre_enfant,
                    age_enfant: (age_enfant.length > 0) ? age_enfant : [],
                    form4: 'form4'
                },
                function (res, status) {
                    if(status === 'success') {
                        $('#form4').hide();
                        $('#form5').fadeIn();
                    }
                }
            );

        } else {
            $('#is-empty').attr('class', 'col-12 col-xs-12 col-md-12 alert alert-warning text-center');
            $('#is-empty').html('<small>Veuillez remplir les champs requis!</small>');
        }

    });

    $('#step5').click(function (e) {
        // e.preventDefault();
        var id_localisation = $('#search_zone option[value="'+ $('#zone').val() +'"]').attr('id');
        if (id_localisation !== '') {
            $('#is-empty').attr('class', '');
            $('#is-empty').empty();

            $.get("/getInputByForm",
                {
                    id_localisation: id_localisation,
                    form5: 'form5'
                },
                function (res, status) {
                    // if(status === 'success') {
                    //     $('#form5').hide();
                    //     $('#form6').fadeIn();
                    // }
                }
            );

        } else {
            $('#is-empty').attr('class', 'col-12 col-xs-12 col-md-12 alert alert-warning text-center');
            $('#is-empty').html('<small>Veuillez remplir les champs requis!</small>');
        }

    });

    // $('#final').click(function (e) {
    //     e.preventDefault();
    //     var salaire = parseInt($('input[name="salaire"]').val(), 10);
    //     if (salaire >= 36500) {
    //         // $('#checkPrix').html('<span class="text-success fa fa-check"></span> Accepté...');
    //         $(this).submit();
    //     } else {
    //         $('#checkPrix').html('<span class="text-danger fa fa-remove"></span> Prix trop bas...');
    //     }
    // });



    // BOUTON PREVIEW
    $('#back1').click(function (e) {
        e.preventDefault();
        $.get("/deleteSessionForm1",
            {
                form1: 'form1',
            },
            function (res, status) {
                if (status === 'success') {
                    $('#form2').hide();
                    $('#form1').fadeIn();
                }
            }
        );

    });

    $('#back2').click(function (e) {
        e.preventDefault();
        $.get("/deleteSessionForm1",
            {
                form2: 'form2',
            },
            function (res, status) {
                if (status === 'success') {
                    $('#form3').hide();
                    $('#form2').fadeIn();
                }
            }
        );

    });

    $('#back3').click(function (e) {
        e.preventDefault();
        $.get("/deleteSessionForm1",
            {
                form3: 'form3',
            },
            function (res, status) {
                if (status === 'success') {
                    $('#form4').hide();
                    $('#form3').fadeIn();
                }
            }
        );
    });

    $('#back4').click(function (e) {
        e.preventDefault();
        $.get("/deleteSessionForm1",
            {
                form4: 'form4',
            },
            function (res, status) {
                if (status === 'success') {
                    $('#form5').hide();
                    $('#form4').fadeIn();
                }
            }
        );
    });

    $('#back5').click(function (e) {
        e.preventDefault();
        $.get("/deleteSessionForm1",
            {
                form5: 'form5',
            },
            function (res, status) {
                // if (status === 'success') {
                //     $('#form6').hide();
                //     $('#form5').fadeIn();
                // }
            }
        );
    });

    // Tout selectionner
    $('.allUnSelect').hide();

    $('#allSelect').click(function () {
        $('.allSelect').hide();
        $('.allUnSelect').fadeIn();
        $('#allUnSelect').prop('checked', true);

        $('.hours-content').each(function (i) {
            $(this).fadeIn();
        });

        $('.dayInput').each(function (i) {
            var currentId = $(this).attr('id');
            $(this).prop('checked', true);
            // input time required=true
            $('.heure-debut-' + currentId).prop('required', true);
            $('.heure-fin-' + currentId).prop('required', true);
        });
    });

    // tout deselectionner
    $('#allUnSelect').click(function () {
        $('.allUnSelect').hide();
        $('.allSelect').fadeIn();
        $('#allSelect').prop('checked', false);

        $('.hours-content').each(function (i) {
            $(this).hide();
        });

        $('.dayInput').each(function (i) {
            var currentId = $(this).attr('id');
            $(this).prop('checked', false);
            // input time required=false
            $('.heure-debut-' + currentId).prop('required', false);
            $('.heure-fin-' + currentId).prop('required', false);
        });
    });

    // cache div heures
    $('.hours-content').each(function (i) {
        $(this).hide();
    });

    // afficher div hours if input checked
    $('.dayInput').each(function (i) {
        $(this).click(function () {
            var currentId = $(this).attr('id');

            if ($(this).is(':checked')) {
                $('.allSelect').hide();
                $('.allUnSelect').fadeIn();
                $('#allUnSelect').prop('checked', true);
                $('.' + currentId).fadeIn();
                // input time required=true
                $('.heure-debut-' + currentId).prop('required', true);
                $('.heure-fin-' + currentId).prop('required', true);
            } else {
                $('.allUnSelect').hide();
                $('.allSelect').fadeIn();
                $('#allSelect').prop('checked', false);
                $('.' + currentId).hide();
                // input time required=false
                $('.heure-debut-' + currentId).prop('required', false);
                $('.heure-fin-' + currentId).prop('required', false);
            }
        });
    });

    var tacheGroup = '';
    // recuperation des taches en fonction du poste selectionné
    $('#poste_input').on('change', function() {
        var id_poste = $('#poste option[value="'+ $(this).val() +'"]').attr('id');


        $.get("/getTaches",
            {
                id_poste: id_poste
            },
            function(response, status) {
                if(status === 'success') {
                    var result = JSON.parse(response);
                    // console.log(result);
                    $('.tache_content').empty();
                    for (var i = 0; i < result.length; i++) {
                        $('.tache_content').append('<div class="modal-body-content"><input type="checkbox" class="tacheGroup" name="'+ result[i].id +'" value="'+ result[i].nom +'" id="'+ result[i].nom +'" /><label for="'+ result[i].nom +'">'+ result[i].nom +'</label></div>');
                    }
                    // Afficher chaque tache selectionner
                    $('.tacheGroup').each(function (i) {
                        // var currentInput = $(this);
                        $(this).click(function() {

                            if ($(this).is(':checked')) {
                                var val = $(this).val();
                                $('small[id="' + val + '"]').remove();
                                $('.taches-views').append('<small id="' + val + '" class="mx-1">' + val + ' <a href="#" class="text-danger remove-sub-tache"><i class="fa fa-remove"></i></a></small>');

                                // suppr <small></small> & unchecked reference's input
                                $('.remove-sub-tache').each(function (i) {
                                    $(this).click(function (e) {
                                        e.preventDefault();
                                        var getIdSmall = $(this).parents('small').attr('id');
                                        $('input[id="' + getIdSmall + '"]').prop('checked', false);
                                        $(this).parents('small').remove();
                                    });
                                });

                            } else {
                                var val = $(this).val();
                                $('small[id="' + val + '"]').remove();
                            }

                        });

                    });

                }
            }
        );

    });

    // 4ieme formulaire
    $('#nbre_enfant').blur(function () {
        var getNbre = $(this).val();
        var nbre = parseInt(getNbre, 10);
        $('.setAge').empty();
        if (nbre <= 2) {
            for (let i = 0; i < nbre; i++) {
                $('.setAge').append('<div class="form-group col-xs-8 col-md-8"><label for="">Age de l\'enfant '+ (i+1) +'</label><input type="text" placeholder="Ex: 4 ans" class="age_enfant form-control"></div>');
            }
        } else {
            for (let i = 0; i < nbre; i++) {
                $('.setAge').append('<div class="form-group col-xs-6 col-md-6"><label for="">Age de l\'enfant '+ (i+1) +'</label><input type="text" placeholder="Ex: 4 ans" class="age_enfant form-control"></div>');
            }
        }
    });

    $('#salaire').on('keyup', function () {
        $('#checkPrix').empty();
    });
});

var button = document.querySelector('#final');
button.addEventListener('click', function (e) {
    e.preventDefault();
    var salaire = parseInt(document.querySelector('#salaire').value, 10);
    if (salaire >= 36500) {
        document.querySelector('#publier').submit();
    } else {
        let prix = document.querySelector('#checkPrix');
        prix.innerHTML = '<span class="text-danger fa fa-remove"></span> Prix trop bas...';
    }
});
