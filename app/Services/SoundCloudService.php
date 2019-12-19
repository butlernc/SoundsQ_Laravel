<?php

	namespace App\Services;

	class SoundCloudService extends MediaProviderService {

		public $client_id = "QK7n7ftmiysoWKExRtDrmxlna8vh15IR";
		public $client_secret = "TdRlC85IYVv2PCtO0nwnYl9wqVZbuTQQ";

		public $sc_resolve_url = "http://api.soundcloud.com/resolve?url=";

		/**
		 *
		 */
		public function item_created_request($item)
		{
			//get track url from item->link
			//$ curl -v 'http://api.soundcloud.com/resolve?url=http://soundcloud.com/matas/hobnotropic&client_id=YOUR_CLIENT_ID'

			$curl_track_url = $this->sc_resolve_url . $item->link . "&client_id=" . $this->client_id;
			//create our curl request
			$track_url = $this->curl_get($curl_track_url);


		}

		public function item_play_request($item)
		{

		}
	}
?>