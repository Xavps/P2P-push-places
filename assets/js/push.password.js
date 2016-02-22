jQuery(document).ready(function($) {

    $('#confirm').click(function (){
        var code = $('#password-field').val();
        var URL = JSON.parse(localStorage.getItem('push'));
        $('.loading-mask').removeClass('stop-loading');
        var dataPost = {};
        dataPost.code = code;
        $.post(URL, dataPost).done(function (data) {
            setTimeout(function(){
                data = JSON.parse(data);
                    $('.loading-mask').removeClass('stop-loading');
                    document.title = data.title;
                    window.history.pushState({"html":data.body,"pageTitle":data.title},"",data.url);
                    $("body").html(data.body);
                    window.scrollTo(0,0);

                    localStorage.setItem('push', JSON.stringify(data.push));
                    console.log(data.push);

                    if(data.error == 'true'){
                        $('.w-form-fail').show();
                    }

            },1);
            });
        return false;
    });

    $('#new').click(function (){
        var url = 'http://161.202.225.107/+welcome';
        $('.loading-mask').removeClass('stop-loading');
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