<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 14:41
 */
use Mvc\Library\AppTexts;
$text = new AppTexts();
?>

<form id="formdata" action="/index/register" method="post">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php if ($_SESSION['language'] == "de") {
                            echo $text->createacc;
                        } else {
                            echo $text->createaccEN; }  ?></h4>
                </div>
                <div class="modal-body form-horizontal">
                    <div class="form-group" id="usernamegroup">
                        <label for="username" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                                echo $text->username;
                            } else {
                                echo $text->usernameEN; }  ?>
                            <i class="fa fa-info-circle"
                               data-original-title="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->enteruser;
                               } else {
                                   echo $text->enteruserEN; }  ?>"
                               data-toggle="popover"
                               title=""
                               data-content="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->helptextusername;
                               } else {
                                   echo $text->helptextusernameEN; }  ?>">
                            </i></label>
                        <div class="col-md-6" id="colusername">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="username" id="username"
                                       placeholder="<?php if ($_SESSION['language'] == "de") {
                                           echo $text->enteruser;
                                       } else {
                                           echo $text->enteruserEN; }  ?>"
                                onblur="validateUsername()"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="emailgroup">
                        <label for="email" class="col-md-4 control-label label-element">Email
                            <i class="fa fa-info-circle"
                               data-original-title="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->enteremail;
                               } else {
                                   echo $text->enteremailEN; }  ?>"
                               data-toggle="popover"
                               title=""
                               data-content="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->helptextemail;
                               } else {
                                   echo $text->helptextemailEN; }  ?>">
                            </i></label>
                        <div class="col-md-6" id="colemail">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" name="email" id="email"
                                       placeholder="<?php if ($_SESSION['language'] == "de") {
                                           echo $text->enteremail;
                                       } else {
                                           echo $text->enteremailEN; }  ?>"
                                onblur="validateEmail()"/>
                            </div>
                        </div>
                    </div>



                    <div class="form-group" id="passwordgroup">
                        <label for="password" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                                echo $text->password;
                            } else {
                                echo $text->passwordEN; }  ?>
                            <i class="fa fa-info-circle"
                               data-original-title="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->enterpassword;
                               } else {
                                   echo $text->enterpasswordEN; }  ?>"
                               data-toggle="popover"
                               title=""
                               data-content="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->helptextpassword;
                               } else {
                                   echo $text->helptextpasswordEN; }  ?>">
                            </i></label>
                        <div class="col-md-6" id="colpassword">
                            <div class="input-group" >
                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="password" id="password"
                                       placeholder="<?php if ($_SESSION['language'] == "de") {
                                           echo $text->enterpassword;
                                       } else {
                                           echo $text->enterpasswordEN; }  ?>"
                                onblur="validatePassword()"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" id="confirmpasswordgroup">
                        <label for="confirm" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                                echo $text->confirmtextpw;
                            } else {
                                echo $text->confirmtextpwEN; }  ?>
                            <i class="fa fa-info-circle"
                               data-original-title="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->confirmpassword;
                               } else {
                                   echo $text->confirmpasswordEN; }  ?>"
                               data-toggle="popover"
                               title=""
                               data-content="<?php if ($_SESSION['language'] == "de") {
                                   echo $text->helptextconfirmpassword;
                               } else {
                                   echo $text->helptextconfirmpasswordEN; }  ?>">
                            </i></label>
                        <div class="col-md-6" id="colconfirmpassword">
                            <div class="input-group">
                                <span class="input-group-addon "><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                <input type="password" class="form-control" name="confirmpassword" id="confirmpassword"
                                       placeholder="<?php if ($_SESSION['language'] == "de") {
                                           echo $text->confirmpassword;
                                       } else {
                                           echo $text->confirmpasswordEN; }  ?>"
                                onblur="validateConfPassword()"/>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php if ($_SESSION['language'] == "de") {
                            echo $text->cancel;
                        } else {
                            echo $text->cancelEN; }  ?></button>
                    <button type="submit" class="btn btn-primary" id="modalSubmit" ><?php if ($_SESSION['language'] == "de") {
                            echo $text->register;
                        } else {
                            echo $text->registerEN; }  ?></button>
                </div>
            </div>
        </div>
    </div>
</form>
