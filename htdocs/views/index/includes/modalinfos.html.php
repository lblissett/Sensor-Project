<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 27.10.2016
 * Time: 16:11
 */
use Mvc\Library\AppTexts;
$text = new AppTexts();
?>

<div class="modal fade" id="InfoModal" tabindex="-1" role="dialog" aria-labelledby="labelSensorModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelInfoModal"><?php if ($_SESSION['language'] == "de") {
                        echo $text->infosensor;
                    } else {
                        echo $text->infosensorEN; }  ?></h4>
            </div>
            <div class="modal-body form-horizontal">


            <!-- Hier kannst du deins reinmachen Martin im modal-body */ -->




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php if ($_SESSION['language'] == "de") {
                        echo $text->cancel;
                    } else {
                        echo $text->cancelEN; }  ?></button>
            </div>
        </div>
    </div>
</div>
