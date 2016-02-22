jQuery(document).ready(function($) {

    $('#continue').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var channel = $('#channel').val();
        var location = localStorage.getItem('position');
        var dataPost = {};
        dataPost.latLng = location;
        $.post(channel, dataPost).done(function (data) {
            setTimeout(function(){
                data = JSON.parse(data);
                    $('.loading-mask').removeClass('stop-loading');
                    document.title = data.title;
                    window.history.pushState({"html":data.body,"pageTitle":data.title},"",data.url);
                    $("body").html(data.body);
                    window.scrollTo(0,0);
            },1);
            });
        return false;
    });

    $('#reload').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var url = 'http://161.202.225.107/+welcome';
        $('.gps').html('Loading Map');
            $.get(url, function(data){
                data = JSON.parse(data);
                //console.log(data);
                setTimeout(function(){
                    $('.loading-mask').removeClass('stop-loading');
                    document.title = data.title;
                    window.history.pushState({"html":data.body,"pageTitle":data.title},"",data.url);
                    $("body").html(data.body);
                    window.scrollTo(0,0);
                }, 1);
            });
        return false;
    });

	function success(position) {
    console.log(position);
        // Map instance
    var currentLocation = position.coords.latitude.toFixed(6) + ',' + position.coords.longitude.toFixed(6);
    localStorage.setItem('position',currentLocation);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: position.coords.latitude, lng: position.coords.longitude},
      zoom: 17,
      maxZoom: 18,
      mapTypeControl: false,
      panControl: false,
      streetViewControl: false,
      scrollwheel: true,
      draggable: true,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL
      },
      mapTypeId: 'roadmap'
    });

    var marker = new google.maps.Marker({
        position: {lat: position.coords.latitude, lng: position.coords.longitude},
        map: map
    });

    map.addListener('center_changed', function() {
        window.setTimeout(function() {
        var newPosition = map.getCenter();
        marker.setPosition(newPosition);
        var currentLocation = newPosition.lat().toFixed(6) + ',' + newPosition.lng().toFixed(6);
        $('.gps').html(currentLocation);
        localStorage.setItem('position',currentLocation);
        }, 333);
    });

	}
	
	function error(msg) {
  
	 console.log(msg);

	}

	
	if (navigator.geolocation) {

		navigator.geolocation.getCurrentPosition(success, error)	

	} else {
	  error('not supported');
	}

    $('#about').click(function (){
        var url = 'http://161.202.225.107/+about';
        $('.loading-mask').removeClass('stop-loading');
            $.get(url, function(data){
                data = JSON.parse(data);
                //console.log(data);
                setTimeout(function(){
                    $('.loading-mask').removeClass('stop-loading');
                    document.title = data.title;
                    window.history.pushState({"html":data.body,"pageTitle":data.title},"",data.url);
                    $("body").html(data.body);
                    window.scrollTo(0,0);
                }, 1);
            });
        return false;
    });


});