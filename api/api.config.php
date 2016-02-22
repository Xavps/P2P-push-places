<?php
// This file controls the API interaction :)
$viewID = array(
    'welcome' => array('title'=>'PUSH TO START','url'=>'/#welcome','filename'=>'_views/view.welcome.php'),
    'share' => array('title'=>'SHARE THIS PLACE','url'=>'/#share','filename'=>'_views/view.share.php'),
    'push' => array('title'=>'PUSH PLACE','url'=>'/#push','filename'=>'_views/view.push.php'),
    'encrypt' => array('title'=>'ENCRYPT PUSH','url'=>'/#encrypt','filename'=>'_views/code.encrypt.php', 'include' => true),
    'decrypt' => array('title'=>'ENCRYPT PUSH','url'=>'/#decrypt','filename'=>'_views/code.decrypt.php', 'include' => true),
    'browse' => array('title'=>'BROWSE AROUND YOU','url'=>'/#browse','filename'=>'_views/view.channels.php'),
    'music' => array('title'=>'MUSIC AROUND YOU','url'=>'/#music','filename'=>'_views/view.music.php'),
    'people' => array('title'=>'PEOPLE AROUND YOU','url'=>'/#people','filename'=>'_views/view.people.php'),
    'party' => array('title'=>'PARTY AROUND YOU','url'=>'/#party','filename'=>'_views/view.party.php'),
    'hackathon' => array('title'=>'HACKERS AROUND YOU','url'=>'/#hackathon','filename'=>'_views/view.hackathon.php'),
    'save' => array('title'=>'SAVE THIS PLACE','url'=>'/#save','filename'=>'_views/view.premium.php'),
    'about' => array('title'=>'SEARCH CHANNEL #','url'=>'/#channel','filename'=>'_views/view.about.php')
    );

?>