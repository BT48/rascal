(function ($) {
    Drupal.behaviors.bt48_custom = {
        attach: function (context, settings) {

            $('.page-title').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href = window.location.href.split("?")[0];
                var parts = location.search.substring(1).split('&');

                for (var x = 0; x < parts.length; x++) {

                    if (parts[x].startsWith('keywords=')) {
                        url = url + "?" + parts[x];
                        window.location.href = url;
                        break
                    }
                }


            });

            $('#title-asc').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href;
                if (url.indexOf('&sort_by=title') == -1) {
                    if (url.indexOf('?keywords=') == -1) {
                        url = url + '?keywords=';
                    }
                    url = url + '&sort_by=title&sort_order=ASC';
                } else {
                    url = url.replace('sort_order=DESC', 'sort_order=ASC');
                }
                window.location.href = url;

            });

            $('#title-desc').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href;
                if (url.indexOf('&sort_by=title') == -1) {
                    if (url.indexOf('?keywords=') == -1) {
                        url = url + '?keywords=';
                    }
                    url = url + '&sort_by=title&sort_order=DESC';
                } else {
                    url = url.replace('sort_order=ASC', 'sort_order=DESC');
                }

                window.location.href = url;

            });

            $('#relevancy').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href;

                if (url.indexOf('&sort_by=title&sort_order=ASC') >= 0) {
                    url = url.replace('&sort_by=title&sort_order=ASC', '');
                } else {
                    if (url.indexOf('&sort_by=title&sort_order=DESC') >= 0) {
                        url = url.replace('&sort_by=title&sort_order=DESC', '');
                    }
                }

                window.location.href = url;
            });

        }
    };
})(jQuery);
