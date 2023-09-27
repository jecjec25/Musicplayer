<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    private $music;
    private $play;
    private $song;
    public function __construct(){
        $this->music = new \App\Models\SongModel();
        $this->play = new \App\Models\PlaylistModel();
        $this->song = new \App\Models\MusicModel();
    }

    public function index()
    {
        //
    }

    public function song()
    {
        $data=[
            'music' => $this->music->findAll(),
            'plays' => $this->play->findAll()
        ];
        return view ('song', $data);
    }
    public function songs()
    {
        $data=[
            'music' => $this->music->findAll(),
            'plays' => $this->play->findAll()
        ];
        return view ('song', $data);
    }

    public function save(){
        $data = ['playlist' => $this->request->getVar('playlist')];
        $this->play->save($data);
        return redirect()->to('playmusic');
    }

    public function insert(){
        $data=['file'=>$this->request->getVar('file'),
        'artist'=>$this->request->getVar('artist'),
        'MusicTitle'=>$this->request->getVar('MusicTitle'),
    ];
    $this->music->save($data);
    return redirect()->to('playmusic');
    }

    public function search(){
        $searchQuery = $this->request->getVar('search');

        if ($searchQuery) {
           
          
        $data= ['music' => $this->music->like('file', $searchQuery)->findAll(),
        'plays' => $this->play->findAll()]; 
    }
    return view('song', $data);
}
public function kanta($id){
    $data =['music' =>$this->music->findAll(),
    'mus' =>$this->music->where('id', $id)->first(),
    'play' =>$this->play->findAll(),
];
return view('song', $data);
return redirect()->to('playmusic');
}
    public function saveMusic(){
        $data = ['idmusic' => $this->request->getVar('idmusic'),
                'idplaylist' => $this->request->getVar('idplaylist')   
    ];
    $this->song->save($data);
    return redirect()->to('playmusic');
}
}
