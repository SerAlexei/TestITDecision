$(document).ready(function() {
    $('.number > .number_text').each(function(){
        var title = $(this);
        title.html( title.text().replace(/^(.+?\s)/,'<p>$1</p>') );
    });

    $('.btn-link').on('click', function () {
        let id  = this.parentElement.id;
        if (!$(this).hasClass('clicked')) {
            $('.card').each(function () {
                $('.card-header #triangle-up').removeClass('triangle-right');
                $('.card-header button').removeClass('clicked');
            });
                $('#' + id + ' #triangle-up').addClass('triangle-right');
            $(this).addClass('clicked');
        }else{
            $(this).removeClass('clicked');
            $('#' + id + ' #triangle-up').removeClass('triangle-right');
        }
    })

});