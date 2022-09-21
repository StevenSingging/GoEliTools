<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Similarity_test extends CI_Controller {

	// load data model
	public function __construct()
	{
		parent::__construct();
        $this->load->model('similarity_test_model');
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
	
    public function sem_object_test()
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

    public function sem_count()
    {
        $kal1="ibu pergi setiap hari pergi pasar";
        $kal2="bapak pergi pasar setiap hari sabtu";
        echo "kal1 : ".$kal1."</br>";
        echo "kal2 : ".$kal2."</br>";
        // hitung total jumlah kata pada kedua kalimat
        $term_count = str_word_count($kal1)+str_word_count($kal2);
        // jaro dan jaro_wk
        // fungsi jaro

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
        echo "jaro sem : ".$hasil."</br>";

        $jaro_dist = $hasil;
      
        // If the jaro Similarity is above a threshold
        if ($jaro_dist > 0) {
      
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

            echo "jaro_wk sem : ".$jaro_dist."</br>";
        }

        // cosine semilarity
        //1. gabung kedua kalimat
        $gab_kal = $kal1." ".$kal2;
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

        $output   = $tokenizer->tokenize($kal1);

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

        $output   = $tokenizer->tokenize($kal2);

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
        echo "cosinesim = ".$sim_kal_1_kal_2."</br>";

        //levensthein similarity
        $len1=strlen($kal1)-(str_word_count($kal1)-1);
        $len2=strlen($kal2)-(str_word_count($kal2)-1);
        $maks_dis=max($len1,$len2)+1;
        $dis_leven = levenshtein($kal1, $kal2);
        $levensim = 1-($dis_leven/$maks_dis);
        
        echo $dis_leven." "."levensim : ".$levensim."</br>";

        //cari term yg df nya = 2 -- yg berarti term terdapat pada kedua kalimat
        //1. gabung kedua kalimat
        $gab_kal = $kal1." ".$kal2;
        //2. buat array untuk menampung term/kata dari gab_kal
        $urut=1;
        $data=0; // $data untuk mendeteksi banyaknya row pada array
        $tf_1=$tf_2=$df=0;
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($gab_kal);

        foreach ($output as $row)
        {
            $ada=0;
            $term = $row;
            if ($urut==1)
            {
                $arraydf = array(array($term,$tf_1,$tf_2,$df));
                $data=$data+1; 
                $urut=2;
            }
            else 
            {
                //periksa apakah term sudah ada pada array
                for ($row = 0; $row < $data; $row++)
                {
                    $termcheck=$arraydf[$row][0];
                    if ($term == $termcheck) // berarti data sudah ada
                        $ada = 1;
                }
                if ($ada==0)
                {
                    array_push($arraydf,array($term,$tf_1,$tf_2,$df));
                    $data=$data+1; 
                }
            }
        }
        // 3. menghitung tf
        // nilai tf $kal_1
        
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($kal1);

        foreach ($output as $row)
        {
            $term_kal_1 = $row;
            // hitung tf
            for ($row = 0; $row < $data; $row++)
            {
                $termcheck=$arraydf[$row][0];
                $tf_1=$arraydf[$row][1];
                if ($term_kal_1 == $termcheck)
                {
                    $tf_1=$tf_1+1;
                    $arraydf[$row][1]=$tf_1;
                }
            }
        }
        // nilai tf $kal_2
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($kal2);

        foreach ($output as $row)
        {
            $term_kal_2 = $row;
            // hitung tf
            for ($row = 0; $row < $data; $row++)
            {
                $termcheck=$arraydf[$row][0];
                $tf_2=$arraydf[$row][2];
                if ($term_kal_2 == $termcheck)
                {
                    $tf_2=$tf_2+1;
                    $arraydf[$row][2]=$tf_2;
                }
            }
        }
        // 4. menghitung df 
        for ($row = 0; $row < $data; $row++)
        {
            $df=0;
            if ($arraydf[$row][1]>0)
                $df=$df+1;
            else 
                $df=$df;
            
            if ($arraydf[$row][2]>0)
                $df=$df+1;
            else 
                $df=$df;
            
            $arraydf[$row][3]=$df;
        }
        /*
        for ($row = 0; $row < $data; $row++)
        {
            echo $arraydf[$row][0]." ".$arraydf[$row][1]." ".$arraydf[$row][2]."</br>";
        }*/
        // 5. membuat daftar term yang akan dikurangi
        $x=$dic_data=$no=0;
        for ($row = 0; $row < $data; $row++)
        {
            if ($arraydf[$row][3]==2)
            {
                // daftar kata kal1 yang dibuang
                if ($arraydf[$row][1]==$arraydf[$row][2]) // jika nilai tf1 = tf2
                {
                    $k=$arraydf[$row][1];
                    for ($x=0;$x<$k;$x++)
                    {
                        $term=$arraydf[$row][0];
                        $s1=$s2=0;
                        if ($no==0)
                        {
                            $dic = array(array($term,$s1,$s2));
                            $dic_data=$dic_data+1; 
                            $no=1;
                        }else
                        {
                            array_push($dic,array($term,$s1,$s2));
                            $dic_data=$dic_data+1; 
                        }
                        
                    }
                }else //jika nilai tf1 <> tf2
                {
                    $k=min($arraydf[$row][1],$arraydf[$row][2]);
                    //echo "nilai K :".$k."</br>";
                    for ($x=0;$x<$k;$x++)
                    {
                        $term=$arraydf[$row][0];
                        $s1=$s2=0;
                        if ($no==0)
                        {
                            $dic = array(array($term,$s1,$s2));
                            $dic_data=$dic_data+1; 
                            $no=1;
                        }else
                        {
                            array_push($dic,array($term,$s1,$s2));
                            $dic_data=$dic_data+1; 
                        }
                        
                    }
                }
            }
        }
        //cetak data dic
        /*for ($row = 0; $row < $dic_data; $row++)
        {
            echo $dic[$row][0]." ".$dic[$row][1]." ".$dic[$row][2]."</br>";
        }*/

        // 6. mengurangi term pada kalimat dengan dic tanpa mengubah urutan
        $new_kal1=$new_kal2="";
        // new kal1
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($kal1);

        foreach ($output as $row)
        {
            $term_kal=$row;
            $dic_ada=0;
            for ($row = 0; $row < $dic_data; $row++)
            {
                if ($term_kal==$dic[$row][0] && $dic[$row][1]==0)
                {
                    $dic_ada = 1; // ada pada kamus
                    $dic[$row][1]=1;
                    $row=$dic_data;
                }
            }
            if ($dic_ada==0) // term tidak ada pada dic
                $new_kal1 = $new_kal1.$term_kal." ";
        }

        // new kal2
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($kal2);

        foreach ($output as $row)
        {
            $term_kal=$row;
            $dic_ada=0;
            for ($row = 0; $row < $dic_data; $row++)
            {
                if ($term_kal==$dic[$row][0] && $dic[$row][2]==0)
                {
                    $dic_ada = 1; // ada pada kamus
                    $dic[$row][2]=1;
                    $row=$dic_data;
                }
            }
            if ($dic_ada==0) // term tidak ada pada dic
                $new_kal2 = $new_kal2.$term_kal." ";
        }

        echo "new kal 1 : ".$new_kal1."</br>";
        echo "new kal 2 : ".$new_kal2."</br>";

        // menghitung similarity new kal1 dan new kal 2
        $kal1=$new_kal1;
        $kal2=$new_kal2;

        // hitung total jumlah term kalimat setelah proses seleksi kata yg sama
        $term_count2 = str_word_count($kal1)+str_word_count($kal2);

        if (strlen($kal1)==0 && strlen($kal2)==0) // kalimat sepenuhnya matching
        {
            $hasil2 = 1;
            $jaro_dist2=1;
            $sim_kal_1_kal_2_2 = 1;
            $levensim2=1;
        }
        elseif (strlen($kal1)==0 || strlen($kal2)==0) // salah satu kalimat kosong
        {
            $hasil2 = 0;
            $jaro_dist2=0;
            $sim_kal_1_kal_2_2 = 0;
            $levensim2=0;
        }
        else
        {
            // jaro dan jaro_wk
            // fungsi jaro

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
                $hasil2=0;
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
                $hasil2= (($match) / ($len1)
                    + ($match) / ($len2)
                    + ($match - $t) / ($match))
                / 3;
            }
            //print_r($hasil);

            $jaro_dist2 = $hasil2;
        
            // If the jaro Similarity is above a threshold
            if ($jaro_dist2 > 0) {
        
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
                $jaro_dist2 += 0.1 * $prefix * (1 - $jaro_dist2);
            }

            // cosine semilarity
            //1. gabung kedua kalimat
            $gab_kal = $kal1." ".$kal2;
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

            $output   = $tokenizer->tokenize($kal1);

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

            $output   = $tokenizer->tokenize($kal2);

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
            
            $sim_kal_1_kal_2_2 = $sum_saklar/(sqrt($sum_v1)*sqrt($sum_v2));
            echo "cosinesim = ".$sim_kal_1_kal_2_2."</br>";

            //levensthein similarity
            $len1=strlen($kal1)-(str_word_count($kal1)-1);
            $len2=strlen($kal2)-(str_word_count($kal2)-1);
            $maks_dis=max($len1,$len2)+1;
            $dis_leven = levenshtein($kal1, $kal2);
            $levensim2 = 1-($dis_leven/$maks_dis);
        }
        echo "jaro sem_2 : ".$hasil2."</br>";
        echo "jaro_wk sem 2 : ".$jaro_dist2."</br>";
        echo "cosinesim = ".$sim_kal_1_kal_2_2."</br>";
        echo "levensim : ".$levensim2."</br>";

        //menggabungkan hasil df dan metode similarity
        // hitung kata dalam kalimat.
        // hitung % jumlah kata sama
        $persen_same_term=($term_count-$term_count2)/$term_count;

        echo "total term : ".$term_count." total term beda : ".$term_count2."</br>";
        $com_sim_jaro = (1*$persen_same_term)+($hasil2*(1-$persen_same_term));
        $com_sim_jaro_wk = (1*$persen_same_term)+($jaro_dist2*(1-$persen_same_term));
        $com_sim_cosine = (1*$persen_same_term)+($sim_kal_1_kal_2_2*(1-$persen_same_term));
        $com_sim_levensim = (1*$persen_same_term)+($levensim2*(1-$persen_same_term));

        $max_sim = max($com_sim_jaro,$com_sim_jaro_wk,$com_sim_cosine,$com_sim_levensim);

        echo "combined jaro sem_2 : ".$com_sim_jaro."</br>";
        echo "combined jaro_wk sem 2 : ".$com_sim_jaro_wk."</br>";
        echo "combined cosinesim = ".$com_sim_cosine."</br>";
        echo "combined levensim : ".$com_sim_levensim."</br>";

        echo "maks similarity : ".$max_sim."</br>";
    }

    public function isi_data()
    {
        $this->db->from('sim_object_test');
        $this->db->truncate();

        $rec=1;
        $this->db->select('*');
        $this->db->from('sem_object');
        $this->db->order_by('sem_id');

        $query = $this->db->get();

        foreach ($query->result() as $row)
        {
            $extract_id_1  = $row->extract_id_1;
            $object_extract_id_1 =$row->object_extract_id_1;
            $object_desc_1 = $row->object_desc_1;
            $extract_id_2  = $row->extract_id_2;
            $object_extract_id_2 =$row->object_extract_id_2;
            $object_desc_2 = $row->object_desc_2;

            $data = array(
                'extract_id_1'      => $extract_id_1,
                'extract_id_2'      => $extract_id_2,
                'object_extract_id_1'  => $object_extract_id_1,
                'object_extract_id_2'  => $object_extract_id_2,
                'object_desc_1'  => $object_desc_1,
                'object_desc_2'  => $object_desc_2,
                'label_sim'=>-1,
                'post_date'         => date('Y-m-d H:i:s')
                );

        
            $this->db->insert('sim_object_test', $data);
            $rec=$rec+1;
            if ($rec==21)
                exit;
        }
    }
    
    public function label_sim_input()
	{
		ini_set('memory_limit', '-1');
        $jumlahdata=$this->similarity_test_model->jumlah_sim();
		$jumlah = $jumlahdata->jumlah;

		if ($jumlah>0)
		{
		$ambildata=$this->similarity_test_model->ambil_data();

		$data = array( 'title' => 'JUMLAH DATA'.$jumlah,
						'ambildata' => $ambildata,
						'content' => 'similarity_test/input_label'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		}else
		{
			$data = array( 'title' => 'LABEL SIMILARITY EXISTS',
						'content' => 'similarity_test/data_ada'
					 );
			$this->load->view('layout/wrapper', $data, FALSE);
		}

	}

	public function lanjut_label($sim_id)
	{
		ini_set('memory_limit', '-1');
        $sim_object=$this->similarity_test_model->sim_object($sim_id);
		
		$valid = $this->form_validation;
		
		$valid->set_rules('label_sim', 'sim_object', 'required',
			array( 'required' => '%s harus dipilih'));


		if($valid->run() === FALSE)
		{

		$data = array( 'title' => 'Input Label Similarity',
						'sim_object' => $sim_object,
						'content' => 'similarity_test/tambah_label'
					 );
		$this->load->view('layout/wrapper', $data, FALSE);
		}else{
		$inp = $this->input;
		$data = array(  'sim_id'    => $sim_id,
                        'label_sim'	=> $inp->post('label_sim'),
						'post_date'	=> date('Y-m-d H:i:s')
						  );
			// Proses oleh model
		$this->similarity_test_model->tambah_label($data);

		$this->session->set_flashdata('sukses', $sim_id.' telah ditambah');
		redirect(site_url('similarity_test/label_sim_input'),'refresh');
		}		
		
	}

    public function hitung_sim()
    {
        
        $this->db->select('*');
        $this->db->from('sim_object_test');
        $this->db->order_by('sim_id');

        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $sim_id=$row->sim_id;
            $kal1=$row->object_desc_1;
            $kal2=$row->object_desc_2;
            
            // hitung total jumlah kata pada kedua kalimat
            $term_count = str_word_count($kal1)+str_word_count($kal2);
            // jaro dan jaro_wk
            // fungsi jaro

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
            //echo "jaro sem : ".$hasil."</br>";

            $jaro_dist = $hasil;
        
            // If the jaro Similarity is above a threshold
            if ($jaro_dist > 0) {
        
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

                //echo "jaro_wk sem : ".$jaro_dist."</br>";
            }

            // cosine semilarity
            //1. gabung kedua kalimat
            $gab_kal = $kal1." ".$kal2;
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

            $output   = $tokenizer->tokenize($kal1);

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

            $output   = $tokenizer->tokenize($kal2);

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
            //echo "cosinesim = ".$sim_kal_1_kal_2."</br>";

            //levensthein similarity
            $len1=strlen($kal1)-(str_word_count($kal1)-1);
            $len2=strlen($kal2)-(str_word_count($kal2)-1);
            $maks_dis=max($len1,$len2)+1;
            $dis_leven = levenshtein($kal1, $kal2);
            $levensim = 1-($dis_leven/$maks_dis);

            //cari term yg df nya = 2 -- yg berarti term terdapat pada kedua kalimat
            //1. gabung kedua kalimat
            $gab_kal = $kal1." ".$kal2;
            //2. buat array untuk menampung term/kata dari gab_kal
            $urut=1;
            $data=0; // $data untuk mendeteksi banyaknya row pada array
            $tf_1=$tf_2=$df=0;
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($gab_kal);

            foreach ($output as $row)
            {
                $ada=0;
                $term = $row;
                if ($urut==1)
                {
                    $arraydf = array(array($term,$tf_1,$tf_2,$df));
                    $data=$data+1; 
                    $urut=2;
                }
                else 
                {
                    //periksa apakah term sudah ada pada array
                    for ($row = 0; $row < $data; $row++)
                    {
                        $termcheck=$arraydf[$row][0];
                        if ($term == $termcheck) // berarti data sudah ada
                            $ada = 1;
                    }
                    if ($ada==0)
                    {
                        array_push($arraydf,array($term,$tf_1,$tf_2,$df));
                        $data=$data+1; 
                    }
                }
            }
            // 3. menghitung tf
            // nilai tf $kal_1
            
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal1);

            foreach ($output as $row)
            {
                $term_kal_1 = $row;
                // hitung tf
                for ($row = 0; $row < $data; $row++)
                {
                    $termcheck=$arraydf[$row][0];
                    $tf_1=$arraydf[$row][1];
                    if ($term_kal_1 == $termcheck)
                    {
                        $tf_1=$tf_1+1;
                        $arraydf[$row][1]=$tf_1;
                    }
                }
            }
            // nilai tf $kal_2
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal2);

            foreach ($output as $row)
            {
                $term_kal_2 = $row;
                // hitung tf
                for ($row = 0; $row < $data; $row++)
                {
                    $termcheck=$arraydf[$row][0];
                    $tf_2=$arraydf[$row][2];
                    if ($term_kal_2 == $termcheck)
                    {
                        $tf_2=$tf_2+1;
                        $arraydf[$row][2]=$tf_2;
                    }
                }
            }
            // 4. menghitung df 
            for ($row = 0; $row < $data; $row++)
            {
                $df=0;
                if ($arraydf[$row][1]>0)
                    $df=$df+1;
                else 
                    $df=$df;
                
                if ($arraydf[$row][2]>0)
                    $df=$df+1;
                else 
                    $df=$df;
                
                $arraydf[$row][3]=$df;
            }
            /*
            for ($row = 0; $row < $data; $row++)
            {
                echo $arraydf[$row][0]." ".$arraydf[$row][1]." ".$arraydf[$row][2]."</br>";
            }*/
            // 5. membuat daftar term yang akan dikurangi
            $x=$dic_data=$no=0;
            for ($row = 0; $row < $data; $row++)
            {
                if ($arraydf[$row][3]==2)
                {
                    // daftar kata kal1 yang dibuang
                    if ($arraydf[$row][1]==$arraydf[$row][2]) // jika nilai tf1 = tf2
                    {
                        $k=$arraydf[$row][1];
                        for ($x=0;$x<$k;$x++)
                        {
                            $term=$arraydf[$row][0];
                            $s1=$s2=0;
                            if ($no==0)
                            {
                                $dic = array(array($term,$s1,$s2));
                                $dic_data=$dic_data+1; 
                                $no=1;
                            }else
                            {
                                array_push($dic,array($term,$s1,$s2));
                                $dic_data=$dic_data+1; 
                            }
                            
                        }
                    }else //jika nilai tf1 <> tf2
                    {
                        $k=min($arraydf[$row][1],$arraydf[$row][2]);
                        //echo "nilai K :".$k."</br>";
                        for ($x=0;$x<$k;$x++)
                        {
                            $term=$arraydf[$row][0];
                            $s1=$s2=0;
                            if ($no==0)
                            {
                                $dic = array(array($term,$s1,$s2));
                                $dic_data=$dic_data+1; 
                                $no=1;
                            }else
                            {
                                array_push($dic,array($term,$s1,$s2));
                                $dic_data=$dic_data+1; 
                            }
                            
                        }
                    }
                }
            }
            //cetak data dic
            /*for ($row = 0; $row < $dic_data; $row++)
            {
                echo $dic[$row][0]." ".$dic[$row][1]." ".$dic[$row][2]."</br>";
            }*/

            // 6. mengurangi term pada kalimat dengan dic tanpa mengubah urutan
            $new_kal1=$new_kal2="";
            // new kal1
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal1);

            foreach ($output as $row)
            {
                $term_kal=$row;
                $dic_ada=0;
                for ($row = 0; $row < $dic_data; $row++)
                {
                    if ($term_kal==$dic[$row][0] && $dic[$row][1]==0)
                    {
                        $dic_ada = 1; // ada pada kamus
                        $dic[$row][1]=1;
                        $row=$dic_data;
                    }
                }
                if ($dic_ada==0) // term tidak ada pada dic
                    $new_kal1 = $new_kal1.$term_kal." ";
            }

            // new kal2
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal2);

            foreach ($output as $row)
            {
                $term_kal=$row;
                $dic_ada=0;
                for ($row = 0; $row < $dic_data; $row++)
                {
                    if ($term_kal==$dic[$row][0] && $dic[$row][2]==0)
                    {
                        $dic_ada = 1; // ada pada kamus
                        $dic[$row][2]=1;
                        $row=$dic_data;
                    }
                }
                if ($dic_ada==0) // term tidak ada pada dic
                    $new_kal2 = $new_kal2.$term_kal." ";
            }

            //echo "new kal 1 : ".$new_kal1."</br>";
            //echo "new kal 2 : ".$new_kal2."</br>";

            // menghitung similarity new kal1 dan new kal 2
            $kal1=$new_kal1;
            $kal2=$new_kal2;

            $term_count2 = str_word_count($kal1)+str_word_count($kal2);

            if (strlen($kal1)==0 && strlen($kal2)==0) // kalimat sepenuhnya matching
            {
                $hasil2 = 1;
                $jaro_dist2=1;
                $sim_kal_1_kal_2_2 = 1;
                $levensim2=1;
            }
            elseif (strlen($kal1)==0 || strlen($kal2)==0) // salah satu kalimat kosong
            {
                $hasil2 = 0;
                $jaro_dist2=0;
                $sim_kal_1_kal_2_2 = 0;
                $levensim2=0;
            }
            else
            {
                // jaro dan jaro_wk
                // fungsi jaro

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
                    $hasil2=0;
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
                    $hasil2= (($match) / ($len1)
                        + ($match) / ($len2)
                        + ($match - $t) / ($match))
                    / 3;
                }
                //print_r($hasil);

                $jaro_dist2 = $hasil2;
            
                // If the jaro Similarity is above a threshold
                if ($jaro_dist2 > 0) {
            
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
                    $jaro_dist2 += 0.1 * $prefix * (1 - $jaro_dist2);
                }

                // cosine semilarity
                //1. gabung kedua kalimat
                $gab_kal = $kal1." ".$kal2;
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

                $output   = $tokenizer->tokenize($kal1);

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

                $output   = $tokenizer->tokenize($kal2);

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
                
                $sim_kal_1_kal_2_2 = $sum_saklar/(sqrt($sum_v1)*sqrt($sum_v2));
                //echo "cosinesim = ".$sim_kal_1_kal_2_2."</br>";

                //levensthein similarity
                $len1=strlen($kal1)-(str_word_count($kal1)-1);
                $len2=strlen($kal2)-(str_word_count($kal2)-1);
                $maks_dis=max($len1,$len2)+1;
                $dis_leven = levenshtein($kal1, $kal2);
                $levensim2 = 1-($dis_leven/$maks_dis);
            }
            //menggabungkan hasil df dan metode similarity
            // hitung kata dalam kalimat.
            // hitung % jumlah kata sama
            $persen_same_term=($term_count-$term_count2)/$term_count;
            $com_sim_jaro = (1*$persen_same_term)+($hasil2*(1-$persen_same_term));
            $com_sim_jaro_wk = (1*$persen_same_term)+($jaro_dist2*(1-$persen_same_term));
            $com_sim_cosine = (1*$persen_same_term)+($sim_kal_1_kal_2_2*(1-$persen_same_term));
            $com_sim_levensim = (1*$persen_same_term)+($levensim2*(1-$persen_same_term));
    
            $max_sim = max($com_sim_jaro,$com_sim_jaro_wk,$com_sim_cosine,$com_sim_levensim);
            

            $data = array(
                'sim_cosine' => $sim_kal_1_kal_2,
                'sim_jaro' => $hasil,
                'sim_jaro_wk' => $jaro_dist,
                'sim_leven'  => $levensim,
                'sim_cosine2' => $sim_kal_1_kal_2_2,
                'sim_jaro2' => $hasil2,
                'sim_jaro_wk2' => $jaro_dist2,
                'sim_leven2'  => $levensim2,
                'com_sim_cosine' => $com_sim_cosine,
                'com_sim_jaro' => $com_sim_jaro,
                'com_sim_jaro_wk' => $com_sim_jaro_wk,
                'com_sim_leven'  => $com_sim_levensim,
                'max_sim'   =>$max_sim,
                'post_date' => date('Y-m-d H:i:s')
                );
            $this->db->where('sim_id', $sim_id);
            $this->db->update('sim_object_test', $data);
        }
    }

    public function hitung_sim_soft()
    {
        
        $this->db->select('*');
        $this->db->from('sim_object_test_uji');
        $this->db->order_by('sim_id');

        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $sim_id=$row->sim_id;
            $kal1=$row->object_desc_1;
            $kal2=$row->object_desc_2;
            $maxsim=$row->max_sim;
            $sim_jaro_wk=$row->sim_jaro_wk;
            //$kal1 = "apple corporation usa";
            //$kal2 = "corp aple";

            // menghitung jaro utk hubungan term pada kalimat
            $urut=1;
            $data_jaro=$jarowk_v=0;
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal1);
            foreach ($output as $row)
            {
                $term1=$row;
                $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
                $tokenizer = $tokenizerFactory->createDefaultTokenizer();

                $output   = $tokenizer->tokenize($kal2);
                foreach ($output as $row2)
                {
                    $term2=$row2;
                    if($urut==1)
                    {
                        $arrayjaro=array(array($term1,$term2,$jarowk_v));
                        $data_jaro+=1;
                        $urut=2;
                    }
                    else
                    {
                        array_push($arrayjaro,array($term1,$term2,$jarowk_v));
                        $data_jaro+=1;
                    }
                }
            }
            // hitung jaro wk utk setiap pasangan term
            
            for ($row = 0; $row < $data_jaro; $row++)
            {
                $kaljr1=$arrayjaro[$row][0];
                $kaljr2=$arrayjaro[$row][1];
            
                $s1 = str_split($kaljr1);
                $s2 = str_split($kaljr2);

                // If the strings are equal
                if ($s1 == $s2)
                    $hasil = 1;
            
                // pendefinisian variabel
                $len1 = strlen($kaljr1);
                $len2 = strlen($kaljr2);
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
                //echo "jaro : ".$hasil."</br>";
                $jaro_dist = $hasil;
            
                // If the jaro Similarity is above a threshold
                if ($jaro_dist > 0) {
            
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
            
                $arrayjaro[$row][2]=$jaro_dist;
            }

            // analisis relasi utk menemukan relasi yang paling kuat (strongest bones)
        $maksjarovalue=$data_jaro2=0; $simpan=$no=$awal=1;
        $threshold = 0.45;
        for ($row = 0; $row < $data_jaro; $row++)
        {
            
            $term1=$arrayjaro[$row][0];
            $term2=$arrayjaro[$row][1];
            $jarovalue=$arrayjaro[$row][2];
            //echo "</br>".$term1." ".$term2." ".$jarovalue." ";
            if ($awal==1)
            {
                $term1high=$term1;
                $term2high=$term2;
                $jarohigh=$jarovalue;
                $awal=0;
            }
            if ($jarovalue > $jarohigh)
            {
                $jarohigh=$jarovalue;
                $term1high=$term1;
                $term2high=$term2;
            }
            $simpan = 1;
            
            if ($term1 <> $term1high || $row == $data_jaro-1) // sudah didapatkan relasi term 1 yang paling tinggi
            {
                // periksa apakah relasi term2 juga merupakan relasi terkuat
                //echo $term1." ".$term1high." ".$term2high." ".$jarohigh." ";
                for ($row2 = 0; $row2 < $data_jaro; $row2++)
                {
                    $term22=$arrayjaro[$row2][1];
                    if ($term22 == $term2high)
                    {
                        $jarovalue2=$arrayjaro[$row2][2];
                        if ($jarovalue2 > $jarohigh)
                            $simpan =0;
                    }
                    
                }

                if ($simpan == 1 && $jarohigh>$threshold) //sesuai dengan threshold
                {
                    if($no==1)
                    {
                        //echo $term1." ".$term1high." ".$term2high." ".$jarohigh." ";
                        $arrayjaro2=array(array($term1high,$term2high,$jarohigh));
                        $data_jaro2+=1;
                        $no=2;
                    }
                    else
                    {
                        //echo $term1." ".$term1high." ".$term2high." ".$jarohigh." ";
                        array_push($arrayjaro2,array($term1high,$term2high,$jarohigh));
                        $data_jaro2+=1;
                    }
                }
                $term1high=$term1;
                $term2high=$term2;
                $jarohigh=$jarovalue;
                //echo "</br>".$term1high." ".$term2high." ".$jarohigh." ";

            }
            
        }
            // menghitung TFIDF
            //1. gabung kedua kalimat
            $gab_kal = $kal1." ".$kal2;
            //2. buat array untuk menampung term/kata dari gab_kal
            $urut=1;
            $data=0; // $data untuk mendeteksi banyaknya row pada array
            $tf_1=$tf_2=$df=$idf=$tf_idf_1=$tf_idf_2=$skalar_2=$vector_1=$vector_2=$nv1=$nv2=0;
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($gab_kal);

            foreach ($output as $row)
            {
                $ada=0;
                $term = $row;
                if ($urut==1)
                {
                    $arraytfidf = array(array($term,$tf_1,$tf_2,$df,$idf,$tf_idf_1,$tf_idf_2,
                                    $vector_1,$vector_2,$nv1,$nv2));
                    $data=$data+1; 
                    $urut=2;
                }
                else 
                {
                    //periksa apakah term sudah ada pada array
                    for ($row = 0; $row < $data; $row++)
                    {
                        $termcheck=$arraytfidf[$row][0];
                        if ($term == $termcheck) // berarti data sudah ada
                            $ada = 1;
                    }
                    if ($ada==0)
                    {
                        array_push($arraytfidf,array($term,$tf_1,$tf_2,$df,$idf,$tf_idf_1,$tf_idf_2,
                                    $vector_1,$vector_2,$nv1,$nv2));
                        $data=$data+1; 
                    }
                }
            }
            // 3. menghitung tf
            // nilai tf $kal_1
            
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal1);

            foreach ($output as $row)
            {
                $term_kal_1 = $row;
                // hitung tf
                for ($row = 0; $row < $data; $row++)
                {
                    $termcheck=$arraytfidf[$row][0];
                    $tf_1=$arraytfidf[$row][1];
                    if ($term_kal_1 == $termcheck)
                    {
                        $tf_1=$tf_1+1;
                        $arraytfidf[$row][1]=$tf_1;
                    }
                }
            }
            // nilai tf $kal_2
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal2);

            foreach ($output as $row)
            {
                $term_kal_2 = $row;
                // hitung tf
                for ($row = 0; $row < $data; $row++)
                {
                    $termcheck=$arraytfidf[$row][0];
                    $tf_2=$arraytfidf[$row][2];
                    if ($term_kal_2 == $termcheck)
                    {
                        $tf_2=$tf_2+1;
                        $arraytfidf[$row][2]=$tf_2;
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
                if ($arraytfidf[$row][1]>0)
                    $df=$df+1;
                else 
                    $df=$df;
                
                if ($arraytfidf[$row][2]>0)
                    $df=$df+1;
                else 
                    $df=$df;
                
                // idf = log(n/df+1)-- n = banyak dokumen
                $idf = log(2/$df+1,10);
                $tfidf_1=$arraytfidf[$row][1]*$idf;
                $tfidf_2=$arraytfidf[$row][2]*$idf;
                //$saklar_2=$tfidf_1*$tfidf_2;
                $vector1=pow($tfidf_1,2);
                $vector2=pow($tfidf_2,2);

                $arraytfidf[$row][3]=$df;
                $arraytfidf[$row][4]=$idf;
                $arraytfidf[$row][5]=$tfidf_1;
                $arraytfidf[$row][6]=$tfidf_2;
                //$arraytfidf[$row][7]=$saklar_2;
                $arraytfidf[$row][7]=$vector1;
                $arraytfidf[$row][8]=$vector2;
            }
            // 5. menjumlah saklar, vector, dan akar vektor
            $sum_saklar=$sum_v1=$sum_v2=0;
            for ($row = 0; $row < $data; $row++)
            {
                //$sum_saklar=$sum_saklar+$arraycos_sin[$row][7];
                $sum_v1=$sum_v1+$arraytfidf[$row][7];
                $sum_v2=$sum_v2+$arraytfidf[$row][8];
            }

            // menghitung vector length
            $vlength1=sqrt($sum_v1);
            $vlength2=sqrt($sum_v2);

            // normalisasi document -- tfidf/vector length
            for ($row = 0; $row < $data; $row++)
            {
                $arraytfidf[$row][9]=$arraytfidf[$row][5]/$vlength1;
                $arraytfidf[$row][10]=$arraytfidf[$row][6]/$vlength2;
            }

            // menghitung similarity dokumen dengan soft tfidf jaro wk
            $simsoft=$sumsimsoft=0;
            for ($row = 0; $row < $data_jaro2; $row++)
            {
                $jarovalue=$arrayjaro2[$row][2];
                $term1=$arrayjaro2[$row][0];
                $term2=$arrayjaro2[$row][1];

                for ($row2 = 0; $row2 < $data; $row2++)
                {
                    $term=$arraytfidf[$row2][0];
                    if ($term==$term1)
                    {
                        $nv1=$arraytfidf[$row2][9];
                        //echo "</br>"."term1 : ".$term." ".$nv1."jaro value : ".$jarovalue;
                    }
                    
                    if($term==$term2)
                    {
                        $nv2=$arraytfidf[$row2][10];
                        //echo "</br>"."term2 : ".$term." ".$nv2;
                    }
                }
                $simsoft=$nv1*$nv2*$jarovalue;
                //echo "</br>"."simsoft : ".$simsoft;
                //echo "</br>"."sumsimsoft : ".$sumsimsoft;
                $sumsimsoft+=$simsoft;
                $simsoft=0;

            
            }

            $max_sim=max($maxsim,$sumsimsoft);
            
            if ($sim_jaro_wk==1)
                $sumsimsoft=1;

            $data = array(
                'sim_soft_tfidf_jaro'  => $sumsimsoft,
                'max_sim'   =>$max_sim,
                'post_date' => date('Y-m-d H:i:s')
                );
            
            $this->db->where('sim_id', $sim_id);
            $this->db->update('sim_object_test_uji', $data);

        }
    }

    public function hitung_akurasi()
    {
        $threshold=0.9;
        $ak_cosine=$ak_cosine2=$ak_max_cosine=0;
        $ak_jaro=$ak_jaro2=$ak_max_jaro=0;
        $ak_jaro_wk=$ak_jaro_wk2=$ak_max_jaro_wk=0;
        $ak_leven=$ak_leven2=$ak_max_leven=0;
        $ak_sim_soft_tfidf_jaro=$ak_max_sim=0;

        //menghitung jumlah data
        $this->db->select("count('sim_id') as jumlah");
        $this->db->from('sim_object_test');
        
        $query = $this->db->get();
        
        foreach($query->result() as $row)
        {
            
            $jlhdata = $row->jumlah;
        }
        

        // menghitung akurasi setiap metode
        $this->db->from('sim_object_test');
        $this->db->order_by('sim_id');

        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $label_sim=$row->label_sim;
            $sim_cosine=$row->sim_cosine;
            $sim_jaro=$row->sim_jaro;
            $sim_jaro_wk=$row->sim_jaro_wk;
            $sim_leven=$row->sim_leven;
            $sim_cosine2=$row->sim_cosine2;
            $sim_jaro2=$row->sim_jaro2;
            $sim_jaro_wk2=$row->sim_jaro_wk2;
            $sim_leven2=$row->sim_leven2;
            $max_cosine=$row->max_cosine;
            $max_jaro=$row->max_jaro;
            $max_jaro_wk=$row->max_jaro_wk;
            $max_leven=$row->max_leven;
            $sim_soft_tfidf_jaro=$row->sim_soft_tfidf_jaro;
            $max_sim=$row->max_sim;

            if ($label_sim==1)
            {
                if ($sim_cosine >=$threshold)
                    $ak_cosine += 1;
                if ($sim_jaro >=$threshold)
                    $ak_jaro += 1;
                if ($sim_jaro_wk >=$threshold)
                    $ak_jaro_wk += 1;
                if ($sim_leven >=$threshold)
                    $ak_leven += 1;
                if ($sim_cosine2 >=$threshold)
                    $ak_cosine2 += 1;
                if ($sim_jaro2 >=$threshold)
                    $ak_jaro2 += 1;
                if ($sim_jaro_wk2 >=$threshold)
                    $ak_jaro_wk2 += 1;
                if ($sim_leven2 >=$threshold)
                    $ak_leven2 += 1;
                if ($max_cosine >=$threshold)
                    $ak_max_cosine += 1;
                if ($max_jaro >=$threshold)
                    $ak_max_jaro += 1;
                if ($max_jaro_wk >=$threshold)
                    $ak_max_jaro_wk += 1;
                if ($max_leven >=$threshold)
                    $ak_max_leven += 1;
                if ($sim_soft_tfidf_jaro >=$threshold)
                    $ak_sim_soft_tfidf_jaro += 1;
                if ($max_sim >=$threshold)
                    $ak_max_sim += 1;
            }elseif ($label_sim==0)
            {
                if ($sim_cosine < $threshold)
                    $ak_cosine += 1;
                if ($sim_jaro < $threshold)
                    $ak_jaro += 1;
                if ($sim_jaro_wk < $threshold)
                    $ak_jaro_wk += 1;
                if ($sim_leven < $threshold)
                    $ak_leven += 1;
                if ($sim_cosine2 < $threshold)
                    $ak_cosine2 += 1;
                if ($sim_jaro2 < $threshold)
                    $ak_jaro2 += 1;
                if ($sim_jaro_wk2 < $threshold)
                    $ak_jaro_wk2 += 1;
                if ($sim_leven2 < $threshold)
                    $ak_leven2 += 1;
                if ($max_cosine < $threshold)
                    $ak_max_cosine += 1;
                if ($max_jaro < $threshold)
                    $ak_max_jaro += 1;
                if ($max_jaro_wk < $threshold)
                    $ak_max_jaro_wk += 1;
                if ($max_leven < $threshold)
                    $ak_max_leven += 1;
                if ($sim_soft_tfidf_jaro < $threshold)
                    $ak_sim_soft_tfidf_jaro += 1;
                if ($max_sim < $threshold)
                    $ak_max_sim += 1;
            }
        }

        $akurasi_cosine = $ak_cosine/$jlhdata;
        $akurasi_jaro = $ak_jaro/$jlhdata;
        $akurasi_jaro_wk = $ak_jaro_wk/$jlhdata;
        $akurasi_leven = $ak_leven/$jlhdata;
        $akurasi_cosine2 = $ak_cosine2/$jlhdata;
        $akurasi_jaro2 = $ak_jaro2/$jlhdata;
        $akurasi_jaro_wk2= $ak_jaro_wk2/$jlhdata;
        $akurasi_leven2= $ak_leven2/$jlhdata;
        $akurasi_max_cosine = $ak_max_cosine/$jlhdata;
        $akurasi_max_jaro = $ak_max_jaro/$jlhdata;
        $akurasi_max_jaro_wk = $ak_max_jaro_wk/$jlhdata;
        $akurasi_max_leven = $ak_max_leven/$jlhdata;
        $akurasi_soft=$ak_sim_soft_tfidf_jaro/$jlhdata;
        $akurasi_max_sim=$ak_max_sim/$jlhdata;

        //cetak data
        echo "akurasi cosine : ".$akurasi_cosine."</br>";
        echo "akurasi jaro : ".$akurasi_jaro."</br>";
        echo "akurasi jaro wk : ".$akurasi_jaro_wk."</br>";
        echo "akurasi leven : ".$akurasi_leven."</br>";
        echo "akurasi cosine2 : ".$akurasi_cosine2."</br>";
        echo "akurasi jaro2 : ".$akurasi_jaro2."</br>";
        echo "akurasi jaro wk2 : ".$akurasi_jaro_wk2."</br>";
        echo "akurasi leven2 : ".$akurasi_leven2."</br>";
        echo "akurasi max cosine : ".$akurasi_max_cosine."</br>";
        echo "akurasi max jaro : ".$akurasi_max_jaro."</br>";
        echo "akurasi max jaro wk : ".$akurasi_max_jaro_wk."</br>";
        echo "akurasi max leven : ".$akurasi_max_leven."</br>";
        echo "akurasi soft tfidf : ".$akurasi_soft."</br>";
        echo "akurasi max similarity : ".$akurasi_max_sim."</br>";

    }

    public function create_data()
    {
        $this->db->from('sim_object_test');
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
            $this->db->where('extract_id >',$extract_id_1);
            $this->db->order_by('extract_id');
            $query = $this->db->get();
            foreach ($query->result() as $row)
            {
                $extract_id_2 = $row->extract_id;
                $object_extract_id_2 = strtolower($row->object_type).$row->object_id;
                $object_desc_2 = $row->object_desc;

                //echo $extract_id_2;

                
                $data = array(
                    'extract_id_1'      => $extract_id_1,
                    'extract_id_2'      => $extract_id_2,
                    'object_extract_id_1' => $object_extract_id_1,
                    'object_extract_id_2' => $object_extract_id_2,
                    'object_desc_1'     => $object_desc_1,
                    'object_desc_2'     => $object_desc_2,
                    'label_sim'    => -1,
                    'post_date'         => date('Y-m-d H:i:s')
                    );

                $this->db->insert('sim_object_test', $data);
            }
        }
        
    }

    public function labeling()
    {
        $this->db->select('*');
        $this->db->from('kode_object_similar');
        $this->db->order_by('no');
        $query = $this->db->get();
        foreach($query->result() as $row)
        {
            
            echo "no : ".$row->no." "."</br>";
            $array_label = array();
            array_push($array_label,$row->kode1);
            array_push($array_label,$row->kode2);
            if (strlen($row->kode3) <> 0)
                array_push($array_label,$row->kode3);
            if (strlen($row->kode4) <> 0)
                array_push($array_label,$row->kode4);
            if (strlen($row->kode5) <> 0)
                array_push($array_label,$row->kode5);
            if (strlen($row->kode6) <> 0)
                array_push($array_label,$row->kode6);
            if (strlen($row->kode7) <> 0)
                array_push($array_label,$row->kode7);
            if (strlen($row->kode8) <> 0)
                array_push($array_label,$row->kode8);
            if (strlen($row->kode9) <> 0)
                array_push($array_label,$row->kode9);
            if (strlen($row->kode10) <> 0)
                array_push($array_label,$row->kode10);
            if (strlen($row->kode11) <> 0)
                array_push($array_label,$row->kode11);
            if (strlen($row->kode12) <> 0)
                array_push($array_label,$row->kode12);
            if (strlen($row->kode13) <> 0)
                array_push($array_label,$row->kode13);
            if (strlen($row->kode14) <> 0)
                array_push($array_label,$row->kode14);
            if (strlen($row->kode15) <> 0)
                array_push($array_label,$row->kode15);
            if (strlen($row->kode16) <> 0)
                array_push($array_label,$row->kode16);
            if (strlen($row->kode17) <> 0)
                array_push($array_label,$row->kode17);
            if (strlen($row->kode18) <> 0)
                array_push($array_label,$row->kode18);
            if (strlen($row->kode19) <> 0)
                array_push($array_label,$row->kode19);

            $data=count($array_label);

            for ($irow = 0; $irow < $data; $irow++)
            {
                $id_1=$array_label[$irow];

                for ($irow2 = 0; $irow2 < $data; $irow2++)
                {
                    $id_2=$array_label[$irow2];
                    echo "irow2 : ".$irow."</br>";
                    if ($id_1 <> $id_2)
                    {
                        // update data similaritas menjadi 1
                        $this->db->select('sim_id,label_sim');
                        $this->db->from('sim_object_test');
                        $this->db->where('object_extract_id_1=',$id_1);
                        $this->db->where('object_extract_id_2=',$id_2);
                        $query = $this->db->get();
                        foreach($query->result() as $rowdata)
                        {
                            $sim_id = $rowdata->sim_id;
                            
                            $data2 = array(
                                'label_sim' => 1,
                                );
        
                            $this->db->where('sim_id', $sim_id);
                            $this->db->update('sim_object_test',$data2);
                            echo $id_1." ".$id_2."</br>";
                        }
                    }
                }
            }
        }
        
    }

    public function akurasi()
    {
        $threshold=0.9;
        $ak_cosine=$ak_cosine2=$ak_max_cosine=0;
        $ak_jaro=$ak_jaro2=$ak_max_jaro=0;
        $ak_jaro_wk=$ak_jaro_wk2=$ak_max_jaro_wk=0;
        $ak_leven=$ak_leven2=$ak_max_leven=0;
        $ak_sim_soft_tfidf_jaro=$ak_max_sim=0;

        //menghitung jumlah data
        $this->db->select("count('sim_id') as jumlah");
        $this->db->from('sim_object_test_uji');
        //$this->db->where('label_sim =',1);
        
        $query = $this->db->get();
        
        foreach($query->result() as $row)
        {
            
            $jlhdata = $row->jumlah;
        }
        

        // menghitung akurasi setiap metode
        $this->db->select("*");
        $this->db->from('sim_object_test_uji');
        //$this->db->where('label_sim =',1);
        $this->db->order_by('sim_id');

        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $label_sim=$row->label_sim;
            $sim_cosine=$row->sim_cosine;
            $sim_jaro=$row->sim_jaro;
            $sim_jaro_wk=$row->sim_jaro_wk;
            $sim_leven=$row->sim_leven;
            $com_sim_cosine=$row->com_sim_cosine;
            $com_sim_jaro=$row->com_sim_jaro;
            $com_sim_jaro_wk=$row->com_sim_jaro_wk;
            $com_sim_leven=$row->com_sim_leven;
            $sim_soft_tfidf_jaro=$row->sim_soft_tfidf_jaro;
            $max_sim=$row->max_sim;

            if ($label_sim==1)
            {
                if ($sim_cosine >=$threshold)
                    $ak_cosine += 1;
                if ($sim_jaro >=$threshold)
                    $ak_jaro += 1;
                if ($sim_jaro_wk >=$threshold)
                    $ak_jaro_wk += 1;
                if ($sim_leven >=$threshold)
                    $ak_leven += 1;
                if ($com_sim_cosine >=$threshold)
                    $ak_cosine2 += 1;
                if ($com_sim_jaro >=$threshold)
                    $ak_jaro2 += 1;
                if ($com_sim_jaro_wk >=$threshold)
                    $ak_jaro_wk2 += 1;
                if ($com_sim_leven >=$threshold)
                    $ak_leven2 += 1;
                if ($sim_soft_tfidf_jaro >=$threshold)
                    $ak_sim_soft_tfidf_jaro += 1;
                if ($max_sim >=$threshold)
                    $ak_max_sim += 1;
            }elseif ($label_sim==0)
            {
                if ($sim_cosine < $threshold)
                    $ak_cosine += 1;
                if ($sim_jaro < $threshold)
                    $ak_jaro += 1;
                if ($sim_jaro_wk < $threshold)
                    $ak_jaro_wk += 1;
                if ($sim_leven < $threshold)
                    $ak_leven += 1;
                if ($com_sim_cosine < $threshold)
                    $ak_cosine2 += 1;
                if ($com_sim_jaro < $threshold)
                    $ak_jaro2 += 1;
                if ($com_sim_jaro_wk < $threshold)
                    $ak_jaro_wk2 += 1;
                if ($com_sim_leven < $threshold)
                    $ak_leven2 += 1;
                if ($sim_soft_tfidf_jaro < $threshold)
                    $ak_sim_soft_tfidf_jaro += 1;
                if ($max_sim < $threshold)
                    $ak_max_sim += 1;
            }
        }

        $akurasi_cosine = $ak_cosine/$jlhdata;
        $akurasi_jaro = $ak_jaro/$jlhdata;
        $akurasi_jaro_wk = $ak_jaro_wk/$jlhdata;
        $akurasi_leven = $ak_leven/$jlhdata;
        $akurasi_cosine2 = $ak_cosine2/$jlhdata;
        $akurasi_jaro2 = $ak_jaro2/$jlhdata;
        $akurasi_jaro_wk2= $ak_jaro_wk2/$jlhdata;
        $akurasi_leven2= $ak_leven2/$jlhdata;
        $akurasi_soft=$ak_sim_soft_tfidf_jaro/$jlhdata;
        $akurasi_max_sim=$ak_max_sim/$jlhdata;

        //cetak data
        echo "threshold : ".$threshold."</br>";
        echo "akurasi cosine : ".$akurasi_cosine."</br>";
        echo "akurasi jaro : ".$akurasi_jaro."</br>";
        echo "akurasi jaro wk : ".$akurasi_jaro_wk."</br>";
        echo "akurasi leven : ".$akurasi_leven."</br>";
        echo "akurasi cosine2 : ".$akurasi_cosine2."</br>";
        echo "akurasi jaro2 : ".$akurasi_jaro2."</br>";
        echo "akurasi jaro wk2 : ".$akurasi_jaro_wk2."</br>";
        echo "akurasi leven2 : ".$akurasi_leven2."</br>";
        echo "akurasi soft tfidf : ".$akurasi_soft."</br>";
        echo "akurasi max similarity : ".$akurasi_max_sim."</br>";
    }

    public function softtfidf()
    {
        $kal_1 = "ibm usa corporation";
        $kal_2 = "aple corp";

        // menghitung jaro utk hubungan term pada kalimat
        $urut=1;
        $data_jaro=$jarowk_v=0;
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($kal_1);
        foreach ($output as $row)
        {
            $term1=$row;
            $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
            $tokenizer = $tokenizerFactory->createDefaultTokenizer();

            $output   = $tokenizer->tokenize($kal_2);
            foreach ($output as $row2)
            {
                $term2=$row2;
                if($urut==1)
                {
                    $arrayjaro=array(array($term1,$term2,$jarowk_v));
                    $data_jaro+=1;
                    $urut=2;
                }
                else
                {
                    array_push($arrayjaro,array($term1,$term2,$jarowk_v));
                    $data_jaro+=1;
                }
            }
        }
        // hitung jaro wk utk setiap pasangan term
        
        for ($row = 0; $row < $data_jaro; $row++)
        {
            $kal1=$arrayjaro[$row][0];
            $kal2=$arrayjaro[$row][1];
        
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
            //echo "jaro : ".$hasil."</br>";
            $jaro_dist = $hasil;
        
            // If the jaro Similarity is above a threshold
            if ($jaro_dist > 0) {
        
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
        
            $arrayjaro[$row][2]=$jaro_dist;
        }
        // analisis relasi utk menemukan relasi yang paling kuat (strongest bones)
        $maksjarovalue=$data_jaro2=0; $simpan=$no=$awal=1;
        $threshold = 0.45;
        for ($row = 0; $row < $data_jaro; $row++)
        {
            
            $term1=$arrayjaro[$row][0];
            $term2=$arrayjaro[$row][1];
            $jarovalue=$arrayjaro[$row][2];
            echo "</br>".$term1." ".$term2." ".$jarovalue." ";
            if ($awal==1)
            {
                $term1high=$term1;
                $term2high=$term2;
                $jarohigh=$jarovalue;
                $awal=0;
            }
            if ($jarovalue > $jarohigh)
            {
                $jarohigh=$jarovalue;
                $term1high=$term1;
                $term2high=$term2;
            }
            $simpan = 1;
            
            if ($term1 <> $term1high || $row == $data_jaro-1) // sudah didapatkan relasi term 1 yang paling tinggi
            {
                // periksa apakah relasi term2 juga merupakan relasi terkuat
                //echo $term1." ".$term1high." ".$term2high." ".$jarohigh." ";
                for ($row2 = 0; $row2 < $data_jaro; $row2++)
                {
                    $term22=$arrayjaro[$row2][1];
                    if ($term22 == $term2high)
                    {
                        $jarovalue2=$arrayjaro[$row2][2];
                        if ($jarovalue2 > $jarohigh)
                            $simpan =0;
                    }
                    
                }

                if ($simpan == 1 && $jarohigh>$threshold) //sesuai dengan threshold
                {
                    if($no==1)
                    {
                        //echo $term1." ".$term1high." ".$term2high." ".$jarohigh." ";
                        $arrayjaro2=array(array($term1high,$term2high,$jarohigh));
                        $data_jaro2+=1;
                        $no=2;
                    }
                    else
                    {
                        //echo $term1." ".$term1high." ".$term2high." ".$jarohigh." ";
                        array_push($arrayjaro2,array($term1high,$term2high,$jarohigh));
                        $data_jaro2+=1;
                    }
                }
                $term1high=$term1;
                $term2high=$term2;
                $jarohigh=$jarovalue;
                //echo "</br>".$term1high." ".$term2high." ".$jarohigh." ";

            }
            
        }

        // menghitung TFIDF
        //1. gabung kedua kalimat
        $gab_kal = $kal_1." ".$kal_2;
        //2. buat array untuk menampung term/kata dari gab_kal
        $urut=1;
        $data=0; // $data untuk mendeteksi banyaknya row pada array
        $tf_1=$tf_2=$df=$idf=$tf_idf_1=$tf_idf_2=$skalar_2=$vector_1=$vector_2=$nv1=$nv2=0;
        $tokenizerFactory  = new \Sastrawi\Tokenizer\TokenizerFactory();
        $tokenizer = $tokenizerFactory->createDefaultTokenizer();

        $output   = $tokenizer->tokenize($gab_kal);

        foreach ($output as $row)
        {
            $ada=0;
            $term = $row;
            if ($urut==1)
            {
                $arraytfidf = array(array($term,$tf_1,$tf_2,$df,$idf,$tf_idf_1,$tf_idf_2,
                                $vector_1,$vector_2,$nv1,$nv2));
                $data=$data+1; 
                $urut=2;
            }
            else 
            {
                //periksa apakah term sudah ada pada array
                for ($row = 0; $row < $data; $row++)
                {
                    $termcheck=$arraytfidf[$row][0];
                    if ($term == $termcheck) // berarti data sudah ada
                        $ada = 1;
                }
                if ($ada==0)
                {
                    array_push($arraytfidf,array($term,$tf_1,$tf_2,$df,$idf,$tf_idf_1,$tf_idf_2,
                                $vector_1,$vector_2,$nv1,$nv2));
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
                $termcheck=$arraytfidf[$row][0];
                $tf_1=$arraytfidf[$row][1];
                if ($term_kal_1 == $termcheck)
                {
                    $tf_1=$tf_1+1;
                    $arraytfidf[$row][1]=$tf_1;
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
                $termcheck=$arraytfidf[$row][0];
                $tf_2=$arraytfidf[$row][2];
                if ($term_kal_2 == $termcheck)
                {
                    $tf_2=$tf_2+1;
                    $arraytfidf[$row][2]=$tf_2;
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
            if ($arraytfidf[$row][1]>0)
                $df=$df+1;
            else 
                $df=$df;
            
            if ($arraytfidf[$row][2]>0)
                $df=$df+1;
            else 
                $df=$df;
            
            // idf = log(n/df+1)-- n = banyak dokumen
            $idf = log(2/$df+1,10);
            $tfidf_1=$arraytfidf[$row][1]*$idf;
            $tfidf_2=$arraytfidf[$row][2]*$idf;
            //$saklar_2=$tfidf_1*$tfidf_2;
            $vector1=pow($tfidf_1,2);
            $vector2=pow($tfidf_2,2);

            $arraytfidf[$row][3]=$df;
            $arraytfidf[$row][4]=$idf;
            $arraytfidf[$row][5]=$tfidf_1;
            $arraytfidf[$row][6]=$tfidf_2;
            //$arraytfidf[$row][7]=$saklar_2;
            $arraytfidf[$row][7]=$vector1;
            $arraytfidf[$row][8]=$vector2;
        }
        // 5. menjumlah saklar, vector, dan akar vektor
        $sum_saklar=$sum_v1=$sum_v2=0;
        for ($row = 0; $row < $data; $row++)
        {
            //$sum_saklar=$sum_saklar+$arraycos_sin[$row][7];
            $sum_v1=$sum_v1+$arraytfidf[$row][7];
            $sum_v2=$sum_v2+$arraytfidf[$row][8];
        }

        // menghitung vector length
        $vlength1=sqrt($sum_v1);
        $vlength2=sqrt($sum_v2);

        // normalisasi document -- tfidf/vector length
        for ($row = 0; $row < $data; $row++)
        {
            $arraytfidf[$row][9]=$arraytfidf[$row][5]/$vlength1;
            $arraytfidf[$row][10]=$arraytfidf[$row][6]/$vlength2;
        }
        
        //cetak data
        echo "</br>"."</br>";
        for ($row = 0; $row < $data_jaro; $row++)
        {
            echo $arrayjaro[$row][0]." ".$arrayjaro[$row][1]." ".$arrayjaro[$row][2]."</br>";
        }

        echo "</br>"."</br>";
        for ($row = 0; $row < $data_jaro2; $row++)
        {
            echo $arrayjaro2[$row][0]." ".$arrayjaro2[$row][1]." ".$arrayjaro2[$row][2]."</br>";
        }
        
        echo "</br>"."</br>";
        for ($row = 0; $row < $data; $row++)
        {
            echo $arraytfidf[$row][0]." ".$arraytfidf[$row][1]." ".$arraytfidf[$row][2]." ".
            $arraytfidf[$row][3]." ".$arraytfidf[$row][4]." ".
            $arraytfidf[$row][5]." ".$arraytfidf[$row][6]." ".
            $arraytfidf[$row][7]." ".$arraytfidf[$row][8]." ".
            $arraytfidf[$row][9]." ".$arraytfidf[$row][10]."</br>";
        }

        // menghitung similarity dokumen dengan soft tfidf jaro wk
        $simsoft=$sumsimsoft=0;
        for ($row = 0; $row < $data_jaro2; $row++)
        {
            $jarovalue=$arrayjaro2[$row][2];
            $term1=$arrayjaro2[$row][0];
            $term2=$arrayjaro2[$row][1];

            for ($row2 = 0; $row2 < $data; $row2++)
            {
                $term=$arraytfidf[$row2][0];
                if ($term==$term1)
                {
                    $nv1=$arraytfidf[$row2][9];
                    echo "</br>"."term1 : ".$term." ".$nv1."jaro value : ".$jarovalue;
                }
                
                if($term==$term2)
                {
                    $nv2=$arraytfidf[$row2][10];
                    echo "</br>"."term2 : ".$term." ".$nv2;
                }
            }
            $simsoft=$nv1*$nv2*$jarovalue;
            echo "</br>"."simsoft : ".$simsoft;
            
            echo "</br>"."sumsimsoft : ".$sumsimsoft;
            $sumsimsoft+=$simsoft;
            $simsoft=0;
        }

        echo "</br>"."similarity soft tfidf jaro wk : ".$sumsimsoft;
    }

    public function create_data_uji()
    {
        
        $this->db->select("*");
        $this->db->from('sim_object_test');
        $this->db->where('label_sim =',1);
        $this->db->order_by('sim_id');

        $query = $this->db->get();

        foreach($query->result() as $row)
        {
            $data = array(
                'extract_id_1'      => $row->extract_id_1,
                'extract_id_2'      => $row->extract_id_2,
                'object_extract_id_1' => $row->object_extract_id_1,
                'object_extract_id_2' => $row->object_extract_id_2,
                'object_desc_1'     => $row->object_desc_1,
                'object_desc_2'     => $row->object_desc_2,
                'label_sim'    => $row->label_sim,
                'sim_cosine' => $row->sim_cosine,
                'sim_jaro' => $row->sim_jaro,
                'sim_jaro_wk' => $row->sim_jaro_wk,
                'sim_leven'  => $row->sim_leven,
                'sim_cosine2' => $row->sim_cosine2,
                'sim_jaro2' => $row->sim_jaro2,
                'sim_jaro_wk2' => $row->sim_jaro_wk2,
                'sim_leven2'  => $row->sim_leven2,
                'com_sim_cosine' => $row->com_sim_cosine,
                'com_sim_jaro' => $row->com_sim_jaro,
                'com_sim_jaro_wk' => $row->com_sim_jaro_wk,
                'com_sim_leven'  => $row->com_sim_leven,
                'sim_soft_tfidf_jaro'  => $row->sim_soft_tfidf_jaro,
                'max_sim'   =>$row->max_sim,
                'post_date' => date('Y-m-d H:i:s')
                );

                $this->db->insert('sim_object_test_uji', $data);

        }
        
        $ulang=1;$no=0;
        while ($ulang==1)
        {
            $rand=rand(1,94975);
            $this->db->select("*");
            $this->db->from('sim_object_test');
            $this->db->where('sim_id =',$rand);
            $this->db->order_by('sim_id');

            $query = $this->db->get();

            foreach($query->result() as $row)
            {
                $label_sim=$row->label_sim;
                if ($label_sim == 0)
                {
                    $data = array(
                        'extract_id_1'      => $row->extract_id_1,
                        'extract_id_2'      => $row->extract_id_2,
                        'object_extract_id_1' => $row->object_extract_id_1,
                        'object_extract_id_2' => $row->object_extract_id_2,
                        'object_desc_1'     => $row->object_desc_1,
                        'object_desc_2'     => $row->object_desc_2,
                        'label_sim'    => $row->label_sim,
                        'sim_cosine' => $row->sim_cosine,
                        'sim_jaro' => $row->sim_jaro,
                        'sim_jaro_wk' => $row->sim_jaro_wk,
                        'sim_leven'  => $row->sim_leven,
                        'sim_cosine2' => $row->sim_cosine2,
                        'sim_jaro2' => $row->sim_jaro2,
                        'sim_jaro_wk2' => $row->sim_jaro_wk2,
                        'sim_leven2'  => $row->sim_leven2,
                        'com_sim_cosine' => $row->com_sim_cosine,
                        'com_sim_jaro' => $row->com_sim_jaro,
                        'com_sim_jaro_wk' => $row->com_sim_jaro_wk,
                        'com_sim_leven'  => $row->com_sim_leven,
                        'sim_soft_tfidf_jaro'  => $row->sim_soft_tfidf_jaro,
                        'max_sim'   =>$row->max_sim,
                        'post_date' => date('Y-m-d H:i:s')
                        );
        
                        $this->db->insert('sim_object_test_uji', $data);
                    $no += 1;
                }
                if ($no==565)
                    $ulang = 0;
            }

        }

    }
    
}

/* End of file Activities.php */
/* Location: ./application/controllers/Activities.php */