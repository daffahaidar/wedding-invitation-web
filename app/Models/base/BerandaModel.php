<?php namespace App\Models\base;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    protected $themes;

    public function __construct() {

        parent::__construct();
        $db      = \Config\Database::connect();

        //mendefinisikan varible themes
        //dan 'meload' table themes
        $this->themes = $db->table('themes'); 
        $this->acara = $db->table('acara');
        $this->cerita = $db->table('cerita');
        $this->data = $db->table('data');
        $this->komen = $db->table('komen');
        $this->mempelai = $db->table('mempelai');
        $this->rules = $db->table('rules');
        $this->themes = $db->table('themes');
        $this->users = $db->table('users');
        $this->album = $db->table('album');
        $this->setting = $db->table('setting');
        $this->setting_pembayaran = $db->table('setting_pembayaran');
        $this->testimoni = $db->table('testimoni');
        $this->pembayaran = $db->table('pembayaran');
        $this->tamu = $db->table('tamu');
        $this->order = $db->table('order');
        $this->rekening = $db->table('rekening');
        $this->videos = $db->table('themes_video');
        $this->paket = $db->table('paket');
    }
    
    //mengambil semua data pada table themes
    public function get_all_themes(){
        $builder = $this->themes;
        $builder->select('themes.*,tema_categories.*');
        $builder->join('tema_categories', 'themes.category_id = tema_categories.id', 'left');
        $builder->where('status', '1');
        $builder->orderBy('themes.nama_theme', 'ASC');
        return $builder->get();
    }
    public function get_all_themes_video(){
        $builder = $this->videos;
        $builder->select('themes_video.*,video_categories.*');
        $builder->join('video_categories', 'themes_video.category_id = video_categories.id', 'left');
        $builder->orderBy('themes_video.nama_tema', 'ASC');
        return $builder->get();
    }
    public function get_total_pengguna(){
        $builder = $this->users;
        $builder->selectCount('id');
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }
    public function get_total_tema(){
        $builder = $this->themes;
        $builder->selectCount('id');
        $builder->where('status', '1');
        $query = $builder->get();
        return $query->getResult()[0]->id;
    }
    public function get_total_testimoni(){
        $builder = $this->testimoni;
        $builder->selectCount('id_testi');
        $builder->where('status', '2');
        $query = $builder->get();
        return $query->getResult()[0]->id_testi;
    }
    //mengambil data user
    public function get_paket()
    {
        return $this->paket->get()->getResult();
    }
    
    public function get_themes_by_name($nama){
        $query = $this->themes->where('nama_theme', $nama)->get();
        return $query->getResult();
    }
    public function get_tamu($id){
        return $this->tamu->where('id_tamu', $id)->get();
    }
    public function cek_tamu($id_user, $id_tamu)
    {
    $where = "id_tamu = ".$id_tamu." AND id_user=".$id_user;
        return $this->tamu->where($where)->get();
    }

    //mengambil data user
    public function get_users()
    {
        return $this->users->get()->getResultArray();
    }

    //mengambil data mempelai sesuai dengan data(id_user) yang dikirim
    public function get_mempelai($id){
        return $this->mempelai->where('id_user', $id)->get();
    }

    //mengambil data acara sesuai dengan data(id_user) yang dikirim
    public function get_acara($id){
        return $this->acara->where('id_user', $id)->get()->getResult();
    }
    
    public function get_acara_countdown($id){
        $builder = $this->acara;
        $builder->where('id_user', $id);
        $builder->where('set_countdown', 'Y');
        return $builder->get();
    }
    
    //mengambil data komen sesuai dengan data(id_user) yang dikirim
    public function get_komen($id){
        return $this->komen->where('id_user', $id)->get()->getResultArray();
    }

    //mengambil data data sesuai dengan data(id_user) yang dikirim
    public function get_data($id){
        $builder = $this->data;
        $builder->select('data.*, quote.isi_quote as quote, quote.sumber_quote');
        $builder->join('quote', 'quote.id_user = data.id_user', 'left');
        $builder->where('data.id_user', $id);
        return $builder->get();
    }

    //mengambil data cerita sesuai dengan data(id_user) yang dikirim
    public function get_cerita($id){
        return $this->cerita->where('id_user', $id)->get()->getResultArray();
    }

    //mengambil data cerita album dengan data(id_user) yang dikirim
    public function get_album($id){
        return $this->album->where('id_user', $id)->get()->getResultArray();
    }
    //mengambil data rules sesuai dengan data(id_user) yang dikirim
    public function get_rules($id){
        return $this->rules->where('id_user', $id)->get();
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
    public function get_testimoni(){
        $builder = $this->testimoni;
        $builder->select('testimoni.*,data.kunci');
        $builder->join('data', 'data.id_user = testimoni.id_user');
        $builder->where('testimoni.status', '2');
        $query = $builder->get();
        return $query;
    }
    
    public function get_pembayaran($id){
        $builder = $this->pembayaran;
        $builder->select('*');
        $builder->where('id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }
    
    public function get_paket_by_domain($domain){
        $builder = $this->order;
        $builder->select('*');
        $builder->join('paket', 'order.id_paket = paket.id_paket');
        $builder->where('order.domain', $domain);
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_paket_by_id($id){
        $builder = $this->order;
        $builder->select('*');
        $builder->join('paket', 'order.id_paket = paket.id_paket');
        $builder->where('order.id_user', $id);
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_all_undangan(){
        $builder = $this->tamu;
        $builder->select('mempelai.*,tamu.*, data.*,order.domain as domain_undangan, pembayaran.status, pembayaran.created_at as tgl_bayar');
        $builder->join('users', 'users.id = tamu.id_user');
        $builder->join('order', 'order.id_user = tamu.id_user');
        $builder->join('mempelai', 'mempelai.id_user = tamu.id_user');
        $builder->join('data', 'data.id_user = tamu.id_user');
        $builder->join('pembayaran', 'pembayaran.id_user = tamu.id_user');
        $where = "pembayaran.status = '2' AND date(tamu.tgl_kirim) = CURDATE() AND tamu.status_kirim != 'terkirim'";
        $builder->where($where);
        $builder->limit(100);
        $query = $builder->get();
        return $query->getResult();
    }
    public function get_token(){
        $builder = $this->setting;
        $builder->select('token_wa');
        $builder->where('id','1');
        $query = $builder->get();
        return $query->getResult()[0]->token_wa;
    }
    
    public function status_undangan($data,$id_tamu){
        $builder = $this->tamu;
        $builder->where('id_tamu', $id_tamu);
        return $builder->update($data);
    }
    public function get_rekening($id){
        return $this->rekening->where('id_user', $id)->get();
    }
    public function get_pembayaran_by_invoice($invoice){
        $builder = $this->pembayaran;
        $builder->select('pembayaran.*, users.*, order.domain');
        $builder->join('users', 'pembayaran.id_user = users.id');
        $builder->join('order', 'pembayaran.id_user = order.id_user');
        $where = "pembayaran.status = '1' AND pembayaran.invoice = ".$invoice;
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }
    public function update_pembayaran($data,$invoice){
        $builder = $this->pembayaran;
        $builder->where('invoice', $invoice);
        return $builder->update($data);
    }
    public function get_belum_lunas(){
        $builder = $this->pembayaran;
        $builder->select('pembayaran.*, users.*, order.created_at as tglDaftar, pembayaran.created_at as tglBayar');
        $builder->join('users', 'pembayaran.id_user = users.id');
        $builder->join('order', 'pembayaran.id_user = order.id_user');
        $where = "pembayaran.status != '2' AND pembayaran.status_order = '1'";
        $builder->where($where);
        $query = $builder->get();
        return $query->getResult();
    }
} 
