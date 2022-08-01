<?php
// include_once"./SIPformula.php";
// $conn = mysqli_connect('localhost', 'root', '', 'sipmaster');
// if (!$conn) {
//   echo "not connected";
// } else {
// }

if ($_SERVER["SERVER_NAME"] === "swarajfinpro.com" || $_SERVER["SERVER_NAME"] === "www.swarajfinpro.com") {
  $conn = mysqli_connect('localhost', 'swaracom_moduleuser', 'g]sy&tp]60I3', 'swaracom_module');
} else {
  $conn = mysqli_connect("localhost", "root", "", "swarajdb");
}
echo mysqli_error($conn);
if (!$conn) {
  die(json_encode(array("error" => "server not connect please try again later", "status" => 0)));
}
session_start();
// var_dump($_POST);
if (isset($_POST['submit'])) {
  $_SESSION['age'] = $_POST['age'];
  $_SESSION['selection'] = $_POST['selection'];
  $_SESSION['term'] = $_POST['term'];
  $_SESSION['risk'] = $_POST['risk'];
  $_SESSION['amount'] = $_POST['amount'];
  $_SESSION['years'] = $_POST['years'];
  $_SESSION['rate'] = $_POST['rate'];
  $_SESSION['name'] = $_POST['name'];
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['mobile_no'] = $_POST['mobile_no'];

  // echo $_SESSION['age'];
  // echo $_SESSION['selection'];
  // echo $_SESSION['term'];
  // echo $_SESSION['risk'];
  header('location:sipforward.php');
}
echo mysqli_error($conn);
// echo date("h-i-s",time());
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
</head>
<style>
  .name {
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: 2px solid #000;
    text-align: center;
    color: #000;
    background: none;
    -moz-appearance: none;
    -webkit-appearance: none;
    appearance: none;
    width: 170px;
    border-radius: 10%;

    outline: none;
  }

  .nav-link {
    background-color: #ccc;
    color: #fff;
  }

  .nav-link.active {
    background-color: #000;
    color: blue;
  }

  li {
    border-bottom: 1px solid #e2e0da;
    padding: 10px 11px;
    font-size: 15px;
    font-family: sans-serif;
    width: 300px;
    /* height: 100px; */
  }

  #s-type li>*,
  #drop li>* {
    pointer-events: none;
  }

  .link {
    text-align: center;
    pointer-events: none;
  }


  .font {
    font-size: 17px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

  }

  .terms {
    border-bottom: 1px solid #e2e0da;
    /* border-radius: 10%; */
    padding: 8px 11px;
    font-size: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    text-align: center;
  }

  #select {

    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: black;
  }

  .form-control {
    border-top: none;
    border-right: none;
    border-left: none;
    border-bottom: 2px solid #ccc;
  }

  #why {
    text-align: center;
  }

  .card {
    height: 300px;
    width: 100%;
    display: flex;
    text-align: center;
    align-items: center;
    flex-direction: row;
    background-color: #f6f6f6;
  }

  .sugg {
    display: none;
  }

  li.active .sugg {
    display: inline-block;
    height: 23px;
    font-size: 12px;
    line-height: 12px;
    /* margin: 1%; */

  }

  .riskfactor {
    display: inline-block;
    height: 23px;
    font-size: 12px;
    line-height: 12px;
    /* margin: 1%; */

  }


  .HeightAnimated {
    overflow: hidden;
    height: 23px;
    font-size: 12px;
    line-height: 12px;
    float: right;
  }

  .drop_menu:hover>.menu {
    display: block;
  }

  .custom_select li {
    border-bottom: 1px solid #e2e0da;
    padding: 10px 11px;
    font-size: 15px;
    font-family: sans-serif;
    width: 200px;
  }

  .custom_select li i {
    float: right;
  }

  /* .custom_select li:hover{
    background-color: #ccc;
  } */
  .dropdown-menu li:hover {
    background-color: #ccc;
  }
</style>

