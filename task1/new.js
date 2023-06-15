let form = document.getElementById("myForm");
let pointA = document.getElementById("pointA");
let pointB = document.getElementById("pointB");
let error = document.getElementById("error");
let submit = document.getElementById("submitButton");

let distance1 = document.getElementById("distance1");
let distance2 = document.getElementById("distance2");

function myFunction() {
    var  pointAValue = GetValueAndRadian(pointA.value);
    var pointBValue = GetValueAndRadian(pointB.value);
  console.log(pointAValue.lat);
  console.log(pointAValue.lng);

  console.log(pointBValue.lat);
  console.log(pointBValue.lng);
}



function GetValueAndRadian(pointAValue) {
    var resultA = pointAValue.split(',');
    var resultB = pointBValue.split(',');

  let regexPattern = /^-?[0-9]+$/;

  let checkFloat1 = regexPattern.test(resultA[0]);
  let checkFloat2 = regexPattern.test(resultA[1]);

  let checkFloat3 = regexPattern.test(resultB[0]);
  let checkFloat4 = regexPattern.test(resultB[1]);

  if (!checkFloat1 && !checkFloat2 && !checkFloat3 && !checkFloat4) {
   
    console.log(`${resultA[0]} and ${resultA[1]} are float values.`);
    console.log(`${resultA[0]} and ${resultA[1]} are float values.`);

    let lat = result[0] * (Math.PI / 180);
    let lng = result[1] * (Math.PI / 180);

    return { lat, lng };

  } else {

    console.log("Values should be floats.");
    error.innerHTML = "Values should be floats"
  }
}

form.addEventListener("submit", (e) => {
  e.preventDefault();
  myFunction();
});
