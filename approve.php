<?php

// Get data from url

$amemberid = $_GET['amemberid'];
$aemail = $_GET['aemail'];
$aurl = "https://www.allindiatf.com/member/?".$amemberid;
echo "<br>";
echo "Membership ID card has been sent to ".$aemail;
echo "<br>";
echo "A copy of email is also sent to AITF admin. You can now close this window.";

// Send email

$to = $aemail;
$subject = "AITF membership approved.";

$message = "Dear Applicant. Your membership with AITF has been approved. You can download your membership ID card by visiting the following link. ".$aurl;



// More headers
  $headers .= "Reply-To: All India Telugu Federation <info@allindiatf.com>\r\n"; 
  $headers .= "Return-Path: All India Telugu Federation <info@allindiatf.com>\r\n"; 
  $headers .= "From: All India Telugu Federation <info@allindiatf.com>\r\n";  
  $headers .= "Organization: All India Telugu Federation\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
  $headers .= "X-Priority: 3\r\n";
  $headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;


mail($to, $subject, $message, $headers);
?>