$('document').ready(function(){
	
	APP_URL = 'http://localhost/fejro/';
	
	/* ====================================================================== */
    /**
     * This function is used for handle loading images.
     */
    $('body').on('click', '.save-img-loading', function () {
        $.blockUI();
    });
})