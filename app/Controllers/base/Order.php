<?php namespace App\Controllers\base;

use CodeIgniter\Controller;
use App\Models\base\OrderModel;

class Order extends Controller
{
	
	protected $order,$uri,$request,$db;

	public function __construct() {
		// parent::__construct();

		//load service bawaan ci
		$this->request = \Config\Services::request(); 
		$this->session = \Config\Services::session();  //untuk membaca session 
		$this->db  = \Config\Database::connect(); //untuk melakukan CRUD ke databse
		$this->order = new OrderModel();  //load OrderModel
		$this->uri = $this->request->uri;
    }

	public function index()
	{

		$kode = $this->uri->getSegment(3); //untuk membaca tema yang dipilih user atau membaca session order

		if($this->session->get('theme') == '' && $kode == '1'){
			return redirect()->to(base_url('/tema'));
			exit();
		}

		if($kode != '1' && $this->session->get('theme') == ''){
			$cekTheme = $this->order->cek_themes($kode);
			if(!empty($cekTheme->getResult())){
				foreach ($cekTheme->getResult() as $row)
				{
				    $idnya = $row->id;
				}
				$this->session->set('theme', $idnya);
				$this->session->set('checkpoint', 1);
			}else{
				return redirect()->to(base_url('/tema'));
				exit();
			}
		}
		$data['paket'] = $this->order->get_paket();
		$data['id_paket'] = $this->session->id_paket;
		$data['domain'] = $this->session->domain;
		$data['email'] = $this->session->email;
		$data['hp'] = $this->session->hp;
		$data['password'] = $this->session->password;
		$data['view'] = 'base/order/order1-datauser';

		//cek session 
		$check = $this->session->get('checkpoint');
		if($check == 1 || $kode == '1'){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}

	}

	public function mempelai()
	{

		// cek pengiriman data & simpan form data sebelumnya (awal)
		$submit = $this->request->getPost('submit');
		if($submit != NULL){

			//ambil data dari post sebelumnya
			//dan cek domain
			//jika domain sudah digunakan 
			//maka akan dikembalikan ke halaman sebelumnya (awal)
			$id_paket = $this->request->getPost('id_paket');
			$domain = $this->request->getPost('domain');
			$email = $this->request->getPost('email');
			$password = $this->request->getPost('password');  
			$hp = $this->request->getPost('hp'); 
			$cekEmail = $this->order->cek_email($email);
			$cekDomain = $this->order->cek_domain($domain);
			//simpan datanya kedalam session
			$this->session->set('domain', $domain);
			$this->session->set('email', $email);
			$this->session->set('password', $password);
			$this->session->set('id_paket', $id_paket);
			if(!empty($cekDomain->getResult())){
			$this->session->set('domain', "");
				echo "<script>
					alert('Nama domain sudah dipakai. Gunakan nama domain lain!');
					document.location.href='order/any';
					</script>";
					exit();
			}
			if(!empty($cekEmail->getResult())){
			$this->session->set('email', "");
				echo "<script>
					alert('Email sudah terdaftar. Gunakan Email lain!');
					document.location.href='order/any';
					</script>";
					exit();
			}
			foreach ($this->order->get_setting() as $row){
            	$wa_gateway = $row->wa_gateway;
        	}
			if($wa_gateway == 'nusagateway' && $this->cek_wa($hp) == false){
				$this->session->set('hp', "");
				echo "<script>
					alert('No HP anda tidak terdaftar di Whatsapp!');
					document.location.href='order/any';
					</script>";
					exit();
			}else{
					$this->session->set('hp', $hp);
			}
			//buatkan data dummynya
			//untuk identitas sementara
			$c = $this->session->get('checkpoint');
			if($c <= 2 && $this->session->get('dummy') == ''){
				$this->session->set('checkpoint', 2);
				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $randomString = '';
			    for ($i = 0; $i < 7; $i++) {
			        $randomString .= $characters[rand(0, $charactersLength - 1)];
			    }
			    $generate = "dummy_".$randomString;
			    $this->session->set('dummy', $generate);
			}
			
		}
		
		//set view data
		$data['view'] = 'base/order/order2-mempelai';

		//cek session 
		$check = $this->session->get('checkpoint');
		if($check >= 2){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
		
	}

	public function acara(){

		// cek pengiriman data & simpan form data sebelumnya
		$submit = $this->request->getPost('submit');
		if(isset($submit)){
                       
               
			//simpan data sebelumnya ke session
			
			$this->simpan_data_sessions('mempelai');
			
			//set checkpoint
			$c = $this->session->get('checkpoint');
			if($c <= 3){
				$this->session->set('checkpoint', 3);
			}
		}

		//set data for view
		$data['view'] = 'base/order/order3-acara';

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check >= 3){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}

	}

