(function($) {
    $(document).ready(function () {
        $.LoadingOverlaySetup({
            background      : 'rgba(0, 0, 0, 0.5)',
            image           : base_url+'img/refresh.svg',
            imageAnimation  : '3.5s rotate_right',
            imageColor      : '#7928ca'
        });
    });
})(jQuery);
