<?php

// sabit kelimeler (örneğin veritabını tablo isimleri)
function dict(){
	return array(

		// Tablo İsimleri
		'people' => 'Kişiler',
		'event' => 'Olgular (Case)',
		'survey' => 'Değiştirilebilir Tetkikler',
		'd_survey' => 'Temel Tetkikler',
		'patient' => 'Hastalar',
		'story' => 'Hikayeler',
		'result' => 'Sonuçlar',
		'parent' => 'Tetkik Ebeveyn',
		'discipline' => 'Bilim Dalları',
		'announcement' => 'Duyurular',

		// Genel (ortak) sütun isimleri
		'tc' => 'TC Kimlik',
		'name' => 'Ad',
		'surname' => 'Soyad',
		'type' => 'Tip',
		'photo' => 'Resim',
		'value' => 'Değer',
		'comment' => 'Yorum',
		'content' => 'İçerik',

		// announcement
		'announcement_id' => 'Duyuru id',
		'title' => 'Başlık',

		// story
		'story_id' => 'Hikaye id',
		'topic' => 'Konu',

		// patient
		'patient_id' => 'Hasta id',
		'age' => 'Yaş',
		'gender' => 'Cinsiyet',

		// d_survey
		'd_survey_id' => 'Temel Tetkik id',

		// survey
		'survey_id' => 'Değiştirilebilir Tekik id',
		'd_survey_id' => 'Temel Tetkik id',

		// event
		'event_id' => 'Olgu id',
		'surveys' => 'Tetkikler',

		// discipline
		'discipline_id' => 'Bilim Dalı id',

		// people
		'password' => 'Parola',
		'super' => 'Özellik',
		'password' => 'Parola',
		'super' => 'Özellik',

		// result
		'result_id' => 'Sonuç id',
		'date' => 'Tarih',
		'time' => 'Saat',
		'results' => 'Sonuçlar',

		// parent
		'parent_id' => '',
		'discipline_id' => '',


		// Student Servisi özel değişkenleri
		'' => '',
		'' => '',

		// Tutor Servisi özel değişkenleri
		'' => '',
		'' => '',

		// Admin Servisi özel değişkenleri
		'' => '',
		'' => '',
	);
}


// Çeviri Alanındaki kelimeler
function eski_dict(){
	return array(
		'Anasayfa' => 'Home',
		'Çıkış' => 'Logout',
		'' => '',

		// Tutor Panel
		'' => '',

		// Admin Panel
		'Yönetici Paneli' => 'Admin Panel',
		'Tablolar' => 'Tables',
		'Tablo İncele' => 'Table Preview',
		'Ekle' => 'Add',
		'Bul' => 'Find',
		'Csv Çıktı' => 'Csv Output',
		'Pdf Çıktı' => 'Pdf Output',
		'Yazıcı Dostu' => 'Printer Friendly',
		'Bilgilendirme' => 'Information',

		'tc' => 'TC Kimlik',
		'name' => 'Ad',
		'surname' => 'Soyad',
		'password' => 'Parola',
		'super' => 'Özellik',
		'type' => 'Tip',
		'photo' => 'Resim',

	);
}

?>
