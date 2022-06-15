
<?php
/*
 Template Name: PayTm Response
*/
get_header();
?>


<?php

// following files need to be included
require_once("encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList,"sgNfWgk3hgA151m3", $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		$order_id = $_POST['ORDERID'];

		global $wpdb;
        $tbl_name="n9dcB_candidate"; 
        $data=array("payment_status"=>"completed");
        $id=array('user_id'=>$order_id);
       	$res=$wpdb->UPDATE($tbl_name,$data,$id);

       	$order_id = $_POST['ORDERID'];
		global $wpdb;
		$details = $wpdb->get_results("SELECT * FROM n9dcB_candidate WHERE user_id = ". $order_id ." ");
	    foreach ($details as $x)
	  	{
	    $user_id = $x->user_id;
      $firstname = $x->firstname;
      $gender = $x->gender;
      $dob = $x->dob2;
      $contact_number = $x->contact_number;
      $contact_whats = $x->contact_whats;
      $email = $x->email;
      $cast = $x->cast;
      $fathername = $x->fathername;
      $mothername = $x->mothername;
      $parent_number = $x->parent_number;
      $country_p = $x->country_p;
      $state_p = $x->state_p;
      $city_p = $x->city_p;
      $permanentaddress = $x->permanentaddress;
      $pincode = $x->pincode;
      $last_education = $x->last_education;
      $education_status = $x->education_status;
      $course_group = $x->course_group;
      $session = $x->session;
      $course_amount = $x->course_amount;
      $course_fees = $x->course_fees;
      $inner_course = $x->inner_course;
      $payment_status = $x->payment_status;
      $referred_by_name = $x->referred_by_name;      
      $created_date = date('d/m/Y',strtotime($x->created_date));
	  	}

      $getcountry = $wpdb->get_row("SELECT name FROM n9dcB_countries where id = " . $country_p . " ");
      $countryp = $getcountry->name;
      $getstate = $wpdb->get_row("SELECT name FROM n9dcB_state where id = " . $state_p . " ");
      $statep = $getstate->name;
      $getcity = $wpdb->get_row("SELECT * FROM  n9dcB_city where id = " . $city_p . " ");
      $cityp = $getcity->name;


// send email on payment success to Renaissance team
		$headers = 'From: "Renaissance <mail@renaissance.ac.in>' . "\r\n" . 'Reply-To: mail@renaissance.ac.in' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		$headers .= "Content-Transfer-Encoding: 8bit\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";

		$to = "mail@renaissance.ac.in";
		$subject = 'Renaissance University Registration Acknowledgement';
		$post_title = $post->post_title;
		
		$message = '<html><body><div>
		<div style="margin-top: 30px;">
        <div style="background-color: #e8dbdb;padding: 10px;margin: -5px;">
          <div style="padding: 15px;">
          <img src="https://renaissance.ac.in/wp-content/uploads/2020/01/logo.png" alt="renaissance" alt="renaissance" style="width: auto;height: auto;display: block;margin-left: auto;margin-right: auto;">
          </div>
        </div>
      </div>
    
    <div style="width: 100%;padding: 0px;margin: 0px;margin-top: -7%;">
        <div style="background: #ffffff;border-radius: 30px;padding: 30px 40px;margin: auto;">
        
        <h1 style="text-align: center;color: #333333;padding: 5px 0px 10px 0px; font-weight: 600;font-size: 40px;line-height: 40px; letter-spacing: 2px; ">Thanks for Registering
        </h1>
          <h1 style="color: #333333;font-weight: 600; font-size: 28px;line-height: 40px; padding: 20px 0px;letter-spacing: 0px;">Hi ' .$firstname.  ',</h1>

        <h1 style="color: #333333; font-weight: 400; font-size: 18px; line-height: 25px; padding: 0px; letter-spacing: 0.5px;" class="email-content">This is to inform you that your admission seat has been reserved in Renaissance University Indore.
      </h1> 
      <p style="color: #333333; font-weight: 400; font-size: 18px; line-height: 25px; padding: 0px;letter-spacing: 0.5px;" class="email-content">Please Note that this Registration is just a Part of the admission Procedure. Your admission will be confirmed only after successful payment of first instalment of your fees followed by verification of your academic document.
        <br>
        For Further Information you may visit our website 
        <a href="https://renaissance.ac.in/"> www.renaissance.ac.in</a>.<br>
        <br>
      Regards
      </p> 
      <br>
      <p style="color: #333333; font-family: "Karla", sans-serif; font-weight: 400; font-size: 18px; line-height: 25px; padding: 0px;letter-spacing: 0.5px;">Renaissance University <br>
        Mobile.  9893259892 , 9893275097 Office. +91731 6684170<br>
        Mail: <a href="mailto:admissions@renaissance.ac.in"> admissions@renaissance.ac.in</a>,
        <a href="mailto:mail@renaissance.ac.in"> mail@renaissance.ac.in</a><br>
        Website: <a href="https://renaissance.ac.in/"> www.renaissance.ac.in</a><br>
      </p> 

      <div style="margin-top: 30px;">
        <div style="background-color: #e8dbdb;padding: 10px;margin: -5px;">
          <div style="padding: 15px;">
           <img src="https://renaissance.ac.in/wp-content/uploads/2020/01/logo.png" alt="renaissance" alt="renaissance" style="width: auto;height: auto;display: block;margin-left: auto;margin-right: auto;">
          </div>
        </div>
      </div>

      </div>
    </div>

		<p style="text-align: center;color:#080;font-size:28px;"> Student details:</p>
		<table width="100%" border="1">
        <tr>
        <td><b>User Id:</b></td> <td>' .$user_id. '</td>
        </tr>
        <tr>
        <td><b>Full Name:</b></td> <td>' .$firstname. '</td>
        </tr>
        <tr>
        <td><b>Date of Birth:</b></td> <td>' .$dob. '</td>
        </tr>
        <tr>
        <td><b>Gender:</b></td> <td>' .$gender. '</td>
        </tr>
        <tr>
        <td><b>contact_number:</b></td> <td>' .$contact_number. '</td>
        </tr>
        <tr>
        <td><b>Contact whats app:</b></td> <td>' .$contact_whats. '</td>
        </tr>
        <tr>
        <td><b>Email:</b></td> <td>' .$email. '</td>
        </tr>
        <tr>
        <td><b>Cast:</b></td> <td>' .$cast. '</td>
        </tr>
        <tr>
        <td><b>Mother Name:</b></td> <td>' .$mothername. '</td>
        </tr>
        <tr>
        <td><b>Father Name:</b></td> <td>' .$fathername. '</td>
        </tr>
        <tr>
        <td><b>Parent Contact Number:</b></td> <td>' .$parent_number. '</td>
        </tr>
        <tr>
        <td><b>Permanent Country:</b></td> <td>' .$countryp. '</td>
        </tr>
        <tr>
        <td><b>Permanent State:</b></td> <td>' .$statep. '</td>
        </tr>
        <tr>
        <td><b>Permanent City:</b></td> <td>' .$cityp. '</td>
        </tr>
        <tr>
        <td><b>Permanent Address:</b></td> <td>' .$permanentaddress. '</td>
        </tr>
        <tr>
        <td><b>Pincode:</b></td> <td>' .$pincode. '</td>
        </tr>
        <tr>
        <td><b>Last Education:</b></td> <td>' .$last_education. '</td>
        </tr>
        <tr>
        <td><b>Last Education Status:</b></td> <td>' .$education_status. '</td>
        </tr>
        <tr>
        <td><b>Course session:</b></td> <td>' .$session. '</td>
        </tr>
        <tr>
        <td><b>Course Category:</b></td> <td>' .$course_group. '</td>
        </tr>
        <tr>
        <td><b>Course:</b></td> <td>' .$inner_course. '</td>
        </tr>
        <tr>
        <td><b>Registration Fees:</b></td> <td>' .$course_amount. '</td>
        </tr>
        <tr>
        <td><b>Course Fees:</b></td> <td>' .$course_fees. '</td>
        </tr>
        <tr>
        <td><b>Registration Payment:</b></td> <td>' .$payment_status. '</td>
        </tr>
        <tr>
        <td><b>Counseled By :</b></td> <td>' .$referred_by_name. '</td>
        </tr>
        <tr>
        <td><b>Created Date:</b></td> <td>' .$created_date. '</td>
        </tr>
        <tr></table>

		 <p style="text-align: center;color:#080;font-size:28px;">For Any Support: <a href="https://renaissance.ac.in/"> renaissance.ac.in</a></p>
		</div></body></html>';

		wp_mail($to, $subject, $message, $headers);
       	
        
      // send email on payment success to Renaissance team
    $headers = 'From: "Renaissance <mail@renaissance.ac.in>' . "\r\n" . 'Reply-To: mail@renaissance.ac.in' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    $headers .= "Content-Transfer-Encoding: 8bit\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";

    $to = $email;
    $subject = 'Renaissance University Registration Acknowledgement';
    $post_title = $post->post_title;
    
    $message = '<html><body><div>
    <div style="margin-top: 30px;">
        <div style="background-color: #e8dbdb;padding: 10px;margin: -5px;">
          <div style="padding: 15px;">
          <img src="https://renaissance.ac.in/wp-content/uploads/2020/01/logo.png" alt="renaissance" alt="renaissance" style="width: auto;height: auto;display: block;margin-left: auto;margin-right: auto;">
          </div>
        </div>
      </div>
    

     <div style="width: 100%;padding: 0px;margin: 0px;margin-top: -7%;">
        <div style="background: #ffffff;border-radius: 30px;padding: 30px 40px;margin: auto;">
        
        <h1 style="text-align: center;color: #333333;padding: 5px 0px 10px 0px; font-weight: 600;font-size: 40px;line-height: 40px; letter-spacing: 2px; ">Thanks for Registering
        </h1>
          <h1 style="color: #333333;font-weight: 600; font-size: 28px;line-height: 40px; padding: 20px 0px;letter-spacing: 0px;">Hi ' .$firstname.  ',</h1>

        <h1 style="color: #333333; font-weight: 400; font-size: 18px; line-height: 25px; padding: 0px; letter-spacing: 0.5px;" class="email-content">This is to inform you that your admission seat has been reserved in Renaissance University Indore.
      </h1> 
      <p style="color: #333333; font-weight: 400; font-size: 18px; line-height: 25px; padding: 0px;letter-spacing: 0.5px;" class="email-content">Please Note that this Registration is just a Part of the admission Procedure. Your admission will be confirmed only after successful payment of first instalment of your fees followed by verification of your academic document.
        <br>
        For Further Information you may visit our website 
        <a href="https://renaissance.ac.in/"> www.renaissance.ac.in</a>.<br>
        <br>
      Regards
      </p> 
      <br>

      <p style="color: #333333; font-family: "Karla", sans-serif; font-weight: 400; font-size: 18px; line-height: 25px; padding: 0px;letter-spacing: 0.5px;">Renaissance University <br>
        Mobile.  9893259892 , 9893275097 Office. +91731 6684170<br>
        Mail: <a href="mailto:admissions@renaissance.ac.in"> admissions@renaissance.ac.in</a>,
        <a href="mailto:mail@renaissance.ac.in"> mail@renaissance.ac.in</a><br>
        Website: <a href="https://renaissance.ac.in/"> www.renaissance.ac.in</a><br>
      </p> 

      <div style="margin-top: 30px;">
        <div style="background-color: #e8dbdb;padding: 10px;margin: -5px;">
          <div style="padding: 15px;">
           <img src="https://renaissance.ac.in/wp-content/uploads/2020/01/logo.png" alt="renaissance" alt="renaissance" style="width: auto;height: auto;display: block;margin-left: auto;margin-right: auto;">
          </div>
        </div>
      </div>

      </div>
    </div>

    <p style="text-align: center;color:#080;font-size:28px;"> Student details:</p>
    <table width="100%" border="1">
        <tr>
        <td><b>User Id:</b></td> <td>' .$user_id. '</td>
        </tr>
        <tr>
        <td><b>Full Name:</b></td> <td>' .$firstname. '</td>
        </tr>
        <tr>
        <td><b>Date of Birth:</b></td> <td>' .$dob. '</td>
        </tr>
        <tr>
        <td><b>Gender:</b></td> <td>' .$gender. '</td>
        </tr>
        <tr>
        <td><b>contact_number:</b></td> <td>' .$contact_number. '</td>
        </tr>
        <tr>
        <td><b>Contact whats app:</b></td> <td>' .$contact_whats. '</td>
        </tr>
        <tr>
        <td><b>Email:</b></td> <td>' .$email. '</td>
        </tr>
        <tr>
        <td><b>Cast:</b></td> <td>' .$cast. '</td>
        </tr>
        <tr>
        <td><b>Mother Name:</b></td> <td>' .$mothername. '</td>
        </tr>
        <tr>
        <td><b>Father Name:</b></td> <td>' .$fathername. '</td>
        </tr>
        <tr>
        <td><b>Parent Contact Number:</b></td> <td>' .$parent_number. '</td>
        </tr>
        <tr>
        <td><b>Permanent Country:</b></td> <td>' .$countryp. '</td>
        </tr>
        <tr>
        <td><b>Permanent State:</b></td> <td>' .$statep. '</td>
        </tr>
        <tr>
        <td><b>Permanent City:</b></td> <td>' .$cityp. '</td>
        </tr>
        <tr>
        <td><b>Permanent Address:</b></td> <td>' .$permanentaddress. '</td>
        </tr>
        <tr>
        <td><b>Pincode:</b></td> <td>' .$pincode. '</td>
        </tr>
        <tr>
        <td><b>Last Education:</b></td> <td>' .$last_education. '</td>
        </tr>
        <tr>
        <td><b>Last Education Status:</b></td> <td>' .$education_status. '</td>
        </tr>
        <tr>
        <td><b>Course session:</b></td> <td>' .$session. '</td>
        </tr>
        <tr>
        <td><b>Course Category:</b></td> <td>' .$course_group. '</td>
        </tr>
        <tr>
        <td><b>Course:</b></td> <td>' .$inner_course. '</td>
        </tr>
        <tr>
        <td><b>Registration Fees:</b></td> <td>' .$course_amount. '</td>
        </tr>
        <tr>
        <td><b>Course Fees:</b></td> <td>' .$course_fees. '</td>
        </tr>
        <tr>
        <td><b>Registration Payment:</b></td> <td>' .$payment_status. '</td>
        </tr>
        <tr>
        <td><b>Referred By Name:</b></td> <td>' .$referred_by_name. '</td>
        </tr>
        <tr>
        <td><b>Created Date:</b></td> <td>' .$created_date. '</td>
        </tr>
        <tr></table>

     <p style="text-align: center;color:#080;font-size:28px;">For Any Support: <a href="https://renaissance.ac.in/"> renaissance.ac.in</a></p>
    </div></body></html>';

    wp_mail($to, $subject, $message, $headers);

    echo "
<html>
  <head>
    <title>Thank You Page</title>
  </head>
  <body>
    <center style='box-shadow: 0px 3px 30px -8px rgba(0, 0, 0, 0.2); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s; margin: 300px 50px 100px 50px; padding:50px;'><h1>Your Payment Received Successfully...</h1>
    <h1>Thank You</h1>
    <h1><a href='https://renaissance.ac.in/register-now/'>Back To Register Page </a></h1>
  </center>
   </body>
</html>";
	}
	else {
    $order_id = $_POST['ORDERID'];
    global $wpdb;
    $details = $wpdb->get_results("SELECT * FROM n9dcB_candidate WHERE user_id = ". $order_id ." ");
      foreach ($details as $x)
      {

          $user_id = $x->user_id;
          $firstname = $x->firstname;
          $gender = $x->gender;
          $dob = $x->dob2;
          $contact_number = $x->contact_number;
          $contact_whats = $x->contact_whats;
          $email = $x->email;
          $cast = $x->cast;
          $fathername = $x->fathername;
          $mothername = $x->mothername;
          $parent_number = $x->parent_number;
          $country_p = $x->country_p;
          $state_p = $x->state_p;
          $city_p = $x->city_p;
          $permanentaddress = $x->permanentaddress;
          $pincode = $x->pincode;
          $last_education = $x->last_education;
          $education_status = $x->education_status;
          $session = $x->session;
          $course_group = $x->course_group;
          $course_amount = $x->course_amount;
          $course_fees = $x->course_fees;
          $inner_course = $x->inner_course;
          $payment_status = $x->payment_status;
          $referred_by_name = $x->referred_by_name;      
          $created_date = date('d/m/Y',strtotime($x->created_date));
      }

    echo "
<html>
  <head>
    <title>Thank You Page</title>
  </head>
  <body>
    <center style='box-shadow: 0px 3px 30px -8px rgba(0, 0, 0, 0.2); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s; margin: 300px 50px 100px 50px; padding:50px;'><h1>Your Payment Not Received Successfully...</h1>
    <h1>Thank You</h1>
    <h1><a href='https://renaissance.ac.in/register-now/'>Back To Register Page </a></h1>
  </center>
   </body>
</html>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 	
		$order_id = $_POST['ORDERID'];  
		
		foreach($_POST as $paramName => $paramValue) {
			//echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
}
else {
	echo "
<html>
  <head>
    <title>Thank You Page</title>
  </head>
  <body>
    <center style='box-shadow: 0px 3px 30px -8px rgba(0, 0, 0, 0.2); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s; margin: 300px 50px 100px 50px; padding:50px;'><h1>Merchant Key Not Matched So Your Payment Not Received Successfully...</h1>
		<h1>Thank You</h1>
		<h1><a href='https://renaissance.ac.in/register-now/'>Back To Register Page </a></h1>
	</center>
   </body>
</html>";
	//Process transaction as suspicious.
}

?>


<?php
get_footer();
