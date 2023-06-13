
let longA = document.getElementById("longA")
let latA = document.getElementById("latA")

let longB = document.getElementById("longB")
let latB = document.getElementById("latB")

let submit = document.getElementById("submit")


let distance1 = document.getElementById("distance1")
let distance2 = document.getElementById("distance2")


function myFunction() {

    //latitude of Point A 
    let latAvalue  = latA.value;
    let LatAradians  = latAvalue * (Math.PI / 180)
    let latAvaluecosine = Math.cos(LatAradians);
    console.log("latitude A " + latAvaluecosine);

    // //latitude of Point B
    let latBvalue  = latB.value;
    let latBradians  = latBvalue * (Math.PI / 180)
    let latBvaluecosine = Math.cos(latBradians);
    console.log("latitude B " + latBvaluecosine);

    const lat_difference = latBradians - LatAradians;

    // //longitude of Point A 
    let longAvalue  = longA.value;
    let LongAradians  = longAvalue * (Math.PI / 180)
    let longAvaluecosine = Math.cos(LongAradians);
    console.log("longitude A " + longAvaluecosine);

    // //longitude of Point B
    let longBvalue  = longB.value;
    let longBradians  = longBvalue * (Math.PI / 180)
    let longBvaluecosine = Math.cos(longBradians);
    console.log("longitude B " + longBvaluecosine);

    const long_difference = longBradians - LongAradians;

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

submit.addEventListener("click", myFunction);

