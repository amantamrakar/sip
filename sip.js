$("#name").keyup(function (e) {
  var pattern = new RegExp("^[0-9]*$");
  // var value = $("#name").val();
  $("#amount").attr("disabled", false);
  // $("#amount").focus();
  if (pattern.test(e.originalEvent.key)) {
    // $("#name").val(value+e.originalEvent.key);
    // console.log("aman");
    $("#second").removeClass("d-none");
  } else {
    // alert("Please enter digits");
    // if(value != "" || /\w/.test(e.originalEvent.key)){
    //   $("#name").val("")
    // }else{
    //   $("#name").val(value)
    // }
    // $("#name").attr('disabled',true)
  }
  if (!/\d/.test($("#name").val())) {
    $("#name").val("");
  }
});
// $("#dropdownMenuButton").click(function () {

//   console.log(years);

// });

function my_res(type) {
  return `As per your <strong>age</strong>, we suggest you to plan for ${type} Term.`;
}

function my_query(type) {
  return `As per your <strong>tenure age</strong>, we suggest you to plan for ${type} Term.`;
}
var custom = document.querySelector("#name").value;

function getval() {
  // $(".sugg").hide();

  // $("#dropdownMenuButton1").on("click", function () {
  //   //$(".sugg").show();
  // });
  var age = document.querySelector("input").value;
  $("#age").val(age);
  var text = document.getElementById("whylong");

  // let type="";
  // = text.innerHTML;
  //   console.log(age);
  // $(".sugg").hide();

  if (age >= 0 && age <= 40) {
    long.innerHTML =
      "<div data-s='long'><div class ='d-inline mr-5'>Long</div><span class='sugg btn btn-success btn-sm'>Suggestion</span><span class='HeightAnimated btn btn-info btn-sm'>Above 7+ Years</span></div>";
    document.getElementById("why").innerHTML =
      "<strong class=''>Why Long Term ?</strong> ";
    long.classList.add("active");
    mid.classList.remove("active");
    short.classList.remove("active");
    // var replace = text.innerText.replace('aaa','long');
    text.innerHTML = my_res("Long");
  } else if (age > 40 && age <= 60) {
    mid.innerHTML =
      "<div data-s='mid'><div class =' d-inline mr-5' >Mid</div><span class='sugg btn btn-success btn-sm'>Suggestion</span><span class='HeightAnimated btn btn-info btn-sm'>Above 4-6 Years</span></div>";
    document.getElementById("why").innerHTML =
      "<strong>Why Mid Term ?</strong> ";
    long.classList.remove("active");
    mid.classList.add("active");
    short.classList.remove("active");
    text.innerHTML = my_res("Mid");
  } else if (age >= 61 && age <= 100) {
    short.innerHTML =
      "<div data-s='short'><div class =' d-inline mr-5 '>Short</div><span class='sugg btn btn-success btn-sm'>Suggestion</span><span class='HeightAnimated btn btn-info btn-sm'>Above 1-3 Years</span></div>";
    document.getElementById("why").innerHTML =
      "<strong>Why Short Term ?</strong> ";
    long.classList.remove("active");
    mid.classList.remove("active");
    short.classList.add("active");
    text.innerHTML = my_res("Short");
  }
}
$("#years").focus(function (e) {
  // console.log("DJ");

  var values = $("#dropdownMenuButton1").val();
  var years = $("#years").val();
  if (values == "Long") {
    if (years >= 7 && years <= 50) {
      console.log("long");
      $("#long_years").removeClass("d-none");
    }
  } else if (values == "Mid") {
    if (years >= 4 && years <= 6) {
      console.log("Mid");
    }
  } else if (values == "Short") {
    if (years >= 1 && years <= 3) {
      console.log("short");
    }
  } else {
    // alert("no");
  }
});

document.querySelector("#s-type")?.addEventListener("click", function (e) {
  if (e.target.id === "text" || e.target.id === "s-type") {
    return;
  }
  var goal = e.target.id;
  $(".riskfactor").hide();
  // $("#dropdownMenuButton").removeAttr("disabled");
  $("#dropdownMenuButton1").val(goal);
  // $("#years").focus();
  $(".custom_select").addClass("d-none");

  var text = document.getElementById("whyrisk");

  if (goal === "Long") {
    document.getElementById("High").innerHTML =
      "<div ><div class =' d-inline mr-5 '>High</div><span class='riskfactor btn btn-danger btn-sm'>Suggestion</span><span class='HeightAnimated btn btn-warning btn-sm'>10 - 12% Return<span></div>";
    document.getElementById("serious").innerHTML =
      "<strong>Why Long Term ?</strong> ";
    text.innerHTML = my_res("High");
    text.innerHTML = my_query("High");
    $("#long_years").removeClass("d-none");
    // $('#high').val('');
  } else if (goal === "Mid") {
    document.getElementById("Medium").innerHTML =
      "<div ><div class =' d-inline  mr-3'>Medium</div><span  class='riskfactor btn btn-danger btn-sm '>Suggestion</span><span class='HeightAnimated btn btn-warning btn-sm'>8 - 10% Return</span></div>";
    document.getElementById("serious").innerHTML =
      "<strong>Why Mid Term ?</strong> ";
    text.innerHTML = my_res("Medium");
    text.innerHTML = my_query("Medium");
    $("#mid_years").removeClass("d-none");
  } else if (goal === "Short") {
    document.getElementById("Low").innerHTML =
      "<div ><div class =' d-inline mr-5 '>Low</div><span class='riskfactor btn btn-danger btn-sm'>Suggestion</span><span class='HeightAnimated btn btn-warning btn-sm'>5 - 8% Return</span></div>";
    document.getElementById("serious").innerHTML =
      "<strong>Why Short Term ?</strong> ";
    text.innerHTML = my_res("Low");
    text.innerHTML = my_query("Low");
    $("#short_years").removeClass("d-none");
  }
});

