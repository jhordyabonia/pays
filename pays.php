<?php
	const BASE_ID = 1000000;
	require_once("./JSON_DB/JSON_DB.php");
	$database = new JSON_DB('payu-pays');
	$referenceCode = BASE_ID+$database->rows()+1;
	$_POST['referenceCode'] = $referenceCode;
	$database->insert($_POST);
	$database->commit();

	$ApiKey='N5aHB8YHI9w3LbvDhYnFC615Mn';
	$merchantId='716859';
	$accountId='721708';
	$amount=$_POST['amount'];
	$signature=md5("$ApiKey~$merchantId~$referenceCode~$amount~USD");
	$description =$_POST['description'];
	$output= "				
	
	<form method='POST' style='display:none' action='https://gateway.payulatam.com/ppp-web-gateway/'>
		<div align='center'>
			<input name='usuarioId' type='hidden' value='$merchantId'>
			<input name='description' type='hidden' value='$description'>
			<input name='extra1' type='hidden' value=''>
			<input name='refVenta' type='hidden' value='$referenceCode'>
			<input name='valor' type='hidden' value='$amount'>
			<input name='iva' type='hidden' value='0'>
			<input name='moneda' type='hidden' value='USD'>
			<input name='baseDevolucionIva' type='hidden' value='0'>
			<input name='firma' type='hidden' value='$signature'>
			<input name='emailComprador' type='hidden' value=''>
			<input name='telephone' type='hidden' value=''>
			<input name='prueba' type='hidden' value='0'>
			<input name='url_respuesta' type='hidden' value='http://jhordyabonia.azurewebsites.net/pays/success.php'>
			<input name='accountId' type='hidden' value='$accountId'>						
		</div>
		<p align='center'>
			<input type='submit' id='pay_payu' name='muestra2' value='PAGAR AHORA'>
		</p>
	</form>
	
	";
	echo $output;
