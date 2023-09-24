<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Playlist;
use App\Models\Music;

class PlaylistController extends BaseController
{

    public function create_playlist()
    {
        $model = new Playlist();

        if ($this->request->getMethod() === 'post') {
            $model->insert([
                'name' => $this->request->getPost('playlist_name'),
            ]);
            return redirect()->to('/playlist'); // Redirect to the playlist page
        }
        return view('create_playlist');
    }

    public function index()
    {
        $model = new Playlist();
        $data['playlists'] = $model->findAll(); // Update variable name to 'playlists'
        
        $musicModel = new Music();
        $data['music'] = $musicModel->findAll();
    
        return view('MainMusic', $data); // Pass the playlists data to the MainMusic view
    }
    public function some_action()
    {
        $playlist = new Playlist();
        $music = new Music();
    
        // Retrieve playlists and music
        $data['playlists'] = $playlist->findAll();
        $data['music'] = $music->findAll();
    
        return view('MainMusic', $data);
    }


    public function add_to_playlist()
    {
        $playlist = new Playlist();
        $music = new Music();

        if ($this->request->getMethod() === 'post') {

        
        $data['playlists'] = $playlist->findAll();
        $data['music'] = $music->findAll();
    } else {
        $data['playlists'] = $playlist->findAll();
        $data['music'] = $music->findAll();
    }

        return view('add_to_playlist', $data);
    }

    public function remove_from_playlist()
    {
        $playlist = new Playlist();
        $music = new Music();

        if ($this->request->getMethod() === 'post') {

        
        $data['playlists'] = $playlist->findAll();
        $data['music'] = $music->findAll();
    
    
    } else {
        $data['playlists'] = $playlist->findAll();
        $data['music'] = $music->findAll();
    }
        return view('remove_from_playlist', $data);
    }
}

