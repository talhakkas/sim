<?php

function multi(){
        $discipline = DB::sql('select name from discipline');
        $survey = DB::sql('select * from d_survey');
        $parent = DB::sql('select * from parent');
        //print_r($survey);

        $a = '';
        $a .= '<ul>';
        foreach ($discipline as $key => $val)
                $a .= '<li><a href="#frag-'.$key. '">'.$val['name'].'</a></li>';
        $a .= '</ul>';

        foreach ($discipline as $key => $val){
                $a .= '<div id="frag-'.$key.'">';
                foreach ($parent as $k => $v){
                        $parent_id = substr($v['parent_id'], 0, 2);
                        if ($parent_id == $key+1){
                                $a .= '<p class="answer">' . $v['name'] . '</p>';
                                $a .= '<select multiple="multiple" size="5" style="width:885px;">';
                                foreach ($survey as $x => $y){
                                        $survey_id = substr($y['d_survey_id'], 2, 2);
                                        $_id = substr($y['d_survey_id'], 4, 2);
                                        if ($survey_id == $parent_id){
                                                //echo $x;
                                                $a .= '<option value="'. $_id .'">Değer</option>';
                                        }
                                }
                                $a .= '</select>';
                        }
                }
                $a .= '</div>';
        }
        return $a;
}

?>
