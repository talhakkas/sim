<?php
function immapr() {
	print_r($_POST);
	F3::set('SESSION.secim', array( 'x' => $_POST['x'],  'y' => $_POST['y'],
		                        'x2'=> $_POST['x2'], 'y2'=> $_POST['y2'],
					'w' => $_POST['w'],  'h' => $_POST['h']));
	F3::set('SESSION.yorum', $_POST['yorum']);
	//render('immapr', 'Immap:Result');
}
?>
