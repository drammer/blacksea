(function($) {

    $(document).ready(function () {

        $('#myTabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show');
        });

//    FOR LIVE VIDEO

        jQuery('.play-box img').click(function () {
            jwplayer('player').setup({
                'id': 'player',
                'width': '100%',
                'height': '275',
                'image': 'images/2-layers.png',
                'provider': 'rtmp',
                'streamer': 'rtmp://blackseatv.cdnvideo.ru/blackseatv',
                'file': 'blackseatv.sdp',
                'src': 'http://www.aloha.cdnvideo.ru/aloha/jwplayer/mediaplayer-viral/player-viral.swf',
                'autoplay': 'true',
                'modes': [
                    {
                        type: 'flash',
                        src: 'http://www.aloha.cdnvideo.ru/aloha/jwplayer/mediaplayer-viral/player-viral.swf'
                    },
                    {
                        type: 'html5',
                        config: {
                            'file': 'http://blackseatv.cdnvideo.ru/blackseatv/blackseatv.sdp/playlist.m3u8',
                            'provider': 'video',
                            'autostart': 'true',
                        }
                    }
                ]
            })

        });

        //    for modal video
        jQuery('.for-modal-video').click(function (v) {
            var id_video = jQuery(this).attr('data-id');
            jQuery('#modal-video').empty().html('<iframe width="100%" height="100%" src="https://www.youtube.com/embed/' + id_video + '?autoplay=1" frameborder="0" allowfullscreen></iframe>');
        });
        $('body').on('hidden.bs.modal', '.modal', function () {
            $("#modal-video").empty();
        });
        //FOR LIVE VIDEO
        jQuery('.live-button-fixed').toggle(
            function (z) {
                jQuery('#player-mobile').html(
                    '<video width="100%" height="275" poster="/images/players-bg.png" controls="true"><source src="http://blackseatv.cdnvideo.ru/blackseatv/blackseatv.sdp/playlist.m3u8" type="video/mp4"> </video>'
                );
                jQuery('.fixed-live-block').addClass('active');

            }, function (z) {

                jQuery('.fixed-live-block').removeClass('active').setTimeout(function () {
                    jQuery('#player-mobile').empty();
                }, 1500);

            });

    });

})(jQuery);
