<?php
// $conn = mysqli_connect('localhost', 'root', '', 'sipmaster');
// if (!$conn) {
//   echo "not connected";
// } else {
// }

session_start();
// require_once('vendor/autoload.php');

// use PHPMailer\PHPMailer\PHPMailer;

if ($_SERVER["SERVER_NAME"] === "swarajfinpro.com" || $_SERVER["SERVER_NAME"] === "www.swarajfinpro.com") {
    $conn = mysqli_connect('localhost', 'swaracom_moduleuser', 'g]sy&tp]60I3', 'swaracom_module');
} else {
    $conn = mysqli_connect("localhost", "root", "", "sipmaster");
}
echo mysqli_error($conn);
if (!$conn) {
    die(json_encode(array("error" => "server not connect please try again later", "status" => 0)));
}

// var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" id="bootstrap" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <title>SIP FORMULA</title>
    <style>
        .length {
            /* background-color: #e8e8e8; */
            /* width: 420px; */
            /* height: 680px; */
        }

        .card_main {
            background-color: #ccc2;
        }

        .d-flex {
            display: flex !important;
            justify-content: space-around;
            align-items: center;
            flex-direction: row;
            align-content: stretch;
            flex-wrap: wrap;
        }

        .name {
            border: none;
            border-bottom: 2px solid #000;
            text-align: center;
            color: #000;
            background: none;
            -moz-appearance: none;
            -webkit-appearance: none;
            appearance: none;
            border-radius: 10%;
            outline: none;
        }

        .carousel-inner {
            height: 200px;
            border-radius: 10%;
            margin-top: 35px;
            margin-bottom: 20px;
            box-shadow: 0px 6px 5px 0px #0005;
        }

        /* .card-body {
            height: 365px;
        } */

        #myChart {
            height: 50% !important;
            width: 50% !important;
            text-align: center !important;

        }

        #myChartlumpsum {
            height: 50% !important;
            width: 50% !important;
            text-align: center !important;

        }

        .chart {
            display: flex;
            /* flex-direction: row; */
            align-content: space-between;
            justify-content: center;
        }

        .lumpsum_chart {
            display: flex;
            /* flex-direction: row; */
            align-content: space-between;
            justify-content: center;
        }

        .card_main {
            /* height: 100vh; */
            /* width: 100vw; */
        }

        #message_sip {
            font-size: 18px;
            text-align: center;
            margin-top: 20px;
        }

        #principal {
            font-size: 18px;
            text-align: center;
            /* margin-top: 14px; */
        }

        #growth {
            font-size: 18px;
            text-align: center;
            /* margin-top: 14px; */
        }
        #start_sip_now a{
            text-decoration: none;
            color: #fff;
        }
        #redirect_whatsapp a{
            text-decoration: none;
            color: #fff;
            
        }
    </style>
</head>

