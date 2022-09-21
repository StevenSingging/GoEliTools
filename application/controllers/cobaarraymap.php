<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobaarraymap extends CI_Controller {

	// load data model
	public function __construct()
	{
		parent::__construct();
	}

	// Halaman Utama

    public function index()
    {
        $activities = $this->activities_model->listing();
        $total = $this->activities_model->total();

        $data = array( 'title' => 'Data Activities  ('.$total->total.')',
                        'activities' => $activities,
                        'content' => 'activities/index'
                     );
        //$this->load->view('layout/wrapper', $data, FALSE);
    }
	
    public function cobaarray()
    {
        $this->db->from('coba_1');
        $this->db->truncate();
        $this->db->from('coba_2');
        $this->db->truncate();
        //simpan data di tabel coba 1 melalui map data
        $col1 = "a";
        $col2 = 3;
        $arraycoba = array(array($col1,$col2));
        $col1 = "b";
        $col2 = 4;
        array_push($arraycoba,array($col1,$col2));
        $col1 = "c";
        $col2 = 5;
        array_push($arraycoba,array($col1,$col2));
        $col1 = "a";
        $col2 = 6;
        array_push($arraycoba,array($col1,$col2));
        $row=0;
        
        //echo $arraycoba[0][0]."</br>";
        //echo $arraycoba[0][1]."</br>";

        // simpan isi array ke table coba_1
        for ($row = 0; $row < count($arraycoba); $row++)
        {
            $data = array('att1' => $arraycoba[$row][0],
                        'att2' => $arraycoba[$row][1]);
            
            $this->db->insert('coba_1', $data);
        }
        
        // baca table coba_1 pindahkan ke array dan simpan ke coba_2

        //$array2 = array(array("",0));
        $row=0;  
        $this->db->select('*');
        $this->db->from('coba_1');
        $this->db->order_by('id');

        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            $id=$row->id;
            $att1 =$row->att1;
            $att2=$row->att2;
            echo "id : ".$id."</br>";
            if ($id==1)
                $array2 = array(array($att1,$att2));  
            else
                array_push($array2,array($att1,$att2));
        }
        echo "jumlah data array ".count($array2)."</br>";
        echo "jumlah array coba".count($arraycoba)."</br>";
        for ($row = 0; $row < count($array2); $row++)
        {
            $data = array('att1' => $array2[$row][0],
                        'att2' => $array2[$row][1]);
            
            $this->db->insert('coba_2', $data);
        }
        //unset($array2);

        $row=0;  
        $this->db->select('*');
        $this->db->from('coba_1');
        $this->db->order_by('id');

        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            $id=$row->id;
            $att1 =$row->att1;
            $att2=$row->att2;
            echo "id : ".$id."</br>";
            if ($id==1)
                $array3 = array(array(
                    "atribut1" => $att1,
                    "atribut2"=>$att2));  
            else
                array_push($array3,array(
                    "atribut1" => $att1,
                    "atribut2"=>$att2));
        }
        //echo "atribut 1".$array3[0]["atribut1"]."</br>";
        //echo "atribut 2".$array3[1]["atribut2"]."</br>";

        $cari = array_filter($array3, function($item){ return $item['atribut1'] == "a";});
        $x=0;
        echo "jumlah data arraycari ".count($cari)."</br>";
        echo "data ".$cari[0]["atribut2"]."</br>";
        echo "data ".$cari[3]["atribut2"]."</br>";
        for ($x=0; $x < count($cari) ; $x++)
        {
        echo "data ".$cari[$x]["atribut1"]."</br>";
        echo "data ".$cari[$x]["atribut2"]."</br>";
        }
        ///foreach ($cari as $key => $value)
        //{
            //echo "data".$value['atribut1']."</br>";
            //echo "data".$value['atribut2']."</br>";
        //}
    }
}

/* End of file Activities.php */
/* Location: ./application/controllers/Activities.php */