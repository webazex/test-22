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
        let data = {
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
    });
    $('.btn-reset').click(function (){
        let thisForm = $(this).closest('form');
        thisForm.trigger('reset');
        let data = {
            action: 'filter-estates',
            datafilter: {evented: 'reset'}
        }
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
    });
});