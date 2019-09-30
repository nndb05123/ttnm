<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
  * Index Page for this controller.
  *
  * Maps to the following URL
  * 		http://example.com/index.php/welcome
  *	- or -
  * 		http://example.com/index.php/welcome/index
  *	- or -
  * Since this controller is set as the default controller in
  * config/routes.php, it's displayed at http://example.com/
  *
  * So any other public methods not prefixed with an underscore will
  * map to /index.php/welcome/<method_name>
  * @see https://codeigniter.com/user_guide/general/urls.html
  */

	public function index() {
		// $json = file_get_contents("http://api.youtrade.vn/stocks/761/keystats");
		// $json = json_decode($json);
		// echo $json->currentPrice;
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://api.youtrade.vn/news/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS => "{\r\n                type: \"latest\",\r\n                page : 1,\r\n                pagesize : 10,\r\n                categoryIds : [],\r\n                tickerIds : [],\r\n                returnType: \"json\"\r\n            }",
			CURLOPT_HTTPHEADER => array(
				"Content-Type: application/json",
				"Postman-Token: 1e3ef3c3-db4b-49e9-b64a-ad85263c0b89",
				"cache-control: no-cache"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		}
		else {
			$response = json_decode($response);
			foreach ($response->data as $item) {
				echo $item->vi->title;
				die;
			}

		}
	}
}