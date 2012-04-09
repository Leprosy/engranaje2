/* Messaging */
function message_info(str) {
    var id = new Date().getTime();
    var element = $('<div class="message" id="' + id + '" style="display: none">' + str + '</div>');
    $('#main_content').prepend(element);
    element.fadeIn(function() { setTimeout('$(\'#' + id + '\').fadeOut()', 5000) });
}

function message_error(str) {
    var id = new Date().getTime();
    var element = $('<div class="error" id="' + id + '" style="display: none">' + str + '</div>');
    $('#main_content').prepend(element);
    element.fadeIn(function() { setTimeout('$(\'#' + id + '\').fadeOut()', 5000) });
}