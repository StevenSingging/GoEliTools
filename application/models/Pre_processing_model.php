<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pre_processing_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function verifikasi_objek()
    {
        // deteksi apakah semua goal punya aktifitas
        $this->db->select('*');
        $this->db->from('goal');
        $this->db->order_by('goal_id');

        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            $goal_id=$row->goal_id;
            $goal_desc = $row->goal_desc;
            $id_user = $row->id_user;
            $project_id = $row->project_id;
            $stakeholder_id = $row->stakeholder_id;
            $parent_activities_id = 0;

            $this->db->select('*');
            $this->db->from('goal');
            $this->db->where('parent_goal_id =',$goal_id);

            $query = $this->db->get();

            if(empty($query->result()))
            {
                $this->db->select('*');
                $this->db->from('activities');
                $this->db->where('goal_id =',$goal_id);

                $query1 = $this->db->get();

                if(empty($query1->result()))
                {
                    $data = array(
                        'id_user'       => $id_user,
                        'project_id'    => $project_id,
                        'stakeholder_id' => $stakeholder_id,
                        'activities_desc' => $goal_desc,
                        'parent_activities_id'=>$parent_activities_id,
                        'goal_id'       =>$goal_id,
                        'post_date'     => date('Y-m-d H:i:s')
                        );
    
                    $this->db->insert('activities', $data);
                }


            }

        }

        //deteksi apakah semua aktifitas punya operasional
        $this->db->select('*');
        $this->db->from('activities');
        $this->db->order_by('activities_id');

        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            $activities_id=$row->activities_id;
            $activities_desc = $row->activities_desc;
            $id_user = $row->id_user;
            $project_id = $row->project_id;
            $stakeholder_id = $row->stakeholder_id;

            $this->db->select('*');
            $this->db->from('activities');
            $this->db->where('parent_activities_id =',$activities_id);

            $query = $this->db->get();

            if(empty($query->result()))
            {
                $this->db->select('*');
                $this->db->from('procedure');
                $this->db->where('activities_id =',$activities_id);

                $query1 = $this->db->get();

                if(empty($query1->result()))
                {
                    $data = array(
                        'id_user'       => $id_user,
                        'project_id'    => $project_id,
                        'stakeholder_id' => $stakeholder_id,
                        'procedure_desc' => $activities_desc,
                        'activities_id' =>$activities_id,
                        'post_date'     => date('Y-m-d H:i:s')
                        );
    
                    $this->db->insert('procedure', $data);
                }


            }

        }

        //deteksi apakah semua operasional punya operasional detail
        $this->db->select('*');
        $this->db->from('procedure');
        $this->db->order_by('procedure_id');

        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            $procedure_id=$row->procedure_id;
            $procedure_desc = $row->procedure_desc;
            $id_user = $row->id_user;
            $procedure_detail_no="1";
            $procedure_detail_id=$procedure_id."-".$procedure_detail_no;

            $this->db->select('*');
            $this->db->from('procedure_detail');
            $this->db->where('procedure_id =',$procedure_id);

            $query1 = $this->db->get();

            if(empty($query1->result()))
            {
                $data = array(
                    'procedure_detail_id' =>$procedure_detail_id,
                    'id_user'       => $id_user,
                    'procedure_id'    => $procedure_id,
                    'procedure_detail_no' => $procedure_detail_no,
                    'procedure_detail_desc' => $procedure_desc,
                    'pre_condition' =>$procedure_desc,
                    'post_condition' =>$procedure_desc,
                    'post_date'     => date('Y-m-d H:i:s')
                    );

                $this->db->insert('procedure_detail', $data);
            }
        }
        $this->session->set_flashdata('sukses', 'verifikasi object berhasil');
        redirect(site_url('pre_processing'),'refresh');
    }

    public function goal_pre()
	{
		$this->db->select('*');
        $this->db->from('goal');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $goal_desc = $row->goal_desc;
        $case_folding = strtolower($goal_desc);
        $goal_id = $row->goal_id;
        
		$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $outputstopword = $stopword->remove($case_folding);



        $data = array(
                'goal_desc_pre' => $outputstopword,
                );

        $this->db->where('goal_id', $goal_id);
        $this->db->update('goal', $data);

		
   		 }
   	}
		
	public function activities_pre()
	{
		$this->db->select('*');
        $this->db->from('activities');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $activities_desc = $row->activities_desc;
        $case_folding = strtolower($activities_desc);
        $activities_id = $row->activities_id;
        
		$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $outputstopword = $stopword->remove($case_folding);



        $data = array(
                'activities_desc_pre' => $outputstopword,
                );

        $this->db->where('activities_id', $activities_id);
        $this->db->update('activities', $data);

   		 }
	}

	public function procedure_pre()
	{
		$this->db->select('*');
        $this->db->from('procedure');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $procedure_desc = $row->procedure_desc;
        $case_folding = strtolower($procedure_desc);
        $procedure_id = $row->procedure_id;
        
		$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $outputstopword = $stopword->remove($case_folding);



        $data = array(
                'procedure_desc_pre' => $outputstopword,
                );

        $this->db->where('procedure_id', $procedure_id);
        $this->db->update('procedure', $data);

   		 }
	}

	public function procedure_detail_pre()
	{
		$this->db->select('*');
        $this->db->from('procedure_detail');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $procedure_detail_desc = $row->procedure_detail_desc;
        $pre_condition = $row->pre_condition;
        $post_condition=$row->post_condition;
        $case_folding1= strtolower($procedure_detail_desc);
        $case_folding2= strtolower($pre_condition);
        $case_folding3= strtolower($post_condition);
        $procedure_detail_id = $row->procedure_detail_id;
        
		$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $outputstopword1 = $stopword->remove($case_folding1);
        $outputstopword2 = $stopword->remove($case_folding2);
        $outputstopword3 = $stopword->remove($case_folding3);



        $data = array(
                'procedure_detail_desc_pre' => $outputstopword1,
                'pre_condition_pre' => $outputstopword2,
                'post_condition_pre' => $outputstopword3,
                );

        $this->db->where('procedure_detail_id', $procedure_detail_id);
        $this->db->update('procedure_detail', $data);

		
   		 }
   		 $this->session->set_flashdata('sukses', 'Pre-Processing Data berhasil');
			redirect(site_url('pre_processing'),'refresh');
	}

    public function goal_object()
    {
        $this->db->from('object');
        $this->db->truncate();

        $this->db->from('pre_object');
        $this->db->truncate();

        $this->db->select('*');
        $this->db->from('goal');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->goal_id;
        $object_type= "G";
        $object_desc=$row->goal_desc_pre;
        $object_parent_id = $row->parent_goal_id;
        $object_parent_type="G";
        


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

        $this->db->insert('object', $data);
        $this->db->insert('pre_object', $data);

         }
    }

     public function activities_object()
    {
        $this->db->select('*');
        $this->db->from('activities');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->activities_id;
        $object_type= "T";
        $object_desc=$row->activities_desc_pre;
        $object_parent_id = $row->parent_activities_id;
        if ($object_parent_id > 0) {
            $object_parent_type="T";
        }
        else {
         $object_parent_id = $row->goal_id;
         $object_parent_type="G";   
        }

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

        $this->db->insert('object', $data);
        $this->db->insert('pre_object', $data);

         }
    }

    
    public function procedure_object()
    {
        $this->db->select('*');
        $this->db->from('procedure');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->procedure_id;
        $object_type= "O";
        $object_desc=$row->procedure_desc_pre;
        $object_parent_id = $row->activities_id;
        $object_parent_type="T";   
        


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

        $this->db->insert('object', $data);
        $this->db->insert('pre_object', $data);

         }
    }

    public function procedure_detail_object()
    {
        $this->db->select('procedure_detail.*,
                            procedure.project_id,
                            procedure.stakeholder_id');
        $this->db->from('procedure_detail');
        $this->db->join('procedure', 'procedure.procedure_id = procedure_detail.procedure_id', 'left');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->procedure_detail_id;
        $object_type= "O";
        $object_desc=$row->procedure_detail_desc_pre;
        $object_parent_id = $row->procedure_id;
        $object_parent_type="O";   
 
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

        $this->db->insert('object', $data);

         }
    }


    public function actor_object()
    {

        $this->db->select('activities_resources.*,
                            activities.project_id,
                            activities.stakeholder_id');
        $this->db->from('activities_resources');
        $this->db->join('activities', 'activities.activities_id = activities_resources.activities_id', 'left');
         $this->db->where('LENGTH(activities_resources.actor) >',0,TRUE);
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->id;
        $object_type= "A";
        $object_desc=$row->actor;
        $object_parent_id = $row->activities_id;
        $object_parent_type="T";   
        


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

        $this->db->insert('object', $data);

         }
    
        $this->db->select('*');
        $this->db->from('procedure');
        $this->db->where('LENGTH(actor) >',0,TRUE);
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->procedure_id;
        $object_type= "A";
        $object_desc=$row->actor;
        $object_parent_id = $row->procedure_id;
        $object_parent_type="O";   
        
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

        $this->db->insert('object', $data);

         }

        $this->db->select('procedure_detail.*,
                            procedure.project_id,
                            procedure.stakeholder_id');
        $this->db->from('procedure_detail');
        $this->db->join('procedure', 'procedure.procedure_id = procedure_detail.procedure_id', 'left');
        $this->db->where('LENGTH(procedure_detail.actor) >',0,TRUE);
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->procedure_detail_id;
        $object_type= "A";
        $object_desc=$row->actor;
        $object_parent_id = $row->procedure_id;
        $object_parent_type="O";   
        


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

        $this->db->insert('object', $data);

         }
    }

    public function resources_object()
    {
        $this->db->select('activities_resources.*,
                            activities.project_id,
                            activities.stakeholder_id');
        $this->db->from('activities_resources');
        $this->db->join('activities', 'activities.activities_id = activities_resources.activities_id', 'left');
         $this->db->where('LENGTH(activities_resources.resources) >',0,TRUE);
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->id;
        $object_type= "R";
        $object_desc=$row->resources;
        $object_parent_id = $row->activities_id;
        $object_parent_type="T";   
        


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

        $this->db->insert('object', $data);

         }
    
        $this->db->select('*');
        $this->db->from('procedure');
        $this->db->where('LENGTH(resources) >',0,TRUE);
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->procedure_id;
        $object_type= "R";
        $object_desc=$row->resources;
        $object_parent_id = $row->procedure_id;
        $object_parent_type="O";   
        


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

        $this->db->insert('object', $data);

         }

        $this->db->select('procedure_detail.*,
                            procedure.project_id,
                            procedure.stakeholder_id');
        $this->db->from('procedure_detail');
        $this->db->join('procedure', 'procedure.procedure_id = procedure_detail.procedure_id', 'left');
        $this->db->where('LENGTH(procedure_detail.resources) >',0,TRUE);
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $project_id = $row->project_id;
        $stakeholder_id = $row->stakeholder_id;
        $object_id = $row->procedure_detail_id;
        $object_type= "R";
        $object_desc=$row->resources;
        $object_parent_id = $row->procedure_id;
        $object_parent_type="O";   
        


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

        $this->db->insert('object', $data);

         }

    }

    public function sem_object()
    {
        
        //hapus data pada semilarity object
        $this->db->from('sem_object');
        $this->db->truncate();

        $this->db->select('*');
        $this->db->from('pre_object');
        $this->db->order_by('extract_id');
        
        $query = $this->db->get();

        foreach ($query->result() as $row)
        {
            $extract_id_1  = $row->extract_id;
            $object_extract_id_1 = strtolower($row->object_type).$row->object_id;
            $object_desc_1 = $row->object_desc;
            
            //echo $extract_id_1;

            $this->db->select('*');
            $this->db->from('pre_object'); 
            $this->db->order_by('extract_id');
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                $extract_id_2 = $row->extract_id;
                $object_extract_id_2 = strtolower($row->object_type).$row->object_id;
                $object_desc_2 = $row->object_desc;

                //echo $extract_id_2;

                if ($extract_id_2 > $extract_id_1) {

                    //echo "sini";
                    // fungsi jaro

                    $kal1= $object_desc_1;
                    $kal2= $object_desc_2;
                    $s1 = str_split($kal1);
                    $s2 = str_split($kal2);
                    $len1 = strlen($kal1);
                    $len2 = strlen($kal2);

                    // If the strings are equal
                    if ($s1 == $s2)
                        $hasil = 1;
                    else 
                    {                  
                    // pendefinisian variabel
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

                    // menghitung cosine similarity
                    
                    $threshold = 0.9;

                    if ($jaro_dist>=$threshold) {

                        $data = array(
                            'extract_id_1'      => $extract_id_1,
                            'extract_id_2'      => $extract_id_2,
                            'object_extract_id_1' => $object_extract_id_1,
                            'object_extract_id_2' => $object_extract_id_2,
                            'object_desc_1'     => $object_desc_1,
                            'object_desc_2'     => $object_desc_2,
                            'sem_value_jaro'    => $hasil,
                            'sem_value_jaro_wk' => $jaro_dist,
                            'post_date'         => date('Y-m-d H:i:s')
                            );

                        $this->db->insert('sem_object', $data);
                    }
                } 
            }
        }

        
    }

    public function sem_cosine()
    {
        $this->db->select('*');
        $this->db->from('sem_object');
        $this->db->order_by('sem_id');
        
        $query = $this->db->get();

        foreach ($query->result() as $row)
        {
            $id=$row->sem_id;
            $kal_1=$row->object_desc_1;
            $kal_2=$row->object_desc_2;

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

            $data = array(
                'sem_cosine' => $sim_kal_1_kal_2,
                'post_date'         => date('Y-m-d H:i:s')
                );
            
            $this->db->where('sem_id', $id);
            $this->db->update('sem_object', $data);
        
        }
        $this->session->set_flashdata('sukses', 'ekstraksi objek berhasil');
        redirect(site_url('pre_processing'),'refresh');
    }
    
    public function object_relation()
    {
        
        $this->db->from('object_relation');
        $this->db->truncate();

        $this->db->select('*');
        $this->db->from('object');
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

            $this->db->insert('object_relation', $data);
        }

        $this->db->select('*');
        $this->db->from('object');
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

            $this->db->insert('object_relation', $data);
        
        }

        $this->session->set_flashdata('sukses', 'ekstraksi Relasi objek berhasil');
        redirect(site_url('pre_processing'),'refresh');
    }

    public function object_data()
    {
        $this->db->select('*');
        $this->db->from('object');

        $query = $this->db->get();

        return $query->result();
    }

    public function object_relation_data()
    {
        $this->db->select('*');
        $this->db->from('object_relation');
        
        $query = $this->db->get();

        return $query->result();
    }
    
    public function pre_object_relation()
    {
        $this->db->from('pre_object_relation');
        $this->db->truncate();

        $this->db->select('*');
        $this->db->from('object_relation');
        
        $query = $this->db->get();

        foreach ($query->result() as $row)
        {
            $predikat = $row->predicate;
            $case_folding_term1 = strtolower($row->term1);
            $case_folding_term2 = strtolower($row->term2);
            $kodeterm1=$row->kode_term1;
            $kodeterm2=$row->kode_term2;
            $keterangan=$row->keterangan;

            $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
            $stopword = $stopWordRemoverFactory->createStopWordRemover();
            $outputstopword_term1 = $stopword->remove($case_folding_term1);
            $outputstopword_term2 = $stopword->remove($case_folding_term2);

            $data = array(
                'predicate'     => $predikat,
                'term1'         => $outputstopword_term1,
                'term2'         => $outputstopword_term2,
                'kode_term1'    => $kodeterm1,
                'kode_term2'    => $kodeterm2,
                'keterangan'    => $keterangan,
                'post_date'     => date('Y-m-d H:i:s')
                );

            $this->db->insert('pre_object_relation', $data);
        }
        $this->session->set_flashdata('sukses', 'membentuk data pre_object_relation berhasil');
        redirect(site_url('pre_processing'),'refresh');
    }

    public function requirements_data()
    {
        $this->db->from('requirements_data');
        $this->db->truncate();

        // periksa apakah terdapat lebih dari 1 root -- kodeterm2 = 0; lebih dari 1
        $this->db->select("count('id') AS 'jumlah'");
        $this->db->from('object_relation');
        $this->db->where('kode_term2',"0");
        
        $query = $this->db->get();

        foreach ($query->result() as $row)
        {
            $jumlah=$row->jumlah;
        }

        if ($jumlah > 1)
        {
            //simpan root baru yang menyatukan goal tree
            $predikat = "rgoal";
            $term1 = "root";
            $term2 = "";
            $kode_term1="g0";
            $kode_term2="0";
            $keterangan="rgoal(gchild,gparent)";

            $data1 = array(
                'predicate'     => $predikat,
                'term1'         => $term1,
                'term2'         => $term2,
                'kode_term1'    => $kode_term1,
                'kode_term2'    => $kode_term2,
                'keterangan'    => $keterangan,
                'post_date'     => date('Y-m-d H:i:s')
                );
            $this->db->insert('requirements_data', $data1);
            // mengupdate data object_relation; menggabungkan node dengan kode_term2

            $this->db->select("*");
            $this->db->from('object_relation');
            $this->db->where('kode_term2',"0");
            
            $query = $this->db->get();

            foreach ($query->result() as $row)
            {
                $id=$row->id;
                $data = array(
                    'term2'         => $term1,
                    'kode_term2'    => $kode_term1,
                    'post_date'     => date('Y-m-d H:i:s')
                    );

                $this->db->where('id', $id);
                $this->db->update('object_relation', $data);
            }
            // menambahkan root pada data object_relation
        }

        $this->db->select('*');
        $this->db->from('object_relation');
        $this->db->order_by('kode_term2');
        
        $query = $this->db->get();

        foreach ($query->result() as $row)
        {
            $predikat = $row->predicate;
            $term1 = $row->term1;
            $term2 = $row->term2;
            $kodeterm1=$row->kode_term1;
            $kodeterm2=$row->kode_term2;
            $keterangan=$row->keterangan;

            $data = array(
                'predicate'     => $predikat,
                'term1'         => $term1,
                'term2'         => $term2,
                'kode_term1'    => $kodeterm1,
                'kode_term2'    => $kodeterm2,
                'keterangan'    => $keterangan,
                'post_date'     => date('Y-m-d H:i:s')
                );

            $this->db->insert('requirements_data', $data);
        }
        if ($jumlah > 1)
        {
            $this->db->insert('object_relation', $data1);
        }
        $this->session->set_flashdata('sukses', 'membentuk data kebutuhan berhasil');
        redirect(site_url('pre_processing'),'refresh');
    }

}