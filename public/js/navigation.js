$(document).ready(function () {
    $('body').on('click','a',function (e) {
        var $url = $(this).attr('href');
        var $nav = $(this).attr('data-navigation');
        var $response = $(this).attr('data-response');
        var $type = $(this).attr('data-type');
        var $progress = $('#progress');
        if($url !== '#' && $nav && $response && $type){

            e.preventDefault();
            $.ajax({
                url: $url,
                method: $type,
                datatype: 'json',
                beforeSend: function (data) {
                    $($progress).show();
                },
                progress: function(e) {
                    //make sure we can compute the length
                    if(e.lengthComputable) {
                        //calculate the percentage loaded
                        var pct = (e.loaded / e.total) * 100;

                        //log percentage loaded
                        console.log(pct);
                    }
                    //this usually happens when Content-Length isn't set
                    else {
                        console.warn('Content Length not reported!');
                    }
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
    })
});