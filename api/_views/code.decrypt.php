<?php

$out = array();

$token  = $_GET['push'];
$code   = $_GET['code'];

if($code != 'true'){
    $key = 'default/key/for/hackathon';
}else{
    // show popup.
        $file = '_views/view.push.password.php';
        $out = array(
            'title' => '(PRIVATE) PUSH PRO + P2P PLACES',
            'url' => '/#p2p/private',
            'push' => 'http://161.202.225.107/+decrypt?code='.$code.'&push='.urlencode($token).''
            );
    if(!isset($_POST['code'])){
         //die(json_encode($out,true));   
        $filehandler = file_get_contents($file, "rb") or die("ERROR READING FILE $file");
        $out['body'] = $filehandler;
        fclose($filehandler);
            
        die(json_encode($out, true));        
    }
    $key = $_POST['code'];
}

$DATA = my_decrypt (base64_decode($token), $key);

if( is_array(json_decode($DATA, true)) ){
    
    // load push
    $DATA = json_decode($DATA, true);

    $file = '_views/view.push.preview.php';
    $out = array(
        'title' => 'PUSH PRO + P2P PLACES',
        'url' => '/#p2p/',
        'error' => 'false',
        'push' => $DATA
        );
     //die(json_encode($out,true));   
    $filehandler = file_get_contents($file, "rb") or die("ERROR READING FILE $file");
    $out['body'] = $filehandler;
    fclose($filehandler);
        
    die(json_encode($out, true));
}else{
    // push not available
    $filehandler = file_get_contents($file, "rb") or die("ERROR READING FILE $file");
    $out['body'] = $filehandler;
    $out['error'] = 'true';
    fclose($filehandler);
        
    die(json_encode($out, true));        

    $error = array('push-not-available');
    die(json_encode($error, true));
}

//logData($_POST);

function my_decrypt($string,$key) {
    $key = md5($key); 
    $td = mcrypt_module_open('des', '','cfb', '');
    $key = substr($key, 0, mcrypt_enc_get_key_size($td));
    $iv_size = mcrypt_enc_get_iv_size($td);
    $iv = substr($string,0,$iv_size);
    $string = substr($string,$iv_size);
    if (mcrypt_generic_init($td, $key, $iv) != -1) {
        $c_t = mdecrypt_generic($td, $string);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        return $c_t;
    }
}


die(json_encode($DATA, true));

?>