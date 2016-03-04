<?php
/**
 * Created by PhpStorm.
 * User: doomer
 * Date: 2/11/16
 * Time: 8:23 AM
 */
if(empty($_REQUEST['folder'])){
    return;
}

$solution = file($_REQUEST['folder'] . "/solution.php");
echo 'CODE: <pre>';
foreach($solution as $row){
    echo $row . "<br/>";
}
echo '</pre>OUTPUT: <br/>';

require ($_REQUEST['folder'] . "/solution.php");