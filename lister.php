<?php
use PHPMailer\PHPMailer\PHPMailer;
require "PHPMailer.php"
require "Exception.php"

if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    header(string: 'Location: index.php');
    exit();
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "cmd=_notify-validate&". http_build_query($_POST));
$response = curl_exec($ch);
curl_close($ch);

//file_get_contents("test.txt", $response);
if($response == "VERIFIED" && $_POST['receiver_email']"solomaboya@gmail.com"){
  $handle = fopen("test.txt", "w");

  foreach ($_POST as $key => $value){
      $cEmail = $_POST['payer_email'];
      $name = $_POST['first_name'] . " " . $_POST['last_name'];
      $price = $_POST['mc_gross'];
      $currency = $_POST['mc_currency'];
      $item = $_POST['item_number'];
      $paymentStatus = $_POST['payment_status'];

      if ($item == "IntroWorkshopFaculty" && $currency == "USD" && $paymentStatus == "Completed" && $price == 48.5025){
          //file_put_contents("test.txt", 'All Verified!');
          $mail = new PHPMailer();

          $mail->setFrom(address: "solomaboya@gmail.com", name: "CPI Sales");
          $mail->addAttachment(path: "");
          $mail->addAddress($cEmail, $name);
          $mail->isHTML(isHtml:true);
          $mail->Subject = "Your Purchase Details";
          $mail->Body = "
             Hi, <br><br/>
             Thank you for purchase. In the attachment you will find my
             amzing REDCap Introductory workshop payments details.<br/><br/>

             Kind regards,
             Thato Maboya.
          ";
          $mail->send();

      }
  }
      //fwrite($handle, "$key => $value \r\n");

  //fclose($handle);
}

?>
