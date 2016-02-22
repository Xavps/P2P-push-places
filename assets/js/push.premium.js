jQuery(document).ready(function($) {

    $('#continue').click(function (){
        var xID = $('#share').val();
        $('.loading-mask').removeClass('stop-loading');
		var redirect = 'https://www.paypal.com/cgi-bin/wapapp';
		var args = {cmd: '_s-xclick', hosted_button_id: xID};
        var form = '';

        $.each( args, function( key, value ) {
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });

        setTimeout(function(){
            $('<form action="'+redirect+'" method="POST" target="_top">'+form+'</form>').submit();
        }, 999);

        return false;
    });

    $('#back').click(function (){
        var url = 'http://161.202.225.107/+welcome';
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