function playActive(){
    jQuery('.play-box img').click(function() {
        jwplayer('player').setup({
            'id': 'player',
            'width': '378',
            'height': '275',
            'image': 'images/2-layers.png',
            'provider': 'rtmp',
            'streamer': 'rtmp://blackseatv.cdnvideo.ru/blackseatv',
            'file': 'blackseatv.sdp',
            'src': 'http://www.aloha.cdnvideo.ru/aloha/jwplayer/mediaplayer-viral/player-viral.swf',
            'autoplay': 'true',
            'modes': [
                {type: 'flash', src: 'http://www.aloha.cdnvideo.ru/aloha/jwplayer/mediaplayer-viral/player-viral.swf'},
                {
                    type: 'html5',
                    config: {
                        'file': 'http://blackseatv.cdnvideo.ru/blackseatv/blackseatv.sdp/playlist.m3u8',
                        'provider': 'video'
                    }
                }
            ]
        })
    })
}

playActive();