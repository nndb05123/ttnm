<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class test extends CI_Controller {

	
    public function __construct()
    {
        parent::__construct();
        
    }
    
	public function index()
	{
        $json =file_get_contents("http://api.youtrade.vn/stocks/761/keystats");

        $this->load->view('hello_view');

        
        // fetch("http://api.youtrade.vn/news/", {
        //     method: "post",
        //     headers: {
        //       'Content-Type': 'application/json'
        //     },
          
        //     //make sure to serialize your JSON body
        //     body: JSON.stringify({
        //         type: "latest",
        //         page : 1,
        //         pagesize : 10,
        //         categoryIds : [],
        //         tickerIds : [],
        //         returnType: "json"
        //     })
        //   })
        //   .then( (response) => { 
        //      //do something awesome that makes the world a better place
        //   });
	}
}