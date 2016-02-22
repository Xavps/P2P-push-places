jQuery(document).ready(function($) {

    var position = localStorage.getItem("position");
    $('.gps').html(position);

    $('#continue').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var url = 'http://161.202.225.107/+save';
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
    
    $('.premium').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var url = 'http://161.202.225.107/+save';
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
 
    $('#back').click(function (){
        $('.loading-mask').removeClass('stop-loading');
        var url = 'http://161.202.225.107/+welcome';
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