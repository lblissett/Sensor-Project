/**
 * Created by Leo on 09.10.2016.
 */
$(document).ready(function () {
// Modal Erstellen bei Buttonklick
    $('#newDataModal').off('click').on('click', function () {
        var $modal = $('#myModal');
        // ---- Modal neu initialisieren ----
        $modal.modal();
        $('#formdata')[0].reset();

    });
});