<?php
include 'init.php';

foreach (array('username', 'password') as $alan) {
        F3::input($alan,
                function($value) use($alan) {
                        $ne = $alan;
                        if ($hata = denetle($value, array(
                                'dolu'    => array(true, "$ne boş bırakılamaz"),
                                'enaz'    => array(2,    "$ne çok kısa"),
                                'enfazla' => array(127,  "$ne çok uzun"),
                        ))) { F3::set('error', $hata); return; }
                        F3::set("REQUEST.$alan", $value);
                }
        );
}

if (! F3::exists('error')) {
	$username = F3::get('REQUEST.username');
	$password = F3::get('REQUEST.password');
	$admin = new Axon('people');
	$admin->load("username='$username'");

        if (!$admin->dry()/* && streq_turkish($admin->password, $password)*/) {

                // admini oturuma gömelim ve oradan alalım
		F3::set('SESSION.adminusername', $username);
                F3::set('SESSION.adminpassword', $password);
                F3::set('SESSION.admin', true);  // admin özelliği ekle

                if ($admin->super)               // ek admin özellikleri ekle
                        F3::set('SESSION.adminsuper', $admin->super);
                F3::clear('error');

		return F3::call('table.php'); // default tablo bilgilerimizi seçelim
	} else
        	F3::set('error', "Lütfen girdiğiniz bilgileri kontrol edin.");
}

// hata var, dön başa ve tekrar sorgu al.
// error alanı dolu ve layout.htm'de görüntülenecek
F3::call('giris'); // f3.php'den fonksiyon çağırımı

?>
