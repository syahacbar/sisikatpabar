<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */ 
 
class Laporan_model extends CI_Model
{
    var $table = 'v_laporan';
    var $column_order = array(null, null,null,'lokasi_kabkota','tgl_laporan'); //set column field database for datatable orderable
    var $column_search = array('pengaduan','lokasi_namajalan','lokasikabkota','lokasidistrik'); //set column field database for datatable searchable 
    var $order = array('id' => 'asc'); // default order

    function __construct()
    {
        parent::__construct();

    }

    function get_lastrow()
    {
        $last_idlap = $this->db->order_by('id',"desc")
            ->limit(1)
            ->get('laporan');
        return $last_idlap;
    }

    function get_wilayah($kode)
    {
        return $this->db->get_where('wilayah_2020',array('kode'=>$kode))->row_array();
    }

    function get_laporan($id)
    {
        return $this->db->get_where('laporan',array('id'=>$id))->row_array();
    }

    function get_infrastruktur($x)
    {
        return $this->db->get_where('laporan',array('infrastruktur'=> $x));
    }

    function get_kabkota($kab)
    {
        return $this->db->get_where('wilayah_2020', array('kode' => $kab))->row();
    }
        
    function get_all_laporan_bykabkota($kab=NULL,$limit=NULL,$offset=NULL,$infrastruktur=NULL,$order=NULL,$asdesc=NULL,$status=NULL)
    {
        $this->db->select('l.*');
        $this->db->select('(SELECT a.nama FROM wilayah_2020 a WHERE a.kode=l.kab_pelapor) AS kabpelapor');
        $this->db->select('(SELECT b.nama FROM wilayah_2020 b WHERE b.kode=l.kec_pelapor) AS kecpelapor');
        $this->db->select('(SELECT c.nama FROM wilayah_2020 c WHERE c.kode=l.des_pelapor) AS despelapor');
        $this->db->select('(SELECT x.nama FROM wilayah_2020 x WHERE x.kode=l.lokasi_kabkota) AS lokasikabkota');
        $this->db->select('(SELECT y.nama FROM wilayah_2020 y WHERE y.kode=l.lokasi_distrik) AS lokasidistrik');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi1") AS dokumentasi1');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi2") AS dokumentasi2');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi3") AS dokumentasi3');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="ktp") AS ktp');

        if($kab!=NULL)
        {
            $this->db->where('l.lokasi_kabkota',$kab);
        }
        if($infrastruktur!=NULL)
        {
            $this->db->where('l.infrastruktur',$infrastruktur);
        }
        if($status!=NULL)
        {
            $this->db->where('l.status',$status);
        }
        $this->db->from('laporan l');

        if ($order!=NULL && $asdesc!=NULL)
        {
            $this->db->order_by($order, $asdesc);
        }

        if ($limit!=NULL)
        {
            $this->db->limit($limit);
        }
        if ($offset!=NULL)
        {
            $this->db->limit($limit,$offset);
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_all_laporan_bykabkota_filter($kab=NULL,$limit=NULL,$offset=NULL,$infrastruktur=NULL,$kodekec=NULL,$status=NULL)
    {
        $this->db->select('l.*');
        $this->db->select('(SELECT a.nama FROM wilayah_2020 a WHERE a.kode=l.kab_pelapor) AS kabpelapor');
        $this->db->select('(SELECT b.nama FROM wilayah_2020 b WHERE b.kode=l.kec_pelapor) AS kecpelapor');
        $this->db->select('(SELECT c.nama FROM wilayah_2020 c WHERE c.kode=l.des_pelapor) AS despelapor');
        $this->db->select('(SELECT x.nama FROM wilayah_2020 x WHERE x.kode=l.lokasi_kabkota) AS lokasikabkota');
        $this->db->select('(SELECT y.nama FROM wilayah_2020 y WHERE y.kode=l.lokasi_distrik) AS lokasidistrik');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi1") AS dokumentasi1');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi2") AS dokumentasi2');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi3") AS dokumentasi3');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="ktp") AS ktp');

        if($kab!=NULL)
        {
            $this->db->where('l.lokasi_kabkota',$kab);
        }
        if($infrastruktur!=NULL)
        {
            $this->db->where('l.infrastruktur',$infrastruktur);
        }
        if($kodekec!=NULL)
        {
            $this->db->where('l.lokasi_distrik',$kodekec);
        }
        if($status!=NULL)
        {
            $this->db->where('l.status',$status);
        }

        $this->db->from('laporan l');

        if ($limit!=NULL)
        {
            $this->db->limit($limit);
        }
        if ($offset!=NULL)
        {
            $this->db->limit($limit,$offset);
        }
        
        $query = $this->db->get();
        return $query->result_array();
    }
     
     
    function get_all_laporan($infrastruktur=NULL,$limit=NULL,$offset=NULL,$group=NULL,$order=NULL,$asdesc=NULL, $status=NULL)
    {
        $this->db->select('l.*');
        $this->db->select('(SELECT a.nama FROM wilayah_2020 a WHERE a.kode=l.kab_pelapor) AS kabpelapor');
        $this->db->select('(SELECT b.nama FROM wilayah_2020 b WHERE b.kode=l.kec_pelapor) AS kecpelapor');
        $this->db->select('(SELECT c.nama FROM wilayah_2020 c WHERE c.kode=l.des_pelapor) AS despelapor');
        $this->db->select('(SELECT x.nama FROM wilayah_2020 x WHERE x.kode=l.lokasi_kabkota) AS lokasikabkota');
        $this->db->select('(SELECT y.nama FROM wilayah_2020 y WHERE y.kode=l.lokasi_distrik) AS lokasidistrik');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi1") AS dokumentasi1');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi2") AS dokumentasi2');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi3") AS dokumentasi3');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="ktp") AS ktp');

        if ($infrastruktur!=NULL)
        {
            $this->db->where('l.infrastruktur',$infrastruktur);
        }

        if ($status!=NULL)
        {
            $this->db->where('l.status',$status);
        }

        $this->db->from('laporan l');

        if ($limit!=NULL)
        {
            $this->db->limit($limit);
        }
        if ($offset!=NULL)
        {
            $this->db->limit($limit,$offset);
        }
        if ($group!=NULL)
        {
            $this->db->group_by($group);
        }
        if ($order!=NULL && $asdesc!=NULL)
        {
            $this->db->order_by($order, $asdesc);
        }

        
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_cetak_laporan($infrastruktur=NULL,$kabupaten=NULL,$startdate=NULL,$todate=NULL,$limit=NULL,$offset=NULL,$group=NULL,$order=NULL,$asdesc=NULL)
    {
        $this->db->select('l.*, date(tgl_laporan) AS tgllaporan');
        $this->db->select('(SELECT x.nama FROM wilayah_2020 x WHERE x.kode=l.lokasi_kabkota) AS lokasikabkota');
        $this->db->select('(SELECT y.nama FROM wilayah_2020 y WHERE y.kode=l.lokasi_distrik) AS lokasidistrik');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi1") AS dokumentasi1');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi2") AS dokumentasi2');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi3") AS dokumentasi3');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="ktp") AS ktp');

        if ($infrastruktur!=NULL && $infrastruktur!='semua')
        {
            $this->db->where('l.infrastruktur',$infrastruktur);
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

        if ($limit!=NULL)
        {
            $this->db->limit($limit);
        }
        if ($offset!=NULL)
        {
            $this->db->limit($limit,$offset);
        }
        if ($group!=NULL)
        {
            $this->db->group_by($group);
        }
        if ($order!=NULL && $asdesc!=NULL)
        {
            $this->db->order_by($order, $asdesc);
        }

        
        $query = $this->db->get();
        return $query->result_array();
    }

  /*  function get_all_laporan($kategori=NULL,$limit=NULL,$offset=NULL)
    {
        
        $query = $this->db->select('*')
        ->from('v_laporan')
        //->where('kategori', $kategori)
        ->order_by('tgl_laporan')
        ->limit($limit, $offset)
        ->get();
        return $query->result_array();
    }
       */ 
    /*
     * function to add new laporan
     */
    function add_laporan($params)
    {
        $this->db->insert('laporan',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update laporan
     */
    function update_laporan($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('laporan',$params);
    }
    
    /*
     * function to delete laporan
     */
    function delete_laporan($id)
    {
        return $this->db->delete('laporan',array('id'=>$id));
    }



    //datatables block
    private function _get_datatables_query()
    {
        $this->db->select('l.*');
        $this->db->select('(SELECT x.nama FROM wilayah_2020 x WHERE x.kode=l.lokasi_kabkota) AS lokasikabkota');
        $this->db->select('(SELECT y.nama FROM wilayah_2020 y WHERE y.kode=l.lokasi_distrik) AS lokasidistrik');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi1") AS dokumentasi1');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi2") AS dokumentasi2');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="dokumentasi3") AS dokumentasi3');
        $this->db->select('(SELECT u.nama_file FROM upload u WHERE u.kodelap=l.kodelap AND u.kategori="ktp") AS ktp');
         
        //add custom filter here
        if($this->input->post('infrastruktur'))
        {
            $this->db->where('infrastruktur', $this->input->post('infrastruktur'));
        }
        if($this->input->post('lokasi_kabkota'))
        {
            $this->db->where('lokasi_kabkota', $this->input->post('lokasi_kabkota'));
        }
        if($this->input->post('lokasi_distrik'))
        {
            $this->db->where('lokasi_distrik', $this->input->post('lokasi_distrik'));
        }
 
        $this->db->from('laporan l');
        $i = 0;
     
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_list_infrastruktur()
    {
        $this->db->distinct('infrastruktur');
        $this->db->from($this->table);
        $this->db->order_by('infrastruktur','asc');
        $query = $this->db->get();
        $result = $query->result();

        $infrastruktur = array();
        foreach ($result as $row) 
        {
            $infrastruktur[] = $row->infrastruktur;
        }
        return $infrastruktur;
    }

    function proseslaporan($idlap,$status)
    {
        return $this->db
               ->where('id', $idlap)
               ->update('laporan', array('status' => $status));
    }

}
