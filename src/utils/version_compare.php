<?php
class VersionCompare{
    private $test_version;

    function __construct($test_version="1.0.17+60") {
        $this->test_version = $test_version;
    }

    //get timezone based on booking version
    function getTimeZone($booking_version){
        return $this->versionCompare($booking_version)=="low"?"Europe/Berlin":"UTC"; 
    }

     //booking version test 
    function versionCompare($versionToCompare){
        return version_compare($versionToCompare,$this->test_version,"lt")?"low":"high";
    }


   
}
?>