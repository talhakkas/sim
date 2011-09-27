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

        $a = '';
        $a .= '<ul>';
        foreach ($dis as $key => $val)
                $a .='<li><a href="#frag-'.$key. '">'.$val['name'].'</a></li>';
        $a .= '</ul>';

        $survey = DB::sql('select * from d_survey');
        $parent = DB::sql('select * from parent');
        foreach ($dis as $key => $val){
                $a .= '<div id="frag-'.$key.'">';
                foreach ($parent as $k => $v){
                        if ($v['parent_id'][0] == $key+1){
                                echo 'hmmm';
                                $a .= '<p class="answer">' . $v['name'] . '</p>';
                                $a .= '<select multiple="multiple" size="5" style="width:885px;">';
                                        #foreach ($survey as $a => $b){
                                        #        if ($v['d_survey_id'][0] == $key+1){
                                        #                '<option value="">Değer</option>';
                                        #        }
                                        #}
                                $a .= '</select>';
                        }
                }
                $a .= '</div>';
        }

        return $a;
}

?>
