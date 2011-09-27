<?php

function multi(){
        $discipline = DB::sql('select name from discipline');
        $survey = DB::sql('select * from d_survey');
        $parent = DB::sql('select * from parent');

        $a = '';
        $a .= '<ul>';
        foreach ($discipline as $key => $val)
                $a .= '<li><a href="#frag-'.$key. '">'.$val['name'].'</a></li>';
        $a .= '</ul>';

        foreach ($discipline as $key => $val){
                $a .= '<div id="frag-'.$key.'">';
                foreach ($parent as $k => $v){
                        if ($v['parent_id'][0] == $key+1){
                                $a .= '<p class="answer">' . $v['name'] . '</p>';
                                $a .= '<select multiple="multiple" size="5" style="width:885px;">';
                                $a .= '        <option value="1">Değer1</option>';
                                $a .= '        <option value="2">Değer2</option>';
                                $a .= '        <option value="3">Değer3</option>';
                                #foreach ($survey as $x => $y){
                                #        if ($y['d_survey_id'][0] == $key+1){
                                #                echo '<option value="">Değer</option>';
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
