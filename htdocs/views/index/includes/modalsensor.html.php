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
                    <h4 class="modal-title" id="labelSensorModal">Create new sensor</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="form-group" id="sensornamegroup">
                        <label for="sensorname" class="col-md-4 control-label label-element">sensor name
                            <i class="fa fa-info-circle"
                               data-original-title="Enter the sensor name"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="colsensorname">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-cube fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="sensorname" id="sensorname"  placeholder="Enter your sensor name"
                                onblur="validateSensorname()"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="locationgroup">
                        <label for="location" class="col-md-4 control-label label-element">sensor location
                            <i class="fa fa-info-circle"
                               data-original-title="Enter the sensor location"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="collocation">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-map-marker fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="location" id="location"  placeholder="Enter your sensor location"
                                onblur="validateLocation()"/>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modalSubmitsensor" >Create</button>
                </div>
            </div>
        </div>
    </div>
</form>

