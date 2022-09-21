<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sastrawi extends CI_Controller {

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
    
    public function stemmer()
    {
    $stemmerFactory = new \Sastrawi\Stemmer\StemmerFactory();
    $stemmer = $stemmerFactory->createStemmer();
    // stem
    $sentence = 'keanggotaan';
    $output = $stemmer->stem($sentence);
    echo $output;
    echo "<br>";
    //ekonomi indonesia sedang dalam tumbuh yang bangga
    echo $stemmer->stem('Mereka meniru-nirukannya');
    //mereka tiru
    }

    public function stopword(){
        //stopword
        $sentence = 'pegawai, anggota';
        $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $outputstopword = $stopword->remove($sentence);
        echo $outputstopword;
        //Perekonomian Indonesia sedang pertumbuhan membanggakan
        }

    public function tokenization(){
        //tokenization
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        // stem
        $sentence = 'a1-1 mempermudah-menampilkan informasi mengenai koperasi';
        $output   = $tokenizer->tokenize($sentence);

        foreach ($output as $row)
            {echo $row."<br />";
            }
        //var_dump($output);

         }

    public function case_folding_pre()
    {
        $this->db->select('*');
        $this->db->from('coba_pre');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $asal = $row->asal;
        $case_folding = strtolower($asal);
        $id = $row->id;
        $data = array(
                'asal' => $asal,
                'case_folding' => $case_folding,
                );

        $this->db->where('id', $id);
        $this->db->update('coba_pre', $data);

        echo $row->asal."  ";
        echo $row->case_folding."  ";
        echo $row->id."<br />";
        }

        // $this->db->set('case_folding', $casefolding)->get_compiled_insert('coba_pre', FALSE);
    }

    public function stopword_pre()
    {
        $this->db->select('*');
        $this->db->from('coba_pre');
        
        $query = $this->db->get();


        foreach ($query->result() as $row)
        {
        $case_folding = $row->case_folding;
        $id = $row->id;

        $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $outputstopword = $stopword->remove($case_folding);



        $data = array(
                'stopword' => $outputstopword,
                );

        $this->db->where('id', $id);
        $this->db->update('coba_pre', $data);

        }

        // $this->db->set('case_folding', $casefolding)->get_compiled_insert('coba_pre', FALSE);
    }

    public function coba_stopword_token()
    {
        $sentence = "pegawai,anggota";
        $stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
        $stopword = $stopWordRemoverFactory->createStopWordRemover();
        $outputstopword = $stopword->remove($sentence);
        echo "stopword  :".$outputstopword."<br>";

        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        // stem
        $output   = $tokenizer->tokenize($outputstopword);

        foreach ($output as $row)
            {echo $row."<br />";
            }
    }

    public function coba_token()
    {
        $this->db->select('*');
        $this->db->from('requirements_data');
        $this->db->where('predicate','rtask');
        $this->db->or_where('predicate','rtaskgoal');
        $this->db->or_where('predicate','rtask');

        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $predicate=$row->predicate;
            $term1 = $row->term1;
            $kodeterm1=$row->kode_term1;
            $object="";

            echo $kodeterm1."<br />";

            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($term1);

            foreach ($output as $row)
            {echo $row."<br />";
            }
        }

        
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
    $s1 = "CRATE";
    $s2 = "TRACE";
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
    $kal1="hitung pinjaman anggota koperasi";
    $kal2="hitung pinjaman";
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
    
    print_r($hasil);

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
  
    print_r($jaro_dist);
  
}
  


public function coba_array()
    {
        $array = array('A','B','C','A');
    
    print_r(distinct($array)); // returns "red"
     // returns "foobar"
        }



