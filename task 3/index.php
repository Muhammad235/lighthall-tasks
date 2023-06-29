<?php

include 'process.php';
session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link rel="stylesheet" href="style.css">
  </head>
  <style>
    .error{
        margin-top: -30px;
        margin-bottom: -20px;
    }

    .error p{
        color: red;
        font-size: 16px;
        text-align: center;
    }
</style>
  <body>

  
  <?php  if (isset($_SESSION['error'])) : ?>
            <div class="error mt-2">
            <p>
                <?= $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
            </p>
            </div>
    <?php endif ?>



  <form class="row g-3 needs-validation" novalidate method="POST" action="process.php">

    <div class="container-fluid">
        <div class="row p-4">
            <div class="col-md-6 card">
                <h2 class="text-center">Person 1</h2>
                    <div class="col-md-4">
                      <label for="validationCustom01" class="form-label">Cuisine</label>
                      <input type="text" class="form-control" id="validationCustom01" name="cuisine" required id="cuisine" placeholder="pizza, italian">
                      <div class="invalid-feedback">
                        Please provide a cuisine
                      </div>

                    </div>
                    
                    <div class="col-md-4">
                      <label for="validationCustom02" class="form-label">Location (state/country)</label>
                      <input type="text" class="form-control" id="validationCustom02" name="location"  value="New york"  required>
                      <div class="invalid-feedback">
                        Please provide a location (state/country)
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                      <label for="validationCustom03" class="form-label">Select Date</label>
                      <input type="date" class="form-control" id="validationCustom03"  name="date" required>
                      <div class="invalid-feedback">
                        Please provide a date
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="validationCustom04" class="form-label">Time</label>
                      <select class="form-select" id="validationCustom04" name="time" required>
                        <option selected disabled value="">Choose...</option>
                        <option>07:00AM</option>
                        <option>08:00AM </option>
                        <option>09:00AM </option>
                        <option>10:00AM </option>
                        <option>11:00AM </option>
                        <option>12:00PM </option>
                        <option>1:00PM </option>
                        <option>2:00PM </option>
                        <option>3:00PM </option>
                        <option>4:00PM </option>
                        <option>5:00PM </option>
                        <option>6:00PM </option>
                        <option>7:00PM </option>
                        <option>8:00PM </option>
                        <option>9:00PM </option>
                      </select>
                      <div class="invalid-feedback">
                        Please select a time
                      </div>
                    </div>
                
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                          Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                    </div>

                  <!-- </form> -->
            </div>
            <div class="col-md-6 card">
                <h2 class="text-center">Person 2</h2>
                <!-- <form class="row g-3 needs-validation" novalidate method="POST" id="form2"> -->
                    <div class="col-md-4">
                      <label for="validationCustom05" class="form-label">Cuisine</label>
                      <input type="text" class="form-control" id="validationCustom05" name="cuisine2" required id="cuisine" placeholder="Pasta, Sandwiches">
                      <div class="invalid-feedback">
                        Please provide a cuisine
                      </div>

                    </div>
                    
                    <div class="col-md-4">
                      <label for="validationCustom06" class="form-label">Location (state/country)</label>
                      <input type="text" class="form-control" id="validationCustom06" name="location2" value="New york"   required>
                      <div class="invalid-feedback">
                        Please provide a location (state/country)
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                      <label for="validationCustom07" class="form-label">Select Date</label>
                      <input type="date" class="form-control" id="validationCustom07"  name="date2" required>
                      <div class="invalid-feedback">
                        Please provide a date
                      </div>
                    </div>

                    <div class="col-md-3">
                      <label for="validationCustom04" class="form-label">Time</label>
                      <select class="form-select" id="validationCustom04" name="time2" required>
                        <option selected disabled value="">Choose...</option>
                        <option>07:00AM</option>
                        <option>08:00AM </option>
                        <option>09:00AM </option>
                        <option>10:00AM </option>
                        <option>11:00AM </option>
                        <option>12:00PM </option>
                        <option>1:00PM </option>
                        <option>2:00PM </option>
                        <option>3:00PM </option>
                        <option>4:00PM </option>
                        <option>5:00PM </option>
                        <option>6:00PM </option>
                        <option>7:00PM </option>
                        <option>8:00PM </option>
                        <option>9:00PM </option>
                      </select>
                      <div class="invalid-feedback">
                        Please select a time
                      </div>
                    </div>
                
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                          Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                          You must agree before submitting.
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-12">
                      <button class="btn btn-primary" type="submit" name="form1" id="form1-submit">Submit form</button>
                    </div> -->
                
            </div>

            <div class="row">
             <div class="col-md-12 text-center p-4">
                      <button class="btn btn-primary text-center" type="submit" name="form1" id="form1-submit">Submit form</button>
              </div>
            </div>

        </div>
    </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

         <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>


    <script src="script.js"></script>
  </body>
</html>
