<?php
require('config.php');
//require('PHPMailerAutoload.php');
date_default_timezone_set('Australia/Sydney');
$insert_date = date("Y-m-d H:i:s");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$job_title = $_POST['role'];
$company = $_POST['company'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$question1 = explode("|",$_POST['advice']);
$question1text = $question1[0];
$question1value = $question1[1];

$question2 = explode("|",$_POST['risk']);
$question2text = $question2[0];
$question2value = $question2[1];

$question3 = explode("|",$_POST['meetings']);
$question3text = $question3[0];
$question3value = $question3[1];

$question4 = explode("|",$_POST['applications']);
$question4text = $question4[0];
$question4value = $question4[1];

$question5 = explode("|",$_POST['receptive']);
$question5text = $question5[0];
$question5value = $question5[1];

$question6 = explode("|",$_POST['identify']);
$question6text = $question6[0];
$question6value = $question6[1];

$question7 = explode("|",$_POST['cybersecurity']);
$question7text = $question7[0];
$question7value = $question7[1];

$question8 = explode("|",$_POST['understanding']);
$question8text = $question8[0];
$question8value = $question8[1];

$question9 = explode("|",$_POST['confident']);
$question9text = $question9[0];
$question9value = $question9[1];

$totValue = $question1value + $question2value + $question3value + $question4value + $question5value + $question6value + $question7value + $question8value + $question9value;

if( ($totValue >=1 && $totValue <=10 ) ){
    //LOW RISK
    $fileatt = "documents/low-risk.report.pdf";
    $fileatttype = "application/pdf";
    $fileattname = "low-risk.report.pdf";
}

if( ($totValue >10 && $totValue <=20 ) ){
    //MID RISK
    $fileatt = "documents/mid-risk.report.pdf";
    $fileatttype = "application/pdf";
    $fileattname = "mid-risk.report.pdf";
}

if( ($totValue >20 && $totValue <=32 ) ){
    //HIGH RISK
    $fileatt = "documents/high-risk.report.pdf";
    $fileatttype = "application/pdf";
    $fileattname = "high-risk.report.pdf";
}

$messageSender = "
<p><strong>Thanks for downloading your free CSO Group security assessment.</strong></p>
<p>By analysing your results we've identified your awareness of cybersecurity risk factors 
and how this could impact your business. The report attached details key insights, potential 
threats and helpful next steps for securing your business.</p>
<p>One of our representatives will be in touch soon to find out exactly what walking the walk 
means for your organisation. We can provide you with a holistic approach to security so as to 
balance the right combination of technical controls, processes and policies to effectively 
protect your organisation's critical assets.</p>
<p>We do this by assessing your current security strengths and capability and then develop a 
security program built on industry best practice, regulatory standards and real world experience 
aligned to your organisations business objectives and budget.</p>
";

//print $fileattname;

// File
$file = fopen($fileatt, 'rb');
$content = fread($file, filesize($fileatt));
fclose($file);

$encoded_content = chunk_split(base64_encode($content));
$boundary = md5(date('r', time())); 

//header
$headersFile = "MIME-Version: 1.0\r\n"; 
$headersFile .= "From: <no-reply@csogroup.com.au>"."\r\n"; 
$headersFile .= "Reply-To: no-reply@csogroup.com.au" . "\r\n";
$headersFile .= "Content-Type: multipart/mixed; boundary = $boundary\r\n"; 
$headersFile .= "X-Priority: 3\r\n";
$headersFile .= "X-Mailer: PHP". phpversion() ."\r\n";

//plain text 
$bodySender = "--$boundary\r\n";
$bodySender .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$bodySender .= "Content-Transfer-Encoding: base64\r\n\r\n"; 
$bodySender .= chunk_split(base64_encode($messageSender)); 

//attachment
$bodySender .= "--$boundary\r\n";
$bodySender .="Content-Type: $fileatttype; name=".$fileattname."\r\n";
$bodySender .="Content-Disposition: attachment; filename=".$fileattname."\r\n";
$bodySender .="Content-Transfer-Encoding: base64\r\n";
$bodySender .="X-Attachment-Id: ".rand(1000,99999)."\r\n\r\n"; 
$bodySender .= $encoded_content;


$all_data_html = '<strong>The following person has just submit the form on:  https://businessessential8.com.au/</strong><br/><br/>'.'<table border=1>
<tr><td>Name</td><td>'.$fname.'</td></tr>
<tr><td>Name</td><td>'.$lname.'</td></tr>
<tr><td>Job Title</td><td>'.$job_title.'</td></tr>
<tr><td>Company</td><td>'.$company.'</td></tr>
<tr><td>Email</td><td>'.$email.'</td></tr>
<tr><td>Phone</td><td>'.$phone.'</td></tr>
<tr><td>Form Fill Date</td><td>'.$insert_date.'</td></tr>
</table>';

$query = "INSERT INTO registration_form (fname, lname, job_title, company, email, phone, question1, question2, question3, question4, question5, question6, question7, question8, question9, lead_insert_date) 
                            VALUES ('".$fname."', '".$lname."', '".$job_title."', '".$company."', '".$email."', '".$phone."', '".$question1text."', '".$question2text."', '".$question3text."', '".$question4text."', '".$question5text."', '".$question6text."', '".$question7text."', '".$question8text."', '".$question9text."', '".$insert_date."');";
$conn->query($query);

//print '<br/>'.$totValue;
$to      = 'info@csogroup.com.au';
$subject = 'CSOGROUP - Business Essential8 form Submit';
$subjectSender = "CSOGROUP - Business Essential8 Report Download";
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'CC: katie@bang.com.au' . "\r\n";
$headers .= 'From: no-reply@csogroup.com.au' . "\r\n" ;
$headers .= 'Reply-To: no-reply@csogroup.com.au' . "\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n";



if (mail($to, $subject, $all_data_html, $headers)) {
    mail($email, $subjectSender, $bodySender, $headersFile);
    print $totValue;
} 
else {
    print "0"; 
}	

?>