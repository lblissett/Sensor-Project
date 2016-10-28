/**
 * Created by Leo on 09.10.2016.
 */
$(document).ready(function () {

    $('[data-toggle="popover"]').popover({trigger: "hover", html: true});

    $(" tbody ").awesomeCursor('hand-o-up');

    addLoading($(".fixed-table-loading"));

    $('body').on('click', function (event) {
        if (event.target.nodeName.split(" ")[0] == "TD") {
        } else {
            removeContextMenu();
        }


    });

    $('#formdata').submit( function () {

        if (validateAll()) {
            /**
             * Button Ladeanzeige hinzufügen
             */
            var data = {
                'user': $('#username').val()
            };
            $.ajax({
                type: "POST",
                url: '/index/existsUser',
                data: data
            }).done(function (response) {
                response = jQuery.parseJSON(response);
                if (response.usererror != null) {
                    var textErr = response.usererror;
                    $('#usernamegroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
                    removeglyphicon("#glyphiusername");
                    $('#colusername').append(createglyphiconfailure("glyphiusername"));
                    var label = $('<span></span>').addClass("help-block").attr('id', 'usernamefail')
                        .text(textErr);
                    $('#colusername').append(label);
                }
                if ((response.usererror == null)){
                    var load = $('<i></i>').addClass("fa fa-spinner fa-spin");
                    $('#modalSubmit').text('Wird gespeichert ').append(load);
                    var dataa = {
                        'username': $('#username').val(),
                        'email' : $('#email').val(),
                        'password' : $('#password').val(),
                        'confirmpassword' : $('#confirmpassword').val()
                    };
                    $.ajax({
                        type: "POST",
                        url: '/index/register',
                        data: dataa
                    }).done(function () {
                        window.location.replace('/index/index');
                    });

                }
            });
        }
    return false;


    });

    $('#loginform').submit( function () {
        var testing = true;
        testing = validateUserLogin() && testing;
        testing = validatePasswordLogin() && testing;

        if (testing){
            var data = {
                'loginuser': $('#login-username').val(),
                'loginpw': $('#login-password').val()
            };
            $.ajax({
                type: "POST",
                url: '/index/testUser',
                data: data
            }).done(function (response) {
                response = jQuery.parseJSON(response);
                if (response.usererror != null) {
                    var textErr = response.usererror;
                    $('#colloginuser').removeClass("has-success has-feedback").addClass("has-error has-feedback");
                    removeglyphicon("#glyphiusernamelogin");
                    $('#colloginuser').append(createglyphiconfailure("glyphiusernamelogin"));
                    var label = $('<span></span>').addClass("help-block").attr('id', 'usernameloginfail')
                        .text(textErr);
                    $('#colloginuser').append(label);
                    $('#colpasswordlogin').removeClass("has-success has-feedback").addClass("has-error has-feedback");
                    removeglyphicon("#glyphipasswordlogin");
                    $('#colpasswordlogin').append(createglyphiconfailure("glyphipasswordlogin"));
                }
                if (response.pwerror != null) {
                    var textErr = response.pwerror;
                    $('#colpasswordlogin').removeClass("has-success has-feedback").addClass("has-error has-feedback");
                    removeglyphicon("#glyphipasswordlogin");
                    $('#colpasswordlogin').append(createglyphiconfailure("glyphipasswordlogin"));
                    var label = $('<span></span>').addClass("help-block").attr('id', 'passwordloginfail')
                        .text(textErr);
                    $('#colpasswordlogin').append(label);
                }
                if ((response.usererror == null)&&(response.pwerror == null)){
                    window.location.replace('/index/showLogin?site=home');
                }
            });
        }
        return false;

    });
// Modal Erstellen bei Buttonklick
    $('#newDataModal').off('click').on('click', function () {
        var $modal = $('#myModal');
        // ---- Modal neu initialisieren ----
        resetfieldsfeedback();
        $modal.modal();
        $('#formdata')[0].reset();

    });

    // Modal Erstellen bei Buttonklick (Sensor)
    $('#openModalSensor').off('click').on('click', function () {
        var $modal = $('#sensorModal');
        // ---- Modal neu initialisieren ----
        resetfieldsfeedbackSensor();
        setModalCreate();
        $modal.modal();
        $('#formsensor')[0].reset();

    });


    $('#formsensor').submit(function () {
        if (validateAllSensor()){
            var load = $('<i></i>').addClass("fa fa-spinner fa-spin");
            $('#modalSubmitsensor').text('Wird gespeichert ').append(load);
            return true;

        }
        else {
            return false;
        }
    });


    /**
     * Bootstrap-Table-Toolbar um eigene Funktionen erweitern
     */
    var $TOOLBAR = $('.fixed-table-toolbar').children('div:eq(1)');
    $TOOLBAR.children('button').attr('id', 'ReloadButton');
    $TOOLBAR.children('div:eq(0)').children('button').attr('id', 'ShowColumnsButton');
    $TOOLBAR.children('div:eq(1)').children('button').attr('id', 'ExportButton');

    var ref = $('<i></i>').addClass("fa fa-refresh");
    $('#ReloadButton').append(ref);

    var lis = $('<i></i>').addClass("fa fa-th-list");
    $('#ShowColumnsButton').prepend(lis);

    var loading = $('<div></div>').attr('id', 'divLoad').addClass('btn-group');
    $('#ReloadButton').wrap(loading);
    /**
     * Eingabefeld > Filterkriterien: Gestaltung ändern
     */
    $('.search').append(
        '<div class="form-group has-feedback-left" style="display:inline;">' +
        '<label class="control-label sr-only label">Suche</label>' +
        '<i class="form-control-feedback fa fa-search"></i>' +
        '</div>'
    );

    /**
     * Window-Resize-Bug beheben
     */
    $(window).resize(function () {
        $('#overviewTable').bootstrapTable('resetView');
    });

    // Daten aktualisieren bei Klick
    $('#ReloadButton').off('click').on('click', function () {
        $('#overviewTable').bootstrapTable('refresh', {silent: false});
    });

    /** Spalten einfärben bei sortieren */

    var sortName;
    $('#tabellenkontext').on('load-success.bs.table', function () {
        $('button[name="refresh"]').find('i').removeClass('fa-spin');

        $.each($('#tabellenkontext').find('.sortable'), function (i) {
            if ($(this).hasClass('asc') || $(this).hasClass('desc')) {
                setBackgroundTransparency(i + 1);
            }
        });
    }).on('sort.bs.table', function (e, name, order) {
        sortName = name;
    }).on('post-header.bs.table', function () {
        if (sortName !== undefined) {
            setBackgroundTransparency(parseInt($('*[data-field="' + sortName + '"]').val()) + 1);
        }
    });

    /** Spalten einfärben bei Seitenwechsel */
    $('#overviewTable').bootstrapTable().off('page-change.bs.table').on('page-change.bs.table', function (e, size, number) {
        $.each($('#tabellenkontext').find('.sortable'), function (i) {
            if ($(this).hasClass('asc') || $(this).hasClass('desc')) {
                setBackgroundTransparency(i + 1);
            }
        });
    });

    /**
     * Beim Klick auf Refresh das Lade-Icon anzeigen
     */
    $('button[name="refresh"]').on('click', function () {
        $(this).find('i').addClass('fa-spin');
        addLoading($(".fixed-table-loading"));
    });


    /* ---- Tabelle > Rechtsklick-Kontextmenü ---- */

        $('#overviewTable').off('mousedown').on('mousedown', function (e) {
            $(this).on('contextmenu', function () {
                return false;
            });

            if (!$(e.target).closest('#js_ContextMenu').length) {
                // ---- Kontextmenü entfernen, wenn der Fokus verloren geht ----
                removeContextMenu();
            }

            // ---- Rechtsklick behandeln ----
            if (e.which == 1) {

                // ---- Standardverhalten unterdrücken ----
                e.preventDefault();

                if ($(e.target).closest('#js_ContextMenu').length > 0) {
                    return false;
                }

                var uniqueid = $(e.target).parent().data('uniqueid'),
                    row = $('#overviewTable').bootstrapTable('getRowByUniqueId', uniqueid),
                    selectedRow = $('#overviewTable').find('tr[data-uniqueid="' + uniqueid + '"]');


                /**
                 * Kontextmenü erstellen
                 * @type {*|HTMLElement}
                 */
                var ul = $([
                    '<div id="js_ContextMenu" class="open" data-unique-rowid="' + uniqueid + '">',
                    '<ul class="dropdown-menu" role="menu">',
                    '<li role="presentation" class="dropdown-header">Sensorverwaltung</li>',
                    '<li role="presentation">',
                    '<a class="infos modalActionButton" href="javascript:void(0)" data-function="infos" tabindex="-1" role="menuitem">',
                    '<i class="fa fa-fw fa-bar-chart"></i> Informationen',
                    '</a>',
                    '</li>',
                    '<li class="divider"></li>',
                    '<li role="presentation">',
                    '<a class="edit modalActionButton" href="javascript:void(0)" data-function="edit" tabindex="-1" role="menuitem">',
                    '<i class="fa fa-fw fa-pencil"></i> Bearbeiten',
                    '</a>',
                    '</li>',
                    '<li role="presentation">',
                    '<a class="remove ml10" href="javascript:void(0)" data-function="remove" tabindex="-1" role="menuitem">',
                    '<i class="fa fa-fw fa-trash"></i> Löschen',
                    '</a>',
                    '</li>',
                    '</div>'
                ].join(''));

                // ---- Kontextmenü hinzufügen ----
                $('#overviewTable').append(ul);

                var $parentOffset = $(this).parent().offset();
                var $pos = $(this).parent().position();
                var relX = e.pageX - $parentOffset.left + $pos.left;
                var relY = e.pageY - $parentOffset.top + $pos.top;

                // ---- Wenn das Kontextmenü zu weit am rechten Bildschirmrand ist -> Darstellung ändern ----
                if (relX > ($(window).width() * 0.85)) {
                    relX = relX - $('.dropdown-header').outerWidth();
                }

                $('#js_ContextMenu').css({
                    'top': relY,
                    'left': relX,
                    'position': 'absolute'
                });

                // ---- Aktuell ausgewählte Zeile zur besseren Übersicht markieren ----
                $('#js_ContextMenu').find('ul').on('mouseenter', function () {
                    selectedRow.css('background-color', '#d9edf7');
                }).on('mouseleave', function () {
                    selectedRow.css('background-color', '');
                });

                $('#js_ContextMenu').on('editButtonEvent', function (e, row, uniqueid) {
                    var pkidedit = uniqueid;
                    var data = {
                        'action': 'edit',
                        'pkid': pkidedit
                    };
                    $.ajax({
                        type: "GET",
                        url: '/index/edit',
                        data: data
                    }).done(function(response) {
                        response = jQuery.parseJSON(response);
                        var $modal = $('#sensorModal');
                        // ---- Modal neu initialisieren ----
                        $modal.modal();
                        $('#formsensor')[0].reset();
                        resetfieldsfeedbackSensor();
                        setModalEdit(response);
                    });

                }).on('click', '.edit', function () {
                    $(this).trigger('editButtonEvent', [row, uniqueid]);
                })
                .on('removeButtonEvent', function (e, row, uniqueid) {
                        var pkiddelete = uniqueid;
                        var data = {
                            'action': 'delete',
                            'pkid': pkiddelete
                        };
                        $.ajax({
                            type: "POST",
                            url: '/index/delete',
                            data: data
                        }).done(function() {
                            window.location.replace('/index/showLogin?site=table');
                        });

                    }).on('click', '.remove', function () {
                    if (window.confirm("Sensor und dazugehörige Daten wirklich löschen?")) {
                        $(this).trigger('removeButtonEvent', [row, uniqueid]);
                    }
                })
               .on('infosButtonEvent', function (e, row, uniqueid) {
                        var pkid = uniqueid;
                        var data = {
                            'action': 'infos',
                            'pkid': pkid
                        };
                        $.ajax({
                            type: "GET",
                            url: '/index/getInfos',
                            data: data
                        }).done(function(response) {
                            response = jQuery.parseJSON(response);
                            var $modal = $('#InfoModal');
                            // ---- Modal neu initialisieren ----
                            $modal.modal();
                            $('#labelInfoModal').text('Informationen zum Sensor "'+row.name+'"');
                        });

                    }).on('click', '.infos', function () {
                    $(this).trigger('infosButtonEvent', [row, uniqueid]);
                })
            }
        });
        /* ---- Tabelle > Rechtsklick-Kontextmenü ---- */

    /**
     * Hintergrundfarbe der ausgewählten Zeile wieder entfernen
     */
    $('#overviewTable').on('click', function (e) {
        $('#overviewTable').find('tr[data-uniqueid="' + $('#js_ContextMenu').data('unique-rowid') + '"]').css('background-color', '');
    });


}); /** document ready **/


//Hilfsfunktionen

function createglyphiconsuccess(name) {
    var option = $('<span></span>').attr('aria-hidden', "true").addClass("glyphicon glyphicon-ok form-control-feedback").
        attr('id', name);
    return option;
}
function createglyphiconfailure(name) {
    var option = $('<span></span>').attr('aria-hidden', "true").addClass("glyphicon glyphicon-remove form-control-feedback").
        attr('id', name);
    return option;
}
function validateUsername() {
    var isValid = true;
    var textErr = "Fehler";
    $('#usernamefail').remove();

    if (($('#username').val()) == "") {
        isValid = false;
    }
    else {
        var regexip = /^[a-zA-Z0-9]{4,}$/;
        if (regexip.test($('#username').val())) {
            isValid = true;
        }
        else {
            isValid = false;
        }
    }

    if (!(isValid)) {
        $('#usernamegroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphiusername");
        $('#colusername').append(createglyphiconfailure("glyphiusername"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'usernamefail')
            .text(textErr);
        $('#colusername').append(label);
    }
    else {
        $('#usernamegroup').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphiusername");
        $('#colusername').append(createglyphiconsuccess("glyphiusername"));
    }

    return isValid;
}


function validateEmail() {
    var isValid = true;
    var textErr = "Fehler";
    $('#emailfail').remove();

    if ($('#email').val() == "") {
        isValid = false;
    }
    else {
        var regexdate = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i;
        if (regexdate.test($('#email').val())) {
            isValid = true;
        }
        else {
            isValid = false;
        }
    }

    if (!(isValid)) {
        $('#emailgroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphiemail");
        $('#colemail').append(createglyphiconfailure("glyphiemail"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'emailfail')
            .text(textErr);
        $('#colemail').append(label);
    }
    else {
        $('#emailgroup').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphiemail");
        $('#colemail').append(createglyphiconsuccess("glyphiemail"));

    }

    return isValid;
}

function validatePassword() {
    var isValid = true;
    var textErr = "Fehler";
    $('#pwfail').remove();

    if ($('#password').val() == "") {
        isValid = false;
    }
    else {
        var regexdate = /^[-a-zA-Z0-9_]{8,}$/;
        if (regexdate.test($('#password').val())) {
            isValid = true;
        }
        else {
            isValid = false;
        }
    }

    if (!(isValid)) {
        $('#passwordgroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphipassword");
        $('#colpassword').append(createglyphiconfailure("glyphipassword"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'pwfail')
            .text(textErr);
        $('#colpassword').append(label);
    }
    else {
        $('#passwordgroup').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphipassword");
        $('#colpassword').append(createglyphiconsuccess("glyphipassword"));

    }
    return isValid;
}

function validateConfPassword() {
    var isValid = true;
    var textErr = "Fehler";
    $('#confpwfail').remove();
    if ($('#confirmpassword').val() == "") {
        isValid = false;
    }
    else {
        var regexdate = /^[-a-zA-Z0-9_]{8,}$/;
        if (regexdate.test($('#confirmpassword').val())) {
            isValid = true;
        }
        else {
            isValid = false;
        }
    }

    if (!(isValid)) {
        $('#confirmpasswordgroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphiconfirmpassword");
        $('#colconfirmpassword').append(createglyphiconfailure("glyphiconfirmpassword"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'confpwfail')
            .text(textErr);
        $('#colconfirmpassword').append(label);
    }
    else {
        $('#confirmpasswordgroup').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphiconfirmpassword");
        $('#colconfirmpassword').append(createglyphiconsuccess("glyphiconfirmpassword"));
    }
    return isValid;
}

function validatePasswords() {

    if ($('#password').val() != $('#confirmpassword').val()) {
        $('#confirmpasswordgroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphiconfirmpassword");
        $('#colconfirmpassword').append(createglyphiconfailure("glyphiconfirmpassword"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'confpwfail')
            .text("Beide Passwörter müssen gleich sein!");
        $('#colconfirmpassword').append(label);
        return false;
    }
    else {
        $('#confirmpasswordgroup').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphiconfirmpassword");
        $('#colconfirmpassword').append(createglyphiconsuccess("glyphiconfirmpassword"));
        $('#confpwfail').remove();
        return true;
    }

}

function validateAll() {
    resetfieldsfeedback();
    var isValid = true;
    isValid = validateUsername() && isValid;
    isValid = validateEmail() && isValid;
    isValid = validatePassword() && isValid;
    isValid = validateConfPassword() && isValid;

    if (isValid) {
        isValid = validatePasswords() && isValid;
    }

    return isValid;
}

function removeglyphicon(field) {
    $(field).remove();
}
function removeFeedback(field) {
    $(field).removeClass("has-feedback has-success has-error");
}
function resetfieldsfeedback() {


    removeglyphicon("#glyphiusername");
    removeglyphicon("#glyphipassword");
    removeglyphicon("#glyphiemail");
    removeglyphicon("#glyphiconfirmpassword");

    removeFeedback("#usernamegroup");
    removeFeedback("#emailgroup");
    removeFeedback("#passwordgroup");
    removeFeedback("#confirmpasswordgroup");

    $('#usernamefail').remove();
    $('#emailfail').remove();
    $('#pwfail').remove();
    $('#confpwfail').remove();
}

function resetfieldsfeedbackSensor() {


    removeglyphicon("#glyphisensorname");
    removeglyphicon("#glyphilocation");

    removeFeedback("#sensornamegroup");
    removeFeedback("#locationgroup");


    $('#sensornamefail').remove();
    $('#locationfail').remove();

}

function validateSensorname() {
    var isValid = true;
    var textErr = "Fehler";
    $('#sensornamefail').remove();
    if ($('#sensorname').val() == "") {
        isValid = false;
    }
    else {
        var regexdate = /^[-a-zA-Z0-9_]{4,}$/;
        if (regexdate.test($('#sensorname').val())) {
            isValid = true;
        }
        else {
            isValid = false;
        }
    }

    if (!(isValid)) {
        $('#sensornamegroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphisensorname");
        $('#colsensorname').append(createglyphiconfailure("glyphisensorname"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'sensornamefail')
            .text(textErr);
        $('#colsensorname').append(label);
    }
    else {
        $('#sensornamegroup').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphisensorname");
        $('#colsensorname').append(createglyphiconsuccess("glyphisensorname"));
    }
    return isValid;
}
function validateLocation() {
    var isValid = true;
    var textErr = "Fehler";
    $('#locationfail').remove();
    if ($('#location').val() == "") {
        isValid = false;
    }
    else {
        var regexdate = /^[-a-zA-Z0-9_]{3,}$/;
        if (regexdate.test($('#location').val())) {
            isValid = true;
        }
        else {
            isValid = false;
        }
    }

    if (!(isValid)) {
        $('#locationgroup').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphilocation");
        $('#collocation').append(createglyphiconfailure("glyphilocation"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'locationfail')
            .text(textErr);
        $('#collocation').append(label);
    }
    else {
        $('#locationgroup').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphilocation");
        $('#collocation').append(createglyphiconsuccess("glyphilocation"));
    }
    return isValid;
}

function validateAllSensor() {
    resetfieldsfeedbackSensor();
    var isValid = true;
    isValid = validateSensorname() && isValid;
    isValid = validateLocation() && isValid;

    return isValid;
}

/** Spalten markieren bei Suche */

function setBackgroundTransparency(index) {
    // ---- Alle alten Transparenzen zurücksetzen ----
    $('th > div').css('background', "rgba(0,0,0,0)");

    // ---- Neue Transparenzen setzen ----
    $('td:nth-child(' + index + ')').css('background', "rgba(0,0,0,0.05)");
    $('th:nth-child(' + index + ') > div').css('background', "rgba(0,0,0,0.1)");
}

/**
 * Fügt dem Element ein fancy Lade-Symbol hinzu
 */
function addLoading ($target) {
    $target.text('').append(
        $('<div class="spinner">' +
            '<div class="spinner-container container1">' +
            '<div class="circle1"></div>' +
            '<div class="circle2"></div>' +
            '<div class="circle3"></div>' +
            '<div class="circle4"></div>' +
            '</div>' +
            '<div class="spinner-container container2">' +
            '<div class="circle1"></div>' +
            '<div class="circle2"></div>' +
            '<div class="circle3"></div>' +
            '<div class="circle4"></div>' +
            '</div>' +
            '<div class="spinner-container container3">' +
            '<div class="circle1"></div>' +
            '<div class="circle2"></div>' +
            '<div class="circle3"></div>' +
            '<div class="circle4"></div>' +
            '</div>' +
            '<div class="spinner-container">' +
            '<div class="loadingIcon">Lade</div></div>' +
            '</div>'
        )
    );
}

function validateUserLogin() {
    var isValid = true;
    var textErr = "Feld darf nicht leer sein!";
    $('#usernameloginfail').remove();
    if ($('#login-username').val() == "") {
        isValid = false;
    }


    if (!(isValid)) {
        $('#colloginuser').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphiusernamelogin");
        $('#colloginuser').append(createglyphiconfailure("glyphiusernamelogin"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'usernameloginfail')
            .text(textErr);
        $('#colloginuser').append(label);
    }
    else {
        $('#colloginuser').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphiusernamelogin");
        $('#colloginuser').append(createglyphiconsuccess("glyphiusernamelogin"));
    }
    return isValid;
}

function validatePasswordLogin() {
    var isValid = true;
    var textErr = "Feld darf nicht leer sein!";
    $('#passwordloginfail').remove();
    if ($('#login-password').val() == "") {
        isValid = false;
    }


    if (!(isValid)) {
        $('#colpasswordlogin').removeClass("has-success has-feedback").addClass("has-error has-feedback");
        removeglyphicon("#glyphipasswordlogin");
        $('#colpasswordlogin').append(createglyphiconfailure("glyphipasswordlogin"));
        var label = $('<span></span>').addClass("help-block").attr('id', 'passwordloginfail')
            .text(textErr);
        $('#colpasswordlogin').append(label);
    }
    else {
        $('#colpasswordlogin').removeClass("has-error has-feedback").addClass("has-success has-feedback");
        removeglyphicon("#glyphipasswordlogin");
        $('#colpasswordlogin').append(createglyphiconsuccess("glyphipasswordlogin"));
    }
    return isValid;
}

/** Datesorter für Tabelle */
function dateSorter(a, b) {
    var pattern = /(\d{4})\-(\d{2})\-(\d{2}).(\d{2}):(\d{2}):(\d{2})/;
    var newstr = a.replace(pattern, "$1/$2/$3 $4:$5:$6");
    var newstr2 = b.replace(pattern, "$1/$2/$3 $4:$5:$6");
    var t1 = new Date(newstr);
    var t2 = new Date(newstr2);
    if (t1.getTime() > t2.getTime()) {
        return 1;
    }
    if (t1.getTime() < t2.getTime()) {
        return -1;
    }
    return 0;
}

function setModalEdit(response){

    $('#labelSensorModal').text('Sensor bearbeiten');
    $('#modalSubmitsensor').text('Speichern');
    $('#sensorname').val(response.name);
    $('#location').val(response.location);
    var lis = $('<input>').attr('id','fieldedit').attr('type','hidden').attr('value','edit').attr('name','field');
    $('#formsensor').prepend(lis);
    var pk = $('<input>').attr('id','fieldpk').attr('type','hidden').attr('value',response.pkid).attr('name','pkid');
    $('#formsensor').prepend(pk);
    var create = $('<input>').attr('id','fieldcreate').attr('type','hidden').attr('value',response.created).attr('name','created');
    $('#formsensor').prepend(create);
}

function setModalCreate() {
    $('#myModalLabel').text('Neuen Sensor anlegen');
    $('#modalSubmitsensor').text('Erstellen');
    $('#fieldedit').remove();
    $('#fieldpk').remove();
}

/**
 * @brief   Entfernt das Kontextmenü, sofern es vorhanden ist
 */
function removeContextMenu() {
    var $contextMenu = $('#js_ContextMenu');
    if ($contextMenu.length > 0) {
        $contextMenu.remove();
    }
}