<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 14:41
 */
?>

<form id="formdata" action="index/register" method="post">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create new Account</h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="form-group" id="usernamegroup">
                        <label for="username" class="col-md-4 control-label label-element">Username
                            <i class="fa fa-info-circle"
                               data-original-title="Enter the username"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="colusername">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username"  placeholder="Enter your Username"
                                onblur="validateUsername()"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="emailgroup">
                        <label for="email" class="col-md-4 control-label label-element">Your Email
                            <i class="fa fa-info-circle"
                               data-original-title="Enter the email"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="colemail">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"
                                onblur="validateEmail()"/>
                            </div>
                        </div>
                    </div>



                    <div class="form-group" id="passwordgroup">
                        <label for="password" class="col-md-4 control-label label-element">Password
                            <i class="fa fa-info-circle"
                               data-original-title="Enter the password"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="colpassword">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"
                                onblur="validatePassword()"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="confirmpasswordgroup">
                        <label for="confirm" class="col-md-4 control-label label-element">Confirm Password
                            <i class="fa fa-info-circle"
                               data-original-title="Confirm your password"
                               data-toggle="popover"
                               title=""
                               data-content="">
                            </i></label>
                        <div class="col-md-6" id="colconfirmpassword">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"  placeholder="Confirm your Password"
                                onblur="validateConfPassword()"/>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modalSubmit" >Register</button>
                </div>
            </div>
        </div>
    </div>
</form>
