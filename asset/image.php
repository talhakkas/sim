<?php
class Image {

	# sesli hatalı çıkış için : return array(false,"bla bla");
	# sesli başarılı çıkış için : return array(true, "bla bla");
	# sessiz hatalı çıkış için : return false;

	static $_small = 'small';
	static $_extension = '.jpg';
	static $_dir = "../public/upload";

	public static function upload($subdir, $savename, $uploaded, $overwrite=false, $size=550001) {
		$uploaded = $uploaded['tmp_name'];

		$full_savename = $savename . self::$_extension;   // kayıt ismimiz
		$destination = self::$_dir . "/" . $subdir; // hedef dizinimiz
		$image = $destination. "/" . $full_savename;      // resmimizin yolu

		// boşsa mesele yok, çağırana dön
		if (empty($uploaded)) {
			return false; // sessiz çıkış
		}
		// <ana_dizin> yoksa oluşturalım
		if (! file_exists(self::$_dir)) {
			mkdir(self::$_dir, 0777, true);
			chmod(self::$_dir, 0777);
		}
		// hedef dizin yoksa oluşturalım
		if (! file_exists($destination)) {
			mkdir($destination, 0777, true);
			chmod($destination, 0777);
		}

		// tam yol
		$full_destination = getcwd() . $destination; // hedefin tam yolu
		$full_image_destination = getcwd() . $image; // resmimizin tam yolu
		// bu bir uploaded dosya olmalı, fake dosyalara izin yok
		if (is_uploaded_file($uploaded)) {
			// boyutu sınırla, değeri öylesine seçtim
			if (filesize($uploaded) > $size) {
				return array(false, 'Resim çok büyük');
			}
			// şimdilik sadece JPEG, dosya tipini içine bakarak tespit ediyoruz
			else if (exif_imagetype($uploaded) != IMAGETYPE_JPEG) {
				return array(false, 'Resim JPEG değil');
			}
			// dosyanın üzerine yazmayalım, ekstra güvenlik
			// else if (!(!file_exists($hedef) || $overwrite)) {
			else if (file_exists($full_image_destination) && !($overwrite)) {
				return array(false, 'Resim zaten kaydedilmiş');
			}
			// tamamdır, kalıcı kayıt yapalım
			else if (!move_uploaded_file($uploaded, $full_image_destination)) {
				return array(false, 'Dosya yükleme hatası');
			} else {// yok başka bir ihtimal!, doğru yoldasın
				// DIKKAT ! bu 'else' kısmı kapatılırsa,
				// küçük resim yüklenmez!
				$file_parts = pathinfo($full_image_destination);

				$small_image = $full_destination . "/" . self::$_small . "-" . $savename.self::$_extension;
				if (!copy($full_image_destination, $small_image))
					return false;

				// image resizing
				$sizes = getimagesize($small_image);
				$image_rate = 300 / $sizes[0];
				$new_height = $image_rate * $sizes[1];
				$new_image = imagecreatetruecolor("300", $new_height);
				imagecopyresampled($new_image,
						imagecreatefromjpeg($small_image),
						0, 0, 0, 0, "300",
						$new_height, $sizes[0], $sizes[1]);

				imagejpeg($new_image, $small_image, 100);
				chmod($small_image, 0755);
			}
			return array(true, $subdir . "/" . $full_savename);
		}
		else {
			// bu aslında bir atak işareti
			return array(false, 'Dosya geçerli bir yükleme değil');
		}
		return false; // sessiz çıkış
	}
	public static function delete($subdir, $savename) {
		$image = self::$_dir . "/" . $subdir . "/" . $savename . self::$_extension;
		$small_image = self::$_dir . "/" . $subdir . "/" .self::$_small . "-" . $savename . self::$_extension;
		if (file_exists($image)) { // orijinal var ise sil
			unlink($image);
		}
		if (file_exists($small_image)) { // küçük resim var ise sil
			unlink($small_image);
		}
	}
}

?>
