$(document).ready(function() {

 // By class
    var table = $('#responsive').DataTable({
       'aoColumnDefs': [{
           'bSortable': false,
           'aTargets': 'nosort'
        }]
    });
})

function cancelFullScreen(el) {
    var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el.exitFullscreen;
    if (requestMethod) { // cancel full screen.
        requestMethod.call(el);
    } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript !== null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function requestFullScreen(el) {
    var el = document.documentElement,
        rfs = // for newer Webkit and Firefox
        el.requestFullScreen ||
        el.webkitRequestFullScreen ||
        el.mozRequestFullScreen ||
        el.msRequestFullscreen;
    if (typeof rfs != "undefined" && rfs) {
        rfs.call(el);
    } else if (typeof window.ActiveXObject != "undefined") {
        // for Internet Explorer
        var wscript = new ActiveXObject("WScript.Shell");
        if (wscript != null) {
            wscript.SendKeys("{F11}");
        }
    }
}

function toggleFull() {
    var elem = document.body; // Make the body go full screen.
    var isInFullScreen = (document.fullScreenElement && document.fullScreenElement !== null) || (document.mozFullScreen || document.webkitIsFullScreen);

    if (isInFullScreen) {
        cancelFullScreen(document);
    } else {
        requestFullScreen(elem);
    }
    return false;
}

$('#btn_reset_pwd').click(function() {
    $('div#profile_reset_pwd').show();
    $('div#profile_info').hide();
});

$('#btn_back_pro').click(function() {
    $('div#profile_reset_pwd').hide();
    $('div#profile_info').show();
});

$('#add_category_btn').click(function() {
    $('.content_form').show();
    $('#add_category_form').show();
    $('#edit_category_form').hide();
});

$('.edit_category_btn').click(function() {
    $('.content_form').show();
    $('#add_category_form').hide();
    $('#edit_category_form').show();
});

$('.close_form').click(function() {
    $('.content_form').hide();
});

$('.show_more').click(function() {
    $(this).hide();
    $(this).next().show();
    $(this).next().next().show();
})

$('.show_less').click(function() {
    $(this).hide();
    $(this).prev().hide();
    $(this).prev().prev().show();
})