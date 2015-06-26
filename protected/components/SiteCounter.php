<?php
/**
 * Created by PhpStorm.
 * User: cesaralejandro
 * Date: 23/06/15
 * Time: 01:31 AM
 */

Class SiteCounter{

    public $visitorInfo;

    /**Return count total
     * @return string
     */
    //Function to return the existing hit count and increase the hit count
    function getCount() {
        $this->putCount();
        //opens countlog.data to read the number of hits
        $datei = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR ."data/countlog.data", "r");
        $count = fgets($datei, 1000);
        fclose($datei);
        return $count;
    }

    /**return total visitors and add new
     * @return bool
     */
    //Function to write the hit count
    function putCount() {
        $datei = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR ."data/countlog.data", "r");
        $count = fgets($datei, 1000);
        fclose($datei);
        // Opens countlog.data to change new hit number
        $datei = fopen(dirname(__FILE__) . DIRECTORY_SEPARATOR ."data/countlog.data", "w");
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

    //TODO: validate first ip adress and function to count only per session.
    //TODO: store ip and statistics in bd.
    public function getInfo(){
        $ip = $this->get_client_ip();
        $hits = $this->getCount();
        $this->visitorInfo = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        $data=array(
            'hits'=>$hits,
            'info'=>$this->visitorInfo
        );
        return $data;
    }

}