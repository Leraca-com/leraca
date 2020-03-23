<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Raphael , Lee , Cameron">
    <link href='https://fonts.googleapis.com/css?family=Rajdhani:400,500,700' rel='stylesheet' type='text/css'> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" text="text/css">
    <title></title> 
  </head>

  <body>
  
  <!--==========================NAVIGATION BAR=========================================-->
   <nav class="navbar navbar-expand-lg navbar-light navbarColor">
        <div class="container">
                <a class="navbar-brand" href="#"><h1>LERACA</h1></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="#">HOME</a>
                    </li>
                  </ul>
              </div>
        </div>  
      </nav>

 <!--==========================HOME PAGE CONTAINING THE HOTEL SELECTION=========================================-->

      <div class="container-fluid cover">
         <div class="container ">
          <div class="row">
          <div class="col-2-sm"></div>
          <div class="col-8-sm colomCenter">

                <h1 id="headline">Your dream hotel at the best price.</h1>
            <!--user inputs-->
            <form action="functionality.php" method="post">
                 <div id="userDetails">
                    <p>Please provide following details below:</p>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="text" name="surname" placeholder="Surname" required>
                    <input type="email" name="email" placeholder="Email" required>
                 </div>
                
                <div id="hotelDetails">
                      <p>Selecting one hotel from each dropdown:</p> 
                      <!--Dropdown output hotel name array-->
                      1. <select name="hotel1" id="hotel" required>
                        <option>-Select Hotel Here-</option>
                        <?php
                          $hotelname = array("TABLE BAY HOTEL", "CAPE GRACE HOTEL");
                          foreach ($hotelname as $hotel) {
                        ?>
                        <option> <?php echo $hotel; ?> </option>
                          <?php } ?>
                      </select>

                      2. <select name="hotel2" id="hotel" required>
                        <option>-Select Hotel Here-</option>
                        <?php 
                          $hotelname = array("TABLE BAY HOTEL", "CAPE GRACE HOTEL");
                          foreach ($hotelname as $hotel) {
                        ?>
                        <option> <?php echo $hotel; ?> </option>
                          <?php } ?>
                      </select><br>
                </div>
                
               <div>
                    <script type="text/javascript">
                        //Getting number of days
                        function GetDays()
                        {
                          var dropdt = new Date(document.getElementById("drop_date").value);
                          var pickdt = new Date(document.getElementById("pick_date").value);
                          return parseInt((dropdt - pickdt) / (24 * 3600 * 1000));
                        }
                        //Calling number days
                        function cal()
                        {
                          if(document.getElementById("drop_date"))
                          {
                            document.getElementById("numdays2").value=GetDays();
                          }  
                        }
                      </script>

                      <div id="reserve_form">
                      <label class="form">Check in : </label><input type="date" class="textbox" id="pick_date" name="pickup_date" onchange="cal()"/>
                      <label class="form">Check out : </label><input type="date" class="textbox" id="drop_date" name="dropoff_date" onchange="cal()">
                      <div id="numdays"><label class="form">Total days : </label><input type="text"  id="numdays2" name="numdays"/>
                      </div>
               </div>
               
              <input id="submitButon" class="btn btn-primary btn-md" role="button" type="Submit">
             
      </form>
    </div>

          </div>
          <div class="col-2-sm"></div>

          </div>

         </div>
      
      </div>
