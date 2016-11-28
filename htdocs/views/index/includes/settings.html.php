<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 12.11.2016
 * Time: 14:35
 */
use Mvc\Library\AppTexts;
$text = new AppTexts();
?>

<div class="col-sm-8">
<form id="formchangepw" action="/index/changepw" method="post" class="form-horizontal">
    <h4 class="col-sm-offset-1"><?php if ($_SESSION['language'] == "de") {
            echo $text->changepw;
        } else {
            echo $text->changepwEN; }  ?></h4>
    <div class="form-group" id="oldpasswordgroup">
        <label for="sensorname" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                echo $text->oldpassword;
            } else {
                echo $text->oldpasswordEN; }  ?>
            <i class="fa fa-info-circle"
               data-original-title="<?php if ($_SESSION['language'] == "de") {
                   echo $text->enteroldpassword;
               } else {
                   echo $text->enteroldpasswordEN; }  ?>"
               data-toggle="popover"
               title=""
               data-content="<?php if ($_SESSION['language'] == "de") {
                   echo $text->helptextoldpw;
               } else {
                   echo $text->helptextoldpwEN; }  ?>">
            </i></label>
        <div class="col-md-6" id="cololdpassword">
            <div class="input-group" >
                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="oldpassword" id="oldpassword"  placeholder="<?php if ($_SESSION['language'] == "de") {
                    echo $text->enteroldpassword;
                } else {
                    echo $text->enteroldpasswordEN; }  ?>"
                       />
            </div>
        </div>
    </div>
    <div class="form-group" id="passwordchangegroup">
        <label for="passwordchange" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                echo $text->newpassword;
            } else {
                echo $text->newpasswordEN; }  ?>
            <i class="fa fa-info-circle"
               data-original-title="<?php if ($_SESSION['language'] == "de") {
                   echo $text->enternewpassword;
               } else {
                   echo $text->enternewpasswordEN; }  ?>"
               data-toggle="popover"
               title=""
               data-content="<?php if ($_SESSION['language'] == "de") {
                   echo $text->helptextnewpassword;
               } else {
                   echo $text->helptextnewpasswordEN; }  ?>">
            </i></label>
        <div class="col-md-6" id="colpasswordchange">
            <div class="input-group" >
                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="passwordchange" id="passwordchange"  placeholder="<?php if ($_SESSION['language'] == "de") {
                    echo $text->enternewpassword;
                } else {
                    echo $text->enternewpasswordEN; }  ?>"
                       onblur="validatePasswordchange()"/>
            </div>
        </div>
    </div>
    <div class="form-group" id="passwordchange2group">
        <label for="passwordchange2" class="col-md-4 control-label label-element"><?php if ($_SESSION['language'] == "de") {
                echo $text->newpasswordagain;
            } else {
                echo $text->newpasswordagainEN; }  ?>
            <i class="fa fa-info-circle"
               data-original-title="<?php if ($_SESSION['language'] == "de") {
                   echo $text->enternewpasswordagain;
               } else {
                   echo $text->enternewpasswordagainEN; }  ?>"
               data-toggle="popover"
               title=""
               data-content="<?php if ($_SESSION['language'] == "de") {
                   echo $text->helptextconfirmpassword;
               } else {
                   echo $text->helptextconfirmpasswordEN; }  ?>">
            </i></label>
        <div class="col-md-6" id="colpasswordchange2">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="passwordchange2" id="passwordchange2"  placeholder="<?php if ($_SESSION['language'] == "de") {
                    echo $text->enternewpasswordagain;
                } else {
                    echo $text->enternewpasswordagainEN; }  ?>"
                       onblur="validatePasswordchangeagain()"/>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3" >
            <button type="submit" class="btn btn-default col-xs-7" id="changepwbutton"><?php if ($_SESSION['language'] == "de") {
                    echo $text->changepw;
                } else {
                    echo $text->changepwEN; }  ?></button>
        </div>
    </div>
</form>
</div>