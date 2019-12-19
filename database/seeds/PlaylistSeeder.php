<?php

use Illuminate\Database\Seeder;

use App\Playlist;
use App\User;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$user = User::find(1);
        for($i=0; $i < 5; $i++) {
        	$playlist = new Playlist(['name' => "test_{$i}"]);
            $user->playlists()->save($playlist);
        }
    }
}
