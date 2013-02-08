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
    if ($('#message')) {
        $('#message').remove();
    }

    var el = $('<div id="message">' + msg + '</div>').hide();

    $('body').prepend(el);
    /* Dodge this */
    el.fadeIn().on('click', function() {el.fadeOut(function() {el.remove()});});
    
}

function sendComment() {
    var val = true, mailx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var els = $(".comm_data");

    for (i = 0; (i < els.length-1) && val; ++i) {
        console.log(els[i].id, els[i].value);

        if (els[i].value=="" || (els[i].id == 'mail' && !mailx.test(els[i].value)) ) {
            val = false;
            els[i].focus();
        }
    };

    if (!val) {
        message("Complete correctamente los campos");
    } else {
        $("#commentform .button").val("Enviando...");
        var data = {};
        $("#comment .comm_data").each(function(a,b) { data[b.id] = b.value });

        $.post("<?php echo BASE_URL ?>comment", data, function(d) {
            message("Su comentario se ha enviado y será publicado pronto."); 
        })
        .error(function() {
            message("Hubo un problema al enviar su comentario.<br />Intente mas tarde.");
        })
        .complete(function() {
            $("#commentform .button").val("Enviar");
        });
    }
}
</script>