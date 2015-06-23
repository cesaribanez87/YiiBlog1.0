<?php
class HCounter {

    //Function to return the existing hit count and increase the hit count
    function getCount() {
        $this->putCount();
        //opens countlog.data to read the number of hits
        $datei = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR ."countlog.data", "r");
        $count = fgets($datei, 1000);
        fclose($datei);
        return $count;
    }

    //Function to write the hit count
    function putCount() {
        $datei = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR ."countlog.data", "r");
        $count = fgets($datei, 1000);
        fclose($datei);
        // Opens countlog.data to change new hit number
        $datei = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR ."countlog.data", "w");
        fwrite($datei, $count + 1);
        fclose($datei);
        return true;
    }

   // Function to get the client ip address
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';

        //To avoid multiple ip. That is because of ip forwarding.
        if (strpos($ipaddress, ',') !== false) {
            $ips = explode(',', $ipaddress);
            $ipaddress = trim($ips[0]); // taking the first one
        }
        return $ipaddress;
    }

}

?>