	public function cerita(){

		$submit = $this->request->getPost('submit');
		if(isset($submit)){
			
			//simpan data sebelumnya ke session
			$this->simpan_data_sessions('acara');

			//set checkpoint
			$c = $this->session->get('checkpoint');
			if($c <= 4){
				$this->session->set('checkpoint', 4);
			}
		}

		//set data for view
		$data['view'] = 'base/order/order4-cerita';

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check >= 4){
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
	}

	public function gallery(){

		$submit = $this->request->getPost('submit');

		if(isset($submit)){

			//simpan data sebelumnya ke session
			$this->simpan_data_sessions('cerita');
					
			//set checkpoint
			$c = $this->session->get('checkpoint');
			if($c <= 5){
				$this->session->set('checkpoint', 5);
			}

		}

		//set data for view
		$data['view'] = 'base/order/order5-gallery';

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check >= 5){
			// $this->session->set('save', 1);
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
	}

	public function simpan_data_sessions($indentifier){

		switch ($indentifier) {

			case 'mempelai':

				$dataMempelai = [
					//pria
					'nama_lengkap_pria'  => ucwords($this->request->getPost('nama_lengkap_pria')),
					'nama_panggilan_pria'  => ucwords($this->request->getPost('nama_panggilan_pria')),
					'nama_ayah_pria'  => ucwords($this->request->getPost('nama_ayah_pria')),
					'nama_ibu_pria'  => ucwords($this->request->getPost('nama_ibu_pria')),
					'w_ayah_pria'  => $this->request->getPost('w_ayah_pria'),
					'w_ibu_pria'  => $this->request->getPost('w_ibu_pria'),
	
					//wanita
					'nama_lengkap_wanita'  => ucwords($this->request->getPost('nama_lengkap_wanita')),
					'nama_panggilan_wanita'  => ucwords($this->request->getPost('nama_panggilan_wanita')),
					'nama_ayah_wanita'  => ucwords($this->request->getPost('nama_ayah_wanita')),
					'nama_ibu_wanita'  => ucwords($this->request->getPost('nama_ibu_wanita')),
					'w_ayah_wanita'  => $this->request->getPost('w_ayah_wanita'),
					'w_ibu_wanita'  => $this->request->getPost('w_ibu_wanita'),
					'harga' => $this->request->getPost('harga'),
	
				];

				$this->session->set($dataMempelai);
				break;

			case 'acara':
			    
                $noNama = 0;
    			$noDate = 0;
    			$noMulai = 0;
    			$noAkhir = 0;
    			$noTempat = 0;
    			$noAlamat = 0;
    			$noMaps = 0;
    			$jml_acara_sebelumnya = $this->session->get('jml_acara');
    			for($i=0;$i<$jml_acara_sebelumnya;$i++){
                    $this->session->remove('nama_acara'.$i);
                    $this->session->remove('tgl_acara'.$i);
                    $this->session->remove('waktu_mulai'.$i);
                    $this->session->remove('waktu_akhir'.$i);
                    $this->session->remove('tempat_acara'.$i);
                    $this->session->remove('alamat_acara'.$i);
                    $this->session->remove('maps'.$i);
                }
                //KITA KUMPULKAN DAN SIMPAN DATANYA DI SESSION DULU
    			foreach ($this->request->getPost('nama_acara') as $value) {
                    if($value == "")
                        continue;
                    $this->session->set('nama_acara'.$noNama++, $value); 
                    
    			}
    
    			foreach ($this->request->getPost('tgl_acara') as $value) {
                    if($value == "")
                    continue;
                    $this->session->set('tgl_acara'.$noDate++, $value); 
    			}
    
    			foreach ($this->request->getPost('waktu_mulai') as $value) {
                    if($value == "")
                    continue;
                    $this->session->set('waktu_mulai'.$noMulai++, $value); 
                }
                foreach ($this->request->getPost('waktu_akhir') as $value) {
                    if($value == "")
                        continue;
                    $this->session->set('waktu_akhir'.$noAkhir++, $value); 
                    
    			}
    
    			foreach ($this->request->getPost('tempat_acara') as $value) {
                    if($value == "")
                    continue;
                    $this->session->set('tempat_acara'.$noTempat++, $value); 
    			}
    
    			foreach ($this->request->getPost('alamat_acara') as $value) {
                    if($value == "")
                    continue;
                    $this->session->set('alamat_acara'.$noAlamat++, $value); 
                }
                foreach ($this->request->getPost('maps') as $value) {
                    $this->session->set('maps'.$noMaps++, $value); 
                }
                
				$this->session->set('jml_acara', $noDate); 
				break;

			case 'cerita': 

				$skipCerita = $this->request->getPost('skipCerita');
				$this->session->set('skipCerita', $skipCerita);
				
				$noTanggal = 0;
				$noJudul = 0;
				$noIsi = 0;
	
				$jml_cerita_sebelumnya = $this->session->get('jml_cerita');
	
				for($i=0;$i<=$jml_cerita_sebelumnya;$i++){
					$this->session->remove('tanggal_cerita'.$i);
					$this->session->remove('judul_cerita'.$i);
					$this->session->remove('isi_cerita'.$i);
				}
	
				foreach ($this->request->getPost('tanggal_cerita') as $value) {
					$this->session->set('tanggal_cerita'.$noTanggal++, $value); 
					if($value == "")
						continue;
				}
	
				foreach ($this->request->getPost('judul_cerita') as $value) {
					$this->session->set('judul_cerita'.$noJudul++, $value); 
				}
	
				foreach ($this->request->getPost('isi_cerita') as $value) {
					$this->session->set('isi_cerita'.$noIsi++, $value); 
				}
	
				$this->session->set('jml_cerita', $noTanggal); 
				break;

			default:
				return redirect()->route('order'); 
				break;
		}

	}

