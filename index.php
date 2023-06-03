<?php
$status="";
$msg="";
$city="";
if(isset($_POST['submit'])){
    $city=$_POST['city'];
   // $city="mumbai";
    $url="http://api.openweathermap.org/data/2.5/weather?q=$city&appid=49c0bad2c7458f1c76bec9654081a661";
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $result=curl_exec($ch);
    curl_close($ch);
    $result=json_decode($result,true);
   //  print_r($result);die;
   //  if($result['cod']==200){
   //      $status="yes";
   //  }else{
   //      $msg=$result['message'];
   //  }

    $url1="https://api.openweathermap.org/data/2.5/forecast?q=mumbai&appid=a354e4335d99eca7fe07dae85b223f89";
    $ch1=curl_init();
    curl_setopt($ch1,CURLOPT_URL,$url1);
    curl_setopt($ch1,CURLOPT_RETURNTRANSFER,true);
    $result1=curl_exec($ch1);
    curl_close($ch1);
    $result1=json_decode($result1,true);
   //  print_r($result1['list']);die;
    if($result1['cod']==200 && $result['cod']==200){
        $status="yes";
    }else{
      echo '<script>alert("Please Enter Correct Data !!")</script>';
    }

}
?>

<html lang="en" class=" -webkit-">
   <head>
      <meta charset="UTF-8">
      <title>Weather Card</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      <style>
         
         @import url(https://fonts.googleapis.com/css?family=Poiret+One);
         @import url(https://cdnjs.cloudflare.com/ajax/libs/weather-icons/2.0.9/css/weather-icons.min.css);
         body {
         background-color: #c1a670;
         /* font-family: Poiret One; */
         }
         .widget {
         position: absolute;
         top: 45%;
         left: 50%;
         display: flex;
         height: 200px;
         width: 400px;
         transform: translate(-50%, -50%);
         flex-wrap: wrap;
         cursor: pointer;
         border-radius: 20px;
         box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 17px 17px 0 rgba(0, 0, 0, 0.15);
         }
         .widget1 {
         position: absolute;
         top: 45%;
         left: 17%;
         display: flex;
         height: 200px;
         width: 200px;
         transform: translate(-50%, -50%);
         flex-wrap: wrap;
         cursor: pointer;
         border-radius: 20px;
         box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 17px 17px 0 rgba(0, 0, 0, 0.15);
         }

         .widget1 .date {
            flex: 0 50px;
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    justify-content: center;
    margin-left: 35px;
    color: white;
    font-size: 25px;
         }

         .widget2 {
         position: absolute;
         top: 45%;
         left: 83%;
         display: flex;
         height: 200px;
         width: 200px;
         transform: translate(-50%, -50%);
         flex-wrap: wrap;
         cursor: pointer;
         border-radius: 20px;
         box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 17px 17px 0 rgba(0, 0, 0, 0.15);
         }
         .widget3 {
         position: absolute;
         top: 80%;
         left: 50%; 
         display: flex;
         height: 200px;
         width: 1000px;
         transform: translate(-50%, -50%);
         flex-wrap: wrap;
         cursor: pointer;
         border-radius: 20px;
         box-shadow: 0 27px 55px 0 rgba(0, 0, 0, 0.3), 0 17px 17px 0 rgba(0, 0, 0, 0.15);
         }
         .widget3 .card-group {
         flex: 0 0 90%;
         height: 100%;
         border-bottom-left-radius: 20px;
         display: flex;
         align-items: center;
         }

         .widget3 .card-group .card {
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    justify-content: center;
    margin-left: 35px;
    font-size: 25px;
    background: url();
    border: none;
    left: 4%;
         }

         .widget3 .card-group .card .place {
            flex: 0 50px;
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    justify-content: center;
    margin-left: 35px;
    color: white;
    font-size: 25px;
         }

         .widget2 .place {
            flex: 0 50px;
    display: flex;
    flex-direction: column;
    width: 100%;
    height: 100%;
    justify-content: center;
    margin-left: 35px;
    color: white;
    font-size: 25px;
         }

         .widget .weatherIcon {
         flex: 1 100%;
         height: 60%;
         border-top-left-radius: 20px;
         border-top-right-radius: 20px;
         background: #FAFAFA;
         font-family: weathericons;
         display: flex;
         align-items: center;
         justify-content: space-around;
         font-size: 100px;
         }
         .widget .weatherIcon i {
         padding-top: 30px;
         }
         .widget .weatherInfo {
         flex: 0 0 90%;
         height: 100%;
         border-bottom-left-radius: 20px;
         display: flex;
         align-items: center;
         color: white;
         }
         .widget .weatherInfo .temperature {
         flex: 0 0 40%;
         width: 100%;
         font-size: 65px;
         display: flex;
         justify-content: space-around;
         }
         .widget .weatherInfo .description {
         flex: 0 60%;
         display: flex;
         flex-direction: column;
         width: 100%;
         height: 100%;
         justify-content: center;
         margin-left:-15px;
         }
         .widget .weatherInfo .description .weatherCondition {
         text-transform: uppercase;
         font-size: 35px;
         font-weight: 100;
         }
         
         .widget .date {
         flex: 0 0 30%;
         height: 40%;
         background: #70C1B3;
         border-bottom-right-radius: 20px;
         display: flex;
         justify-content: space-around;
         align-items: center;
         color: white;
         font-size: 30px;
         font-weight: 800;
         }
         p {
         position: fixed;
         bottom: 0%;
         right: 2%;
         }
         p a {
         text-decoration: none;
         color: #E4D6A7;
         font-size: 10px;
         }
         .form{
         position: absolute;
         top: 35%;
         left: 50%;
         display: flex;
         height: 300px;
         width: 600px;
         transform: translate(-50%, -50%);
         }
         .text{
         width: 80%;
         padding: 10px
         }
         .submit{
         height: 39px;
         width: 100px;
         border: 0px;
         }
         .mr45{
             margin-right:45px;
         }
      </style>
   </head>
   <body>
      <div class="form">
         <form style="width:100%;" method="post">
            <input type="text" class="text" placeholder="Enter city name" name="city" value="<?php echo $city?>"/>
            <input type="submit" value="Submit" class="submit" name="submit"/>
            <?php echo $msg?>
         </form>
      </div>
      
      <?php if($status=="yes"){?>

         <div class="widget1">
  <div class="date">
            <?php
            echo date('d M',$result['dt']) ;?>
            <br>
            <?php $newDate = date('l',$result['dt']);
            echo $newDate; ?>
            
             
         </div>
</div>   
       
      <article class="widget">
         <!-- <div class="weatherIcon">
            <img src="http://openweathermap.org/img/wn/<?php echo $result['weather'][0]['icon']?>@4x.png"/>
         </div> -->
         <div class="weatherInfo">
            <div class="temperature">
               <span><?php echo round($result['main']['temp']-273.15)?>°</span>
            </div>
            <div class="description mr45">
               <div class="weatherCondition"><?php echo $result['weather'][0]['main']?></div>   
            </div>
            <div class="description">
               <div class="weatherCondition">Wind</div>
               <div class="place"><?php echo $result['wind']['speed']?> M/H</div>
            </div>
         </div>
         
      </article>

      <div class="widget2">
      <div class="place"><?php echo $result['name']?></div>
</div> 

       <div class="widget3">
       <div class="card-group">
  <div class="card">
  <div class="place"><?php
          $date = explode(" ",$result1['list'][9]['dt_txt']);
          $newDate = date('l', strtotime($date[0]));
            echo $newDate; ?>
         <br>
         <?php echo round($result1['list'][9]['main']['temp']-273.15)?>°
         </div>
  </div>
  <div class="card">
  <div class="place"><?php
          $date = explode(" ",$result1['list'][17]['dt_txt']);
          $newDate = date('l', strtotime($date[0]));
            echo $newDate; ?>
         <br>
         <?php echo round($result1['list'][17]['main']['temp']-273.15)?>°
         </div>
  </div>
  <div class="card">
  <div class="place"><?php
          $date = explode(" ",$result1['list'][24]['dt_txt']);
          $newDate = date('l', strtotime($date[0]));
            echo $newDate; ?>
         <br>
         <?php echo round($result1['list'][24]['main']['temp']-273.15)?>°
         </div>
  </div>
  <div class="card">
  <div class="place"><?php
          $date = explode(" ",$result1['list'][31]['dt_txt']);
          $newDate = date('l', strtotime($date[0]));
            echo $newDate; ?>
         <br>
         <?php echo round($result1['list'][31]['main']['temp']-273.15)?>°
         </div>
  </div>
  <div class="card">
  <div class="place"><?php
          $date = explode(" ",$result1['list'][38]['dt_txt']);
          $newDate = date('l', strtotime($date[0]));
            echo $newDate; ?>
         <br>
         <?php echo round($result1['list'][38]['main']['temp']-273.15)?>°
         </div>
  </div>
</div>
       </div>
      <?php } ?>
   </body>
</html>