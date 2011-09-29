<?php

require_once  '../lib/base.php';
require_once  '../asset/lib.php';
require_once  'inc/multiselect.php';

function home() {
        $duyuru = DB::sql("select * from announcement");
        rsort($duyuru); // son eklenen duyuru en üstte görünsün
        F3::set('announcement', $duyuru);
        F3::set('olgu', DB::sql("select * from event"));
        if (! F3::get("SESSION.olgu")) // default olgu
                F3::set("SESSION.olgu", 2); // default olgu
        render('home', 'Ana Sayfa');
}

function ekg() {
	$isEkgResponse = empty($_POST) ? "no" : "yes";
	$yorum = empty($_POST) ? "" : $_POST['yorum'];

	F3::set('SESSION.isEkgResponse', $isEkgResponse);
	F3::set('SESSION.yorum', $yorum);

	render('ekg', 'Ekg Ekranı');
}

function bulgu() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	render('bulgu', 'Bulgu Ekranı');
}

function about() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	render('about', 'Hakkında');
}

function personal() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
        $student = new Axon('people');
        $std = F3::get('SESSION.student');
        $student->load("tc='$std'");
        F3::set("personal", $student);
	render('personal', 'Kişisel Sayfa');
}

function son() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('login');
	render('son', 'Son Oturum');
}

function printly() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('home');
        F3::set('printly', 'printly');
        $template = F3::get('SESSION.template');
        $inc = array('olgu', 'degerlendir');
        if (in_array($template, $inc))
                return F3::call($template . '.php');
        F3::call($template);
}

function login() {
        if (F3::get("SESSION.special") == 1)
                return F3::call('home');
	render('login', 'Öğrenci Girişi');
}

function cases() {
        if (F3::get("SESSION.special") != 1)
                return F3::call('home');
        F3::set("SESSION.olgu", $_POST['OLGU']);
        render('home', 'Ana Sayfa');
        F3::reroute('/');
}


F3::route('GET /f', function() {render('f', 'video player');});
F3::route('GET /ilac', function() {render('ilac', 'ilaç ekranı');});
F3::route('POST /ilac', 'ilac_sonuc.php');

F3::route('GET /test',
        function() {
                if (F3::get("SESSION.special") != 1)
                        return F3::call('login');
                F3::set('tetkikmerkezi', multi());
                render('test', 'yeni olgu ekranı');
        }
);

F3::route('GET /abc',
        function() {
                function file_get_contents_utf8($fn) {
                        $content = file_get_contents($fn);
                        return mb_convert_encoding($content, 'UTF-8',
                                mb_detect_encoding($content, 'UTF-8, ISO-8859-9', true));
                }

                function get_drug($id) {
                        $content = file_get_contents_utf8("http://www.hekimce.com/ilacrehberi.php?ilac=$id");

                        $p1 = strpos($content, 'color:#ffffff;');
                        $p2 = strpos($content, '>', $p1);

                        $str = substr($content, $p2+1, strlen($content));
                        $str = trim($str);

                        $p3 = strpos($str, '<br><br><p><b>Toplam Okunma');
                        $str2 = substr($str, 0, $p3);

                        $str3 = "<table><tr><td>$str2</td></tr></table>";

                        return $str3;
                }

                $drugs = DB::sql("select id from drug");
                foreach($drugs as $key => $val){
                        $id = $val['id'];
                        $foo = new Axon('deneme');
                        $foo->load("id='$id'");
                        if (!$foo->dry())
                                continue;
                        $foo->id = $id;
                        $sonuc = get_drug($id);
                        $foo->content = $sonuc;
                        $foo->save();
                }

                render('abc', 'hmm...');
        }
);




F3::route("GET /*"      , 'login');
F3::route("GET /printly*"      , 'printly');
F3::route("POST /login", 'login.php');
F3::route("GET /logout*", 'logout');
F3::route("GET /about*",  'about');
F3::route("GET /ekg*",    'ekg');
	F3::route("POST /ekg*",    'ekg');
F3::route("GET /bulgu*",  'bulgu');
F3::route("GET /personal*",  'personal');

F3::route("GET /olgu*",  'olgu.php');
F3::route("POST /degerlendir", 'degerlendir.php');
F3::route("POST /son", 'son');

F3::route("POST /cases", 'cases');

F3::run();

?>

