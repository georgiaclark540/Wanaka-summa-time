#!/usr/local/php70/bin/php-cli -q
<?php

$EmailFrom = "studentmail@design.ac.nz";
// ADD YOUR EMAIL ADDRESS BELOW
$EmailTo = "CLARGA1@student.op.ac.nz";
$Subject = "Contact form from Georgia's Travel Blog website.";
$Name = Trim(stripslashes($_POST['Name'])); 
$Email = Trim(stripslashes($_POST['Email'])); 
$Message = Trim(stripslashes($_POST['Message'])); 

// validation
$validationOK=true;
if (!$validationOK) {
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contact-error-message.html\">";
  exit;
}

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $Name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $Email;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $Message;
$Body .= "\n";

// send email 
$success = mail($EmailTo, $Subject, $Body, "From: <$EmailFrom>");

// redirect to success page 
if ($success){
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contact-thanks-message.html\">";
}
else{
  print "<meta http-equiv=\"refresh\" content=\"0;URL=contact-error-message.html\">";
}
?>