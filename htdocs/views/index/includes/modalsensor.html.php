<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 17.10.2016
 * Time: 08:45
 */
?>

<form id="formsensor" action="/index/createSensor" method="post">
    <div class="modal fade" id="sensorModal" tabindex="-1" role="dialog" aria-labelledby="labelSensorModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="labelSensorModal"><?php if ($_SESSION['language'] == "de") {
                            echo $text->newsensor;
                        } else {
                            echo $text->newsensorEN; }  ?></h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="form-group" id="sensornamegroup">
                        <label for="sensorname" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                                echo $text->sensorname;
                            } else {
                                echo $text->sensornameEN; }  ?>
                            <i class="fa fa-info-circle"
                               data-original-title="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->entersensorname;
                               } else {
                                   echo $text->entersensornameEN; }  ?>"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="colsensorname">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-cube fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="sensorname" id="sensorname"  placeholder="<?php if ($_SESSION['language'] == "de") {
                                    echo $text->entersensorname;
                                } else {
                                    echo $text->entersensornameEN; }  ?>"
                                onblur="validateSensorname()"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="locationgroup">
                        <label for="location" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                                echo $text->location;
                            } else {
                                echo $text->locationEN; }  ?>
                            <i class="fa fa-info-circle"
                               data-original-title="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->enterlocationsensor;
                               } else {
                                   echo $text->enterlocationsensorEN; }  ?>"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="collocation">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="location" id="location"  placeholder="<?php if ($_SESSION['language'] == "de") {
                                    echo $text->enterlocationsensor;
                                } else {
                                    echo $text->enterlocationsensorEN; }  ?>"
                                onblur="validateLocation()"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php if ($_SESSION['language'] == "de") {
                            echo $text->cancel;
                        } else {
                            echo $text->cancelEN; }  ?></button>
                    <button type="submit" class="btn btn-primary" id="modalSubmitsensor" ><?php if ($_SESSION['language'] == "de") {
                            echo $text->create;
                        } else {
                            echo $text->createEN; }  ?></button>
                </div>
            </div>
        </div>
    </div>
</form>