<body>


  <div class="container font ">
    <div class="row justify-content-center">
      <div class="card">
        <div class="card-body">

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="user_form" class="form" autocomplete="off">
              <div class="col-md-12 col-sm-6  ">

                <div class="input-box ">
                  <span class="font-weight-bold">I'am</span>
                  <input type="text" maxlength="2" autocomplete="off" class="name validate" id="name" name="age" onblur="getval()" placeholder="Enter Age" required>
                  <span class="font-weight-bold">
                    Years old and I want to <span class="text-danger">invest</span>
                  </span>
                  <select class="name" id="select" name="selection">
                    <option class="sip  btn btn-outline-dark" value="SIP"><span>SIP(Montly)</span> </option>
                    <option class="sip  btn btn-outline-dark" value="lampsum"><span>Lumpsum(One-time)</span> </option>
                    <option class="sip btn btn-outline-dark" value="Both"><span>Both</span></option>
                  </select>
                  <span><i class="fa-solid fa-caret-down"></i></span>
                  <span class="font-weight-bold">
                    Future valuation
                  </span>
                  <input class=" name validate " id="amount" type="text" placeholder="Enter Amount" name=amount required value="100000">
                </div>
              </div>
              <div class="col-md-12 col-sm-6">

                <div class="input-box d-none mt-4" id="second">
                  <span class="font-weight-bold">
                    My Tenure is
                  </span>

                  <div class="dropdown d-inline ">
                    <input class=" name input dropdown-toggle validate" type="text" name="term" id="dropdownMenuButton1" data-toggle="dropdown" aria-expanded="false" placeholder="Terms of SIP" required>
                    <i class="fa-solid fa-caret-down"></i>
                    </input>
                    <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenuButton1" id="s-type">
                      <li class="terms">Terms</li>
                      <li class="first" value=0 id="Long" data-s="Long">Long
                        <span class='HeightAnimated btn btn-info btn-sm float-right'>Above 7+ Years</span>
                      </li>
                      <li class="first" value=1 id="Mid" data-s="Mid">Mid
                        <span class='HeightAnimated btn btn-info btn-sm float-right'>Above 4-6 Years</span>
                      </li>
                      <li class="first" value=2 id="Short" data-s="Short">Short
                        <span class='HeightAnimated btn btn-info btn-sm float-right'>Above 1-3 Years</span>
                      </li>
                      <li class="SuggestionBox" id="text">
                        <div id="why" class="Suggestiontenure"><strong>Why Mid Term?</strong></div>
                        <div class="taxt" id='whylong'></div>
                      </li>
                    </ul>
                    <span class="font-weight-bold">
                      In
                    </span>
                    <div class="dropdown d-inline drop_menu">
                      <input class=" name input dropdown-toggle validate" type=" text" placeholder="Enter Years" name="years" id="years" maxlength="3" data-toggle="dropdown" aria-expanded="false" required>
                      <i class="fa-solid fa-caret-down"></i>
                      </input>

                      <ul class="dropdown-menu drop mt-2  d-none menu  custom_select" aria-labelledby="dropdownMenuButton" id="short_years" min="1" max="3">
                        <li value="1">1 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li value="2">2 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li value="3">3 years<i class="fa-solid fa-calendar-check  "></i></li>
                      </ul>
                      <ul class="dropdown-menu drop mt-2 menu d-none custom_select" aria-labelledby="dropdownMenuButton" id="mid_years">
                        <li value="4">4 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li value="5">5 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li value="6">6 years <i class="fa-solid fa-calendar-check  "></i></li>
                      </ul>
                      <ul class="dropdown-menu drop mt-2 menu d-none custom_select" aria-labelledby="dropdownMenuButton" id="long_years">
                        <li value="7">7 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li value="8">8 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li value="9">9 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li value="10">10 years <i class="fa-solid fa-calendar-check  "></i></li>
                        <li class="user_input" id="text">
                          <div id="user" class="user_input"><strong>Enter how many Years of SIP you want??</strong></div>

                        </li>
                      </ul>
                    </div>
                    <span class="font-weight-bold">
                      Years,
                    </span>
                    <span class="font-weight-bold mr-3">
                      and My Risk is
                    </span>
                  </div>

                  <div class="dropdown d-inline">
                    <input class=" name input dropdown-toggle validate" type="text" name="risk" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" placeholder="Risk Factor" required>
                    <i class="fa-solid fa-caret-down"></i>
                    </input>
                    <ul class="dropdown-menu drop mt-2" aria-labelledby="dropdownMenuButton" id="drop">
                      <li class="terms">Risk Factor</li>
                      <li id="High" data-s="High">High
                        <span class='HeightAnimated btn btn-warning btn-sm float-right'>10 - 12% Return</span>

                      </li>
                      <li id="Medium" data-s="Medium">Medium
                        <span class='HeightAnimated btn btn-warning btn-sm float-right'>8 - 10% Return</span>

                      </li>
                      <li id="Low" data-s="Low">Low
                        <span class='HeightAnimated btn btn-warning btn-sm float-right'>5 - 8% Return</span>

                      </li>
                      <li class="SuggestionBox" id="title">
                        <div id="serious" class="Suggestiontenure"><strong>Why Mid Term?</strong></div>
                        <div id="whyrisk" class="taxt">As per your <strong>age</strong>, we suggest you to plan for long Term.</div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="d-none">
                <label for="rate">Rate Of Return</label>
                <div class="form-group">
                  <input type="text" class="form-control " id="rate" name="rate" placeholder=" Rate of Return" readonly>
                </div>

              </div>
              <button for="showdata" type="submit" name="submit" id="showdata" class="button btn btn-primary btn-sm mt-5 " disabled>Submit</button>

            </form>
          

        </div>
      </div>
    </div>
  </div>




  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <script src="./sip.js"></script>

  <script>


  </script>


</body>

</html>