<?php namespace App\Models\base;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    public function __construct() {

        //disini untuk mengetahui usernya kita pake seession id biar lebih mudah

        parent::__construct();
        $db  = \Config\Database::connect();
        $this->pengunjung = $db->table('pengunjung'); 
        $this->komen = $db->table('komen'); 
        $this->themes = $db->table('themes'); 
        $this->order = $db->table('order'); 
        $this->rules = $db->table('rules'); 
        $this->mempelai = $db->table('mempelai'); 
        $this->data = $db->table('data'); 
        $this->acara = $db->table('acara'); 
        $this->album = $db->table('album'); 
        $this->cerita = $db->table('cerita');  
        $this->rekening = $db->table('rekening');
        $this->users = $db->table('users');  
        $this->pembayaran = $db->table('pembayaran'); 
        $this->setting = $db->table('setting'); 
        $this->testimoni = $db->table('testimoni'); 
        $this->tamu = $db->table('tamu');
        $this->slider_bukutamu = $db->table('slider_bukutamu');
        $this->setting_pembayaran = $db->table('setting_pembayaran');
        $this->paket = $db->table('paket');
        $this->quote = $db->table('quote');
        $this->session = session();
    }
     public function get_paket(){
        return  $this->paket->get()->getResult();
    }
    public function get_paket_by_id($id){
        $builder = $this->paket;
        $builder->where('id_paket', $id);
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_paket_by_id_user(){
        $builder = $this->order;
        $builder->select('*');
        $builder->join('paket', 'order.id_paket = paket.id_paket');
        $builder->where('order.id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_paket_by_login($id){
        $builder = $this->order;
        $builder->select('*');
        $builder->join('paket', 'order.id_paket = paket.id_paket');
        $builder->where('order.id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_total_pengunjung(){
        $builder = $this->pengunjung;
        $builder->selectCount('id');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_pengunjung_today(){
        $builder = $this->pengunjung;
        $builder->selectCount('id');
        $where = "date(created_at) = CURDATE() AND id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_komentar(){
        $builder = $this->komen;
        $builder->selectCount('id');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_komentar_today(){
        $builder = $this->komen;
        $builder->selectCount('id');
        $where = "date(created_at) = CURDATE() AND id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }

    public function get_total_pengunjung_mingguan(){
        $builder = $this->pengunjung;
        $builder->select("DAY(created_at) as tanggal, COUNT(id) as jumlah", true);
        $where = "(created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)) AND id_user=".$_SESSION['id'];
        $builder->groupBy("DAY(created_at)");
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function delete_pengunjung_by_id($id){
        $builder = $this->pengunjung;
        $builder->where('id', $id);
        return $builder->delete();
    }
    
    public function get_all_komen(){
        $builder = $this->komen;
        $builder->select('*'); 
        $builder->orderBy('created_at', 'DESC');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_all_pengunjung(){
        $builder = $this->pengunjung;
        $builder->select('nama_pengunjung, created_at, id'); 
        $builder->orderBy('created_at', 'DESC');
        $where = "id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function delete_komen_by_id($id){
        $builder = $this->komen;
        $builder->where('id', $id);
        return $builder->delete();
    }

    //mengambil semua data pada table themes
    public function get_all_themes(){
        $builder = $this->themes;
        $builder->select('themes.*,tema_categories.name');
        $builder->join('tema_categories', 'themes.category_id = tema_categories.id', 'left');
        $builder->where('status', '1');
        $builder->orderBy('themes.nama_theme', 'ASC');
        return $builder->get();
    }

    public function update_tema($data){
        $builder = $this->order;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    public function get_order_by_id_user(){
        $builder = $this->order;
        $builder->select('order.*,themes.nama_theme,themes.kode_theme,paket.*, pembayaran.status as status_bayar');
        $builder->join('themes', 'themes.id = order.theme', 'left');
        $builder->join('paket', 'order.id_paket = paket.id_paket', 'left');
        $builder->join('pembayaran', 'order.id_user = pembayaran.id_user', 'left');
        $builder->where('order.id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_fitur_by_id_user(){
        $builder = $this->rules;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_fitur($data){
        $builder = $this->rules;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }
    public function update_salam($data){
        $builder = $this->data;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    public function cek_domain($domain)
    {
        $query = $this->order->where('domain', $domain)->get();
        return $query->getResult();
    }

    public function update_domain($domain){
        $builder = $this->order;
        $builder->set('domain', $domain);
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update();
    }
    public function update_posisi_mempelai($id){
        $builder = $this->mempelai;
        $builder->set('posisi_mempelai', $id);
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update();
    }
    
    public function update_wa($token_wa){
        $builder = $this->data;
        $builder->set('token_wa', $token_wa);
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update();
    }
    public function get_quote_by_id_user(){
        $builder = $this->quote;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
    public function save_quote($data){
        return $this->quote->insert($data);
    }
    public function update_quote($data){
        $builder = $this->quote;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }
    public function get_data_by_id_user(){
        $builder = $this->data;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
   

    public function get_user_by_email($email){
        $query = $this->users->where('email', $email)->get();
        return $query->getResult();
    }
    
    public function get_user_by_token($token){
        $query = $this->users->where('token', $token)->get();
        return $query->getResult();
    }
    
    public function get_mempelai_by_id_user(){
        $builder = $this->mempelai;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_mempelai($data){
        $builder = $this->mempelai;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    public function get_acara_by_id_user(){
        $builder = $this->acara;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
    public function hapus_acara(){
        $builder = $this->acara;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->delete();
    }
    public function update_acara($data){
        $builder = $this->acara;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }
    public function save_acara($data){
    	return $this->acara->insert($data);
    }
    public function set_countdown($id){
        $builder = $this->acara;
        $builder->set('set_countdown', 'N');
        $where = "id_user=".$_SESSION['id']." AND id_acara != ".$id;
        $builder->where($where);
        $builder->update();
        
        $builder2 = $this->acara;
        $builder2->set('set_countdown', 'Y');
        $where2 = "id_user=".$_SESSION['id']." AND id_acara = ".$id;
        $builder2->where($where2);
        return $builder2->update();
    }
    public function update_maps($data){
        $builder = $this->data;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    public function get_album_by_id_user(){
        $builder = $this->album;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function save_album($data){
    	return $this->album->insert($data);
    }

    public function delete_album($data){
        $builder = $this->album;
        $builder->where($data);
        return $builder->delete();
    }
    public function delete_slider_bukutamu($data){
        $builder = $this->slider_bukutamu;
        $builder->where($data);
        return $builder->delete();
    }

    public function update_video($data){
        $builder = $this->data;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }

    public function get_cerita_by_id_user(){
        $builder = $this->cerita;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function hapus_cerita(){
        $builder = $this->cerita;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->delete();
    }

    public function save_cerita($data){
    	return $this->cerita->insert($data);
    }
    public function get_rekening_by_id_user(){
        $builder = $this->rekening;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function hapus_rekening(){
        $builder = $this->rekening;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->delete();
    }

    public function save_rekening($data){
    	return $this->rekening->insert($data);
    }

    public function get_user_by_id_user(){
        $builder = $this->users;
        $builder->select('*');
        $builder->where('id', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_user($data){
        $builder = $this->users;
        $builder->where('id', $_SESSION['id']);
        return $builder->update($data);
    }

    public function get_user($data){
        $builder = $this->users;
        $builder->where($data);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_pembayaran($data,$invoice){
        $builder = $this->pembayaran;
        $builder->where('invoice', $invoice);
        return $builder->update($data);
    }

    public function get_pembayaran_by_id_user(){
        $builder = $this->pembayaran;
        $builder->select('pembayaran.*, users.*, pembayaran.created_at as tglBayar');
        $builder->join('users', 'pembayaran.id_user = users.id');
        $where = "pembayaran.id_user=".$_SESSION['id']." AND pembayaran.status_order = '1' " ;
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function get_pembayaran_by_invoice($invoice){
        $builder = $this->pembayaran;
        $builder->select('pembayaran.*, users.*');
        $builder->join('users', 'pembayaran.id_user = users.id');
        $where = "pembayaran.invoice = ".$invoice;
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_setting(){
        $builder = $this->setting;
        $builder->select('*');
        $builder->where('id', '1');
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_setting_bayar(){
        $builder = $this->setting_pembayaran;
        $builder->select('*');
        $builder->where('id_setting', '1');
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function get_testi_by_id_user(){
        $builder = $this->testimoni;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }

    public function update_testi($data){
        $builder = $this->testimoni;
        $builder->where('id_user', $_SESSION['id']);
        return $builder->update($data);
    }
    public function get_token(){
        $builder = $this->setting;
        $builder->select('token_wa');
        $builder->where('id','1');
        $query = $builder->get();
        return $query->getResult()[0]->token_wa;
    }
    
    public function get_tamu_by_id_user(){
        $builder = $this->tamu;
        $builder->select('*');
        $builder->join('order', 'order.id_user = tamu.id_user');
        $builder->where('tamu.id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
        
    }
    public function get_tamu_by_id_tamu($id){
        $builder = $this->tamu;
        $builder->select('*');
        $builder->where('id_tamu', $id);
        $query = $builder->get();
        return $query->getResult();
        

    }
    
    public function cek_wa($wa)
    {
        $query = $this->tamu->where('no_wa', $wa)->get();
        return $query->getResult();
    }

    
    public function save_tamu($data){
    	return $this->tamu->insert($data);
    }
    public function update_tamu($data,$id){

        $builder = $this->tamu;
        $builder->where('id_tamu', $id);
        return $builder->update($data);
    }
    public function delete_tamu_by_id($id){
        $builder = $this->tamu;
        $builder->where('id_tamu', $id);
        return $builder->delete();
    }
    
    public function get_hadir_by_id_user(){
        $builder = $this->tamu;
        $builder->select('*');
        $builder->join('order', 'order.id_user = tamu.id_user');
        $where = "tamu.status = 'hadir' AND tamu.id_user=".$_SESSION['id'];
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }

    public function get_slider_by_id_user(){
        $builder = $this->slider_bukutamu;
        $builder->select('*');
        $builder->where('id_user', $_SESSION['id']);
        $query = $builder->get();
        return $query->getResult();
    }
    public function save_slider($data){
    	return $this->slider_bukutamu->insert($data);
    }
    public function update_password($password,$id){
        $builder = $this->users;
        $builder->set('password', $password);
        $builder->where('id', $id);
        return $builder->update();
    }
    public function token_reset($token,$id){
        $builder = $this->users;
        $builder->set('token', $token);
        $builder->set('created_token', date('Y-m-d H:i:s'));
        $builder->where('id', $id);
        return $builder->update();
       
    }
    public function autofill($qrcode){
        $builder = $this->tamu;
        $builder->select('*');
        $builder->where('qrcode', $qrcode);
        $query = $builder->get();
        return $query->getResult();
    }
     public function cek_hadir($qrcode){
        $builder = $this->tamu;
        $builder->select('id_tamu');
        $builder->where('qrcode', $qrcode);
        $builder->where('status', 'hadir');
        $builder->limit(1);
        return $builder->get();
     }
    
    public function update_hadir($qrcode){
        $builder = $this->tamu;
        $builder->set('status', 'hadir');
        $builder->set('waktu_hadir', date('Y-m-d H:i:s'));
        $builder->where('qrcode', $qrcode);
        
        return $builder->update();
        
    }
    public function hapus_hadir($id)
    {
        $builder = $this->tamu;
        $builder->set('status', '');
        $builder->where('id_tamu', $id);
        return $builder->update();
        
    }
    public function get_all_undangan($id_tamu){
        $builder = $this->tamu;
        $builder->select('mempelai.*,tamu.*, data.*,order.domain as domain_undangan, pembayaran.status as status_bayar, pembayaran.created_at as tgl_bayar');
        $builder->join('users', 'users.id = tamu.id_user');
        $builder->join('order', 'order.id_user = tamu.id_user');
        $builder->join('mempelai', 'mempelai.id_user = tamu.id_user');
        $builder->join('data', 'data.id_user = tamu.id_user');
        $builder->join('pembayaran', 'pembayaran.id_user = tamu.id_user');
        $builder->where('tamu.id_tamu', $id_tamu);
        $query = $builder->get();
        return $query->getResult();
    }
    public function status_undangan($data,$id_tamu){
        $builder = $this->tamu;
        $builder->where('id_tamu', $id_tamu);
        return $builder->update($data);
    }
    public function refresh_invoice($kode){
        $builder = $this->pembayaran;
        $builder->set('invoice', $kode);
        $builder->set('status', '0');
        $builder->set('nama_bank', '');
        $builder->set('va_number', '');
        $builder->set('payment_type', '');
        $builder->set('transaction_status', '');
        $where = "status_order = '1' AND id_user=".$_SESSION['id'];
        $builder->where($where);
        return $builder->update();
        
    }
    public function re_order($data){
        $builder2 = $this->order;
        $builder2->set('created_at', date('Y-m-d H:i:s'));
        $builder2->where('id_user', $_SESSION['id']);
        $builder2->update();
        $builder = $this->pembayaran;
        $builder->set('status_order', '0');
        $builder->where('id_user', $_SESSION['id']);
        $builder->update();
        
    	return $this->pembayaran->insert($data);
    }
     public function update_paket($data1, $data2){
        $builder = $this->order;
        $builder->where('id_user', $_SESSION['id']);
        $builder->update($data1);
        $builder2 = $this->pembayaran;
        $where = "status_order = '1' AND id_user=".$_SESSION['id'];
        $builder2->where($where);
        return $builder2->update($data2);
    }
}
