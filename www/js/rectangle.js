document.addEventListener('DOMContentLoaded', () => {
    naja.initialize();
    }
);


$('#change').click(function() {
    var status = 0;
    if ($('#rectangle').hasClass('rectangle--active')) {
        status = 1;
    }
    console.log('Status: ' + status);
    naja.makeRequest('POST', 'testingAjax!', {
        status: 0
    })
});

function switcher() {
    $('#rectangle').toggleClass('rectangle--active');
}