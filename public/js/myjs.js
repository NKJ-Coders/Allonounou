
$(document).ready(function(){

    $('#form_editor_nom').hide();
    $('#form_editor_telephone1').hide();
    $('#form_editor_telephone2').hide();
    $('#form_editor_telephone3').hide();
    $('#form_editor_age').hide();
    $('#form_editor_age_enfant').hide();
    $('#form_editor_metier').hide();
    $('#form_editor_dernier_metier').hide();
    $('#form_editor_etude').hide();
    $('#form_editor_situation').hide();
    $('#form_editor_langue').hide();

    $('#modify_nom').click(function(){

        $('#form_editor_nom').show();
        $('#list_nom').hide();

    });

    $('#modify_telephone1').click(function(){

        $('#form_editor_telephone1').show();
        $('#list_telephone1').hide();

    });

    $('#modify_telephone2').click(function(){

        $('#form_editor_telephone2').show();
        $('#list_telephone2').hide();

    });

    $('#modify_telephone3').click(function(){

        $('#form_editor_telephone3').show();
        $('#list_telephone3').hide();

    });

    $('#modify_age').click(function(){

        $('#form_editor_age').show();
        $('#list_age').hide();

    });

    $('#modify_age_metier').click(function(){

        $('#form_editor_age_metier').show();
        $('#list_age_metier').hide();

    });

    $('#modify_age_enfant').click(function(){

        $('#form_editor_age_enfant').show();
        $('#list_age_enfant').hide();

    });

    $('#modify_metier').click(function(){

        $('#form_editor_metier').show();
        $('#list_metier').hide();

    });

    $('#modify_etude').click(function(){

        $('#form_editor_etude').show();
        $('#list_etude').hide();

    });

    $('#modify_situation').click(function(){

        $('#form_editor_situation').show();
        $('#list_situation').hide();

    });

    $('#modify_langue').click(function(){

        $('#form_editor_langue').show();
        $('#list_langue').hide();

    });
    $('.close_editor').click(function(){

        $('#form_editor_nom').hide();
        $('#list_nom').show();
        $('#form_editor_telephone1').hide();
        $('#list_telephone1').show();
        $('#form_editor_telephone2').hide();
        $('#list_telephone2').show();
        $('#form_editor_telephone3').hide();
        $('#list_telephone3').show();
        $('#form_editor_age').hide();
        $('#list_age').show();
        $('#form_editor_age_metier').hide();
        $('#list_age_metier').show();
        $('#form_editor_age_enfant').hide();
        $('#list_age_enfant').show();
        $('#form_editor_metier').hide();
        $('#list_metier').show();
        $('#form_editor_etude').hide();
        $('#list_etude').show();
        $('#form_editor_situation').hide();
        $('#list_situation').show();
        $('#form_editor_langue').hide();
        $('#list_langue').show();


    });
});
