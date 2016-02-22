/**
    * ----------------------------------------------
    * Code HERE - Enjoy!
    * ----------------------------------------------
*/
document.addEventListener("touchstart", function(){}, true);
$(function() {
    var xavpsSplash = $('.xavps-content').attr('xavps-splash');
    var xavpsRedirect = $('.xavps-content').attr('xavps-redirect');
    var xavpsDecrypt = $('.xavps-content').attr('xavps-decrypt');
    //console.log($('.xavps-content'));
    if(xavpsSplash>0){
        // stop loader
        // xavps-redirect
        setTimeout(function() {
            // start loader
            $.get(xavpsRedirect, function(data){
                data = JSON.parse(data);
                //console.log(data);
                setTimeout(function(){
                    $('.loading-mask').removeClass('stop-loading');
                    document.title = data.title;
                    window.history.pushState({"html":data.body,"pageTitle":data.title},"",data.url);
                    $("body").html(data.body);
                    window.scrollTo(0,0);
                    
                    if(xavpsDecrypt == 'true'){
                        localStorage.setItem('push', JSON.stringify(data.push));
                        console.log(data.push);
                    }
                    
                }, 1);
            });
        }, xavpsSplash);
    }
    
});