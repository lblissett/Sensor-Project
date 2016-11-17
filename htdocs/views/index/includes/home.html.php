<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 07.11.2016
 * Time: 20:56
 */
use Mvc\Library\AppTexts;
$text = new AppTexts();

if ($_SESSION['language'] == "de") {
    echo $text->welcome.", ".$_SESSION['userid'];
} else {
    echo $text->welcomeEN.", ".$_SESSION['userid']; }
?>