<?php
//Retrieve the form data

if (isset($_POST['form1'])) {

session_start();
$cuisine = $_POST['cuisine'];
$cuisine2 = $_POST['cuisine2'];

$location = $_POST['location'];
$location2 = $_POST['location2'];

$date = $_POST['date'];
$date2 = $_POST['date2'];

$time = $_POST['time'];
$time2 = $_POST['time2'];


if (empty($cuisine) || empty($cuisine2) || empty($location) || empty($location2) || empty($date) || empty($date2) || empty($time)  || empty($time2) ) {

    $_SESSION['error'] = "Fill all input fields";

    echo "<script>window.location.replace('../index.php')</script>";  
    exit();


}elseif($location !== $location2){

    $_SESSION['error'] = "Location must be the same";

    echo "<script>window.location.replace('../index.php')</script>";  
    exit();

}else {
   
    $url = "https://geocode.search.hereapi.com/v1/geocode?q=" . urlencode($location) . "&apiKey=nVPx6P5jZSJ77ZBrOFtlic408AOmJbLtjr3PxPoTil0";
    
    // Initialize cURL session
    $curl = curl_init();
    
    // Set the cURL options
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    // Execute the cURL request
    $response = curl_exec($curl);

    // Check if the request was successful
    if ($response !== false) {
        // Decode the JSON response into a PHP associative array
        $data = json_decode($response, true);
    
        // Access the latitude and longitude
        if (isset($data['items'][0]['position']['lat']) && isset($data['items'][0]['position']['lng'])) {

            $latitude = $data['items'][0]['position']['lat'];
            $longitude = $data['items'][0]['position']['lng'];
    
            // Use the latitude and longitude as needed
            echo "Latitude: " . $latitude . "<br>";
            echo "Longitude: " . $longitude . "<br>";
        } else {

          $_SESSION['error'] = "Unable to retrieve latitude and longitude of this location.";

        }
    } else {
        echo "Error fetching geocode data: " . curl_error($curl);
    }
    
    // Close the cURL session
    curl_close($curl);


    // $curl = curl_init();
    
    // curl_setopt_array($curl, array(
    //   CURLOPT_URL => 'https://api.spoonacular.com/food/restaurants/search?cuisine=italian&lat=34.7786357&lng=-122.3918135&apiKey=76868d3239f84969ab0e89225d89d526',
    //   CURLOPT_RETURNTRANSFER => true,
    //   CURLOPT_ENCODING => '',
    //   CURLOPT_MAXREDIRS => 10,
    //   CURLOPT_TIMEOUT => 0,
    //   CURLOPT_FOLLOWLOCATION => true,
    //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //   CURLOPT_CUSTOMREQUEST => 'GET',
    // ));
    
    // $response = curl_exec($curl);
    
    // curl_close($curl);
    // echo $response;

    // JSON data representing the list of restaurants
    $json = '{
      "restaurants": [
        {
          "name": "Restaurant A",
          "cuisine": ["Indian", "Mexican"]
        },
        {
          "name": "Restaurant B",
          "cuisine": ["Italian", "Chinese"]

        },
        {
          "name": "Restaurant C",
          "cuisine": ["Japanese", "Thai"]
        },
        {
          "name": "Restaurant D",
          "cuisine": ["Italian", "French"]
        },
        {
          "name": "Restaurant E",
          "cuisine": ["Mexican", "Chinese"]
        },
        {
          "name": "Restaurant F",
          "cuisine": ["Greek", "Indian"]
        },
        {
          "name": "Restaurant G",
          "cuisine": ["Italian", "American"]
        },
        {
          "name": "Restaurant H",
          "cuisine": ["Chinese", "Thai"]
        },
        {
          "name": "Restaurant I",
          "cuisine": ["Mexican", "Italian"]
        },
        {
          "name": "Restaurant J",
          "cuisine": ["Indian", "Chinese"]
        }
      ]
    }';
    
    // Decode the JSON data into an associative array
    $data = json_decode($json, true);
    
    // Iterate through each restaurant
    foreach ($data['restaurants'] as $restaurant) {
        // Check if the restaurant offers both Italian and Chinese cuisines
        if (in_array('Italian', $restaurant['cuisine']) && in_array('Chinese', $restaurant['cuisine'])) {
            // Echo the restaurant details
            echo 'Restaurant: ' . $restaurant['name'] . '<br>';
            echo 'Cuisine: ' . implode(', ', $restaurant['cuisine']) . '<br><br>';
        }
    }
  


}

}


?>






