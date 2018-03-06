$(document).ready(function () {
    $('body').on('submit','form[data-ajax="true"]',function(e) {
        e.preventDefault();
        var $response = $(this).attr('data-response');
        $.ajax({
            url:  $(this).attr('action'),
            method: $(this).attr('method'),
            data:$(this).serialize(),
            datatype: 'json',
            beforeSend: function (data) {
                $('#progress').show();
            },
            error: function (data) {
                console.log(data)
            },
            complete:function (data) {
                // affichage du response et suppression du barre de progresse
                $($response).html(data.responseText)
                $('#progress').hide();
                $('#user-agent').remove();
            }
        })

    });

    if($('#url').length){
        ready();
    }
    function ready() {
        var url = $.trim($('#data').text());
        if(url === document.domain){
            url = '/'
        }
        url = url.replace(document.domain,'');
        url = url.replace(/\+/gi,'/');
        $.ajax({
            url: url,
            method: 'GET',
            data:{'ajax':'true'},
            datatype: 'json',
            beforeSend: function (data) {
                $('#progress').show();
            },
            complete:function (data) {
                // affichage du response et suppression du barre de progresse
                $('#data').html(data.responseText)
                var $title = $.trim($('#title-page').text());
                var newUrl = $.trim($('#url-current').text());
                history.replaceState({id: $title}, $title, newUrl);
                document.title = $title;
                $('#user-agent').remove();
                $('#progress').hide();
            }
        })
    }



    var DOM = {"ar":{},"fr":{}};

    /**
     * change Current href with #
     */
    function currentUrl(){
        if(!$("a[data-title="+document.title+"]").length){
            alert('ok')
        }
    }

    /**
     * change href # with his url
     */
    function prevUrl() {
        var $name = window.location;
        $("a[href='#']").attr('href',$name);
    }

    /**
     * loaded data with ajax
     * @param $url
     * @param $type
     * @param $response
     * @param $title
     */
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
                $('#user-agent').remove();
            }
        })
    }

    /**
     * get history pages requested if exist else progress bar
     * @param $key
     */
    function temporary($key) {
        addDom();
        var $lang = $("html").attr('lang');
        var dom = getDom($key,$lang);
        if(dom){
            $('#data').html(dom);
        }
        else{
            $('#progress').show();
        }
    }

    /**
     * add content page in DOM var
     */
    function addDom() {
        var lang = $("html").attr('lang');
        var key = document.title;
        var $value = $('#data').html();
        DOM[lang][key] = $value;
    }

    /**
     * get content page from DOM if exist
     * @param key
     * @param lang
     * @returns {*}
     */
    function getDom(key, lang) {
        if (key in DOM[lang]){
            return DOM[lang][key];
        }else{
            return false;
        }
    }

    /**
     * change current url in first time
     */
   // currentUrl();
    /**
     * navigation with ajax
     */
    $('body').on('click','a',function (e) {
        var $url = $(this).attr('href');
        var $nav = $(this).attr('data-navigation');
        var $response = '#data';
        var $type = 'GET';
        var $title = $(this).attr('data-title');
        if($url !== '#' && $nav && $response && $type){
            e.preventDefault();
            prevUrl()
            loadContent($url,$type,$response,$title);
            history.pushState({id: $title}, $title, $url);
            document.title = $title;
            currentUrl();
        }
    });
    /**
     * get history content
     */
    $(window).on("popstate", function() {
        var $url = location.href;
        var $type = 'GET';
        var $title = document.title;
        var $response = '#data';
        loadContent($url,$type,$response,$title);
    });

    /*
    $.getScript( "../js/test.js" )
        .done(function( script, textStatus ) {
            console.log( textStatus );
        })
        .fail(function( jqxhr, settings, exception ) {
            $( "body" ).text( exception );
        });
    */
});