
<?php
// $conn = mysqli_connect('localhost', 'root', '', 'sipmaster');
// if (!$conn) {
//   echo "not connected";
// } else {
// }

session_start();
require_once('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["SERVER_NAME"] === "swarajfinpro.com" || $_SERVER["SERVER_NAME"] === "www.swarajfinpro.com") {
    $conn = mysqli_connect('localhost', 'swaracom_moduleuser', 'g]sy&tp]60I3', 'swaracom_module');
} else {
    $conn = mysqli_connect("localhost", "root", "", "sipmaster");
}
echo mysqli_error($conn);
if (!$conn) {
    die(json_encode(array("error" => "server not connect please try again later", "status" => 0)));
}
if (isset($_POST['submit_3'])) {
    // print_r($_POST);
    parse_str($_POST['submit_3'],$req);
    $_SESSION['name'] = $req['user_name'];
    $_SESSION['email'] = $req['user_email'];
    $_SESSION['mobile_no'] = $req['user_mobile_no'];
    echo "work";
    $mail = new PHPMailer();
    $mail1 = new PHPMailer();
    // $mail->SMTPDebug  = 3;
    // $mail->SMTPDebug=SMTP::DEBUG_SERVER;
    $mail->CharSet = "utf-8";
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    // enable SMTP authentication
    $mail->SMTPAuth = true;
    // GMAIL username
    // $mail->Username = "wishky955@gmail.com";
    $mail->Username = "info@swarajfinpro.com";
    // GMAIL password
    $mail->Password = "Sfin#1234";
    // $mail->SMTPSecure = "tls";
    $mail->SMTPSecure = "STARTTLS";
    // sets GMAIL as the SMTP server
    // $mail->Host = "smtp.gmail.com";
    $mail->Host = "outlook.office365.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = 587;
    // $mail->From = 'wishky955@gmail.com';
    $mail->From = 'info@swarajfinpro.com';
    $mail->FromName = 'SwarajFinpro';
    // function myfun(){
    // $mail->AddAddress("support.swaraj@swarajfinpro.com", "Swaraj Finpro");
    $mail->AddAddress("amantamrakar9522@gmail.com", "Swaraj Finpro");
    $mail->Subject =  'Sip Details Submitted by "' . strtoupper($req['name']) . '"';
    $mail->IsHTML(true);
    $mail->Body = "<div style='border:1px solid red;'>
      <div><span> Name:-</span>" .   $req['name'] . "</div>
      <div><span> Email:-</span>" . $req['email'] . "</div>
      <div><span> mobile_no:-</span>" . $req['mobile_no'] . "</div>
      <div><span> Age:-</span>" . $req['age'] . "</div>
      <div><span> Selection:-</span>" .  $req['selection'] . "</div>
      <div><span> Term:-</span>" . $req['term'] . "</div>
      <div><span> Risk:-</span>" .  $req['risk'] . "</div>
      <div><span> Amount:-</span>" .  $req['amount'] . "</div>
      <div><span> Years:-</span>" . $req['years'] . "</div>
      <div><span> Rate:-</span>" . $req['rate'] . "</div>

      </div>";
    if ($mail->Send()) {
        // echo "Check Your Email and Click on the link sent to your email";
    } else {
        echo   "Mail Error - >" . $mail->ErrorInfo;
    }
    // $mail->SMTPDebug  = 3;
    // $mail->SMTPDebug=SMTP::DEBUG_SERVER;
    $mail1->CharSet = "utf-8";
    $mail1->IsSMTP();
    $mail1->Mailer = "smtp";
    // enable SMTP authentication
    $mail1->SMTPAuth = true;
    // GMAIL username
    // $mail1->Username = "wishky955@gmail.com";
    $mail1->Username = "info@swarajfinpro.com";
    // GMAIL password
    $mail1->Password = "Sfin#1234";
    // $mail1->SMTPSecure = "tls";
    $mail1->SMTPSecure = "STARTTLS";
    // sets GMAIL as the SMTP server
    // $mail1->Host = "smtp.gmail.com";
    $mail1->Host = "outlook.office365.com";
    // set the SMTP port for the GMAIL server
    $mail1->Port = 587;
    // $mail1->From = 'wishky955@gmail.com';
    $mail1->From = 'info@swarajfinpro.com';
    $mail1->FromName = 'SwarajFinpro';
    // function myfun(){
    // $mail1->AddAddress("help.swarajfinpro@gmail.com", "Swaraj Finpro");
    $mail1->AddAddress("amantamrakar9522@gmail.com", "Swaraj Finpro");

    $mail1->Subject = 'Sip Details Submitted by "' . strtoupper($req['name']) . '"';
    $mail1->IsHTML(true);
    $mail1->Body = "<div style='border:1px solid red;'>
        <div><span> Name:-</span>" .   $req['name'] . "</div>
        <div><span> Email:-</span>" . $req['email'] . "</div>
        <div><span> Mobile:-</span>" . $req['mobile_no'] . "</div>
    </div>";
    if ($mail1->Send()) {
        // session_unset();
        // session_destroy();
    } else {
        echo   "Mail Error - >" . $mail1->ErrorInfo;
    }
    echo "work";

} else {
    echo mysqli_error($conn);
}
?>