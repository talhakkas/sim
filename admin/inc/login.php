<?php

foreach (array('username', 'password') as $alan) {
        F3::input($alan,
                function($value) use($alan) {
                        $ne = $alan;
                        $alan = array('username'=>'Kullanıcı Adı', 'password'=>'Parola');
                        if ($hata = denetle($value, array(
                                'dolu'    => array(true, "$alan[$ne] boş bırakılamaz"),
                                'enaz'    => array(2,    "$alan[$ne] çok kısa"),
                                'enfazla' => array(50,   "$alan[$ne] çok uzun"),
                        ))) { F3::set('error', $hata); return; }
                        F3::set("REQUEST.$alan", $value);
                }
        );
}

if (! F3::exists('error')) {
	$username = F3::get('REQUEST.username');
	$password = F3::get('REQUEST.password');

        $admin = new Axon('people');
	$admin->load("tc='$username'");

        if ($username && $password && !$admin->dry() && streq_turkish($admin->password, $password)) {
                // admini oturuma gömelim ve oradan alalım
		F3::set('SESSION.adminusername', $username);
                F3::set('SESSION.adminpassword', $password);
                F3::set('SESSION.adminphoto', $admin->photo);
                F3::set('SESSION.admin', true);  // admin özelliği ekle

                if ($admin->super)               // ek admin özellikleri ekle
                        F3::set('SESSION.adminsuper', true);
                F3::clear('error');

                return F3::call('table.php'); // default tablo bilgileri seçili olmalı
	} else
        	F3::set('error', "Lütfen girdiğiniz bilgileri kontrol edin.");
}

// hata var, dön başa ve tekrar sorgu al.
// error alanı dolu ve layout.htm'de görüntülenecek
F3::call('login'); // f3.php'den fonksiyon çağırımı

?>
