<?php
namespace App\Controllers;

use App\Models\K_model;
use App\Models\V_model;
use App\Models\H_model;

class Voting extends BaseController
{
    
    public function index()
{
    if(session()->get('id')>0) {
        $kandidatModel = new K_model();
        $periodeModel = new V_model();
        $level = session()->get('level');
        
        if ($level == 1 || $level == 2) {
           
            $data['kandidat'] = $kandidatModel->getAllKandidatWithUsername();
            echo view('header');
            echo view('menuutama'); 
            echo view('voting', $data);
            echo view('footer');
        } else {
          
            $periode = $periodeModel->where('status', 'Aktif')->first();

            if ($periode) {
                $periode_id = $periode['id'];
                $data['kandidat'] = $kandidatModel->getKandidatWithUsername($periode_id);
                echo view('header');
                echo view('menuutama'); 
                echo view('voting', $data);
                echo view('footer');
            } else {
                echo view('header');
                echo view('menuutama');
                echo view('no_periode');
                echo view('footer');
            }
        }
    }else{
        return redirect()->to('/Home');
    }
}

public function vote()
{
    if(session()->get('id')>0) {
    $voteModel = new H_model();
    $kandidatModel = new K_model();
    $userId = session()->get('id');
    $kandidatId = $this->request->getPost('kandidatId');

    $existingVote = $voteModel->where('user_id', $userId)->first();
    if ($existingVote) {
        return redirect()->to('/Voting/s_memilih');
    } else {
        $voteModel->savee([
            'user_id' => $userId,
            'kandidat_id' => $kandidatId
        ]);

       
        $kandidatModel->where('id', $kandidatId)->increment('suara');

        return redirect()->to('/Voting/success');
    }
}else{
    return redirect()->to('/Home');
}
}

public function success()
{
    if(session()->get('id')>0) {
    echo view('header');
    echo view('menuutama');
    echo view('vote_success');
    echo view('footer');
}else{
    return redirect()->to('/Home');
}
}
public function s_memilih()
{
    if(session()->get('id')>0) {
    echo view('header');
    echo view('menuutama');
    echo view('s_memilih');
    echo view('footer');
}else{
    return redirect()->to('/Home');
}
}
}