	//checkpoint jika session checkpoint tidak sesuai akan 'dilempar' sesuai sessionnya
	//misal, jika masih di tahap order 1 tidak akan bisa langsung loncat ke order 5 dsb
	public function any(){

		$checkpoint = $this->session->get('checkpoint');
		switch ($checkpoint) {
			case 1:
				return redirect()->route('order/1'); 
				break;
			case 2:
				return redirect()->route('order/2'); 
				break;
			case 3:
				return redirect()->route('order/3'); 
				break;
			case 4:
				return redirect()->route('order/4'); 
				break;
			case 5:
				return redirect()->route('order/5'); 
				break;
			default:
				return redirect()->route('order'); 
				break;
		}
		
	}

	// upload foto gallery
	public function fileUpload(){

		$check = $this->session->get('checkpoint');
		if($check != 5){
			return redirect()->route('order/any');
			exit();
		}

        $avatar = $this->request->getFile('file');
        $generate = $this->session->get('dummy'); //data dummy yg tadi dibuat untuk penyimpanan foto sementara
        $path = 'assets/users/'.$generate;
        
        
        //folder e
        if(!file_exists($path)){
        	$create = mkdir('assets/users/'.$generate, 0777,true);
        	
        }

        //generate dan cek nama file
        for($i=1;$i<=10;$i++){
        	$pathName = 'assets/users/'.$generate.'/album'.$i.'.png';
        	if(!file_exists($pathName)){
        		$ok = array("no"=>$i,"dummy"=>$generate);
        		$avatar->move('assets/users/'.$generate, 'album'.$i.'.png');
        		echo json_encode($ok);
        		break;
        	} 
        }


	 }

