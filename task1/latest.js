let form = document.getElementById("myForm");
let pointA = document.getElementById("pointA");
let pointB = document.getElementById("pointB");
let error = document.getElementById("error");


let distance1 = document.getElementById("distance1");

let address1 = document.getElementById("address1");
let address2 = document.getElementById("address2");

let submit = document.getElementById("submitButton");



function main() {
    let pointAValue = pointA.value
    let pointBValue = pointB.value

    var split_lat_lng_A = pointAValue.split(',');
    var split_lat_lng_B = pointBValue.split(',');

    let LatA = split_lat_lng_A[0] * (Math.PI / 180)
    let LatB = split_lat_lng_B[0] * (Math.PI / 180)

    const lat_difference = LatB - LatA;

    let lngA =   split_lat_lng_A[1] * (Math.PI / 180)
    let lngB =   split_lat_lng_B[1] * (Math.PI / 180)

    const long_difference = lngB - lngA;

        //Using Haversine formula
        const a = Math.sin(lat_difference / 2) * Math.sin(lat_difference / 2) +
        Math.cos(LatA) * Math.cos(LatB) *
        Math.sin(long_difference / 2) * Math.sin(long_difference / 2);
    
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    
        // Radius of the Earth in kilometers
        const earthRadius = 6371;
    
        //final distnace 
        const distance = earthRadius * c;
    
        //to 2sf 
        const sf_distance = distance.toFixed(2);
    


        if (sf_distance == "NaN") {
            error.innerHTML = "Please input a correct format for the latitude and longitude"
        }else{
            distance1.innerHTML = "Distance = " + sf_distance + "Km";
    
            console.log(distance);
        }
}


form.addEventListener("submit", (e) => {
  e.preventDefault();

main()

});

submit.addEventListener("submit", (e) => {
  e.preventDefault();

  console.log(address1.value);

  const apiUrl = `https://geocode.search.hereapi.com/v1/geocode?q=${address1.value}&apiKey=nVPx6P5jZSJ77ZBrOFtlic408AOmJbLtjr3PxPoTil0`;

  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      // Process the fetched data here
      console.log(data);
  
      let latA =  data['items'][0]['position']['lat'];
      let lngA =  data['items'][0]['position']['lng'];
  
      console.log(latA);
      console.log(lngA);     
      
  })
  
    .catch(error => {
      // Handle any errors that occurred during the fetch
      console.error('Error:', error);
    });
  


});