<!--==========================PHP FUNCTIONALITY AND HOTEL FUNCTIONALITY =========================================-->
 <?php
 
                  //LINKING EXTERNAL PHP PAGE

              echo"<div class='container-fluid displayOutput'>";
                  //Logical arguments
                  //Logical outputs for hotel one
                  if($_POST)
                  {
                  echo"<div class='container ContainerGap'>";
                    echo"<div class='row'>";
                        echo"<div class='col-4-sm ' style='padding:7rem 5rem; margin-top:2rem; border: 1px solid black;'>";
                          include 'class.php';
                          echo"</div>";
                         echo"<div class='col-4-sm ' style='padding:2rem 5rem;'>";
                
                          if ($_POST['hotel1'] == $hotelname[0])
                          {
                            $hotel = new Hotel1;
                            
                            $hotel -> name = $_POST['hotel1'];
                            $hotel -> photo =  'sun.jpeg';
                            $hotel -> price = 500;
                            $hotel -> checkin = $_POST['pickup_date'];
                            $hotel -> checkout = $_POST['dropoff_date'];
                            $hotel -> numberdays = $_POST['numdays'];
                            //$hotel -> totalprice = $totalprice;
                            $hotel -> pool = 'True';
                            $hotel -> bar = 'True';
                            $hotel -> spa = 'True';
                            $hotel -> kidfriendly = 'True';

                            $hotel -> print_hotel();
                          }
                          elseif ($_POST['hotel1'] == $hotelname[1])
                          {
                            $hotel = new Hotel1;

                            $hotel -> name = $_POST['hotel2'];
                            $hotel -> photo = 'hotels.jpg'; 
                            $hotel -> price = 350;
                            $hotel -> checkin = $_POST['pickup_date'];
                            $hotel -> checkout = $_POST['dropoff_date'];
                            $hotel -> numberdays = $_POST['numdays'];
                          // $hotel -> totalprice = $totalprice;
                            $hotel -> pool = 'True';
                            $hotel -> bar = 'False';
                            $hotel -> spa = 'False';
                            $hotel -> kidfriendly = 'True';

                            $hotel -> print_hotel();
                          }
                          //Getting total price of hotels
                          $numberdays = $_POST['numdays'];
                          $totalprice;
                            
                          $totalprice = $numberdays * $hotel->price; 
                          echo "<font size = '5px'>Total price: R".$totalprice."</font size>";
                          echo"<br>";
                          echo"<a class='btn btn-primary btn-md' href='Booking.php' role='button'>Book now</a>"; 
                    echo"</div>";
                        
                    echo"<div class='col-4-sm ' style='padding:2rem 5rem;'>";
                          //Logical outputs for hotel two
                    
                            if ($_POST['hotel2'] == $hotelname[0])
                            {
                              $hotel = new Hotel2;
                              
                              $hotel -> name = $_POST['hotel2'];
                              $hotel -> photo =  'sun.jpeg';
                              $hotel -> price = 500;
                              $hotel -> checkin = $_POST['pickup_date'];
                              $hotel -> checkout = $_POST['dropoff_date'];
                              $hotel -> numberdays = $_POST['numdays'];
                              //$hotel -> totalprice = $totalprice;
                              $hotel -> pool = 'True';
                              $hotel -> bar = 'True';
                              $hotel -> spa = 'True';
                              $hotel -> kidfriendly = 'True';

                              $hotel -> print_hotel();
                            }
                            elseif ($_POST['hotel2'] == $hotelname[1])
                            {
                              $hotel = new Hotel2;

                              $hotel -> name = $_POST['hotel2'];
                              $hotel -> photo = 'hotels.jpg'; 
                              $hotel -> price = 350;
                              $hotel -> checkin = $_POST['pickup_date'];
                              $hotel -> checkout = $_POST['dropoff_date'];
                              $hotel -> numberdays = $_POST['numdays'];
                              //$hotel -> totalprice = $totalprice;
                              $hotel -> pool = 'True';
                              $hotel -> bar = 'False';
                              $hotel -> spa = 'False';
                              $hotel -> kidfriendly = 'True';

                              $hotel -> print_hotel();
                            }

                            //Getting total price of hotels
                            $numberdays = $_POST['numdays'];
                            $totalprice;
                              
                            $totalprice = $numberdays * $hotel->price; 
                            echo "<font size = '5px'>Total price: R".$totalprice."</font size>";
                            echo"<br>";
                            echo"<a class='btn btn-primary btn-md' href='Booking.php' role='button'>Book now</a>"; 
                        echo"</div>";

                  } 
                echo"</div>";
                echo"<hr>";
               

    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
  </body>
</html>   