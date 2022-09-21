<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semilarity extends CI_Controller {

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
	
    public function sem_object()
    {
        
        //hapus data pada semilarity object
        $this->db->from('test_sem_object');
        $this->db->truncate();

        $this->db->select('*');
        $this->db->from('test_pre_object');
        $this->db->order_by('extract_id');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
            $extract_id_1  = $row->extract_id;
            $object_desc_1 = $row->object_desc;
            
            //echo $extract_id_1;

            $this->db->select('*');
            $this->db->from('test_pre_object');
            $this->db->order_by('extract_id');


            foreach ($query->result() as $row)
            {
                $extract_id_2 = $row->extract_id;
                $object_desc_2 = $row->object_desc;

                //echo $extract_id_2;

                if ($extract_id_2 > $extract_id_1) {

                    //echo "sini";
                    // fungsi jaro

                    $kal1= $object_desc_1;
                    $kal2= $object_desc_2;
                    $s1 = str_split($kal1);
                    $s2 = str_split($kal2);

                    // If the strings are equal
                    if ($s1 == $s2)
                        $hasil = 1;
                  
                    // pendefinisian variabel
                    $len1 = strlen($kal1);
                    $len2 = strlen($kal2);
                    $max_dist = floor(max($len1,$len2)/2)-1;
                    $match = 0;
                    $hash_s1= array_fill(0,$len1,0);
                    $hash_s2= array_fill(0,$len2,0);

                    if ($len1 == 0 || $len2 == 0)
                        $hasil=0;

                    for ($i = 0; $i < $len1; $i++) {
                  
                        // Check if there is any matches
                        for ($j = max(0, $i - $max_dist);
                             $j < min($len2, $i + $max_dist + 1); $j++){
                  
                            // If there is a match
                            if ($s1[$i] == $s2[$j] && $hash_s2[$j] == 0) {
                                $hash_s1[$i] = 1;
                                $hash_s2[$j] = 1;
                                $match++;
                                break;
                            }
                        }
                    }
                    
                  
                    // If there is no match
                    if ($match == 0)
                        $hasil=0;
                    else 
                    {                  
                    // Number of transpositions
                    $t = 0;
                  
                    $point = 0;
                  
                    // Count number of occurances
                    // where two characters match but
                    // there is a third matched character
                    // in between the indices
                    for ($i = 0; $i < $len1; $i++) 
                        if ($hash_s1[$i]) {
                  
                            // Find the next matched character
                            // in second string
                            while ($hash_s2[$point] == 0)
                                $point++;
                  
                            if ($s1[$i] != $s2[$point++])
                                $t++;
                        }
                  
                    $t = $t/2;
                  
                    // Return the Jaro Similarity           
                        $hasil= (($match) / ($len1)
                            + ($match) / ($len2)
                            + ($match - $t) / ($match))
                           / 3;
                    }
                    //print_r($hasil);

                    $jaro_dist = $hasil;
                  
                    // If the jaro Similarity is above a threshold
                    if ($jaro_dist > 0.7) {
                  
                        // Find the length of common prefix
                        $prefix = 0;
                  
                        for ($i = 0;
                             $i < min($len1, $len2); $i++) {
                            // If the characters match
                            if ($s1[$i] == $s2[$i])
                                $prefix++;
                            // Else break
                            else
                               break ;
                        }
                  
                        // Maximum of 4 characters are allowed in prefix
                        $prefix = min(4, $prefix);
                  
                        // Calculate jaro winkler Similarity
                        $jaro_dist += 0.1 * $prefix * (1 - $jaro_dist);
                    }

                    $threshold = 0.984;

                    if ($jaro_dist>=$threshold) {
                        $data = array(
                            'extract_id_1'      => $extract_id_1,
                            'extract_id_2'      => $extract_id_2,
                            'sem_value_jaro'    => $hasil,
                            'sem_value_jaro_wk' => $jaro_dist,
                            'post_date'         => date('Y-m-d H:i:s')
                            );

                    
                        $this->db->insert('test_sem_object', $data);
                        }
                } 
            }
        }
        print_r("berhasil");
    }

    public function test_object_relation()
    {
        
        $this->db->from('test_object_relation');
        $this->db->truncate();

        $this->db->select('*');
        $this->db->from('test_pre_object');
        $this->db->where('object_parent_id = ','0',TRUE);
        
        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            
            $object_id = $row->object_id;
            $object_desc = $row->object_desc;

            $predikat="rgoal";
            $keterangan="rgoal(gchild,gparent)";
            $term1 = $object_desc;
            $term2 = "0";
            $kodeterm1="g".$object_id;
            $kodeterm2="0";

            $data = array(
                'predicate'     => $predikat,
                'term1'         => $term1,
                'term2'         => $term2,
                'kode_term1'    => $kodeterm1,
                'kode_term2'    => $kodeterm2,
                'keterangan'    => $keterangan,
                'post_date'     => date('Y-m-d H:i:s')
                );

            $this->db->insert('test_object_relation', $data);
        }

        $this->db->select('*');
        $this->db->from('test_pre_object');
        $this->db->where('object_parent_id != ','0',TRUE);
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $extract_id = $row->extract_id;
        $object_id = $row->object_id;
        $object_type = $row->object_type;
        $object_desc = $row->object_desc;
        $object_parent_id = $row->object_parent_id;
        $object_parent_type = $row->object_parent_type;


        switch ($object_type) {
            case ('G') :
                $predikat="rgoal";
                $keterangan="rgoal(gchild,gparent)";
                $term1 = $object_desc;
                $kodeterm1="g".$object_id;
                $kodeterm2="g".$object_parent_id;

                $this->db->select('*');
                $this->db->from('goal');
                $this->db->where('goal_id =', $object_parent_id);
        
                $query = $this->db->get();
                foreach ($query->result() as $row)
                {
                $term2 = $row->goal_desc_pre;
                }

                break;
            case ('T') :
                switch ($object_parent_type) {
                    case ('G') :
                        $predikat="rtaskgoal";
                        $keterangan="rtaskgoal(task,goal)";
                        $term1 = $object_desc;
                        $kodeterm1="t".$object_id;
                        $kodeterm2="g".$object_parent_id;

                        $this->db->select('goal_desc_pre');
                        $this->db->from('goal');
                        $this->db->where('goal_id',$object_parent_id);
                
                        $query = $this->db->get();
                        foreach ($query->result() as $row)
                        {
                        $term2 = $row->goal_desc_pre; }

                        break;
                    case ('T') :
                        $predikat="rtask";
                        $keterangan="rtask(tchild,tparent)";
                        $term1 = $object_desc;
                        $kodeterm1="t".$object_id;
                        $kodeterm2="t".$object_parent_id;

                        $this->db->select('activities_desc_pre');
                        $this->db->from('activities');
                        $this->db->where('activities_id',$object_parent_id);
                
                        $query = $this->db->get();
                        foreach ($query->result() as $row)
                        {
                        $term2 = $row->activities_desc_pre; }

                        break;
                }
                break;
            case ('O') :
                switch ($object_parent_type) {
                    case ('T') :
                        $predikat="roperationaltask";
                        $keterangan="roperationaltask(operational,task)";
                        $term1 = $object_desc;
                        $kodeterm1="o".$object_id;
                        $kodeterm2="t".$object_parent_id;

                        $this->db->select('activities_desc_pre');
                        $this->db->from('activities');
                        $this->db->where('activities_id',$object_parent_id);
                
                        $query = $this->db->get();
                        foreach ($query->result() as $row)
                        {
                        $term2 = $row->activities_desc_pre; }

                        break;
                    case ('O') :
                        $predikat="roperational";
                        $keterangan="roperational(ochild,oparent)";
                        $term1 = $object_desc;
                        $kodeterm1="o".$object_id;
                        $kodeterm2="o".$object_parent_id;

                        $this->db->select('procedure_desc_pre');
                        $this->db->from('procedure');
                        $this->db->where('procedure_id',$object_parent_id);
                
                        $query = $this->db->get();
                        foreach ($query->result() as $row)
                        {
                        $term2 = $row->procedure_desc_pre; }

                        break;
                }
            break;

            case ('A') :
                switch ($object_parent_type) {
                    case ('T') :
                        $predikat="rtactor";
                        $keterangan="rtactor(actor,task)";
                        $term1 = $object_desc;
                        $kodeterm1="a".$object_id;
                        $kodeterm2="t".$object_parent_id;

                        $this->db->select('activities_desc_pre');
                        $this->db->from('activities');
                        $this->db->where('activities_id',$object_parent_id);
                
                        $query = $this->db->get();
                        foreach ($query->result() as $row)
                        {
                        $term2 = $row->activities_desc_pre; }

                        break;
                    case ('O') :
                        $predikat="roactor";
                        $keterangan="roactor(actor,operational)";
                        $term1 = $object_desc;
                        $kodeterm1="a".$object_id;
                        $kodeterm2="o".$object_id;

                        $this->db->select('procedure_desc_pre');
                        $this->db->from('procedure');
                        $this->db->where('procedure_id',$object_id);
                
                        $query = $this->db->get();
                        if ($query->result() === FALSE)
                        {
                            $this->db->select('procedure_detail_desc_pre');
                            $this->db->from('procedure_detail');
                            $this->db->where('extract_id',$object_id);
                
                            $query = $this->db->get();
                            foreach ($query->result() as $row)
                             {
                                $term2 = $row->procedure_detail_desc_pre; }
                        }else
                        {
                            foreach ($query->result() as $row)
                            {
                                $term2 = $row->procedure_desc_pre; }
                        }
                        
                        break;
                }
            break;

            case ('R') :
                switch ($object_parent_type) {
                    case ('T') :
                        $predikat="rtresources";
                        $keterangan="rtresources(resources,task)";
                        $term1 = $object_desc;
                        $kodeterm1="r".$object_id;
                        $kodeterm2="t".$object_parent_id;

                        $this->db->select('activities_desc_pre');
                        $this->db->from('activities');
                        $this->db->where('activities_id',$object_parent_id);
                
                        $query = $this->db->get();
                        foreach ($query->result() as $row)
                        {
                        $term2 = $row->activities_desc_pre; }

                        break;
                    case ('O') :
                        $predikat="roresources";
                        $keterangan="roresources(resources,operational)";
                        $term1 = $object_desc;
                        $kodeterm1="r".$object_id;
                        $kodeterm2="o".$object_id;

                        $this->db->select('procedure_desc_pre');
                        $this->db->from('procedure');
                        $this->db->where('procedure_id',$object_id);
                
                        $query = $this->db->get();
                        if ($query->result() === FALSE)
                        {
                            $this->db->select('procedure_detail_desc_pre');
                            $this->db->from('procedure_detail');
                            $this->db->where('extract_id',$object_id);
                
                            $query = $this->db->get();
                            foreach ($query->result() as $row)
                             {
                                $term2 = $row->procedure_detail_desc_pre; }
                        }else
                        {
                            foreach ($query->result() as $row)
                            {
                                $term2 = $row->procedure_desc_pre; }
                        }
                        
                        break;
                }
                
            break;
            default : 

            }
            

            $data = array(
                'predicate'     => $predikat,
                'term1'         => $term1,
                'term2'         => $term2,
                'kode_term1'    => $kodeterm1,
                'kode_term2'    => $kodeterm2,
                'keterangan'    => $keterangan,
                'post_date'     => date('Y-m-d H:i:s')
                );

            $this->db->insert('test_object_relation', $data);
        
        }
        print_r("test object relation berhasil");
        
    }

    public function restruktur_object()
    {
        $this->db->from('test2_pre_object');
        $this->db->truncate();
        
        $this->db->select('*');
        $this->db->from('test_pre_object');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
  
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->object_id;
        $object_type= $row->object_type;
        $object_desc=$row->object_desc;
        $object_parent_id = $row->object_parent_id;
        $object_parent_type=$row->object_parent_type;

        $data = array(
                'project_id'        => $project_id,
                'stakeholder_id'    => $stakeholder_id,
                'object_id'         => $object_id,
                'object_type'       => $object_type,
                'object_desc'       => $object_desc,
                'object_parent_id'  => $object_parent_id,
                'object_parent_type'=> $object_parent_type,
                'post_date'         => date('Y-m-d H:i:s')
                );

        $this->db->insert('test2_pre_object', $data);
        
        }

        $threshold = 0.984;

        $this->db->select('*');
        $this->db->from('test_sem_object');
        $this->db->where('sem_value_jaro_wk >=', $threshold);
        $this->db->order_by('extract_id_1');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
            $extract_id_1 = $row->extract_id_1;
            $extract_id_2 = $row->extract_id_2;

            $this->db->select('*');
            $this->db->from('test2_pre_object');
            $this->db->where('extract_id',$extract_id_1);

            $query = $this->db->get();

            foreach ($query->result() as $row)
            {
                $project_id = $row->project_id;
                $stakeholder_id = $row->stakeholder_id;
                $object_id = $row->object_id;
                $object_type= $row->object_type;
                $object_desc=$row->object_desc;
                $object_parent_id = $row->object_parent_id;
                $object_parent_type=$row->object_parent_type;
            }

            $this->db->select('*');
            $this->db->from('test2_pre_object');
            $this->db->where('extract_id',$extract_id_2);

            $query = $this->db->get();

            foreach ($query->result() as $row)
            {
                $object_id_2= $row->object_id;
                $object_type_2= $row->object_type;

                $data = array(
                        'object_id'  => $object_id,
                        'object_type'=> $object_type,
                        'post_date'         => date('Y-m-d H:i:s')
                        );

               $this->db->where('extract_id', $extract_id_2);
               $this->db->update('test2_pre_object',$data);
            }
            
            echo $object_id."<br />";
            echo $object_id_2."<br />";
            echo $object_type."<br />";
            echo $object_type_2."<br />";

            switch($object_type) {
                case('G') :
                    echo "lewat sini G"."<br />";
                    if ($object_type_2 == "G") {
                        echo "lewat sini 0"."<br />";
                        if ($object_id > $object_id_2)
                            { $merge_id=$object_id_2;
                            $merge_type = $object_type_2;
                            $object_parent_id = $object_id;
                            $object_parent_type = $object_type; 
                            echo "lewat sini 1"."<br />";}
                        else
                            { $merge_id=$object_id;
                            $merge_type = $object_type;
                            $object_parent_id = $object_id_2;
                            $object_parent_type = $object_type_2;
                            echo "lewat sini 2"."<br />";}
                    }
                    else
                        { $merge_id=$object_id_2;
                        $merge_type = $object_type_2;
                        $object_parent_id = $object_id;
                        $object_parent_type = $object_type;
                        echo "lewat sini 3"."<br />";}
                    break;
                case('T') :
                    echo "lewat sini T"."<br />";
                    switch($object_type_2) {
                        case('G'):
                            $merge_id=$object_id;
                            $merge_type = $object_type;
                            $object_parent_id = $object_id_2;
                            $object_parent_type = $object_type_2;
                            echo "lewat sini TG"."<br />";
                            break;
                        case('T') :
                            if ($object_id > $object_id_2)
                                { $merge_id=$object_id_2;
                                $merge_type = $object_type_2;
                                $object_parent_id = $object_id;
                                $object_parent_type = $object_type;}
                            else
                                { $merge_id=$object_id;
                                $merge_type = $object_type;
                                $object_parent_id = $object_id_2;
                                $object_parent_type = $object_type_2;}
                        
                             echo "lewat sini TT"."<br />";
                             break;
                        case('O') :
                            $merge_id=$object_id_2;
                            $merge_type = $object_type_2;
                            $object_parent_id = $object_id;
                            $object_parent_type = $object_type;
                            echo "lewat sini TO"."<br />";
                            break;
                        
                    }
                    break;
                case('O') :
                echo "lewat sini O"."<br />";
                    switch($object_type_2) {
                        case('G'):
                            $merge_id=$object_id;
                            $merge_type = $object_type;
                            $object_parent_id = $object_id_2;
                            $object_parent_type = $object_type_2;
                            echo "lewat sini OG"."<br />";
                            break;
                        case('T'):
                            $merge_id=$object_id;
                            $merge_type = $object_type;
                            $object_parent_id = $object_id_2;
                            $object_parent_type = $object_type_2;
                            echo "lewat sini OT"."<br />";break;
                            
                            break;
                        case('O') :
                            if ($object_id > $object_id_2)
                                { $merge_id=$object_id_2;
                                $merge_type = $object_type_2;
                                $object_parent_id = $object_id;
                                $object_parent_type = $object_type;}
                            else
                                { $merge_id=$object_id;
                                $merge_type = $object_type;
                                $object_parent_id = $object_id_2;
                                $object_parent_type = $object_type_2;}
                            echo "lewat sini OO"."<br />";break;
                        
                             break;
                        
                    }
                    break;
                    
            }

            echo "merge id".$merge_id."<br />";
            echo "merge type".$merge_type."<br />";

            $this->db->select('*');
            $this->db->from('test2_pre_object');
            $this->db->where('object_parent_id', $merge_id );
            $this->db->where('object_parent_type', $merge_type );

            $query = $this->db->get();

            foreach ($query->result() as $row)
            {
                $extract_id = $row->extract_id;

                $data = array(
                        'object_parent_id'  => $object_parent_id,
                        'object_parent_type'=> $object_parent_type,
                        'post_date'         => date('Y-m-d H:i:s')
                        );

               $this->db->where('extract_id', $extract_id);
               $this->db->update('test2_pre_object',$data);
            }

            $data = array(
                        'object_id' => $merge_id,
                        'object_type'   => $merge_type,
                        );

            //$this->db->where('object_id', $merge_id);
            //$this->db->where('object_type', $merge_type);
            //$this->db->delete('test2_pre_object',$data);

        }
        print_r("berhasil restrukturisasi");
    }
    
    
    public function jaro()
    {
        $s1 = array("C","R","A","T","E");
        $s2 = array("T","R","A","C","E");

        // If the strings are equal
        if ($s1 == $s2)
            $hasil = 1;
      
        // pendefinisian variabel
        $len1 = 5;
        $len2 = 5;
        $max_dist = floor(max($len1,$len2)/2)-1;
        $match = 0;
        $hash_s1= array(0,0,0,0,0);
        $hash_s2= array(0,0,0,0,0);

        if ($len1 == 0 || $len2 == 0)
            $hasil=0;

        for ($i = 0; $i < $len1; $i++) {
      
            // Check if there is any matches
            for ($j = max(0, $i - $max_dist);
                 $j < min($len2, $i + $max_dist + 1); $j++){
      
                // If there is a match
                if ($s1[$i] == $s2[$j] && $hash_s2[$j] == 0) {
                    $hash_s1[$i] = 1;
                    $hash_s2[$j] = 1;
                    $match++;
                    break;
                }
            }
        }
        
      
        // If there is no match
        if ($match == 0)
            $hasil=0;
      
        // Number of transpositions
        $t = 0;
      
        $point = 0;
      
        // Count number of occurances
        // where two characters match but
        // there is a third matched character
        // in between the indices
        for ($i = 0; $i < $len1; $i++) 
            if ($hash_s1[$i]) {
      
                // Find the next matched character
                // in second string
                while ($hash_s2[$point] == 0)
                    $point++;
      
                if ($s1[$i] != $s2[$point++])
                    $t++;
            }
      
        $t = $t/2;
      
        // Return the Jaro Similarity
        $hasil= (($match) / ($len1)
                + ($match) / ($len2)
                + ($match - $t) / ($match))
               / 3;
        
        print_r($hasil);
    }
      
    public function coba_jaro()
    {
        $s1 = "search algorithms and text analysis";
        $s2 = "algorithm analysis text and search";
        // If the strings are equal
        if ($s1 == $s2)
            $hasil = 1;
      
        // pendefinisian variabel
        $len1 = strlen($s1);
        $len2 = strlen($s2);
        $max_dist = floor(max($len1,$len2)/2)-1;
        $match = 0;
        $hash_s1= array_fill(0,$len1,0);
        $hash_s2= array_fill(0,$len2,0);

        $s1array= str_split($s1);
        print_r($hash_s1);

    }

    public function jaro_wk()
    {
        $kal1 = "algorithms search";                     
        $kal2 = "lagorithm search";   
        //$kal1="hitung pinjaman anggota koperasi";
        //$kal2="hitung pinjaman";
        $s1 = str_split($kal1);
        $s2 = str_split($kal2);

        // If the strings are equal
        if ($s1 == $s2)
            $hasil = 1;
      
        // pendefinisian variabel
        $len1 = strlen($kal1);
        $len2 = strlen($kal2);
        $max_dist = floor(max($len1,$len2)/2)-1;
        $match = 0;
        $hash_s1= array_fill(0,$len1,0);
        $hash_s2= array_fill(0,$len2,0);

        if ($len1 == 0 || $len2 == 0)
            $hasil=0;

        for ($i = 0; $i < $len1; $i++) {
      
            // Check if there is any matches
            for ($j = max(0, $i - $max_dist);
                 $j < min($len2, $i + $max_dist + 1); $j++){
      
                // If there is a match
                if ($s1[$i] == $s2[$j] && $hash_s2[$j] == 0) {
                    $hash_s1[$i] = 1;
                    $hash_s2[$j] = 1;
                    $match++;
                    break;
                }
            }
        }
        
      
        // If there is no match
        if ($match == 0)
            $hasil=0;
      
        // Number of transpositions
        $t = 0;
      
        $point = 0;
      
        // Count number of occurances
        // where two characters match but
        // there is a third matched character
        // in between the indices
        for ($i = 0; $i < $len1; $i++) 
            if ($hash_s1[$i]) {
      
                // Find the next matched character
                // in second string
                while ($hash_s2[$point] == 0)
                    $point++;
      
                if ($s1[$i] != $s2[$point++])
                    $t++;
            }
      
        $t = $t/2;
      
        // Return the Jaro Similarity
        $hasil= (($match) / ($len1)
                + ($match) / ($len2)
                + ($match - $t) / ($match))
               / 3;
        
        echo "jaro : ".$hasil."</br>";
        $jaro_dist = $hasil;
      
        // If the jaro Similarity is above a threshold
        if ($jaro_dist > 0.7) {
      
            // Find the length of common prefix
            $prefix = 0;
      
            for ($i = 0;
                 $i < min($len1, $len2); $i++) {
                // If the characters match
                if ($s1[$i] == $s2[$i])
                    $prefix++;
                
      
                // Else break
                else
                   break ;
            }
      
            // Maximum of 4 characters are allowed in prefix
            $prefix = min(4, $prefix);
      
            // Calculate jaro winkler Similarity
            $jaro_dist += 0.1 * $prefix * (1 - $jaro_dist);
        }
      
        echo "jaro WK : ".$jaro_dist."</br>";
      
    }
      

    public function coba_array()
        {
            $array = array('A','B','C','A');
        
        print_r(distinct($array)); // returns "red"
         // returns "foobar"
            }
    
    public function cosinesimilarity()
    {
        $kal_1 = "search algorithms";
        $kal_2 = "search algorithm";

        $a = $b = $c = 0;

        //1. gabung kedua kalimat
        $gab_kal = $kal_1." ".$kal_2;
        //2. buat array untuk menampung term/kata dari gab_kal
        $urut=1;
        $data=0; // $data untuk mendeteksi banyaknya row pada array
        $tf_1=$tf_2=$df=$idf=$tf_idf_1=$tf_idf_2=$skalar_2=$vector_1=$vector_2=0;
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($gab_kal);

        foreach ($output as $row)
        {
            $ada=0;
            $term = $row;
            if ($urut==1)
            {
                $arraycos_sin = array(array($term,$tf_1,$tf_2,$df,$idf,$tf_idf_1,$tf_idf_2,$skalar_2,
                                $vector_1,$vector_2));
                $data=$data+1; 
                $urut=2;
            }
            else 
            {
                //periksa apakah term sudah ada pada array
                for ($row = 0; $row < $data; $row++)
                {
                    $termcheck=$arraycos_sin[$row][0];
                    if ($term == $termcheck) // berarti data sudah ada
                        $ada = 1;
                }
                if ($ada==0)
                {
                    array_push($arraycos_sin,array($term,$tf_1,$tf_2,$df,$idf,$tf_idf_1,$tf_idf_2,$skalar_2,
                                $vector_1,$vector_2));
                    $data=$data+1; 
                }
            }
        }
        // 3. menghitung tf
        // nilai tf $kal_1
        
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($kal_1);

        foreach ($output as $row)
        {
            $term_kal_1 = $row;
            // hitung tf
            for ($row = 0; $row < $data; $row++)
            {
                $termcheck=$arraycos_sin[$row][0];
                $tf_1=$arraycos_sin[$row][1];
                if ($term_kal_1 == $termcheck)
                {
                    $tf_1=$tf_1+1;
                    $arraycos_sin[$row][1]=$tf_1;
                }
            }
        }
        // nilai tf $kal_2
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($kal_2);

        foreach ($output as $row)
        {
            $term_kal_2 = $row;
            // hitung tf
            for ($row = 0; $row < $data; $row++)
            {
                $termcheck=$arraycos_sin[$row][0];
                $tf_2=$arraycos_sin[$row][2];
                if ($term_kal_2 == $termcheck)
                {
                    $tf_2=$tf_2+1;
                    $arraycos_sin[$row][2]=$tf_2;
                }
            }
        }
        // 4. menghitung df dan idf- degree of frekuensi dan inverse df
        // menghitung tfidf = tf*idf
        // menghitung saklar = tfidf_1*tf_idf_2
        // menghitung vector = tfidf-i ^2
        for ($row = 0; $row < $data; $row++)
        {
            $df=0;
            if ($arraycos_sin[$row][1]>0)
                $df=$df+1;
            else 
                $df=$df;
            
            if ($arraycos_sin[$row][2]>0)
                $df=$df+1;
            else 
                $df=$df;
            
            // idf = log(n/df)+1 -- n = banyak dokumen
            $idf = log(2/$df,10)+1;
            $tfidf_1=$arraycos_sin[$row][1]*$idf;
            $tfidf_2=$arraycos_sin[$row][2]*$idf;
            $saklar_2=$tfidf_1*$tfidf_2;
            $vector1=pow($tfidf_1,2);
            $vector2=pow($tfidf_2,2);

            $arraycos_sin[$row][3]=$df;
            $arraycos_sin[$row][4]=$idf;
            $arraycos_sin[$row][5]=$tfidf_1;
            $arraycos_sin[$row][6]=$tfidf_2;
            $arraycos_sin[$row][7]=$saklar_2;
            $arraycos_sin[$row][8]=$vector1;
            $arraycos_sin[$row][9]=$vector2;
        }
        // 5. menjumlah saklar, vector, dan akar vektor
        $sum_saklar=$sum_v1=$sum_v2=0;
        for ($row = 0; $row < $data; $row++)
        {
            $sum_saklar=$sum_saklar+$arraycos_sin[$row][7];
            $sum_v1=$sum_v1+$arraycos_sin[$row][8];
            $sum_v2=$sum_v2+$arraycos_sin[$row][9];
        }
        
        $sim_kal_1_kal_2 = $sum_saklar/(sqrt($sum_v1)*sqrt($sum_v2));
        echo "sum saklar = ".$sum_saklar."</br>";
        echo "sum vector 1 = ".$sum_v1."</br>";
        echo "sum vector 2 = ".$sum_v2."</br>";
        echo "similarity = ".$sim_kal_1_kal_2."</br>";
        //cetak data
        for ($row = 0; $row < $data; $row++)
        {
            echo $arraycos_sin[$row][0]." ".$arraycos_sin[$row][1]." ".$arraycos_sin[$row][2]." ".
            $arraycos_sin[$row][3]." ".$arraycos_sin[$row][4]." ".
            $arraycos_sin[$row][5]." ".$arraycos_sin[$row][6]." ".
            $arraycos_sin[$row][7]." ".$arraycos_sin[$row][8]." ".
            $arraycos_sin[$row][9]."</br>";
        }
	

    
        
    }
    
    function hammingdist()
    {
        $str1 = "book";                     
        $str2 = "book";   

        //$str1="akupp";
        //$str2="auppp";
        /*
        $i = 0; $count = 0;
        while (isset($str1[$i]) != '')
        {
            if ($str1[$i] != $str2[$i])
                $count++;
            $i++;
        }*/
        // cara menghitung similaritas levensthein
        // 1-dissimiler
        // % dissimiler = dissim/maks
        // maks = maks(len kal1,len kal 2)+selisih (jlh term kal1,jlh term kal2)

        $len1=strlen($str1)-(str_word_count($str1)-1);
        $len2=strlen($str2)-(str_word_count($str2)-1);

        $maks_dis=max($len1,$len2)+1;
        
        //$avlen=($len1+$len2)/2;
        //$hammingsim=1-($count/$avlen);
        //echo $count." ".$avlen." ".$hammingsim."</br>";
        //$sim = similar_text($str1, $str2, $perc);
        //echo "similarity: $sim ($perc %)\n"."</br>";
        $dis_leven = levenshtein($str1, $str2);
        $sim_leven = 1-($dis_leven/$maks_dis);
        //$levensim=$leven/$avlen;
        //echo "leven : ".$leven."  ".$levensim;
        echo "maks dis : "." ".$len1." ".$len2." ".$maks_dis."</br>";
        echo "dis leven : ".$dis_leven."</br>";
        echo "sim leven : ".$sim_leven."</br>";
    }
}

/* End of file Activities.php */
/* Location: ./application/controllers/Activities.php */