jQuery(document).ready(function($) {

    window.setTimeout(function() {
        var DATA = JSON.parse(localStorage.getItem('push'));
        localStorage.setItem('position', DATA.latLng);
    $('.title').html(DATA.meta.name);
    $('.desc').html(DATA.meta.desc);
    $('.gps').html(DATA.latLng);
    
    var coords = DATA.latLng.split(',');
    coords = {lat: parseFloat(coords[0]), lng: parseFloat(coords[1])};
    console.log(coords);
        // Map instance
    var map = new google.maps.Map(document.getElementById('map'), {
      center: coords,
      zoom: 16,
      maxZoom: 18,
      mapTypeControl: false,
      panControl: false,
      streetViewControl: false,
      scrollwheel: false,
      draggable: false,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL
      },
      mapTypeId: 'roadmap'
    });

    var marker = new google.maps.Marker({
        position: coords,
        map: map
    });
    
    }, 333);
        
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

    $('#push').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var url = 'http://161.202.225.107/+share';
        //$('.gps').html('Loading Map');
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

    $('#new').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var url = 'http://161.202.225.107/+welcome';
        //$('.gps').html('Loading Map');
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