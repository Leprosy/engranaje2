var Imagisize = {
    init: function(sel, sizes) {
        var size = $(document).width();

        $(sel + ' img').each(function(a, b) {
            for (var s in sizes) {
                if (size >= sizes[s]) {
                    b.setAttribute('src', b.getAttribute('res-' + sizes[s]));
                }
            }
        });
    }
}