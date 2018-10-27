<?php 

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent:: __construct();
		$this -> load -> model('mahasiswa_model');
	}
	function index()
	{
		$data['mahasiswa'] = $this -> mahasiswa_model -> get_all_mahasiswa();
		$this -> load -> view('mahasiswa_view',$data);
	}
	function simpan()
	{
		$nim = $this -> input -> post('nim');
		$nama = $this -> input -> post('nama');
		$prodi = $this -> input -> post('prodi');
		
		$this -> load -> library('ciqrcode');

		$config['cacheable']    = true; 
        $config['cachedir']     = './assets/'; 
        $config['errorlog']     = './assets/'; 
        $config['imagedir']     = './assets/images/'; 
        $config['quality']      = true; 
        $config['size']         = '1024'; 
        $config['black']        = array(224,255,255); 
        $config['white']        = array(70,130,180); 
        $this->ciqrcode->initialize($config);
 
        $image_name=$nim.'.png'; //buat name dari qr code sesuai dengan nim
 
        $params['data'] = $nim; //data yang akan di jadikan QR CODE
        $params['level'] = 'H'; //H=High
        $params['size'] = 10;
        $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
        $this->ciqrcode->generate($params);

		$this -> mahasiswa_model -> simpan_mahasiswa($nim,$nama,$prodi,$image_name);
		redirect('mahasiswa');
	}
	function delete()
	{
		$nim = $this -> uri -> segment(3);

		$this -> mahasiswa_model -> delete($nim);
		redirect('mahasiswa');
	}

	function get_edit()
	{
		$nim = $this -> uri -> segment(3);
		$result = $this -> mahasiswa_model -> get_mahasiswa_id($nim);
		if($result -> num_rows() > 0)
		{
			$i = $result -> row_array();
			$data = array(

				'nim' => $i['nim'] ,
				'nama' => $i['nama'] ,
				'prodi' => $i['prodi']

			);
			$this -> load -> view('edit_mahasiswa',$data);
		}
		else
		{
			echo "Data was Not Found!";
		}
	}

	function update()
	{
		$nim = $this -> input -> post('nim');
		$nama = $this -> input -> post('nama');
		$prodi = $this -> input -> post('prodi');

		$this -> mahasiswa_model -> update($nim,$nama,$prodi);
		redirect('mahasiswa');
	}
}


 ?>