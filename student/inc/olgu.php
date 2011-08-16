<?php

if (F3::get("SESSION.special") != 1)
	return F3::call('login');

$dis = DB::sql('select name from discipline');
$discipline = array();
foreach ($dis as $key => $value)
	$discipline[$key+1] = $value['name'];

F3::set('discipline', $discipline);

//$olgu = 2;
$olgu = F3::get('SESSION.olgu');

F3::set('event', $olgu);
$event = new Axon('event');
$event->load("event_id='$olgu'");

$story = new Axon('story');
$story->load("story_id='$event->story_id'");
F3::set('story', $story);

$patient = new Axon('patient');
$patient->load("patient_id='$event->patient_id'");
F3::set('patient', $patient);

$event->close;
$story->close;
$patient->close;

//F3::set('SESSION.olgustate', 1);
//F3::set('SESSION.cevap', array());
//print_r(F3::get('SESSION.cevap'));
if (! F3::get('SESSION.olgustate')){
	F3::set('SESSION.cevap', array());
	F3::set('SESSION.olgustate', 1);
}

render('olgu', 'Olgu Ekranı');

?>
