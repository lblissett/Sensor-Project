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
    <div class="modal-dialog" id="sensor-info" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="labelInfoModal"><?php if ($_SESSION['language'] == "de") {
                        echo $text->infosensor;
                    } else {
                        echo $text->infosensorEN; }  ?></h4>
            </div>
            <div class="modal-body form-horizontal">

                <!-- Hier kannst du deins eintragen-->

                <!-- SVG erstellen ... ???
                <svg width="550" height="350"></svg>-->
        <div id="testingdia"></div>


            </div >

            <div class="modal-footer" id="modalinfosfooter">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php if ($_SESSION['language'] == "de") {
                        echo $text->cancel;
                    } else {
                        echo $text->cancelEN; }  ?></button>
                <button type="button" class="btn btn-info" id="modalApi" ><?php if ($_SESSION['language'] == "de") {
                        echo $text->showApi;
                    } else {
                        echo $text->showApiEN; }  ?></button>
            </div>
        </div>
    </div>
</div>
