<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 17.10.2016
 * Time: 16:58
 */

use Mvc\Library\AppTexts;
$text = new AppTexts();
?>
<div class="footer text-center bg-grey">
    <?php if ($_SESSION['language'] == "de") {
        echo $text->actualversion;
    } else {
        echo $text->actualversionEN; }  ?>
    <strong><?php echo $text->version ?></strong>
    <?php if ($_SESSION['language'] == "de") {
        echo $text->from;
    } else {
        echo $text->fromEN; }  ?> <strong><?php echo $text->dateversion ?></strong>
    |
    <?php if ($_SESSION['language'] == "de") {
        echo $text->contact;
    } else {
        echo $text->contactEN; }  ?>
    <strong>
        <a href="mailto:leonard.franke@cs14-2.ba-leipzig.de">Leonard Franke</a>
    </strong>
</div>

