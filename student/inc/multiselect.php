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

        $db = DB::sql('select name from parent where discipline_id="'.$key.'"');
        foreach ($dis as $key => $val){
                $a .= '<div id="frag-'.$key.'">';
                $a .= '<select multiple="multiple" size="5" style="width:885px;">
                        <option value="red">Red</option>
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
                        <option value="orange">Orange</option>
                        <option value="purple">Purple</option>
                        <option value="yellow">Yellow</option>
                </select>';
                $a .= '</div>';
        }

        $aa = '
                <F3:repeat group="{{@discipline}}" key="{{@key}}" value="{{@value}}">                                                                 
                <div id="frag-{{@key}}">                                                                                                              

                <select multiple="multiple" size="5" style="width:885px;">                                                                        
                <option value="red">Red</option>                                                                                                
                <option value="green">Green</option>                                                                                            
                <option value="blue">Blue</option>                                                                                              
                <option value="orange">Orange</option>                                                                                          
                <option value="purple">Purple</option>                                                                                          
                <option value="yellow">Yellow</option>                                                                                          
                </select>                                                                                                                         

                </div>                                                                                                                                
                </F3:repeat>                                                                                                                          
                ';
        return $a;
}

?>
