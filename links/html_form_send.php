<!doctype html>
<html>
<head>
	<title>Balance Checkbook App</title>
	<meta charset="UTF-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="Description" content="Balance quickly adds transactions to your bank accounts and keeps your checkbook balanced."/>
	
	<link rel="stylesheet" type="text/css" href="../style.css"/>
	<script type="text/javascript" src="javascript/retina-1.1.0.js"></script>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-48519659-1', 'balanceapp.net');
	  ga('send', 'pageview');
	
	</script>
	
</head>

<body>

<?php
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "feedback@balanceapp.net";
     
    $email_subject = "Email Submission";
     
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['email']) ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
    $email_from = $_POST['email']; // required
     
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    
    
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
     
    
    $email_message .= "Email: ".clean_string($email_from)."\n";
    
     
     
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- place your own success html below -->





	<div id="greenOne"></div>
	<div id="greenTwo"></div>
	
	<div id="iphoneWrapper">
		<img id="iphone" src="images/iphone.png" alt="iPhone with Balance"/>
	</div>
	
	<div id="contentWrapper">
	<div id="content">
		<div id="info">
			<img id="icon" src="images/icon.png" alt="icon"/>
			<h1>Balance</h1>
			<p>Coming soon, Balance quickly adds transactions to your bank accounts and keeps your checkbook balanced.</p>
			<h2>Key App Features</h2>
			<ul>
				<li>Quickly add transactions</li>
				<li>Multiple accounts</li>
				<li>Multiple currencies</li>
				<li>Cleared transactions</li>
				<li>Export to spreadsheet</li>
				<li>Passcode protected</li>
			</ul>
			
			
			
			<h3>Get notified when it's released</h3>
			<div id="submitted">Thanks! Your email was submitted.</div>
			
		</div>
	</div>
	
	<div id="footer">
		Copyright 2014 by <a href="http://jordankennedy.com">Jordan Kennedy</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="mailto:feedback@balanceapp.net">feedback@balanceapp.net</a>
	</div>
	
	</div>
	
<?php
}
die();
?>
	
</body>

</html>


















