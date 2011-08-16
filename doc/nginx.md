## nginx yapılandırılması (yerelde çalışılıyorsa)

    rewrite ^/*$ /a/ redirect;

    set $service "";
    if ($request_uri ~* ^(/[^/]+)/.*$) {
	        set $service $1;
	}

	location / {
	        try_files $uri $uri/ $service/index.php;
	}

	location ~ \.php$ {
	        fastcgi_pass 127.0.0.1:9000;
	        fastcgi_index index.php;
	        fastcgi_param SCRIPT_FILENAME $request_filename;
	        include fastcgi_params;
	}

### db, doc, lib, lib2 dizinlerine direk erişimi kısıtlayalım 404 dönsün

        ne yapabiliriz?


