<?php
// My own cool Backend-asa-Service 

$apiDemo = array(
    'title' => 'Loaded by AJAX',
    'url' => '/+welcome',
    'body' => '

<div id="container" xavps-splash="4987" xavps-redirect="http://161.202.225.107/api/" class="xavps-content">
  <div id="main" role="main" class="hellobox">
    <header><a href="http://koding.com">Koding.com</a></header>
    <h1>WELCOME WORLD!</h1>
    <h2>From @XAVPS</h2>
  </div>
  <footer>
    <h4>This is an example page running plain HTML on your Koding Virtual Machine (VM). This web page is being served by the apache web server.</h4>
	<p>
	To learn more about how we have
	configured the apache, you should <a href="https://koding.com/docs/where-is-my-web-server-root" target=_blank>read this simple guide</a>.
	</p>
	<p>
	You can create your own simple HTML/web page "Hello World" either by changing this file (index.html) or by adding a new file in the
	"Web" directory found inside the home directory of your user account on the VM (/home/your_username/Web).
	<p>
		Also visit our <a href="https://koding.com/docs" target=_blank>Koding Documentation</a> for a ton of interesting content on how you can do amazing things with Koding!
	</p>
    <p id="social"><a id="twitter" href="https://twitter.com/koding" target=_blank>Twitter</a><a id="facebook" href="https://facebook.com/koding" target=_blank>Facebook</a></p>
  </footer>
    
    '
    );

die(json_encode($apiDemo, true));

?>