<?php

function multi(){
        $dis = DB::sql('select name from discipline');
        $discipline = array();
        foreach ($dis as $key => $value)
                $discipline[$key+1] = $value['name'];

        F3::set('discipline', $discipline);
        array(1 =>'direk', 2=>'manyetik', 3 => 'bilgisayarlı', 4=> 'ultrasonografi', 5=>'dopler');





        #$ana = array();
        #$parent = DB::sql('select * from parent');
        #$tetkik = DB::sql('select * from d_survey');
        #foreach ($discipline as $key => $val){
        #        $ana[$key] = array();
        #        $ana[$key][0] = $val;
        #        $db = DB::sql('select name from parent where discipline_id="'.$key.'"');
                //$ana[$key] = array();
                #echo $val;
                #foreach ($val as $k => $v){
                #        echo $v;
                #        $ana[$key][$k+1] = $k['name'];
                #}
        #}
        #print_r($ana);
        #
        #
}

?>
