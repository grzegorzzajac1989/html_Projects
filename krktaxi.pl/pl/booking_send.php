<!DOCTYPE html>
<!--[if IE 9]><html class="ie ie9"> <![endif]-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="Grzegorz Zajac" content="Taxi Krakow">
    <title></title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="css/base.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <script type="text/javascript">
		function delayedRedirect(){
			window.location = "index.html"
		}
	</script>

</head>
<body onLoad="setTimeout('delayedRedirect()', 5000)">
<?php
						if(isset($_POST['website']) && $_POST['website'] == ''){
						$mail = $_POST['email'];

						/*$subject = "".$_POST['subject'];*/
						$to = "<contact@taxikrk.pl>";		/* YOUR EMAIL HERE */
						$subject ="Content-Transfer-Encoding: 8bit";
						$subject = "Booking Request from Taxi Krakow";
						$headers .= "MIME-Version: 1.0"."\n";
						$headers .= "Content-Type: text/plain; charset=utf-8" . "\n";
						$headers .= "Content-Transfer-Encoding: 8bit". "\n";
						$headers .= "From: Booking from Taxi Krakow <noreply@taxikrk.com>";
						$message .= "\nPick up address: " . $_POST['pick_up'];
						$message .= "\nDrop off address: " . $_POST['drop_off'];
						$message .= "\nDate: " . $_POST['date_pick'];
						$message .= "\nTime: " . $_POST['time_pick'];
						$message .= "\nName: " . $_POST['firstname'];
						$message .= "\nPersons: " . $_POST['adults'];
						$message .= "\nLuggage: " . $_POST['child'];
						$message .= "\nEmail: " . $_POST['email'];
						$message .= "\nTelephone: " . $_POST['telephone'];
						$message .= "\n\nBooking options:\n" ;
						foreach($_POST['options'] as $value) 
							{ 
							$message .=   "- " .  trim(stripslashes($value)) . "\n"; 
							};
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
						
						//Confirmation page
						$user = "$mail";
						$usersubject = "Booking Request from Taxi Krakow";
						$userheaders = "From: contact@taxikrk.pl\n";
						/*$usermessage = "Thank you for your time. Your survey is successfully submitted.\n"; WITH OUT SUMMARY*/
						//Confirmation page WITH  SUMMARY
						$usermessage = "Your booking request has been successfully sent.\n\nBELOW A SUMMARY\n\n$message\n\n We will confirm shortly or call us at 0048 730084043"; 
						mail($user,$usersubject,$usermessage,$userheaders);
						} 
	
?>

<!-- END SEND MAIL SCRIPT -->   
<div id="confirm">
	<div>
   	      <h1>Dzięki!</h1>
          <h4>Twoja prośba o rezerwację została wysłana pomyślnie.</h4>
         <p>Zostaniesz przekierowany z powrotem za 5 sekund.</p>
   </div>
</div>
</body>
</html>