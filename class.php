   
//--==========================DISPLAYING USER DETAILS=========================================

    <?php

        if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']))
        {
            //declare variables
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
 
            function userInfo($n, $s, $e )
            {
            return "<br />" . "$n". "$s" ."$e";
            }
                
            //outputting details of user 
         
            echo "<h4 class='text-center'>USER DETAILS</h4>";
            echo"<hr>";
            echo "Name:".$name;
            echo "<br />";
            echo "Surname:".$surname;
            echo "<br />";
            echo "Email:".$email;
          
        
        }         
  
        //user input details on submit
       
    ?>

//--==========================FIRST SELECTED HOTEL DETAILS=========================================
<?php
    class Hotel1
    {
        const BR = '<br />';

        public $price;
        public $name;
        public $photo; 
        public $dir = 'images/';

        public function print_hotel()
        {    
            
            echo "<h4 class='text-center'>{$this->name}</h4>".self::BR;
            echo "Daily Rate: R".$this->price.self::BR;
            echo "Check In: ".$this->checkin.self::BR;;
            echo "Check Out: ".$this->checkout.self::BR;;
            echo "Number of days: ".$this->numberdays.self::BR;;
            
            echo "<h5>BENEFITS:</h5>";
            echo "Pool: ".$this->pool.self::BR;
            echo "Bar: ".$this->bar.self::BR;
            echo "Spa: ".$this->spa.self::BR;
            echo "kid friendly: ".$this->kidfriendly.self::BR;
             
                    
                     
        }
    }
?>
//--==========================SECOND SELECTED HOTEL DETAILS=========================================
<?php
    class Hotel2
    {
        const BR = '<br />';

        public $price;
        public $name;
        public $photo; 
        public $dir = 'images/';

        public function print_hotel()
        {    
            
            echo "<h4>{$this->name}</h4>".self::BR;
            echo "Daily Rate: R".$this->price.self::BR;
            echo "Check In: ".$this->checkin.self::BR;;
            echo "Check Out: ".$this->checkout.self::BR;;
            echo "Number of days: ".$this->numberdays.self::BR;;
           
            echo "<h5>BENEFITS:</h5>";
            echo "Pool: ".$this->pool.self::BR;
            echo "Bar: ".$this->bar.self::BR;
            echo "Spa: ".$this->spa.self::BR;
            echo "kidfriendly: ".$this->kidfriendly.self::BR;
         
                     
        }
      
    }
?>
 
    