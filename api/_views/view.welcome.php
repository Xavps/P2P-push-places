<section class="w-section mobile-wrapper">
<div class="w-nav navbar">
        <div class="page-content loading-mask stop-loading" id="new-stack">
          <div class="loading-icon">
            <div class="navbar-button-icon icon ion-load-d"></div>
          </div>
        </div>

        <div class="w-container">

          <div class="navbar-title">CONFIRM YOUR LOCATION</div>

        </div>
</div>
<div class="body">
        <div class="">
          <div>
              <div id="map" class="w-widget w-widget-map hero-map" draggable="true">
              </div>
            <div class="grey-header">
              <h2 class="title-new gps text-centered">
	              Drag the map to change location
              </h2>
            </div>
            <div class="text-new">
                <p class="text-centered">Select one Channel:</p>
                <select id="channel" name="channel" style="width:100%; height:35px;">
                  <option value="http://161.202.225.107/+share">Share this Place ...</option>
                  <option value="http://161.202.225.107/+hackathon">#Hackathon</option>
                  <option value="http://161.202.225.107/+browse">#NearBy</option>
                  <option value="http://161.202.225.107/+music">#Music</option>
<!--                  <option value="http://161.202.225.107/+people">#People</option>
                  <option value="http://161.202.225.107/+party">#Party</option> -->
                  <option value="http://161.202.225.107/+save">Save this Place ...</option>
                </select>
                <div class="separator-fields"></div>
                <p class="text-centered" style="color: #74A3F2;">Now-Trending: #Hackathon</p>
                <div class="separator-fields"></div>
                <a id="continue" style="background-color:black" class="action-button icon" href="#" data-load="1">  CONTINUE</a>
                <div class="separator-fields"></div>
            </div>
                <div class="separator-fields"></div>
                <p class="text-centered"><a id="reload" href="#" data-load="1">Map not displaying?</a></p>
                <div class="separator-fields"></div>
                <div class="separator-fields"></div>
                <p class="text-centered"><a style="color: #F76054;" id="about" href="#" data-load="1">About this Project</a></p>
                <div class="separator-fields"></div>
          </div>
        </div>
</div>
</section>
<script> 
$.ajaxSetup({ cache: true });
$.getScript('http://161.202.225.107/hack.app.js');
$.getScript('http://161.202.225.107/assets/js/maps.confirm.js?v11s');
$.getScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
</script>