<body>


    <!-- <img src="./image_upoad/bg-4.png" alt=""> -->
    <div class="container-fluid mt-3">

        <div class="row justify-content-center">
            <div class="col-12 mt-4">
                <div class="card w-100 card_main">
                    <div class="card-body ">
                        <form id="complete_details" autocomplete="off" method="POST" name="validation" onsubmit="return validateemail();">
                            <h4 class="card-title text-center mt-2">SIP Customer Details</h4>
                            <div class="row justify-content-center mt-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="age"> Your Age</label>
                                        <input type="text" class="form-control form-control-sm" name="age" id="name" placeholder="Age" value="<?php echo $_SESSION['age']; ?>" readonly>

                                    </div>
                                    <div class="form-group">
                                        <label for="sip"> Your choice of Investment</label>

                                        <input type="text" class="form-control   form-control-sm " name="selection" id="invest-op" placeholder="Sip selected type" value="<?php echo $_SESSION['selection']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="amount"> Your Future Amount Valution</label>
                                        <input type="text" class="form-control   form-control-sm" id="amount" name="amount" placeholder="Amount" value="<?php echo $_SESSION['amount']; ?>" readonly>
                                    </div>



                                    <div class="form-group">
                                        <label for="term"> Your term</label>
                                        <input type="text" class="form-control  form-control-sm " name="term" id="term" placeholder="Terms" value="<?php echo $_SESSION['term']; ?>" readonly>

                                    </div>

                                    <div class="form-group">
                                        <label for="risk"> Your Risk</label>
                                        <input type="text" class="form-control  form-control-sm " id="risk" name="risk" placeholder="Risks" value="<?php echo $_SESSION['risk']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="years"> Years</label>
                                        <input type="text" class="form-control  form-control-sm " id="years" name="years" placeholder="Years" value="<?php echo $_SESSION['years']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="rate">Rate Of Return %</label>
                                        <input type="text" class="form-control  form-control-sm " id="rate" name="rate" placeholder=" Rate of Return" value="<?php echo $_SESSION['rate']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Enter Name</label>
                                        <input class="form-control  form-control-sm" type="text" id="name" name="name" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Enter Email</label>
                                        <input class="form-control  form-control-sm" type="text" id="email" name="email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile"> Enter Mobile Number </label>
                                        <!-- <input  type="text"  required maxlength="10" pattern="\d{10}" minlength="5"> -->
                                        <input class="form-control  form-control-sm " id="mobile" name="mobile_no" type="text" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" onkeyup="check() ; return false; " required /><span id="message"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <div class="output d-none">
                                        <div class="card justify-content-center">
                                            <div class="card-body">

                                                <div class="heading text-center bg-primary" style="font-size:22px ; font-weight:700;">
                                                    <!-- <i class="fa-solid fa-arrow-left text-dark"></i> -->
                                                    <span class="text-white m-4">SIP Calculator</span>
                                                </div>
                                                <div class="chart d-none mt-2">
                                                    <canvas id="myChart" class=""></canvas>
                                                </div>
                                                <div class="lumpsum_chart d-none">
                                                    <canvas id="myChartlumpsum" class=""></canvas>
                                                </div>
                                                <div id="message_sip" class="text-danger">
                                                </div>
                                                <div id="principal" class="">
                                                </div>
                                                <div id="growth" class="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <input class="btn btn-primary" type="submit" name="submit" value="Check SIP" id="submit_data" data-toggle="modal" data-target="#exampleModal">
                                
                                <button class="btn btn-primary d-none  text-white"  id="start_sip_now" type="submit"><a href="https://swarajfinpro.com/login/">Start SIP Now</a></button>
                                <button class="btn btn-success d-none  text-white ml-2"  id="redirect_whatsapp" type="submit"><a href="https://api.whatsapp.com/send?phone=919630054050&text=Hello!%20I%20Visited%20Your%20Website%20,%20Kindly%20Respond%20Me%20Back." target="blank">WhatsApp Support</a><i class="fa-brands fa-whatsapp ml-1"></i></button>

                            </div>


                    </div>
                    </form>

                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" onload="load()">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">User Information</h5>
                                <button type="button" id="form_close" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>


                            <div class="modal-body col-md-12">
                                <form method="post" id="send_mail">
                                    <div class="form-group">
                                        <label for="name">Enter Name</label>
                                        <input class="form-control  form-control-sm" type=" text" id="p-name" value="" name="user_name" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Enter Email</label>
                                        <input class="form-control  form-control-sm" type="text" id="p-email" value="" name="user_email" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="mobile"> Enter Mobile Number </label>
                                        <input class="form-control  form-control-sm " id="p-mobile" name="user_mobile_no" value="" type="text" maxlength="10" pattern="\d{10}" title="Please enter exactly 10 digits" onkeyup="check() ; return false; " required /><span id="message"></span>

                                        <!-- <input class="form-control  form-control-sm " type="text" id="p-mobile" value=""  required> -->
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" id="btn_submit" class="btn btn-primary">Confirm Details</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>








    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script src="./sip.js"></script>

    <script>
        $("#submit_data").attr("disabled", true);
        $("#mobile").keypress(function() {
            $("#submit_data").attr('disabled', false);
        })
        $("#btn_submit").on("click", function() {
            document.getElementById("submit_data").style.display="none";
            $("#start_sip_now").removeClass("d-none");
            $("#redirect_whatsapp").removeClass("d-none");
            $(".output").removeClass("d-none");
            if ($("#invest-op").val() === "SIP") {
                $(".chart").removeClass("d-none");
                add();

            } else {
                lumpsum();
                $(".lumpsum_chart").removeClass("d-none");

            }

            $("#form_close")[0].click();


            // $(this).addClass('d-none');
        })

        // $("#btn_submit")[0].click();
        // var sip_data = $(this).serialize();

        function add() {
            let futurevalue = document.getElementById("amount").value;
            let rate = document.getElementById("rate").value / 100;
            let years = document.getElementById("years").value;


            let n = years * 12;

            let a = futurevalue * (rate / 12);
            let b = (((1 + rate / 12) ** n) - 1);
            let c = 1 + (rate / 12);

            let d = b * c;
            let sip = a / d;

            let principal = sip * n;
            let growth = futurevalue - principal;

            document.getElementById("message_sip").innerHTML = "<b class='sip'>Monthly SIP Required:</b><br>" + parseFloat(sip.toFixed(0));
            document.getElementById("principal").innerHTML = "<b class='princpal'>Total Amount Invest in SIP:</b><br>" + parseFloat(principal.toFixed(0));
            document.getElementById("growth").innerHTML = "<b class='growth'> Total Growth:</b><br>" + parseFloat(growth.toFixed(0));


            const ctx = document.getElementById('myChart').getContext('2d');
            const data = {
                labels: [
                    'Growth',
                    'Principal'

                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [growth, principal],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)'
                    ],
                    hoverOffset: 5,



                }]
            };
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: {
                    plugins: {
                        tooltip: {
                            titleFont: {
                                weight: 'bold'
                            }
                        },
                        legend: {
                            labels: {
                                // This more specific font property overrides the global property
                                font: {
                                    size: 25
                                }
                            }
                        }
                    }
                }
            });

        }


        // let sip_data;
        // $("#user_modal").on("submit", function(e) {
        //     e.preventDefault();
        //     sip_data = $(this).serialize();
        //     console.log(sip_data);
        // })
        var complete_data
        $("#complete_details").on("submit", function(e) {
            e.preventDefault();
            complete_data = $(this).serialize();
            console.log(complete_data);
            $.ajax({
                type: "post",
                url: "sip_store.php",
                data: {
                    "submit": complete_data
                },
                dataType: "json",
                success: function(e) {
                    console.log(e)
                    if (e.status) {
                        console.log(e);
                        $("#p-name").val(e.data.name)
                        $("#p-email").val(e.data.email)
                        $("#p-mobile").val(e.data.mobile_no)
                        $("#form_close")[0].click();
                    }
                }

            }).catch(function(err) {
                console.log(err);
                alert(err.responseJSON.message)
            })

        });
        $("#send_mail").on("submit", function(e) {
            e.preventDefault();
            var send_mail = $(this).serialize();
            $.ajax({
                type: "post",
                url: "send_mail.php",
                data: {
                    "submit_3": send_mail + "&" + complete_data
                },
                dataType: "json",
                success: function() {
                    console.log("mail send");
                    $("#message").hide();
                }
            });
        })




        function check() {

            var mobile = document.getElementById('mobile');


            var message = document.getElementById('message');

            var goodColor = "#000";
            var badColor = "";

            if (mobile.value.length != 10) {

                mobile.style.backgroundColor = badColor;
                message.style.color = badColor;
                message.innerHTML = "required 10 Number, Please enter number format"
                $("#form_close")[0].click();
            }

        }

        function validateemail() {
            var x = document.validation.email.value;
            var atposition = x.indexOf("@");
            var dotposition = x.lastIndexOf(".");
            if (atposition < 1 || dotposition < atposition + 2 || dotposition + 2 >= x.length) {
                alert("Please enter a valid e-mail address \n atpostion:" + atposition + "\n dotposition:" + dotposition);
                return false;
                $("#form_close")[0].click();
            }
            

        }

        $("#submit_data").click(function(){
        $("#exampleModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
    </script>




</body>

</html>