(function( $ ) 
{
    $.fn.qrcode = function(options)
    {
        var settings =
        {
            baseURI: 'http://api.qrserver.com/v1/create-qr-code/?data=',
            data: window.location.href,
            size: '125x125',
            linkBack: true,
            css: { 'margin':'5px' }
        }
        settings = $.extend({},settings,options);
        return this.each(function()
        {
            $(this).html( '<img>' )
            .find('img').attr('src',settings.baseURI + encodeURIComponent(settings.data) + '&size=' + settings.size)
            .css(settings.css).filter(function() { return settings.linkBack; })
            .wrap( '<a href="' + settings.source + '" style="text-decoration:none;"></a>' );
        });
    };
})( jQuery );