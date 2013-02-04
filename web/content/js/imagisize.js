var Imagisize = {
    sel: false,
    sizes: false,
    init: function(sel, sizes) {
        Imagisize.sel = sel;
        Imagisize.sizes = sizes;
        var size = $(document).width();

        Imagisize.doResize(size);

        $(window).on('resize', function() {
            var size = $(document).width();
            console.log('Imagisize : Size changed to ' + size)
        });

        console.log('Imagisize : library initialized');
    },

    doResize: function(size) {
        $(Imagisize.sel + ' img').each(function(a, b) {
            for (var s in Imagisize.sizes) {
                if (size >= Imagisize.sizes[s]) {
                    var file = b.getAttribute('res-' + Imagisize.sizes[s]);
                    if (file) {
                        b.setAttribute('src', file);
                    }
                }
            }
        });
    }
}