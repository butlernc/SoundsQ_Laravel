<?php
	
	namespace App\Services;

	/**
	 * base abstract class for all Media Provider Services
	 */
	abstract class MediaProviderService {

		abstract public function item_created_request($item);

		abstract public function item_play_request($item);

		/** 
		 * Send a GET requst using cURL 
		 * @param string $url to request 
		 * @param array $get values to send 
		 * @param array $options for cURL 
		 * @return string 
		 */ 
		public function curl_get($url, array $get = NULL, array $options = array()) 
		{    
		    // $defaults = array( 
		    //     CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get), 
		    //     CURLOPT_HEADER => 0, 
		    //     CURLOPT_RETURNTRANSFER => TRUE, 
		    //     CURLOPT_TIMEOUT => 4 
		    // ); 
		    
		    // $ch = curl_init(); 
		    // curl_setopt_array($ch, ($options + $defaults)); 
		    // if( ! $result = curl_exec($ch)) 
		    // { 
		    //     trigger_error(curl_error($ch)); 
		    // }
		    $ch = curl_init($url);
		    curl_exec($ch);
		    curl_close($ch); 
		    return $result; 
		}

	}
?>