<?php

if (!empty($_GET['location'])){
  /**
   * Here we build the url we'll be using to access the google maps api
   */
  $maps_url = 'https://'. 'maps.googleapis.com/'. 'maps/api/geocode/json'. '?address=' . urlencode($_GET['location']);
  $maps_json = file_get_contents($maps_url);
  $maps_array = json_decode($maps_json, true);
  $lat = $maps_array['results'][0]['geometry']['location']['lat'];
  $lng = $maps_array['results'][0]['geometry']['location']['lng'];
  /**
   * Time to make our Instagram api request. We'll build the url using the
   * coordinate values returned by the google maps api
   */
  $instagram_url = 'https://'. 'api.instagram.com/v1/media/search' . '?lat=' . $lat . '&lng=' . $lng .'&distance=' . $_GET['distance'] . '&client_id=8b8089ff6884473ca11818743b7938dd'; //modify distance parameter (in meters to a max value of 5000) and add your instagram develiper client ID 
  $instagram_json = file_get_contents($instagram_url);
  $instagram_array = json_decode($instagram_json, true);
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Instagram pics locator</title>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
  </head>
  <body>
  <form action="/index.php" method="GET">
    World address:  <input type="text" name="location"/><br>
    Radius (meters): <input type="text" name ="distance"/><br>
    <button type="submit">Submit</button>
  </form>
    <br/>
    <?php
    echo '<h>Latitude: '.$lat.'</h><br>';
    echo '<h>Longitude: '.$lng.'</h><br><br>';
    echo "<h>Now you can also click on the images to go to the users' profiles!</h><br><br>";
    if(!empty($instagram_array)){
      foreach($instagram_array['data'] as $key=>$image){
        echo '<a href="https://instagram.com/'.$image['user']['username'].'"><img src="'.$image['images']['standard_resolution']['url'].'" alt="Got to profile!"/></a>'; //can change array lookup papameter to low_resolution for perfect uniform sizing
      }
    }
    ?>
  </body>
  <footer>
    <p>Copyright &copy; 2015, S^2 All Rights Reserved</p>
  </footer>
</html>
