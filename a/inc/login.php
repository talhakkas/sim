<?php

F3::clear('error');

foreach (array('username','password') as $alan) {
        F3::input($alan,
                function($value) use($alan) {
                        $dizi = array('username'=>"Kullanıcı Adı", 'password'=>"Parola");
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

        $student = new Axon('people');
        $student->load("tc='$username'");

        //if ($username && $password && !$student->dry() && ($student->password == $password) && ($student->type==3)) {
        //        F3::set('SESSION.student', $username);
        //        F3::set('SESSION.stdno',   $student->no);
        //        F3::set('SESSION.special', 1);
	//			F3::set('SESSION.isstudent', TRUE);
        //        //return F3::call('home');
//				return F3::reroute('/');
//        }
//        else if (!$student->dry() && ($student->password == $password) && ($student->type==1)) {
        //        // admin ise
        //        F3::set('SESSION.student', $username);
        //        F3::set('SESSION.stdno',  $student->no);
        //        F3::set('SESSION.special', 1);
	//			F3::set('SESSION.isstudent', FALSE);
	//        return F3::reroute('/');
        //}

        if ($username && $password && !$student->dry() && ($student->password == $password)) {
                F3::set('SESSION.student', $username);
                F3::set('SESSION.stdno',   $student->no);
                F3::set('SESSION.special', 1);
                F3::set('SESSION.isstudent', TRUE);
                F3::set('SESSION.kop', TRUE);
		//return F3::call('clist.php');
		return F3::reroute('/');
        }
        F3::set('error', "Yanlış kullanıcı adı veya parola");
}

render('a/home', 'Kullanıcı Girişi Hatası', 'a');

?>
