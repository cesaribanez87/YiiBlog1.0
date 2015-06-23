<?php
/**
 * Created by PhpStorm.
 * User: cesaralejandro
 * Date: 23/06/15
 * Time: 01:31 AM
 */

Class SiteCounter{

    public $visitorInfo;

    public function getInfo(){
        $counter = new VCounter;
        $hits = $counter->getCount();
        $ip = $counter->get_client_ip();
        $this->visitorInfo = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        $data=array(
            'hits'=>$hits,
            'info'=>$this->visitorInfo
        );
        return $data;
    }

}