<?php

function multi($preselected=array(), $dbg=false){
    $discs = DB::sql('select * from discipline');
    $parnt = DB::sql('select * from parent');
    $survs = DB::sql('select * from survey');

    $a = '';

	// frag
    $a .= '<ul>';

    foreach($discs as $dval)
        $a .= "<li><a href='#frag-$dval[id]'>$dval[name]</a></li>";

    $a .= '</ul>';

    foreach($discs as $dval) {
	$did = $dval['id'];

        $a .= "<div id='frag-$dval[id]'>";

        foreach ($parnt as $pval){
			$pid = $pval['id'];

			$pdid = get_dps_id($pid, 'did');
            $ppid = get_dps_id($pid, 'pid');

			if($dbg)	echo "DEBUG: pid=$pid,	pdid=$pdid ve ppid=$ppid <br>";

            if ($pdid == $did){
                $a .= '<p class="answer">' . $pval['name'] . '</p>';
                $a .= '<select multiple="multiple" size="5" name="response_'.$ppid.'[]" style="width:885px;">';

                foreach ($survs as $sval){
					$sid = $sval['id'];

					$sdid = get_dps_id($sid, 'did');
					$spid = get_dps_id($sid, 'pid');
					$ssid = get_dps_id($sid, 'sid');

					if($dbg) echo "DEBUG: sid=$sid,	sdid=$sdid, spid=$spid ve ssid=$ssid<br>";

                    if (($spid == $ppid) & ($sdid == $did)){
						//if(in_array($sid, $preselected))
						if(array_key_exists($sid, $preselected))
                        	$a .= '<option value="'. $sid .'" selected="selected">'. $sval['name'] .'</option>';
						else
                        	$a .= '<option value="'. $sid .'" >'. $sval['name'] .'</option>';
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
