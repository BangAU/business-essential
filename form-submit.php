<?php
require('config.php');
date_default_timezone_set('Australia/Sydney');
$insert_date = date("Y-m-d H:i:s");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$job_title = $_POST['role'];
$email = $_POST['email'];

if(isset($_POST["form_type"])){
    if($_POST["form_type"] == "form1"){

        $messageSender = "<p><strong>Thanks for downloading your free CSO Group Maturity Matrix Indicator.</strong></p>
                          <p>By mapping your current security measures using our 8 key benchmarks, we can identify the next steps to help you secure your business.</p>
                          <p>We work with organisations to provide effective cybersecurity services, risk management and protection through our business-centric approach. From assessing your business' exposure, the organisational policies and control requirements through to end-to-end solutions and strategies to mitigate business risks and threats. We can provide you with a holistic approach to security so as to balance the right combination of technical controls, processes and policies to effectively protect your organisation's critical assets.</p>
                          <p>Let CSO Group walk side by side with you. One of our representatives will be in touch soon to assess your completed Business Maturity Matrix and help you take the next steps to ensure the security of your business.</p>";

        $fileatt = "documents/CSOMaturityModelMartix.pdf";
        $fileatttype = "application/pdf";
        $fileattname = "CSOMaturityModelMartix.pdf";

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

        $all_data_html = '<strong>The following person has just submit the assets form on:  https://businessessential8.com.au/</strong><br/><br/>'.'<table border=1>
        <tr><td>Name</td><td>'.$fname.'</td></tr>
        <tr><td>Name</td><td>'.$lname.'</td></tr>
        <tr><td>Job Title</td><td>'.$job_title.'</td></tr>
        <tr><td>Email</td><td>'.$email.'</td></tr>
        <tr><td>Form Fill Date</td><td>'.$insert_date.'</td></tr>
        </table>';

        //print '<br/>'.$totValue;
        // $to      = 'amar@bang.com.au';
        $to      = 'info@csogroup.com.au';
        $subject = 'CSO GROUP - Business Essential 8 form Submit';
        $subjectSender = "CSO GROUP - Business Essential 8 Asset Download";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'CC: katie@bang.com.au' . "\r\n";
        $headers .= 'From: no-reply@csogroup.com.au' . "\r\n" ;
        $headers .= 'Reply-To: no-reply@csogroup.com.au' . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

        /* if (mail($to, $subject, $all_data_html, $headers)) {
            // top one is a form fill notification email and bottom one is the Thankyou message for the user
            mail($email, $subjectSender, $bodySender, $headersFile);
        }  */
        if (mail($email, $subjectSender, $bodySender, $headersFile)) {
            // top one is a form fill notification email and bottom one is the Thankyou message for the user
            print "1";
        }
        else {
            print "0"; 
        }

        $exists_in_db = false;

        if(!empty($email)) {

            $query1 = "select email,submit_counter FROM registration_form where email = '" . $email . "'";
            $result = $conn->query($query1);
            $submit_counter = 0;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $exists_in_db = true;
                    $submit_counter = $row['submit_counter'];
                }
            }
        } 
        
        $query = "";

        if($exists_in_db) {
            $query = "UPDATE registration_form " . 
                        "SET " .
                            "fname              = '".$fname."', ". 
                            "lname              = '".$lname."', ". 
                            "job_title          = '".$job_title."', ". 
                            "email              = '".$email."', ".
                            "submit_counter     = '".($submit_counter+1)."', ". 
                            "lead_insert_date   = '".$insert_date."'" .
                        "WHERE email = '" . $email . "'"; 
        }
        else {
            $query = "INSERT INTO registration_form (fname, lname, job_title, email, lead_insert_date) 
                                VALUES ('".$fname."', '".$lname."', '".$job_title."', '".$email."', '".$insert_date."');";
        }
        $conn->query($query);
    } 
    elseif($_POST["form_type"] == "form2"){

        /** Default Values */
        $question1value = 0;
        $question2value = 0;
        $question3value = 0;
        $question4value = 0;
        $question5value = 0;
        $question6value = 0;
        $question7value = 0;
        $question8value = 0;
        $question9value = 0;

        /** Default text */
        $question1text = "";        
        $question2text = "";        
        $question3text = "";        
        $question4text = "";        
        $question5text = "";        
        $question6text = "";        
        $question7text = "";        
        $question8text = "";        
        $question9text = "";        

        if(isset($_POST['advice'])) {
            $question1 = explode("|",$_POST['advice']);
            $question1text = $question1[0];
            $question1value = intval($question1[1]);
        }

        if(isset($_POST['risk'])) {
            $question2 = explode("|",$_POST['risk']);
            $question2text = $question2[0];
            $question2value = intval($question2[1]);
        }

        if(isset($_POST['meetings'])) {
            $question3 = explode("|",$_POST['meetings']);
            $question3text = $question3[0];
            $question3value = intval($question3[1]);
        }

        if(isset($_POST['applications'])) {
            $question4 = explode("|",$_POST['applications']);
            $question4text = $question4[0];
            $question4value = intval($question4[1]);
        }

        if(isset($_POST['receptive'])) {
            $question5 = explode("|",$_POST['receptive']);
            $question5text = $question5[0];
            $question5value = intval($question5[1]);
        }

        if(isset($_POST['identify'])) {
            $question6 = explode("|",$_POST['identify']);
            $question6text = $question6[0];
            $question6value = intval($question6[1]);
        }

        if(isset($_POST['cybersecurity'])) {
            $question7 = explode("|",$_POST['cybersecurity']);
            $question7text = $question7[0];
            $question7value = intval($question7[1]);
        }

        if(isset($_POST['understanding'])) {
            $question8 = explode("|",$_POST['understanding']);
            $question8text = $question8[0];
            $question8value = intval($question8[1]);
        }

        if(isset($_POST['confident'])) {
            $question9 = explode("|",$_POST['confident']);
            $question9text = $question9[0];
            $question9value = intval($question9[1]);
        }

        $totValue = $question1value + $question2value + $question3value + $question4value + $question5value + $question6value + $question7value + $question8value + $question9value;

        /**
         * Default setting
         */
        $fileatt = "documents/mid-risk.report.pdf";
        $fileatttype = "application/pdf";
        $fileattname = "mid-risk.report.pdf";
        $riskType = "medium";
        /** */

        if( ($totValue >=1 && $totValue <=10 ) ){
            //LOW RISK
            $fileatt = "documents/low-risk.report.pdf";
            $fileatttype = "application/pdf";
            $fileattname = "low-risk.report.pdf";
            $riskType = "low";
        }

        if( ($totValue >10 && $totValue <=20 ) ){
            //MID RISK
            $fileatt = "documents/mid-risk.report.pdf";
            $fileatttype = "application/pdf";
            $fileattname = "mid-risk.report.pdf";
            $riskType = "medium";

        }

        if( ($totValue >20 && $totValue <=32 ) ){
            //HIGH RISK
            $fileatt = "documents/high-risk.report.pdf";
            $fileatttype = "application/pdf";
            $fileattname = "high-risk.report.pdf";
            $riskType = "high";

        }

        $messageSender = "
        <p><strong>Thanks for completing your free CSO Group security assessment.</strong></p>
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

        $all_data_html = '<strong>The following person has just submit the report form on:  https://businessessential8.com.au/</strong><br/><br/>'.'<table border=1>
        <tr><td>Name</td><td>'.$fname.'</td></tr>
        <tr><td>Name</td><td>'.$lname.'</td></tr>
        <tr><td>Job Title</td><td>'.$job_title.'</td></tr>
        <tr><td>Email</td><td>'.$email.'</td></tr>
        <tr><td>Form Fill Date</td><td>'.$insert_date.'</td></tr>
        </table>';

        //print '<br/>'.$totValue;
        // $to      = 'amar@bang.com.au';
        $to      = 'info@csogroup.com.au';
        $subject = 'CSO GROUP - Business Essential 8 form Submit';
        $subjectSender = "CSO GROUP - Business Essential 8 Report Download";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'CC: katie@bang.com.au' . "\r\n";
        $headers .= 'From: no-reply@csogroup.com.au' . "\r\n" ;
        $headers .= 'Reply-To: no-reply@csogroup.com.au' . "\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-Mailer: PHP". phpversion() ."\r\n";

         /* if (mail($to, $subject, $all_data_html, $headers)) {
            // top one is a form fill notification email and bottom one is the Thankyou message for the user
            mail($email, $subjectSender, $bodySender, $headersFile);
            print $totValue;
        }  */
        if (mail($email, $subjectSender, $bodySender, $headersFile)) {
            // top one is a form fill notification email and bottom one is the Thankyou message for the user
            print $totValue;
        }
        else {
            print "0"; 
        }
        $exists_in_db = false;

        if(!empty($email)) {

            $query1 = "select email,submit_counter FROM registration_form where email = '" . $email . "'";
            $result = $conn->query($query1);
            $submit_counter = 0;

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $exists_in_db = true;
                    $submit_counter = $row['submit_counter'];
                }
            }
        } 
        
        $query = "";

        if($exists_in_db) {
            $query = "UPDATE registration_form " . 
                        "SET " .
                            "fname              = '".$fname."', ". 
                            "lname              = '".$lname."', ". 
                            "job_title          = '".$job_title."', ". 
                            "email              = '".$email."',".
                            "question1          = '".$question1text."'," .
                            "question2          = '".$question2text."'," .
                            "question3          = '".$question3text."'," .
                            "question4          = '".$question4text."'," .
                            "question5          = '".$question5text."'," .
                            "question6          = '".$question6text."'," .
                            "question7          = '".$question7text."'," .
                            "question8          = '".$question8text."'," .
                            "question9          = '".$question9text."'," .
                            "submit_counter     = '".($submit_counter+1)."', ". 
                            "lead_insert_date   = '".$insert_date."'," .
                            "score              = '".$totValue."'," . 
                            "risk_type          = '".$riskType."'" . 
                        "WHERE email = '" . $email . "'"; 
        }
        else {
            $query = "INSERT INTO registration_form (fname, lname, job_title, email, question1, question2, question3, question4, question5, question6, question7, question8, question9, score, risk_type, lead_insert_date) 
            VALUES ('".$fname."', '".$lname."', '".$job_title."', '".$email."', '".$question1text."', '".$question2text."', '".$question3text."', '".$question4text."', '".$question5text."', '".$question6text."', '".$question7text."', '".$question8text."', '".$question9text."', '".$totValue."', '".$riskType."','".$insert_date."');";
        }

        $conn->query($query);

    }
}
 ?> 