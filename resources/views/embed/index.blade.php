<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $name }} | {{ config('app.name') }}</title>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/js/artplayer.js') }}"></script>
    <script src="{{ asset('/js/artplayer-plugin-ads.js') }}"></script>
    <script src="{{ asset('/js/hls.min.js') }}"></script>
    <style>
        .artplayer {
            height: 100%;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            overflow: hidden;
            background-color: #000;
            object-fit: fill;
            align-items: center;
            justify-content: center;
        }
        .artplayer-app {
            height: 100%;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="artplayer">
        <div class="artplayer-app"></div>
    </div>

    <script type="text/javascript">
        var art = new Artplayer({
            container: '.artplayer-app',
            url: '{{ $url }}',
            title: '{{ $name }}',
            poster: '{{ $poster }}',
            volume: 0.5,
            autoplay: true,
            pip: true,
            autoSize: false,
            autoMini: true,
            screenshot: true,
            setting: true,
            loop: true,
            flip: true,
            playbackRate: true,
            aspectRatio: true,
            fullscreen: true,
            fullscreenWeb: false,
            miniProgressBar: true,
            backdrop: true,
            autoPlayback: true,
            airplay: true,
            theme: '#23ade5',
            lang: navigator.language.toLowerCase(),
            whitelist: ['*'],
            moreVideoAttr: {
                crossOrigin: 'anonymous',
            },
            contextmenu: [
                {
                    html: 'Custom menu',
                    click: function (contextmenu) {
                        console.info('You clicked on the custom menu');
                        contextmenu.show = false;
                    },
                },
            ],
            icons: {
                loading: '<img src="{{ asset("/image/ploading.gif") }}">',
                state: '<img width="150" heigth="150" src="{{ asset("/image/state.svg") }}">',
                indicator: '<img width="16" heigth="16" src="{{ asset("/image/indicator.svg") }}">',
            },
            customType: {
                m3u8: function (video, url) {
                    if (Hls.isSupported()) {
                        const hls = new Hls();
                        hls.loadSource(url);
                        hls.attachMedia(video);
                    } else {
                        const canPlay = video.canPlayType('application/vnd.apple.mpegurl');
                        if (canPlay === 'probably' || canPlay == 'maybe') {
                            video.src = url;
                        } else {
                            art.notice.show = 'Does not support playback of m3u8';
                        }
                    }
                },
            },
            plugins: [
                artplayerPluginAds({
                    video: 'https://bf.333xbet.com/18881999/video888.mp4',
                    url: 'https://i9bet.net',
                    playDuration: 5,
                    totalDuration: 20,
                    muted: false,
                    i18n: {
                        close: 'Bỏ qua quảng cáo >>',
                        countdown: 'Kết thúc sau %s giây',
                        detail: 'Chi tiết',
                        canBeClosed: 'Bỏ qua quảng cáo sau %s giây',
                    },
                }),
            ],
        });
    </script>
</body>
</html>