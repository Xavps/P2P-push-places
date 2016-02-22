<?php

$out = array();

$out['title']   = 'ENCRYPT PUSH';
$out['body']    = '';
$out['h2'] = 'ENCRYPTED';
$out['error']   = 'Device not compatible. Try again from a mobile device.';
$out['success'] = 'true';
$out['url']   = '/#encrypt';


$out['body'] = encryptData ($_POST);
logData($_POST);

function encryptData ( $DATA ){
    $json   = json_encode($DATA, true);
    $key    = ($DATA['meta']['pass'] != '') ? $DATA['meta']['pass'] : 'default/key/for/hackathon';
    $encrypt = my_encrypt($json, $key);

    $schema = getSchema($DATA['channel']);

    $protected = ( $DATA['meta']['pass'] != '' ) ? 'true': 'false';
    $pushLink   = urlencode('http://161.202.225.107/?code='.$protected.'&push='.urlencode(base64_encode($encrypt)) );
    
    if(!$schema){
        $r = '<textarea style="width:100%; text-align:center; height:220px; margin-top:25%;">'.urldecode($pushLink).'</textarea>';
    }else{
        $r = '<iframe src="'.$schema.''.$pushLink.'" style="display:none;"></iframe>';        
    }
    
    return $r;
}

function getSchema ( $channel ){
    
    $schemas = array(
        'http://161.202.225.107/+push/whatsapp' => 'whatsapp://send?text=',
        'http://161.202.225.107/+push/telegram' => 'tg://msg?text=',
        'http://161.202.225.107/+push/wechat'   => 'weixin://msg?text=',
        'http://161.202.225.107/+push/email'    => 'mailto:hackathon@koding.com?subject=Data&body=', // Ya found me
        'http://161.202.225.107/+push/facebook' => 'fb://publish/?text=',
        'http://161.202.225.107/+push/twitter'  => 'twitter://post?message=',
        'http://161.202.225.107/+push/raw'      => false
    );

    return $schemas[ $channel ];
}

function logData ( $DATA ){
date_default_timezone_set('America/LosAngeles');
  $text = json_encode($DATA);
  // open log file
  $remote = get_client_ip();
  
  $filename = '_logs/push.publi.log.txt';
  $fh = fopen($filename, "a") or die("Could not open log file.");
  fwrite($fh, date("d-m-Y, H:i:s")." - $remote - $text\n") or die("Could not write file!");
  fclose($fh);

return '';
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipadd = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipadd = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipadd = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipadd = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipadd = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipadd = getenv('REMOTE_ADDR');
    else
        $ipadd = 'UNKNOWN';
    return $ipadd;
}

function my_encrypt($string,$key) {
    srand((double) microtime() * 1000000);
    $key = md5($key);
    $td = mcrypt_module_open('des', '','cfb', '');
    $key = substr($key, 0, mcrypt_enc_get_key_size($td));
    $iv_size = mcrypt_enc_get_iv_size($td);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    if (mcrypt_generic_init($td, $key, $iv) != -1) {
        $c_t = mcrypt_generic($td, $string);
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $c_t = $iv.$c_t;
        return $c_t;
    }
}

die(json_encode($out, true));

?>