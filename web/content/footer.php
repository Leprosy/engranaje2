<footer>
    <p>©<?php echo date('Y') ?> <strong>Leprosystems.com</strong></p>
    <p>
        <a href="http://twitter.com/leprosy" target="_blank" class="button">Twitter</a>
        <a href="http://github.com/leprosy" target="_blank" class="button">Github</a>
        <a href="#" class="button">Mail</a>
    </p>
</footer>

<script>
function message(msg) {
    var el = $('<div id="message">' + msg + '</div>').hide();
    //el.css('margin-left', $(window).width()/2 - $(el).width()/2);
    
    $('body').prepend(el);
    /* Dodge this */
    el.fadeIn().on('click', function() {el.fadeOut(function() {el.remove()});});
    
}
</script>