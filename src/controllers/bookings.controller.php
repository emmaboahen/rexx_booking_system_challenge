<?php
    require "./src/models/bookings.models.php";

    class BookingsController{
        public $bookings;
        function __construct() {
            $this->bookings  = new Bookings(); 
        }
        
        public function fetchBookings(){//if filter is null, model fetches all bookings else it fetches bookings based on filter
            $filter=null;

            if(isset($_GET["filterBy"])&&isset($_GET["val"])){
                $filter["key"]=$_GET["filterBy"];
                $filter["value"]=$_GET["val"];
            }

            $bookings = $this->bookings->fetch($filter); 

            if($filter){//if bookings are filtered, sum up participation fees and add it as last element to the bookings array to show in ui
                $participation_fee_obj = [
                    "employee_name"=>"",
                    "employee_mail"=>"",
                    "event_name"=>"<h4 style='text-align:right'>Total Price:</h4>", 
                    "participation_fee"=>"<h4>".number_format($this->sumParticipationFee($bookings),2)."<h4>", 
                    "event_date"=>"",
                    "version"=>"",
                ];
                array_push($bookings,$participation_fee_obj);
            }

            return $bookings;
        }

        //function to save new bookings into database
        public function syncBookings($bookings_json_data){
           $new_bookings = $this->bookings->sync($bookings_json_data);
           if($new_bookings){
            echo("Data Imported Successfully");
            return $new_bookings;
           }
        }

        //function to sum participation fee from bookings
        public function sumParticipationFee($bookings){
            $participation_fee_sum = 0;
            if($bookings){
                foreach($bookings as $booking){
                    $participation_fee_sum += $booking["participation_fee"];
                }
            }
            return $participation_fee_sum;
        }

    }
