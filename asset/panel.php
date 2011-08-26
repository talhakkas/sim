<?php


$renk = array(
	"blue"   => "#2daebf",
	"home"   => "#2daebf",
	"green"  => "#b8d30b",
	"orange" => "#ff6908",
	"magenta"=> "#a9014b",
	"yellow" => "#fc9200"
);

$page = array(
	// student
	"a"=> "blue",
	"home"=> "home",
	"olgu"=> "green",
	"ekg"=> "magenta",
	"bulgu"=> "orange",
	"personal"=> "yellow",
	"degerlendir"=> "green",
	"son"=> "green",

	// admin
	"info"=> "magenta",

	// yolgu
	""=> "",
);

$root = strtok($_SERVER["SCRIPT_NAME"], '/');

$student = array(
	"/$root" => array('anasayfa', 'home'),
	"olgu" => array('olgu ekranı', 'green'),
	"ekg" => array('ekg ekranı', 'magenta'),
	"bulgu" => array('bulgu ekranı', 'orange'),
	"personal" => array(F3::get('SESSION.student'), 'yellow'),
	"logout" => array("çıkış",'blue'),
	"printly" => array('', 'printly', 'printly.png')
);

$admin = array(
	"/$root" => array(F3::get('SESSION.adminusername'), 'home', F3::get('SESSION.adminphoto')),
	"info" => array("Bilgilendirme", 'magenta'),
	"#" => array("Menü", 'blue', array(
		"1" => array(F3::get('SESSION.TABLE'),"table.png"),
		"2" => array(F3::get('SESSION.SAVE'),"save.png"),
		"/$root" => array("Tablolar","tables.png"),
		"review" => array("Tablo İncele","review.png"),
		"new" => array("Ekle","add.png"),
		"find" => array("Bul","find.png"),
		"csv" => array("Csv Çıktı","csv.png"),
		"pdf" => array("Pdf Çıktı","pdf.png"),
		"printly" => array("Yazıcı Dostu","printly.png")
		)
	),
	"logout" => array("Çıkış",'blue')
);

$yolgu = array(
	"/$root" => array('anasayfa', 'home'),
	"logout" => array("çıkış",'blue'),
);


class menu extends Base {
	static function StyleMenu($servis, $template, $renk, $page) {
		if ($template == 'login' || !in_array($template, array_keys($page)))
			return;
		$i = $page[$template];
		$style = '
			div#wrapper {border-color:'.$renk[$i].';}
			ul.tabs li.'.$i.'{
				text-shadow:0 -1px 1px rgba(0,0,0,.25);
				background:'.$renk[$i].';
				position:relative;
			}
			ul.tabs li.'.$i.' a{color:#fff;}
		';
		return $style;
	}

	static function PanelMenu($servis, $template) {
		$menu ='<div id="wrapper"><div id="container"><ul class="tabs topnav" id="mainNav">';

		foreach($servis as $key => $val){
			if ($key == "#"){
				$menu .= '<li class="'.$val[1].'"><a href="'.$key.'">'.$val[0].'</a><ul>';
				foreach($servis['#'][2] as $k => $v){
					if (is_numeric($k))
						$menu .= '<li><img src="/public/img/'.$v[1].'"/>'.$v[0].'</li>';
					else
						$menu .= '<li><a href="'.$k.'">'.'<img src="/public/img/'.$v[1].'"/>'.$v[0].'</a></li>';
				}
				$menu .= "</ul></li>";
				continue;
			}
			$menu .= '<li class="'.$val[1].'"><a href="'.$key.'">';
			if (isset($val[2]))
				$menu .= '<img src="/public/upload/'.$val[2].'"/>';
			$menu .= $val[0].'</a></li>';
		}
		$menu .='</ul></div></div>';
		return $menu;
	}
	static function run($template) {
		global $admin, $student, $renk, $page;
		$root = strtok($_SERVER["SCRIPT_NAME"], '/');
		switch ($root) {
		case 'admin':
			$servis = $admin;
			break;
		case 'tutor':
			$servis = $admin; // şimdilik
			break;
		case 'student':
			$servis = $student;
			break;
		case 'yolgu':
			$servis = $yolgu;
			break;
		}
		F3::set('menu', menu::PanelMenu($servis, $template));
		F3::set('style', menu::StyleMenu($servis, $template, $renk, $page));
	}

};

/* render fonksiyonuna gömecez bunu
	// ortak bir oturum değişkeni oluşturmalıyız
	if ('yolgu' != strtok($_SERVER["SCRIPT_NAME"], '/') && (F3::get('SESSION.special') || F3::get('SESSION.adminusername')))
		menu::run($template);
 */
?>
