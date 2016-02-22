<?php
// My own cool Backend-asa-Service 
include('api.config.php');

$route = explode('/', $_GET['main_query']);
if(isset( $viewID[$route[0]]) ){
    
    $out = load_response( $viewID[$route[0]] );
}else{
    $out = array(
        'id' => 'NOTFOUND',
        'title' => 'API Route not found',
        'url' => '/#ERROR/NOTFOUND/'.$route[0],
        'body' => '<h1 class="text-centeres">ROUTE NOT FOUND</h1>',
        'filename' => '_views/view.welcome.php');
    die(json_encode($out, true));
}

function load_response ( $obj ){

    $file = $obj['filename'];
    if( isset($obj['include']) && $obj['include'] ){
        include($file);
    }
    $filehandler = file_get_contents($file, "rb") or die("ERROR READING FILE $file");
    $response = $obj;
    unset($response['filename']);
    $response['body'] = $filehandler;
    fclose($filehandler);
    return $response;
}


die(json_encode($out, true));

?>