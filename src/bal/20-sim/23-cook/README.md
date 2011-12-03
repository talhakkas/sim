# Cookbook

Formda yer alan benzer elemanları dizi şeklinde tutma ve erişme üzerine
`form_array.html|php` kodları incelenebilir.

## AJAX

Amaç, checkbox seçildiğinde yan tarafta yeni alanlar görülür ve bunlar
veritabanından çekilir.

### simple

AjaxF1'in en [basit](http://www.ajaxf1.com/tutorial/ajax-php.html) tutorialiyle
başlayarak, `client.html` ve `upperCase.php` dosyası üretildi. Bu örnekte client
dosyasındaki giriş alanına girilen metin basit bir şekilde upperCase ile büyük
harfe çevrilip diğer girdi alanında anlık gösteriliyor.

AjaxF1 de ki ikinci örneğimiz
[master-detail](http://www.ajaxf1.com/tutorial/ajax-master-detail-select.html).
Bu örnekte tam olarak bizim istediğimize yakın şeyler yapılıyor. Ana model
seçildiğinde alt listede alt modeller gösteriliyor. Bu sırada oluşturulan
dosyalar `select.html` ve `getSubcategory.php` dosyasıdır. php betiğinde
paketlerken tire:`-` ve noktalı virgül:`;` karakterlerinin kullanılmasına ve
html tarafında bunun nasıl ayrıldığına dikkat ediniz. Bunun daha standart
yolları var (ör. JSon).
