<?php

class hitCounter extends CWidget {

    //To store the ip address details from the API..
    public $ip_details;
    //User display options
    public $options = array();
    private $baseUrl;

    public function accessRules()
    {

        return array(
            array('allow',  // allow all users to perform 'index' action
                'actions'=>array('init','run','publishAssets','registerClientScripts'),
                'users'=>array('*'),
            ),

        );
    }

    // Function to init the widget
    public function init() {
        // Include the class file
        require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'HCounter.php');

        //Register the assests foolder files
        $this->publishAssets();
        $this->registerClientScripts();
        parent::init();
    }

    // Function to run the widget
    public function run() {

        $counter = new HCounter;
        $hits = $counter->getCount();
        $ip = $counter->get_client_ip();
        $this->ip_details = json_decode(file_get_contents("http://ipinfo.io/{$ip}"));
        
        //Rendering to the view file
        $this->getViewFile('hitCounter');
        $this->render('hitCounter', array('hits' => $hits, 'ip_details' => $this->ip_details));
        parent::run();
    }

    // Function to publish and register assets on page 
    public function publishAssets() {

        $assets = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'assets';
        if (is_dir($assets)) {
            Yii::app()->getAssetManager()->publish($assets);
            $this->baseUrl = Yii::app()->getAssetManager()->publish($assets);
            
        } else {
            throw new Exception('Hit Counter BUG TRACKING Couldn\'t find assets to publish.');
        }
    }

    // Function to register the client side scripts
    public function registerClientScripts() {
    	Yii::app()->clientScript->registerCssFile($this->baseUrl.'/css/hitcounter.css', CClientScript::POS_HEAD);
    }

}

?>