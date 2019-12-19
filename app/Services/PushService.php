<?php

	namespace App\Services;

	use Kreait\Firebase;
	use Kreait\Firebase\Messaging\CloudMessage;

	/**
	 * Abstraction layer over firbase
	 * to make push calls simple.
	 */
	class PushService {

		private $firebase;

		public function __construct() {
			$this->firebase = (new Firebase\Factory())->create();
		}

		/**
		 * Takes a prepared firebase data
		 * and sends it off to the user.
		 * 
		 */
		private function send($to, $data) {
			//get our messaging object.
			$messaging = $this->firebase->getMessaging();

			$message = CloudMessage::withTarget('token', $to)->withData($data);
			//send out our data.
			$messaging->send($message);
		}

		/**
		 * @param Model/User $user
		 * @param Model/PlaylistItem $item
		 * @return success/failure of sending.
		 */
		public function send_playlist_item($user, $item) {
			//prepare item
			$item_json = $item->toArray();
			//prepare
			$this->send($user->firebase_id, $item_json);
		}
	}

?>