// $('.drop').click(function(e) {
// console.log(goal);
document.querySelector("#drop")?.addEventListener("click", function (e) {
  var goal = e.target.textContent;
  if (e.target.id === "title" || e.target.id === "drop") {
    return;
  }
  var goal = e.target.id;
  $("#dropdownMenuButton").val(goal);
  $(".button").removeAttr("disabled");
  $("#start").removeClass("link");
});

$(".custom_select").click(function (e) {
  e.preventDefault();
  $("#years").val(e.target.value);
});

const long = document.getElementById("Long");
const mid = document.getElementById("Mid");
const short = document.getElementById("Short");
const High = document.getElementById("High");
const medium = document.getElementById("Medium");
const low = document.getElementById("Low");

// console.log(termlong);
// console.log(termMid);
// console.log(termShort);
// console.log(riskHigh);
// console.log(riskMedium);
// console.log(riskLow);

// var termlong = $("#Long").attr("data-s");
// var termMid = $("#Mid").attr("data-s");
// var termShort = $("#Short").attr("data-s");
// var riskHigh = $("#High").attr("data-s");
// var riskMedium = $("#Medium").attr("data-s");
// var riskLow = $("#Low").attr("data-s");

$("#user_form").on("submit", function (e) {
  // e.preventDefault();
  var tenure = $("#dropdownMenuButton1").val();
  var risk = $("#dropdownMenuButton").val();
  // console.log(tenure, risk);
  console.log("work");
  if (tenure == "Long" && risk == "High") {
    $("#rate").val("13");
  } else if (tenure == "Long" && risk == "Mid") {
    $("#rate").val("11");
  } else if (tenure == "Short" && risk == "Low") {
    $("#rate").val("8");
  } else if (tenure == "Short" && risk == "High") {
    $("#rate").val("10");
  } else if (tenure == "Short" && risk == "Mid") {
    $("#rate").val("10");
  } else if (tenure == "Long" && risk == "Low") {
    $("#rate").val("8");
  } else if (tenure == "Mid" && risk == "Medium") {
    $("#rate").val("11");
  } else if (tenure == "Mid" && risk == "High") {
    $("#rate").val("11");
  } else if (tenure == "Mid" && risk == "Low") {
    $("#rate").val("8");
  } else {
    $("#rate").val("10");

  }
  // console.log(rate);
});

$("#amount").on("keypress", function () {
  // $("#dropdownMenuButton1").attr("disabled", false);
});

// $(".custom_select").on("click", function () {
//   $("#dropdownMenuButton").attr("disabled", false);
// });
// lumpsum();
function lumpsum() {
  console.log("aman");
  let futurevalue = document.getElementById("amount").value;
  let rate = document.getElementById("rate").value / 100;
  let years = document.getElementById("years").value;
  let pv = futurevalue / (1 + rate) ** years;
  let principal = pv * years;
  let growth = futurevalue - pv;
  console.log(pv, principal, growth);
  document.getElementById("message").innerHTML =
    "<b class='sip'>Lumpsum Amount Required:</b><br>" +
    parseFloat(futurevalue).toFixed(0);
  document.getElementById("principal").innerHTML =
    "<b class='princpal'>Present Valuation</b><br>" + parseFloat(pv).toFixed(0);
  document.getElementById("growth").innerHTML =
    "<b class='growth'> Total Growth:</b><br>" + parseFloat(growth).toFixed(0);

  const ctx = document.getElementById("myChartlumpsum").getContext("2d");
  const data = {
    labels: ["Growth","principal"],
    datasets: [
      {
        label: "My First Dataset",
        data: [growth,principal],
        backgroundColor: ["rgb(255, 99, 132)", "rgb(54, 162, 235)"],
        hoverOffset: 5,
      },
    ],
  };
  const myChart = new Chart(ctx, {
    type: "pie",
    data: data,
    options: {
      plugins: {
        legend: {
          labels: {
            // This more specific font property overrides the global property
            font: {
              size: 25,
            },
          },
        },
      },
    },
  });
}
$("#select").on("change", function () {
  var option = $(this).val();
  // console.log(option);
  if (option === "lampsum") {
  }
});
$(".validate").on("change", function () {
  // console.log($(this));

  const checkVal = new Array($(".validate").length).fill(false);
  // console.log(checkVal);
  //[0] == name like age
  if ($("#name").val() < 18) {
    alert("only above 18 are used this");
    checkVal[0] = true;
    // $("#showdata").attr("disabled",true);
  } else if ($("#amount").val() < 99999) {
    alert("Please Enter the Amount Above 1 lakhs");
    checkVal[1] = true;
  } else {
    checkVal[1] = false;
  }

  if (checkVal.some((e) => e === true)) {
    $("#showdata").attr("disabled", true);
  }
});

