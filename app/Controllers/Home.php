<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_model;

class Home extends BaseController
{
    public function index()
	{
		echo view('header');
		echo view('login');

	}
	public function aksi_login()
	{
		$u=$this->request->getPost('username');
		$p=$this->request->getPost('pswd');
		$model= new M_model();
		$data=array(
			'username'=>$u,
			'password'=>md5($p)

		);
		$cek=$model->getWhere2('user', $data);
		if ($cek>0) {
			session()->set('id', $cek['id_user']);
			session()->set('username', $cek['username']);
			session()->set('level', $cek['level']);
			session()->set('nama', $cek['nama']);
			return redirect()->to('Home/dashboard');
		}else {
			return redirect()->to('/Home');
		}
	}
	public function logout()
	{
		session()->destroy();
		return redirect()->to('/Home');
	}
	public function dashboard()
	{
		$userLevel = session()->get('level');
		
		if ($userLevel == 3 || $userLevel == 4) {
			echo view('header');
			echo view('Dashboard2');
			echo view('menuutama');
			echo view('footer');
		} elseif ($userLevel == 1 || $userLevel == 2) {
			echo view('header');
			echo view('Dashboard');
			echo view('menuutama');
			echo view('footer');
		} else {
			return redirect()->to('/Home'); // Redirect ke halaman Home untuk level lainnya
		}
	}
	
   
   
}
