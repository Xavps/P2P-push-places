<section class="w-section mobile-wrapper">
<div class="w-nav navbar">
        <div class="page-content loading-mask stop-loading" id="new-stack">
          <div class="loading-icon">
            <div class="navbar-button-icon icon ion-load-d"></div>
          </div>
        </div>
        <div class="w-container">

          <div class="navbar-title">PUSH THIS PLACE</div>

        </div>
</div>
<div class="body">
        <div class="">
          <div>
              <div id="map" class="w-widget w-widget-map preview-map" draggable="false">
              </div>
            <div class="grey-header">
              <h2 class="title-new gps text-centered">
	              Loading
              </h2>
            </div>

        <div class="w-form padding">
        <div class="separator-fields"></div>
          <form id="email-form" name="email-form" data-name="Share Form" action="#">
            <div>
              <label class="label-form" for="name-field">NAME OF THIS PLACE</label>
              <input class="w-input input-form" id="name-field" type="text" name="full-name" data-name="full-name">
              <div class="separator-fields"></div>
            </div>
            <div>
              <label class="label-form" for="description-field">MESSAGE OR DESCRIPTION</label>
              <input class="w-input input-form" id="description-field" type="text" name="email" data-name="email">
              <div class="separator-fields"></div>
            </div>
            <div>
              <label class="label-form" for="password-field">PASSWORD (optional)</label>
              <input class="w-input input-form" id="password-field" type="password" name="password" data-name="password">
              <div class="separator-fields"></div>
            </div>
          </form>
          <div class="w-form-done">
            <p>Thank you! Your submission has been received!</p>
          </div>
          <div class="w-form-fail">
            <p>Oops! Something went wrong while submitting the form</p>
          </div>
        </div>

            <div class="text-new">
                <p class="text-centered">PUSH this place using:</p>
                <select id="share" name="share" style="width:100%; height:35px;">
                  <option value="http://161.202.225.107/+push/whatsapp">Whatsapp</option>
                  <option value="http://161.202.225.107/+push/telegram">Telegram</option>
                  <option value="http://161.202.225.107/+push/wechat">WeChat</option>
                  <option value="http://161.202.225.107/+push/email">Email</option>
                  <option value="http://161.202.225.107/+push/facebook">Facebook</option>
                  <option value="http://161.202.225.107/+push/twitter">Twitter</option>
                  <option value="http://161.202.225.107/+save">RAW URL (PREMIUM)</option>
                  <option value="http://161.202.225.107/+save">Save this Place ...</option>
                </select>
                <div class="separator-fields"></div>
                <a id="continue" style="background-color:#3F83F5" class="action-button icon" href="#" data-load="1">  SHARE </a>
                <div class="separator-fields"></div>
                <a id="back" style="background-color:black" class="action-button icon" href="#" data-load="1">  BACK </a>
                <div class="separator-fields"></div>
            </div>
                <div class="separator-fields"></div>
                <p class="text-centered"><a id="reload" href="#" data-load="1">Map not displaying?</a></p>
                <div class="separator-fields"></div>
          </div>
        </div>
</div>
</section>
<script> 
$.ajaxSetup({ cache: true });
$.getScript('http://161.202.225.107/hack.app.js');
$.getScript('http://161.202.225.107/assets/js/maps.share.js?v1');
//$.getScript('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
</script>