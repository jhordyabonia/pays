<?php

require_once("./JSON_DB/JSON_DB.php");
$database = new JSON_DB('payu-pays');
$database->update(['referenceCode'=>$_GET['referenceCode']],$_GET);
$database->commit();
#header("Location: http://www.linkedin.com/in/jhordy-abonia");
$html =<<<HTML
<div align="center" styly="margin:15px">
    <img src="https://iarlatino.com/wp-content/uploads/2018/10/GRACIAS-POR-TU-COMPRA-1024x768.png"/>
</div>
HTML;
echo $html;