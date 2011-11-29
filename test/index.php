<?php

require_once  '../a/gettext/gettext.inc';
require_once  '../a/lib/base.php';
require_once  '../a/inc/lib.php';
require_once  'inc/tetkik.php';
require_once './mark/markdown.php';


// markdown
function mark() {
        $foo = file('mark/foo.md');

        $array = array('lastname', 'email', 'phone');
        $data = implode("\n", $foo);
        $text = Markdown($data);
        F3::set('markdown', $text);
        render('markdown', 'Markdown denemeler');
}
F3::route('GET /markdown', 'mark');


function ekg() {
	$isEkgResponse = empty($_POST) ? "no" : "yes";
	$yorum = empty($_POST) ? "" : $_POST['yorum'];

	F3::set('SESSION.isEkgResponse', $isEkgResponse);
	F3::set('SESSION.yorum', $yorum);

	render('ekg', 'Ekg Ekranı');
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

function immapr() {
	print_r($_POST); 
	F3::set('SESSION.secim', array( 'x' => $_POST['x'],  'y' => $_POST['y'],
		                        'x2'=> $_POST['x2'], 'y2'=> $_POST['y2'],
					'w' => $_POST['w'],  'h' => $_POST['h']));
	F3::set('SESSION.yorum', $_POST['yorum']);
	//render('immapr', 'Immap:Result');
}

function ilac_sonuc() {
        if(empty($_POST)) {
                echo "Herhangi bir ilaç seçimi yapılmamış";
                return;
        }

        $tdrug = new Axon("drugs");
        $drug = preg_split('/,/', $_POST['drugs']);
        $ilac_data = array();

        foreach($drug as $i=>$id) {
                $datas = $tdrug->afind("id='$id'");
                $name  = $datas[0]['name'];
                $content  = $datas[0]['content'];
                $ilac_data[$id] = array($name, $content);
        }

        F3::set('SESSION.ilac', $ilac_data);
        render('ilac_secilen', 'Seçilen İlaçlar');
}


F3::route("GET /*",      function () { render('home', 'Ana Sayfa'); } );
F3::route("GET /@page",  function () { render(F3::get("PARAMS.page"), 'Örnek Sayfa'); } );
F3::route("POST /@page", function () { render(F3::get("PARAMS.page"), 'Örnek Sayfa'); } );

// özel postlar
F3::route('POST /tetkik', 'tetkik');
F3::route('POST /ilac', 'ilac_sonuc');

F3::run();

?>

