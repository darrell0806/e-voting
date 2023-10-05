<?php 

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_model;
use App\Models\K_model;

class Kandidat extends BaseController
{

    public function index()
    {
        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $model = new K_model();
            $on = 'user.id_user = kandidat.ketua OR user.id_user = kandidat.wakil OR user.id_user = kandidat.wakil2'; // Tambahkan kondisi untuk wakil2
            $data['a'] = $model->join2('kandidat', 'user', $on);
    
            // Modifikasi tampilan untuk menampilkan Wakil Ketua OSIS 2
            echo view('header');
            echo view('menuutama');
            echo view('v_kandidat', $data);
            echo view('footer');
        } else {
            return redirect()->to('/Home');
        }
    }
    
    
    public function tambah()
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
        $model=new m_model();
			$data['a'] = $model->tampil('user');
            $data['c'] = $model->tampil('vote');
            echo view('header');
			echo view('menuutama');
			echo  view('tambah_kandidat', $data);
			echo view('footer');
        }else{
			return redirect()->to('/Home');
		}
    }
    public function aksi_tambah()
    {
        if(session()->get('level')==1 ||  session()->get('level')==2){
        $Model = new K_model();
        $data = [
            'ketua' => $this->request->getPost('ketua'),
            'wakil' => $this->request->getPost('wakil'),
            'wakil2' => $this->request->getPost('wakil2'),
            'visimisi' => $this->request->getPost('visimisi'),
            'periode_id' => $this->request->getPost('periode_id'),
            'foto' => $this->request->getFile('foto')->getName()
        ];
        $photo = $this->request->getFile('foto');
        $Model->insertt($data, $photo);
        return redirect()->to('/Kandidat/index/');
    }else{
        return redirect()->to('/Home');
    }
    }
public function edit($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $Model = new K_Model();
    $data['a'] = $Model->getById($id);
    if(!$data['a']){
        return redirect()->to('/Kandidat/index');
    }
    $data['b'] = $Model->tampil('user');
    $data['d'] = $Model->tampil('vote');
    echo view('header');
    echo view('menuutama');
    echo view('edit_kandidat', $data);
    echo view('footer');
}else{
    return redirect()->to('/Home');
}
}
public function update($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $Model = new K_model();
    $data = $this->request->getPost();
    $photo = $this->request->getFile('foto');

   
    if ($photo->isValid() && ! $photo->hasMoved()) {
       
        $Model->updateP($id, $photo, $data);
    } else {
       
        $Model->update($id, $data);
    }   

    return redirect()->to('/Kandidat/index');
}else{
    return redirect()->to('/Home');
}
}
public function delete($id)
{
    if(session()->get('level')==1 ||  session()->get('level')==2){
    $Model = new K_model();
    $Model->deletee($id);
    return redirect()->to('/Kandidat/index/');
}else{
    return redirect()->to('/Home');
}
}
public function store()
	{
        if (session()->get('level') == 1 || session()->get('level') == 2) {
            $model = new K_model();
            $on = 'user.id_user = kandidat.ketua OR user.id_user = kandidat.wakil OR user.id_user = kandidat.wakil2'; // Tambahkan kondisi untuk wakil2
            $data['a'] = $model->joinla('kandidat', 'user', $on);
    
            // Modifikasi tampilan untuk menampilkan Wakil Ketua OSIS 2
            echo view('header');
            echo view('menuutama');
            echo view('store_kandidat', $data);
            echo view('footer');
        } else {
            return redirect()->to('/Home');
        }
        }
public function balik($id) {
    if (session()->get('level') == 1 || session()->get('level') == 2) {
    $model = new K_model(); // Gantilah NamaModelAnda dengan nama model yang sesuai
    $data = ['deleted_at' => null]; // Data yang akan diupdate

    // Lakukan update data berdasarkan id
    $model->updateData($id, $data);

    return redirect()->to(base_url('/Kandidat'));
} else {
    return redirect()->to('/Home');
} // Redirect ke halaman awal atau halaman yang sesuai
}
public function hilang() {
    if (session()->get('level') == 1 || session()->get('level') == 2) {
    $model = new M_model(); // Gantilah dengan nama model yang sesuai
    $where = "deleted_at IS NOT NULL"; // Kondisi untuk menghapus data dengan deleted_at terisi

    // Hapus data berdasarkan kondisi
    $model->hapus('kandidat', $where);

    return redirect()->to('/Kandidat');
} else {
    return redirect()->to('/Home');
}
}



}