<?php

include 'denetle.php';

F3::clear('error');

foreach (array('username','password') as $alan) {
        F3::input($alan,
                function($value) use($alan) {
                        $dizi = array('username'=>"Kullanıcı adı", 'password'=>"Kullanıcı şifresi");
                        if ($hata = denetle($value, array(
                                'dolu'    => array(true, "$dizi[$alan] boş bırakılamaz"),
                                'enaz'    => array(4,    "$dizi[$alan] çok kısa"),
                        ))) { return F3::set('error', $hata);}
                }
        );
        if (F3::exists('error')) break;
}

if (! F3::exists('error')) {
        $username = F3::get('REQUEST.username' );
        $password = F3::get('REQUEST.password' );
        //$student = new Axon('table_name');
        //$student->load("username='$username'");
        //if (!$student->dry() && ($student->password == $password)) {
                F3::set('SESSION.username', $username);
                return F3::call('home');
        //}
        F3::set('error', "Yanlış kullanıcı adı veya parola");
}

F3::call('login');

?>

