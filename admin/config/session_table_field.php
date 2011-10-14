<?php
// TABLES
//
// nerede bizim istediğimiz tablolar ?
F3::set('SESSION.TABLES', array(
				'people' => 'tc',
				'drugs' => 'id',
				'event' => 'event_id',
				'survey' => 'survey_id',
				'd_survey' => 'd_survey_id',
				'patient' => 'patient_id',
				'story' => 'story_id',
				'result' => 'result_id',
				'parent' => 'parent_id',
				'discipline' => 'discipline_id',
				'announcement' => 'announcement_id',
				'node' => 'id',
				'ncase' => 'cid',
				'takip' => 'tid',
				'tet' => 'id',
			)
		);
// INIT
//
// login olursa, default olarak admin tablosu seçilsin
F3::set('SESSION.TABLE_INIT', 'people');

// FIELDS
//
// tablo incele kısmında buna benzer şeyleri görürsen bizimde görmemize izin ver
// Ör :
// talep : _id => true
// cevap : bilmem_id, bilmem2_id, bilmem3_id
//
// talep : name => true
// cevap : name, surname, first_name, last_name, username
F3::set('SESSION.FIELDS', array(
				'_id' =>  true,
				'id' =>  true,
				'name' => true,
				'title' => true,
				'content' => true,
				'tc' => false,
				'photo' => false,
				'type' => false,
				'topic' => false,
				'skey' => false,
				'zaman' => true,
			));
?>
