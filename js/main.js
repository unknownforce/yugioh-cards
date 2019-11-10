(function ($) {

    'use strict';

    $(document).ready(function () {

        // Init here.
        var $body = $('body'),
            $main = $('#main'),
            $site = $('html, body'),
            transition = 'fade',
            smoothState;

        smoothState = $main.smoothState({
            onBefore: function($anchor, $container) {
                var current = $('[data-viewport]').first().data('viewport'),
                    target = $anchor.data('target');
                current = current ? current : 0;
                target = target ? target : 0;
                if (current === target) {
                    transition = 'moveup';
                } else if (current < target) {
                    transition = 'movedown';
                } else {
                    transition = 'moveup';
                }
            },
            onStart: {
                duration: 400,
                render: function (url, $container) {
                    $main.attr('data-transition', transition);
                    //$main.addClass('is-exiting');
                    $site.animate({scrollTop: 0});
                }
            },
            onReady: {
                duration: 0,
                render: function ($container, $newContent) {
                    $container.html($newContent);
                   // $container.removeClass('is-exiting');
                }
            },
            debug:false,
        }).data('smoothState');

    });

}(jQuery));