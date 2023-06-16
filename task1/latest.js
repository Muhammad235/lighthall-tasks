let form = document.getElementById("myForm");
let pointA = document.getElementById("pointA");
let pointB = document.getElementById("pointB");
let error = document.getElementById("error");


let distance1 = document.getElementById("distance1");

let address1 = document.getElementById("address1");
let address2 = document.getElementById("address2");

let submit = document.getElementById("submitButton");


function main() {
    let pointAValue = pointA.value.trim()
    let pointBValue = pointB.value.trim()

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
  console.log(address2.value);

  const apiUrl1 = `https://geocode.search.hereapi.com/v1/geocode?q=${encodeURIComponent(
    address1.value
  )}&apiKey=nVPx6P5jZSJ77ZBrOFtlic408AOmJbLtjr3PxPoTil0`;

  fetch(apiUrl1)
    .then((response) => response.json())
    .then((data) => {
      // Process the fetched data here
      console.log(data);

      let latA = data.items[0].position.lat;
      let lngA = data.items[0].position.lng;

      console.log(latA);
      console.log(lngA);

      const apiUrl2 = `https://geocode.search.hereapi.com/v1/geocode?q=${encodeURIComponent(
        address2.value
      )}&apiKey=nVPx6P5jZSJ77ZBrOFtlic408AOmJbLtjr3PxPoTil0`;

      fetch(apiUrl2)
        .then((response) => response.json())
        .then((data) => {
          // Process the fetched data here
          console.log(data);

          let latB = data.items[0].position.lat;
          let lngB = data.items[0].position.lng;

          console.log(latB);
          console.log(lngB);

          const long_difference = lngB - lngA;
          const lat_difference = latB - latA;

          console.log(long_difference);
          console.log(lat_difference);

          // Perform further calculations or operations with the obtained latitude and longitude values

          // Using Haversine formula
          const a =
            Math.sin((lat_difference * Math.PI) / 180 / 2) *
              Math.sin((lat_difference * Math.PI) / 180 / 2) +
            Math.cos((latA * Math.PI) / 180) *
              Math.cos((latB * Math.PI) / 180) *
              Math.sin((long_difference * Math.PI) / 180 / 2) *
              Math.sin((long_difference * Math.PI) / 180 / 2);

          const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

          // Radius of the Earth in kilometers
          const earthRadius = 6371;

          // Final distance
          const distance = earthRadius * c;

          // To 2 decimal places
          const sf_distance = distance.toFixed(2);

          console.log(sf_distance);
          const mapElement = document.querySelector("#map");
          mapElement.style.height= "300px";

          var map = L.map("map").setView([latA, lngA], 8);

          L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
              '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
          }).addTo(map);

          L.marker([latA, lngA])
            .addTo(map)
            .bindPopup(`Distance is ${sf_distance} km`)
            .openPopup();

          L.marker([latB, lngB])
            .addTo(map)
            .bindPopup(`Distance is ${sf_distance} km`)
            .openPopup();
        })
        .catch((error) => {
          // Handle any errors that occurred during the fetch
          console.error("Error:", error);
        });
    })
    .catch((error) => {
      // Handle any errors that occurred during the fetch
      console.error("error", error);

    })

  })




