<?php

foreach (array('key') as $alan) {
        F3::input($alan,
                function($value) use($alan) {
                        $ne = F3::get('SESSION.KEY');
                        if ($hata = denetle($value, array(
                                'dolu'    => array(true, "$ne boş bırakılamaz"),
                                'enaz'    => array(1,    "$ne çok kısa"),
                                'enfazla' => array(127,  "$ne çok uzun"),
                        ))) { F3::set('error', $hata); return; }
                        F3::set("REQUEST.$alan", $value);
                }
        );
}

if (! F3::exists('error'))  {
        // table & key
        $TABLE = F3::get('SESSION.TABLE');
        $KEY = F3::get('SESSION.KEY');

        $key = F3::get('REQUEST.key');
        $table = new Axon($TABLE);

        if ($table->found("$KEY='$key'")) {

                F3::set('SESSION.key', $key);

                return F3::call('show.php');
        } else
                F3::set('error', "Böyle bir kayıt bulunmamaktadır");
}

F3::call('find');
?>