public function menentukan_level()
{
    $level = 0;
    $this->db->select("count('id') as ada");
    $this->db->from('refinement');
    $this->db->where('level = ',-1,TRUE);

    $query1 = $this->db->get();
    
    foreach($query1->result() as $row)
    {
        $nolevel = $row->ada;
    }
    print_r($nolevel);
    while ($nolevel > 1)
            {
                
                $this->db->select('*');
                $this->db->from('refinement');
                $this->db->where('level = ',$level,TRUE);

                $query = $this->db->get();
                
                $level = $level+1;
                foreach($query->result() as $row)
                {
                    $parent_code = $row->parent_code;

                    $this->db->select('*');
                    $this->db->from('requirements_data');
                    $this->db->where('kode_term2 = ',$parent_code,TRUE);

                    $query3 = $this->db->get();

                    foreach($query3->result() as $row)
                    {
                        
                        $kodeterm1 = $row->kode_term1;

                        $this->db->select('*');
                        $this->db->from('refinement');
                        $this->db->where('parent_code = ',$kodeterm1,TRUE);

                        $query4 = $this->db->get();

                        foreach($query4->result() as $row)
                        {
                            $parentcode= $row->parent_code;

                            $data = array('level'  => $level,
                            'post_date'     => date('Y-m-d H:i:s')
                            );
                            $this->db->where('parent_code', $parentcode);
                            $this->db->update('refinement', $data);

                            $nolevel=$nolevel-1;
                        }

                    }

                }
            }
    }


    public function menentukan_anak()
    {
        
        $this->db->select('*');
        $this->db->from('refinement');

        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $childcode="";
            $parentcode=$row->parent_code;
            $this->db->select('*');
            $this->db->from('requirements_data');
            $this->db->where('kode_term2 = ',$parentcode,TRUE);

            $query3 = $this->db->get();
            
            foreach($query3->result() as $row)
            {
               $kodeterm1 = $row->kode_term1;
               $childcode=  $childcode." ".$kodeterm1;
            }

            $data = array('child_code'  => $childcode);
            $this->db->where('parent_code', $parentcode);
            $this->db->update('refinement', $data);

        }
        
        //$this->session->set_flashdata('sukses', 'menentukan child node berhasil');
        //redirect(site_url('gore_analysis'),'refresh');
    }

    public function nilai_random()
    {
        for ($x = 0; $x <=10; $x++)
        {
            $rand = rand(1,100);
            echo "$rand <br>";
        }

    }

    Public function perbaikan_kode()
    {
        $this->db->select('*');
        $this->db->from('procedure_detail');

        $query = $this->db->get();
            
        foreach($query->result() as $row)
        {
            $id = $row->id;
            $procedure_id = $row->procedure_id;
            $procedure_detail_no = $row->procedure_detail_no;
            $procedure_detail_id = $procedure_id."-".$procedure_detail_no;

            $data = array(
                'procedure_detail_id' => $procedure_detail_id,
                'post_date'     => date('Y-m-d H:i:s')
                );

            $this->db->where('id', $id);
            $this->db->update('procedure_detail', $data);
        }
    }

    Public function input_bh()
    {
        $this->db->select('*');
        $this->db->from('agent_behavior');

        $query = $this->db->get();
            
        foreach($query->result() as $row)
        {
            $id=$row->id;

            $data = array(
                'pre_value' => "Y",
                'post_value' => "Y",
                'post_date'     => date('Y-m-d H:i:s')
                );

            $this->db->where('id', $id);
            $this->db->update('agent_behavior', $data);
        }
    }

    public function hitung_fact_value()
    {
        // 3. menghitung nilai konflik -- ketidaksamaan nilai pada node
        // menghitung banyak case
        $this->db->select('id_case');
        $this->db->from('test_case_result');
        $this->db->order_by('id_case',"desc");

        $query = $this->db->get();
        $row = $query->result();
        $numcase = $row[0]->id_case;

        $this->db->select('*');
        $this->db->from('conflict_facts_value');
        $this->db->where('id > ',13657);
        $this->db->order_by('id');

        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            // menghitung conflict value setiap pasangan fact
            $id = $row->id;
            $fact_code1=$row->fact_code1;
            $fact_code2=$row->fact_code2;
            $case=0;
            $conflict=0;
            // mengambil nilai fact pada setiap case
            for($case=0;$case < $numcase+1;++$case) 
            {
                $data=1;
                $where2="((fact_code = '$fact_code1') OR (fact_code = '$fact_code2'))";
                
                $this->db->select('*');
                $this->db->from('test_case_result');
                $this->db->where('id_case',$case);
                $this->db->where($where2);
                $this->db->order_by('id_case');
                $query = $this->db->get();
                foreach($query->result() as $row)
                {
                    $fact_code=$row->fact_code;
                    $fact_value=$row->fact_value;
                    
                    if($data==1)
                        $fact_value1=$fact_value;
                    elseif($fact_value1 <> $fact_value)
                        $conflict=$conflict+1;
                        
                    //echo "conflict".$conflict."</br>";

                    //echo "fact_code".$fact_code."fact_value".$fact_value."</br>";
                    
                    $data=$data+1;
                }

            }
            //menyimpan data conflict_value
            $conflict_value=$conflict/$numcase;
            //echo "conflict value".$conflict_value."conflict".$conflict."numcase".$numcase."</br>";
            $data = array(
                'conflict_value'=> $conflict_value,
                'post_date' => date('Y-m-d H:i:s')
                );

            $this->db->where('id', $id);
            $this->db->update('conflict_facts_value', $data);

            echo "id ".$id."value".$conflict_value."</br>";

        }
    

    }

    public function con_weight_count()
    {
        
        echo "mulai"."</br>";
        echo "mulai"."</br>";echo "mulai"."</br>";
        $this->db->from('conflict_resolution');
        $this->db->truncate();

        $this->db->select('*');
        $this->db->from('conflict_facts_value');
        $this->db->order_by('conflict_value','desc');
        $this->db->where('conflict_value >=',0.5);
        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            $fact_code1 = $row->fact_code1;
            $fact_code2 = $row->fact_code2;
            $conflict_value = $row->conflict_value;

            $this->db->select('fact_code');
            $this->db->from('conflict_resolution');
            $this->db->where('fact_code =',$fact_code1);
            
            $query = $this->db->get();
            if (empty($query->result()))
            {
                $data = array(
                    'fact_code'=>$fact_code1,
                    'post_date' => date('Y-m-d H:i:s')
                    );
                $this->db->insert('conflict_resolution', $data);
            }

            $this->db->select('fact_code');
            $this->db->from('conflict_resolution');
            $this->db->where('fact_code =',$fact_code2);

            $query = $this->db->get();
            if (empty($query->result()))
            {
                $data = array(
                    'fact_code'=>$fact_code2,
                    'post_date' => date('Y-m-d H:i:s')
                    );
                $this->db->insert('conflict_resolution', $data);

                //echo "fact code 2: ".$fact_code2."</br>";
            }

        }

        // menghitung nilai w1,w2, dan w3
        
        $this->db->select('fact_code');
        $this->db->from('conflict_resolution');
        $this->db->order_by('id');

        $query2 = $this->db->get();
        foreach($query2->result() as $row)
        {
            // menghitung nilai w1 --> jumlah konflik pada node tsb
            $w1 = 0;
            $fact_code = $row->fact_code;
            //echo "fact code : ".$fact_code."</br>";
            $this->db->select("count('id') as jumlah");
            $this->db->from('conflict_facts_value');
            $this->db->where('fact_code1',$fact_code);
            $this->db->where('conflict_value >=',0.5);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $w1 = $w1+$row->jumlah;
            }

            $this->db->select("count('id') as jumlah");
            $this->db->from('conflict_facts_value');
            $this->db->where('fact_code2',$fact_code);
            $this->db->where('conflict_value >=',0.5);
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $w1 = $w1+$row->jumlah;
            }

            echo "w1 : ".$w1."</br>";

             // menghitung nilai w2 -- banyaknya node parent pada terkait
             $w2=0;
            $child = $fact_code;
            $jenischild=substr($child,0,1);
            if ($jenischild=="g")
                {$fw2= 2; //faktor jenis node yang konflik
                 $fw3=3;}
            elseif ($jenischild=="t")
                {$fw2= 1.5;
                $fw3=3;}
            else
                {$fw2= 1;
                $fw3=1;}

            $loop=1;
            //lakukan perulangan sampai di dapatkan root
            while ($loop == 1)
            {
                $this->db->select('kode_term2');
                $this->db->from('requirements_data');
                $this->db->where('kode_term1=',$child);
                $query = $this->db->get();

                if (empty($query->result()))
                    $loop=0;
                    //echo "fact_code = ".$fact_code."  node".$child."</br>";
                foreach($query->result() as $row)
                {
                    $w2=$w2+1;
                    $child=$row->kode_term2;
                    if ($child == "0")
                        $loop=0;
                }

            }

            echo "w2 : ".$w2."</br>";

            // menghitung w3 -- berapa banyak user yang menyatakan node tersebut
            // dihitung dari data sem_object

            $w3 = 1; // minimal 1 orang

            $this->db->select("count('id') as jumlah");
            $this->db->from('sem_object');
            $this->db->where('object_extract_id_1',$fact_code);
           
            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $w3 = $w3+$row->jumlah;
            }

            $this->db->select("count('id') as jumlah");
            $this->db->from('sem_object');
            $this->db->where('object_extract_id_2',$fact_code);

            $query = $this->db->get();
            foreach($query->result() as $row)
            {
                $w3= $w3+$row->jumlah;
            }
            echo "w3 : ".$w3."</br>";
            $data = array(
                'w1'=>$w1,
                'w2'=>($w2-1)*$fw2,
                'w3'=>$w3*$fw3,
                'post_date' => date('Y-m-d H:i:s')
                );
            $this->db->where('fact_code', $fact_code);
            $this->db->update('conflict_resolution', $data);

                
        }
        
    }
}
/* End of file Activities.php */
/* Location: ./application/controllers/Activities.php */