<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_laporan extends CI_Model
{
    //set nama tabel yang akan kita tampilkan datanya
    var $table = 'laporan';
    //set kolom order, kolom pertama saya null untuk kolom edit dan hapus
    var $column_order = array(NULL,'kodelap','tgl_laporan','pengaduan','lokasi_namajalan','lokasi_distrik','status');

    var $column_search = array('kodelap','tgl_laporan','pengaduan','lokasi_namajalan','lokasi_distrik');
    // default order 
    var $order = array('tgl_laporan' => 'DESC');

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        $this->db->select('l.*,a.nama AS lokasinamadistrik, b.nama AS lokasinamakab');
        $this->db->join('wilayah_2020 a', 'a.kode = l.lokasi_distrik');
        $this->db->join('wilayah_2020 b', 'b.kode = l.lokasi_kabkota');

        
        $this->db->from('laporan l');
         //add custom filter here
        if($this->input->post('selectStatus'))
        {
            $this->db->where('l.status', $this->input->post('selectStatus'));
        }

        if($this->input->post('selectKab'))
        {
            $this->db->where('l.lokasi_kabkota', $this->input->post('selectKab'));
        }

        if($this->input->post('selectInfrastruktur'))
        {
            $this->db->where('l.infrastruktur', $this->input->post('selectInfrastruktur'));
        }

        if($this->input->post('selectDistrik'))
        {
            $this->db->where('l.lokasi_distrik', $this->input->post('selectDistrik'));
        }

        $i = 0;
        foreach ($this->column_search as $item) // loop kolom 
        {
            if ($this->input->post('search')['value']) // jika datatable mengirim POST untuk search
            {
                if ($i === 0) // looping pertama
                {
                    $this->db->group_start();
                    $this->db->like($item, $this->input->post('search')['value']);
                } else {
                    $this->db->or_like($item, $this->input->post('search')['value']);
                }
                if (count($this->column_search) - 1 == $i) //looping terakhir
                    $this->db->group_end();
            }
            $i++;
        }

        // jika datatable mengirim POST untuk order
        if ($this->input->post('order')) {
            $this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($this->input->post('length') != -1)
            $this->db->limit($this->input->post('length'), $this->input->post('start'));
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        if($this->input->post('selectKab'))
        {
            $this->db->where('lokasi_kabkota', $this->input->post('selectKab'));
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_laporan_by_id($id)
    {
        $query = $this->db->query("SELECT l.*, a.nama AS lokasinamadistrik, b.nama AS lokasinamakab, x.nama AS despelapor, y.nama AS kecpelapor, z.nama AS kabpelapor,
            (SELECT DISTINCT u.nama_file FROM upload u WHERE u.kodelap = l.kodelap AND u.kategori='ktp') AS ktp,
            (SELECT DISTINCT u.nama_file FROM upload u WHERE u.kodelap = l.kodelap AND u.kategori='dokumentasi1') AS dokumentasi1,
            (SELECT DISTINCT u.nama_file FROM upload u WHERE u.kodelap = l.kodelap AND u.kategori='dokumentasi2') AS dokumentasi2,
            (SELECT DISTINCT u.nama_file FROM upload u WHERE u.kodelap = l.kodelap AND u.kategori='dokumentasi3') AS dokumentasi3
            FROM laporan l
            JOIN wilayah_2020 a ON a.kode=l.lokasi_distrik
            JOIN wilayah_2020 b ON b.kode=l.lokasi_kabkota
            JOIN wilayah_2020 x ON x.kode=l.des_pelapor
            JOIN wilayah_2020 y ON y.kode=l.kec_pelapor
            JOIN wilayah_2020 z ON z.kode=l.kab_pelapor
            WHERE l.id='$id'");
        return $query->row();
    }

    public function get_all_laporan($infrastruktur=NULL,$kabupaten=NULL,$startdate=NULL,$todate,$range,$status,$namakab)
    {
        $this->db->select('l.*, a.nama AS lokasinamadistrik, b.nama AS lokasinamakab, x.nama AS despelapor, y.nama AS kecpelapor, z.nama AS kabpelapor');
        $this->db->join('wilayah_2020 a', 'a.kode = l.lokasi_distrik');
        $this->db->join('wilayah_2020 b', 'b.kode = l.lokasi_kabkota');
        $this->db->join('wilayah_2020 x', 'x.kode=l.des_pelapor');
        $this->db->join('wilayah_2020 y', 'y.kode=l.kec_pelapor');
        $this->db->join('wilayah_2020 z', 'z.kode=l.kab_pelapor');        
        
        if ($infrastruktur!=NULL && $infrastruktur!='semua')
        {
            $this->db->where('l.infrastruktur',$infrastruktur);
        }

        if ($status!=NULL)
        {
            $this->db->where('l.status',$status);
        }

        if ($kabupaten!=NULL && $kabupaten!='semua')
        {
            $this->db->where('l.lokasi_kabkota',$kabupaten);
        }

        if ($startdate!=NULL && $todate!=NULL)
        {
            $this->db->where('l.tgl_laporan >=',$startdate);
            $this->db->where('l.tgl_laporan <=',$todate);
        }

        $this->db->from('laporan l');

        $query = $this->db->get();
        return $query->result_array();
    }


}