<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class MainController extends BaseController
{
    private $music;
    private $play;
    public function __construct(){
        $this->music = new \App\Models\SongModel();
        $this->play = new \App\Models\PlaylistModel();
    }
    public function index()
    {
        //
    }
    public function song()
    {
        $data=[
            'music' => $this->music->findAll(),
            'play' => $this->play->findAll()
        ];
        return view ('song', $data);
    }
    public function save(){
        $data = ['playlist' => $this->request->getVar('playlist')];
        $this->play->save($data);
        return redirect()->to('chris');
    }
    
}
