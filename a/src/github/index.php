<?php

	// hata raporlamayi kapa.
	error_reporting(0);

	try {
		// json verisini decode et.
		$payload = json_decode($_REQUEST['payload']);
	}
	catch(Exception $e) {
		exit;
	}

	// http://help.github.com/post-receive-hooks/ bu adresteki format incelenip, asagidaki degisken tanimlanmistir.
	$message = $payload -> commits[0] -> message;
	$search = ".";

	// komit mesajinda [tetikle] kismi varsa betigi calistir.
	if (strstr($message, $search)) {
		// komut çalıştırılır.
		$command = './betik.sh';
		exec($command);
	}

?>
