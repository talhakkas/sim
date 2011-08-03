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
	$tutor = new Axon('people');
	$tutor->load("tc='$username'");

	if (!$tutor->dry() && streq_turkish($tutor->password, $password)) {

                // tutori oturuma gömelim ve oradan alalım
		F3::set('SESSION.tutorusername', $username);
                F3::set('SESSION.tutorpassword', $password);
                F3::set('SESSION.tutor', true);  // tutor özelliği ekle

                if ($tutor->super)               // ek tutor özellikleri ekle
                        F3::set('SESSION.tutorsuper', $tutor->super); // TODO özellik silinmesi mantıklı
                F3::clear('error');

		return F3::call('table.php'); // default tablo bilgilerimizi seçelim
	} else
        	F3::set('error', "Lütfen girdiğiniz bilgileri kontrol edin.");
}

// hata var, dön başa ve tekrar sorgu al.
// error alanı dolu ve layout.htm'de görüntülenecek
F3::call('giris'); // f3.php'den fonksiyon çağırımı
?>
