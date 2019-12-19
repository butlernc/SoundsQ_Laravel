<?php

use Illuminate\Database\Seeder;
use App\Tutorials;

class TutorialSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tutorials = array(
            'step_0' => array(
                'title' => "GPS Usage",
                'desc' => "For your playlist to show up on your friends phone we use their GPS and your GPS to match playlists. Your GPS location is encrypted and shared with no one. Ever."
            ),
        	'step_1', => array(
        		'title' => "Creating your first playlist."
        		'desc' => "To get started, create your own playlist by naming it and then clicking the send button. This will be saved to your playlist list which is accessed from the dropdown arrow above.",
        	),
        	'step_2' => array(
        		'title' => "Adding songs to your playlist.",
        		'desc' => "To add to your playlist, you have a few options. You can click 'add music', select your favorite provider, and search for the song you'd like. You can have friends download the app, open their favorite music provider, share the song to SoundsQ and select your playlist."
        	),
        	'step_3' => array(
        		'title' => "Liking Songs",
                'desc' => "Once a friend has sent a song to your playlist, they can view it as a spectator and like the music back to their accounts. And so can you!"
        	)

        );

        foreach($tutorials as $tutorial) {
        	$t = new Tutorial();
        	$t->title = $tutorial['title'];
        	$t->desc = $tutorial['desc'];
        	$t->save();
        }
    }
}
