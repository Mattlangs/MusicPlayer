<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Music; 
use App\Models\Playlist;

class MusicController extends BaseController
{

    public function upload()
    {
        $model = new Music();

        if ($this->request->getMethod() === 'post' && $this->validate([
            'music_file' => 'uploaded[music_file]|max_size[music_file,10240]|mime_in[music_file,audio/mpeg,audio/wav]',
        ])) {
            $musicFile = $this->request->getFile('music_file'); // Corrected method name
            $musicFileName = $musicFile->getRandomName();
            $musicFile->move(ROOTPATH . 'public/uploads', $musicFileName);

            $model->insert([
                'title' => $musicFile->getName(),
                'artist' => $this->request->getPost('artist'), // Corrected method name
                'file_path' => 'uploads/' . $musicFileName,
            ]);
        }
        return view('MainMusic');
    }

    public function search_music()
    {
        $searchQuery = $this->request->getGet('search'); // Corrected input name
        $model = new Music();
        $data['music'] = $model->like('music_name', $searchQuery)->findAll();
    
        return view('search_music', $data);
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
    public function playlist($playlist)  
    {
        echo $playlist;
    }
    public function index()
    {
        echo 'pogo';
    }
}
?>


