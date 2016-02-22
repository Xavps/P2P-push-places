
jQuery(document).ready(function($) {
    var DATA = localStorage.getItem('share');
    DATA = JSON.parse(DATA);
    console.log(DATA);
    
    $('.title').html(DATA.meta.name);
    $('.desc').html(DATA.meta.desc);
    $('.gps').html(DATA.latLng);
    
    var coords = DATA.latLng.split(',');
    coords = {lat: parseFloat(coords[0]), lng: parseFloat(coords[1])};
    console.log(coords);
        // Map instance
    var map = new google.maps.Map(document.getElementById('map'), {
      center: coords,
      zoom: 17,
      maxZoom: 18,
      mapTypeControl: false,
      panControl: false,
      streetViewControl: false,
      scrollwheel: false,
      draggable: false,
      zoomControl: false,
      mapTypeId: 'roadmap'
    });

    var marker = new google.maps.Marker({
        position: coords,
        map: map
    });

    map.addListener('center_changed', function() {
        var bool = $('#map').attr('draggable');
        if( bool == 'true')
        window.setTimeout(function() {
        var newPosition = map.getCenter();
        marker.setPosition(newPosition);
        var currentLocation = newPosition.lat().toFixed(6) + ',' + newPosition.lng().toFixed(6);
        $('.gps').html(currentLocation);
        localStorage.setItem('position',currentLocation);
        }, 333);
    });

    encryptData ( DATA );

    function encryptData ( DATA ){
        var endPoint = "http://161.202.225.107/+encrypt/";
        $.post(endPoint, DATA).done(function (data) {
            setTimeout(function(){
                data = JSON.parse(data);
                    if( data.success == 'true' ){
                        $('.loading-mask').removeClass('stop-loading');
                        window.scrollTo(0,0);
                        document.title = data.title;
                        window.history.pushState({"html":data.body,"pageTitle":data.title},"",data.url);
                        $("body").html(data.body);
                        $(".loading").html(data.h2);
                    }else{
                        alert(data.error);
                    }
                    

                    
            },1000);
        });
    }

    $('#continue').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var channel = $('#share').val();
        var location = localStorage.getItem('position');
        var meta = {};
        meta.name = $('#name-field').val();
        meta.desc = $('#description-field').val();
        meta.pass = $('#password-field').val();
        var dataPost = {};
        dataPost.latLng = location;
        dataPost.channel = channel;
        dataPost.meta = meta;
        localStorage.setItem('share', JSON.stringify(dataPost));
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
        var url = 'http://161.202.225.107/+share';
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

});