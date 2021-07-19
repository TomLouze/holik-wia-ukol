if (typeof wia === 'undefined') {
    var wia = {
        flashMessage: {},
        rectangle: {
            ajaxChangeColorUrl: undefined,
            color: undefined
        }
    };
}



wia.flashMessage.bindEvents = function ($node) {
    // hides flash message after click event
    $node.on('click', function () {
        $node.fadeOut(400, function () {
            $node.remove();
        });
    });
    // hides flash message after 4 seconds
    setTimeout(function () {
        $node.fadeOut(400, function () {
            $node.remove();
        });
    }, 4000);
};



wia.rectangle.changeColor = function () {
    // void
};



////////////////////////////////////////////////////////////////////////////
// Handlers / Listeners / Inits
////////////////////////////////////////////////////////////////////////////
$(function () {
    // bind flashMessages
    if ($('.flash').length > 0) {
        wia.flashMessage.bindEvents($('.flash'));
    }
});


