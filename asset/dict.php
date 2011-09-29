<?php

// sabit kelimeler (örneğin veritabını tablo isimleri)
function dict(){
	return array(

		// Tablo İsimleri
		'people' => 'Kişiler',
		'event' => 'Olgular (Case)',
		'drugs' => 'İlaçlar',
		'survey' => 'Etkileşimli Tetkikler',
		'd_survey' => 'Temel Tetkikler',
		'patient' => 'Hastalar',
		'story' => 'Hikayeler',
		'result' => 'Sonuçlar',
		'parent' => 'Ebeveyn',
		'discipline' => 'Bilim Dalları',
		'announcement' => 'Duyurular',

		// Genel (ortak) sütun isimleri
		'id' => 'id',
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

		// node
		'node' => 'Düğüm',
		'media' => 'Medya',
		'question' => 'Soru',
		'options' => 'Ayarlar',
		'isOnset' => 'isOnset',
		'isWrong' => 'isWrong',

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
		'parent_id' => 'Tetkik Ebeveyn id',


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


// İngilizce Çeviri Alanındaki kelimeler
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
