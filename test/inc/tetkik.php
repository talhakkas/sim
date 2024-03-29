<?php

function tamamla($id, $len){
    return str_pad((string)$id, $len, "0", STR_PAD_LEFT);
}

function multi($preselected=array()){
    $discipline = DB::sql('select name from discipline');
    $surveys 	= DB::sql('select * from d_survey');
    $parent 	= DB::sql('select * from parent');

    $a = '';
    $a .= '<ul>';

    foreach ($discipline as $key => $val)
        $a .= '<li><a href="#frag-'.$key. '">'.$val['name'].'</a></li>';

	$a .= '</ul>';

    foreach ($discipline as $discipline_key => $discipline_val){
        $a .= '<div id="frag-'.$discipline_key.'">';
        foreach ($parent as $parent_key => $parent_val){
            $parent_id = substr(tamamla($parent_val['parent_id'], 4), 0, 2);
            if ($parent_id == $discipline_key+1){
                $parent_id_survey = substr(tamamla($parent_val['parent_id'], 4), 2, 4);
                $a .= '<p class="answer">' . $parent_val['name'] . '</p>';
                $a .= '<select multiple="multiple" size="5" name="response_'.$parent_id_survey.'[]" style="width:885px;">';
                foreach ($surveys as $survey_key => $survey){
                    $survey_id = substr(tamamla($survey['d_survey_id'], 6), 2, 2);
                    $survey_id_discipline = substr(tamamla($survey['d_survey_id'], 6), 0, 2);
                    if (($survey_id == $parent_id_survey) & ($survey_id_discipline == $discipline_key+1)){
                        $_id = substr($survey['d_survey_id'], 4, 2);

						$val = $survey_id_discipline.$survey_id.tamamla($_id, 2);

						if(in_array($val, $preselected))
                        	$a .= '<option value="'. $val .'" selected="selected">'. $survey['name'] .'</option>';
						else
                        	$a .= '<option value="'. $val .'" >'. $survey['name'] .'</option>';
                    }
                }
                $a .= '</select>';
            }
        }
        $a .= '</div>';
    }
    return $a;
}

function tetkik() {
	$select_all = F3::get('REQUEST');

	$preselected = array();
        foreach ($select_all as $key => $value){
                if (stristr($key, 'response'))
                        foreach ($select_all[$key] as $k => $v)
                                $preselected[] = $v;
        }

	print_r($preselected);
	F3::set('tetkikmerkezi', multi($preselected));

        render('tetkik', 'Sonuçlar');
}

?>