	 //upload foto mempelai
	 public function imgupload(){

		$check = $this->session->get('checkpoint');
		if($check < 2){
			return redirect()->route('order/any');
			exit();
		}

        $groom = $this->request->getFile('foto_groom');
        $bride = $this->request->getFile('foto_bride');
        $sampul = $this->request->getFile('foto_sampul');
        $generate = $this->session->get('dummy');
        $path = 'assets/users/'.$generate;
        $musik = 'assets/musik/musik.mp3';
        //buat folder ny
        if(!file_exists($path)){
        	$create = mkdir('assets/users/'.$generate, 0777,true);
        	copy($musik, $path.'/musik.mp3');
        	
        	
        }

        if($groom != ''){
        	$avatar = $groom;
        	$pathName = 'assets/users/'.$generate.'/groom.png';
        	if(file_exists($pathName)){
        		unlink($pathName);
	    	} 
				$avatar->move('assets/users/'.$generate, 'groom.png');
				$this->session->set('foto_groom', 1);
				echo 'uploadedgroom';
		}else if($bride != ''){
        	$avatar = $bride;
        	$pathName = 'assets/users/'.$generate.'/bride.png';
        	if(file_exists($pathName)){
        		unlink($pathName);
	    	} 
	    	$avatar->move('assets/users/'.$generate, 'bride.png');
    		$this->session->set('foto_bride', 1);
			echo 'uploadedbride';
			
        }else{
        	$avatar = $sampul;
        	$pathName = 'assets/users/'.$generate.'/kita.png';
        	if(file_exists($pathName)){
        		unlink($pathName);
	    	} 
	    	$avatar->move('assets/users/'.$generate, 'kita.png');
    		$this->session->set('foto_sampul', 1);
    		echo 'uploadedsampul';
        } 	


	 }
	 
	 
	

	//  hapus foto gallery
	 public function del(){

	 	$check = $this->session->get('checkpoint');
		if($check != 5){
			return redirect()->route('order/any');
			exit();
		}

	 	$id = $this->request->getPost('id');
        $generate = $this->session->get('dummy');
        $file = 'assets/users/'.$generate.'/album'.$id.'.png';
        unlink($file);
        echo json_encode("sukses");


	 }

	 public function finish(){

	 	$submit = $this->request->getPost('submit');
	 	if(isset($submit)){

			$skipGallery = $this->request->getPost('skipGallery');
			$this->session->set('skipGallery', $skipGallery);

		}

	 	//set data for view
		$data['view'] = 'base/order/order6-finish';

		// cek session domain
		$check = $this->session->get('checkpoint');
		if($check == 5){
			$this->session->set('save', 1);
			return view('base/order/order_layout',$data);
		}else{
			return redirect()->route('order/any');
		}
	 }

	 public function success(){
	 	$kode = $this->uri->getSegment(4);
	 	if(!empty($kode)){
	 		$cekOrder = $this->order->cek_order($kode);
			if(!empty($cekOrder->getResult())){
				foreach ($cekOrder->getResult() as $row)
				{
				    $id = $row->id_user;
				    $kode = $row->invoice;
				    $domain = $row->domain;
				    $username = $row->username;
				    $status = $row->statusPembayaran;

				}
				$data['setting'] = $this->order->get_setting();
				$data['view'] = 'base/order/order7-success';
				$data['domain'] = $domain;
				$data['kode'] = $kode;
				$data['status'] = $status;

				// set session login
				$ok = array('masukUser' => TRUE, 'uname' => $username, 'id' => $id);
				$this->session->set($ok);

				// $this->session->destroy();
				return view('base/order/order_layout',$data);

			}else{
				return redirect()->route('order/any');
			}
	 	}else{
	 		return redirect()->route('order/any');
	 	}
	}


