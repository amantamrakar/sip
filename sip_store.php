<?php
session_start();
// echo date_default_timezone_get();
date_default_timezone_set("Asia/kolkata");
// echo date_default_timezone_get();
// $conn = mysqli_connect('localhost', 'root', '', 'sipmaster');
// if (!$conn) {
//     echo "not connected";
// } else {
// }
if ($_SERVER["SERVER_NAME"] === "swarajfinpro.com" || $_SERVER["SERVER_NAME"] === "www.swarajfinpro.com") {
    $conn = mysqli_connect('localhost', 'swaracom_moduleuser', 'g]sy&tp]60I3', 'swaracom_module');
} else {
    $conn = mysqli_connect("localhost", "root", "", "sipmaster");
}
echo mysqli_error($conn);
if (!$conn) {
    die(json_encode(array("error" => "server not connect please try again later", "status" => 0)));
}
// $alert = false;
// var_dump($_POST);
if (isset($_POST["submit"])) {
    parse_str($_POST["submit"],$req);
    $name = $req['name'];
    $email = $req['email'];
    $mobile = $req['mobile_no'];
    $age = $req['age'];
    $option = $req['selection'];
    $term = $req['term'];
    $risk = $req['risk'];
    $amount = $req['amount'];
    $year = $req['years'];
    $rate = $req['rate'];

    // $subject = "Welcome to Swaraj Finpro";
    // // $message = $mobile;
    // // $header = "amantamrakar9522@gmail.com";
$time= date("Y-m-d h:i:sa",time());
  
    $sql = "INSERT INTO `sipuser` (`age`,`selection`,`term`,`risk`,`amount`,`years`,`rate`,`name`,`email`,`mobile_no`,`user_enter`) value ('$age','$option','$term','$risk','$amount','$year','$rate','$name','$email','$mobile','$time')";

    $result = mysqli_query($conn, $sql);
    // echo mysqli_query($conn, $sql);
    if ($result) {
        $data['name'] = $req['name'];
    $data['email'] = $req['email'];
    $data['mobile_no'] = $req['mobile_no'];
        echo json_encode(array("message"=>"Inserted","status"=>1,"data"=>$data));
        // if (file_exists('json/sip_user.json')) {
        //     $cuurent_data = file_get_contents('json/sip_user.json');
        //     $array = json_decode($cuurent_data, true);

        //     $new_array = array(
        //         'name' => $_POST['name'],
        //         'emial' => $_POST['email'],
        //         'mobile_no' => $_POST['mobile_no'],
        //         'amount' => $_POST['amount']
        //     );
        //     $array[] = $new_array;
        //     $json_data = json_encode($array, JSON_PRETTY_PRINT);
        //     if (file_put_contents('json/sip_user.json', $json_data)) {
        //     } else {
        //         echo "<script>alert('success')</script>";
        //     }
        // } else {
        //     echo "<script>alert('failed')</script>";
        // }


        // session_unset();
        // session_destroy();
    }
}else{
    http_response_code(400);
    echo json_encode(array("message"=>"not Inserted","status"=>0));
}

echo mysqli_error($conn)

?>
