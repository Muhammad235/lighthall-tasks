
let pointA = document.getElementById("pointA")

let pointB = document.getElementById("pointB")

let error = document.getElementById("error")

let submit = document.getElementById("myForm")


let distance1 = document.getElementById("distance1")
let distance2 = document.getElementById("distance2")


// program to check if a number is a float or integer value



function myFunction() {


    let PointAValue = GetValueAndRadian(pointA.value);

    console.log(PointAValue.lat);
    console.log(PointAValue.lng);


    // //latitude of Point A 
    // let latAvalue  = latA.value;
    // let LatAradians  = latAvalue * (Math.PI / 180)
    // let latAvaluecosine = Math.cos(LatAradians);
    // console.log("latitude A " + latAvaluecosine);

    // // //latitude of Point B
    // let latBvalue  = latB.value;
    // let latBradians  = latBvalue * (Math.PI / 180)
    // let latBvaluecosine = Math.cos(latBradians);
    // console.log("latitude B " + latBvaluecosine);

    // const lat_difference = latBradians - LatAradians;

    // // //longitude of Point A 
    // let longAvalue  = longA.value;
    // let LongAradians  = longAvalue * (Math.PI / 180)
    // let longAvaluecosine = Math.cos(LongAradians);
    // console.log("longitude A " + longAvaluecosine);

    // // //longitude of Point B
    // let longBvalue  = longB.value;
    // let longBradians  = longBvalue * (Math.PI / 180)
    // let longBvaluecosine = Math.cos(longBradians);
    // console.log("longitude B " + longBvaluecosine);

    // const long_difference = longBradians - LongAradians;

    //Using Haversine formula
    const a = Math.sin(lat_difference / 2) * Math.sin(lat_difference / 2) +
    Math.cos(LatAradians) * Math.cos(latBradians) *
    Math.sin(long_difference / 2) * Math.sin(long_difference / 2);

    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

    // Radius of the Earth in kilometers
    const earthRadius = 6371;

    //final distnace 
    const distance = earthRadius * c;

    //to 2sf 
    const sf_distance = distance.toFixed(2);

    distance1.innerHTML = "Distance = " + sf_distance + "Km";

    console.log(distance);


}


// function checkNumber(x) {

//     let regexPattern = /^-?[0-9]+$/;
    
//     // check if the passed number is integer or float
//     let result = regexPattern.test(x);
    
//     if(result) {
//         console.log(`${x} is an integer.`);
//     }
//     else {
//         console.log(`${x} is a float value.`)
//     }

// }





function GetValueAndRadian(PointAValue) {

    var result = PointAValue.split(',');

    // checkNumber(parseFloat(result[0]));
    // checkNumber(parseFloat(result[1]));

    let regexPattern = /^-?[0-9]+$/;
    
    // check if the passed number is integer or float
    let checkFloat = regexPattern.test(result[0]);
    
    if(checkFloat) {
        console.log(` is an integer.`);
    }
    else {
        console.log(` is a float value.`)

        let lat = result[0] * (Math.PI / 180)
        let lng = result[1] *  (Math.PI / 180)

        return {lat, lng}
    
    }


}





// function GetValueAndRadian(PointAValue) {
    
//     var result = PointAValue.split(',');

//     let lat = result[0] * (Math.PI / 180)
//     let lng = result[1] *  (Math.PI / 180)

//     return {lat, lng}
// }


submit.addEventListener("submit", (e) =>{


    e.preventDefault()



myFunction()
})

// submit.addEventListener("click", myFunction);

