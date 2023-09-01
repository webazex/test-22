$(document).ready(function (){
    function showReadmyPopup(){
        $('.popups').show(300);
    }
    function hideReadmyPopup(){
        $('.popups').hide(300);
    }
    setTimeout(showReadmyPopup, 600);
    $('.close.btn-close-white').click(function (){
        hideReadmyPopup();
    });
    $('.filters__form').submit(function (e){
        e.preventDefault();
        var data = {
            action: 'filter-estates',
            datafilter: $(this).serializeArray()
        };
        $.ajax({
            type: 'POST',
            url: ajaxpatch.url,
            data: data,
            success: function (response) {
                $('.estates-container__estates').html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(textStatus + ' ' + errorThrown);
            }
        });
    })
});