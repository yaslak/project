$(document).ready(function () {
    var DOM = {"ar":{},"fr":{}};
    function currentUrl(){
        var $name = document.title;
         $("a[data-title="+$name +"]").attr('href','#');
    }
    function prevUrl() {
        var $name = window.location;
        $("a[href='#']").attr('href',$name);
    }
    currentUrl();
    $('body').on('click','a',function (e) {
        e.preventDefault();
        var $url = $(this).attr('href');
        var $nav = $(this).attr('data-navigation');
        var $response = '#data';
        var $type = 'GET';
        var $title = $(this).attr('data-title');
        if($url !== '#' && $nav && $response && $type){
            prevUrl()
            loadContent($url,$type,$response,$title);
            history.pushState({id: $title}, $title, $url);
            document.title = $title;
            currentUrl();
        }
    });
    $(window).on("popstate", function() {
        var $url = location.href;
        var $type = 'GET';
        var $title = document.title;
        var $response = '#data';
        loadContent($url,$type,$response,$title);
    });
    function loadContent($url,$type,$response,$title){
        var $progress = $('#progress');
        $.ajax({
            url: $url,
            method: $type,
            data:{'ajax':'true'},
            datatype: 'json',
            beforeSend: function (data) {
                temporary($title)
            },
            success: function (data) {
                $($response).text('success')
            },
            complete:function (data) {
                // affichage du response et suppression du barre de progresse
                $($response).html(data.responseText)
                $($progress).hide();
            }
        })
    }
    function temporary($key) {
        addDom();
        var $lang = $("html").attr('lang');
        var dom = getDom($key,$lang);
        if(dom){
            $('#data').html(dom);
            alert('old')
        }
        else{
            $('#progress').show();
        }
    }
    function addDom() {
        var lang = $("html").attr('lang');
        var key = document.title;
        var $value = $('#data').html();
        DOM[lang][key] = $value;
    }
    function getDom(key, lang) {
        if (key in DOM[lang]){
            return DOM[lang][key];
        }else{
            return false;
        }
    }
});