	 public function saveData(){

	 	$check = $this->session->get('checkpoint');
	 	$check2 = $this->session->get('save');
		if($check < 5 && $check2 != 1){
			return redirect()->route('order/any');
			exit();
		}
        
		$email = $this->session->get('email');
		$domain = $this->session->get('domain');
        
		//untuk menghindari doubble insert ketika ditekan tombol back setealh success
		$cekUser = $this->order->cek_email($email);
		if(!empty($cekUser->getResult())){
			$cekOrder = $this->order->cek_order_domain($domain);
			if(!empty($cekOrder->getResult())){
				foreach ($cekOrder->getResult() as $row)
				{
					$kodenya = $row->kunci;

				}

				return redirect()->to(base_url('/order/success/'.$kodenya));

			}else{
				echo "Terjadi Kesalahan"; //user berhasil daftar tapi data tidak masuk semua (interupt)
				exit();
			}
		}

		//users
	 	$hp = $this->session->get('hp');
	 	$username = $email;
	 	$password = $this->session->password;
        
	 	$dataUser = [
	 		'email' => $email,
	 		'hp' => $hp,
	 		'username' => $username,
	 		'password' => md5($password),
	 		'id_unik' => '',
	 	];
		
		//insert dulu data user nya nanti diambil idnya 
	 	$saveUser = $this->order->save_user($dataUser);
	 	if(!$saveUser){
	 		echo "<script>
					alert('Terjadi Kesalahan! Silahkan coba beberapa saat lagi!');
					document.location.href='order/any';
					</script>";
					exit();
	 	}
		
	 	//global
	 	$id_user = $this->db->insertID(); //ambil id user
		$today = date('ym');
	 	$kode = $today.$id_user.rand(10,99); //dijadikan invoice sekaligus kode unik user. Formatnya ( 2 digit tahun, 2 digit bulan, id user, random 2 angka)
	 	$this->order->update_kode($kode,$id_user);

	 	//mempelai	
	 	$nama_lengkap_pria = $this->session->get('nama_lengkap_pria');
	 	$nama_panggilan_pria = $this->session->get('nama_panggilan_pria');
	 	$nama_ibu_pria = $this->session->get('nama_ibu_pria');
	 	$nama_ayah_pria = $this->session->get('nama_ayah_pria');

	 	$nama_lengkap_wanita = $this->session->get('nama_lengkap_wanita');
	 	$nama_panggilan_wanita = $this->session->get('nama_panggilan_wanita');
	 	$nama_ibu_wanita = $this->session->get('nama_ibu_wanita');
	 	$nama_ayah_wanita = $this->session->get('nama_ayah_wanita');
		 
	 	$dataMempelai = [
	 		'id_user' => $id_user,
	 		'nama_pria' => $nama_lengkap_pria,
	 		'nama_panggilan_pria' => $nama_panggilan_pria,
	 		'nama_ibu_pria' => $nama_ibu_pria,
	 		'nama_ayah_pria' => $nama_ayah_pria,
	 		'nama_wanita' => $nama_lengkap_wanita,
	 		'nama_panggilan_wanita' => $nama_panggilan_wanita,
	 		'nama_ibu_wanita' => $nama_ibu_wanita,
	 		'nama_ayah_wanita' => $nama_ayah_wanita,
	 	];

	 	//order
	 	$theme = $this->session->get('theme');
        $id_paket = $this->session->get('id_paket');
	 	$dataOrder = [
	 		'id_user' => $id_user,
	 		'domain' => $domain,
	 		'theme' => $theme,
	 		'id_paket' => $id_paket,
	 		'status' => '1',
            'created_at' => date('Y-m-d H:i:s')
	 	];

	 	//acara
	 	$jml_acara = $this->session->get('jml_acara');

	 	for($i=0;$i<$jml_acara;$i++){
			$nama_acara = $this->session->get('nama_acara'.$i);
			$tgl_acara = $this->session->get('tgl_acara'.$i);
			$waktu_mulai = $this->session->get('waktu_mulai'.$i);
            $waktu_akhir = $this->session->get('waktu_akhir'.$i);
			$tempat_acara = $this->session->get('tempat_acara'.$i);
			$alamat_acara = $this->session->get('alamat_acara'.$i);
			$maps = $this->session->get('maps'.$i);
			$dataAcara = [
			    'id_user' => $id_user,
				'nama_acara' => $nama_acara,
				'tgl_acara' => $tgl_acara,
				'waktu_mulai' => $waktu_mulai,
				'waktu_akhir' => $waktu_akhir,
				'tempat_acara' => $tempat_acara,
				'alamat_acara' => $alamat_acara,
				'maps' => $maps
				];
				$saveAcara = $this->order->save_acara($dataAcara);
            }
	 	//cerita
	 	$skipCerita = $this->session->get('skipCerita');
	 	$cerita = 0;
		if($skipCerita == ''){
			$jml_cerita = $this->session->get('jml_cerita');

			for($i=0;$i<$jml_cerita;$i++){
				$tanggal_cerita = $this->session->get('tanggal_cerita'.$i);
				$judul_cerita = $this->session->get('judul_cerita'.$i);
				$isi_cerita = $this->session->get('isi_cerita'.$i);

				$dataCerita = [
					'id_user' => $id_user,
					'tanggal_cerita' => $tanggal_cerita,
					'judul_cerita' => $judul_cerita,
					'isi_cerita' => $isi_cerita
				];

				$saveCerita = $this->order->save_cerita($dataCerita);
			}
			$cerita = 1;
		}
		

		//gallery
		$skipGallery = $this->session->get('skipGallery');
		$video = '';
		$gallery = 0;
		$generate = $this->session->get('dummy');
		if($skipGallery == ''){
			for($a=1;$a<=10;$a++){
		      $pathName = 'assets/users/'.$generate.'/album'.$a.'.png';
		      if(!file_exists($pathName))continue;
		      $dataAlbum = [
		      	'id_user' => $id_user,
		      	'album' => 'album'.$a

		      ];

		      $saveAlbum = $this->order->save_album($dataAlbum);
			}
			$video = '';
			$gallery = 1;
		}

		$foto_pria = $this->session->get('foto_groom');
		$foto_wanita = $this->session->get('foto_bride');
		if($foto_pria == null){
			$foto_pria = "0";
		}
		if($foto_wanita == null){
			$foto_wanita = "0";
		}
		$path = 'assets/users/'.$generate;
		$kunci = md5($id_user.$domain);
        
        if(file_exists($path)){
        	
		$folder = 'assets/users/'.$generate;
		$folderBaru = 'assets/users/'.$kunci;
		//exec("mv $folder $folder");
		rename($folder, $folderBaru);
        }
        foreach ($this->order->get_setting() as $row) {
	 	        $salam_pembuka = $row->salam_pembuka;
                $salam_wa_atas = $row->salam_wa_atas;
                $salam_wa_bawah = $row->salam_wa_bawah;
           }
		$dataData = [
			'id_user' => $id_user,
			'foto_pria' => $foto_pria,
			'foto_wanita' => $foto_wanita,
			'video' => $video,
			'kunci' => $kunci,
			'maps' => $maps,
			'salam_pembuka' => $salam_pembuka,
			'salam_wa_atas' => $salam_wa_atas,
			'salam_wa_bawah' => $salam_wa_bawah
		];

		//rule
		$dataRules = [
			'id_user' => $id_user,
			'sampul' => 1,
			'mempelai' => 1,
			'acara' => 1,
			'komen' => 1,
			'gallery' => $gallery,
			'cerita' => $cerita,
			'lokasi' => 1,
		];
		
        $paket = $this->order->get_paket_by_id($id_paket);
        $harga = $paket[0]->harga_paket;
		//pembayaran
		$dataPembayaran = [
			'id_user' => $id_user,
			'invoice' => $kode,
			'status' => '0',
			'harga' => $harga
		];
		$dataTesti= [
			'id_user' => $id_user
		
		
		];

		$savePembayaran = $this->order->save_pembayaran($dataPembayaran);
		$saveRules = $this->order->save_rules($dataRules);
		$saveData = $this->order->save_data($dataData);
	 	$saveOrder = $this->order->save_order($dataOrder);
		$saveUser = $this->order->save_mempelai($dataMempelai);
		$saveTesti = $this->order->save_testimoni($dataTesti);
	 	if($saveUser){
	 	    
	        foreach ($this->order->get_setting() as $row){
	           
                $token = $row->token_wa;
                $from = $row->email;
                
           }
            $nama = SITE_NAME;
            $bayar = number_format($harga);
            $phone = $hp;
            $pesan = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital <b>'.DOMAIN_UTAMA.'</b><br>
Masuk ke Halaman Dashboard Anda : '.SITE_UTAMA.'/login<br>
Mohon untuk segera melakukan pembayaran pesanannya <b>#'.$kode.'</b> sejumlah <b>Rp. '.$bayar.'</b>. <br><br>
-------------------------------------------<br>
<b>Terima Kasih Dan Sukses Selalu</b>';
            $message = 'Halo Kak, Terima Kasih Sudah Memesan Undangan Digital '.DOMAIN_UTAMA.'
Masuk ke Halaman Dashboard Anda : '.SITE_UTAMA.'/login
Mohon untuk segera melakukan pembayaran pesanannya #'.$kode.' sejumlah *Rp. '.$bayar.'* 

*Terima Kasih Dan Sukses Selalu*';
           $this->send_wa($token, $phone, $message);
            $this->sendEmail($from, $nama, $email, 'Invoice', $pesan);
            $this->session->destroy();
	 		return redirect()->to(base_url('/order/success/'.$kunci));
	 	}else{
	 		echo "gagal";
	 	}

	 }
	 private function sendEmail($from, $nama, $to, $title, $pesan){
        foreach ($this->order->get_setting() as $row) {
                $email_kirim = $row->email;
                $pass_email = $row->pass_email;
                $host_email = $row->host_email;
        }
        
        $email_smtp = \Config\Services::email();
        $config["protocol"] = "smtp";

        //isi sesuai nama domain/mail server
        $config["SMTPHost"]  = $host_email;
        //alamat email SMTP
        $config["SMTPUser"]  = $email_kirim; 

        //password email SMTP
        $config["SMTPPass"]  = $pass_email; 

        $config["SMTPPort"]  = 587;
        $config["SMTPCrypto"] = "tls";

        $email_smtp->initialize($config);

		$email_smtp->setFrom($from, $nama);
		$email_smtp->setTo($to);
		$email_smtp->setSubject($title);
		$email_smtp->setMessage($pesan);

		if(!$email_smtp->send()){
			return false;
		}else{
			return true;
		}
	}
	private function cek_wa($hp){
	    foreach ($this->order->get_setting() as $row){
            $token = $row->token_wa;
        }
	    $url = 'http://nusagateway.com/api/check-number.php';
        $curl = curl_init($url);
        $gateway = ['token' => $token,'phone' => $hp];
         curl_setopt($curl, CURLOPT_POSTFIELDS, $gateway);
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        $content = json_decode($response);
        $status = $content->status;
        if($status == 'valid'){
			return true;
		}else{
			return false;
		
        }
	}
	private function send_wa($token, $phone, $message){
	    foreach ($this->order->get_setting() as $row){
            $wa_gateway = $row->wa_gateway;
        }
		if($wa_gateway == 'nusagateway'){
			$url = 'http://nusagateway.com/api/send-message.php';
			$curl = curl_init($url);
			$gateway = ['token' => $token,'phone' => $phone,'message' => $message];
			curl_setopt($curl, CURLOPT_POSTFIELDS, $gateway);
			// curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($curl);
			curl_close($curl);
			$content = json_decode($response);
			$status = $content->result;
		}else if($wa_gateway == 'starsender'){
			$curl = curl_init();
			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://starsender.online/api/sendText?message='.rawurlencode($message).'&tujuan='.rawurlencode($phone.'@s.whatsapp.net'),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_HTTPHEADER => array(
				'apikey: '.$token
			),
			));

			$response = curl_exec($curl);
			curl_close($curl);
			$content = json_decode($response);
			$status = $content->status;
		}else if($wa_gateway == 'onesender'){
            $postData = [
                'phone' => $phone,
                'message' => $message
            ];
            
            $header = [
                'Authorization: Bearer '.$token,
            ]; 
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://onesender.my.id/api/message');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_VERBOSE,true);
            $response = curl_exec($ch);
            $content = json_decode($response);
			$code = $content->code;
            if($code == '200'){
                $status = 'true';
            }else{
                $status = 'false';
            }
        }
        if($status == 'true'){
			return true;
		}else{
			return false;
		
        }
	}

}
