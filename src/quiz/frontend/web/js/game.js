var user;
var token;
var timestamp;
var centrifuge;
var current_question=0;
var remote_signal=0;


$(document).ready(function () {
    $('#results-modal').modal('show');
    $('#final-modal').modal('hide');
    $('#rules-modal').modal('show');
    $('#rules-modal').on('hide.bs.modal',function (e) {
        if(!remote_signal){
            e.preventDefault();
        }
    });
    $('#final-modal').on('hide.bs.modal',function (e) {
        if(!remote_signal){
            e.preventDefault();
        }
    });
    $('#results-modal').on('hide.bs.modal',function (e) {
        if(!remote_signal){
            e.preventDefault();
        }
    });
    getParams();
    $(document).on('submit','form#game-form',function (e) {
        e.preventDefault();
        var form = $('form#game-form');
        var data = new FormData(this);
        $.ajax({
            url: '/game/results', // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data:new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,
            dataType:'json',// To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                console.log(data);
            }
        });
    });
});
function getParams() {
    $.ajax({
        url: '/centrifuge/connect', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
            user = String(data['user']);
            token = data['token'];
            timestamp = String(data['timestamp']);
            setConnect();

        }
    });
}

function setConnect() {
    centrifuge = new Centrifuge({
        url: 'https://centrifugo.tracking.elo-group.com/connection/websocket',
        user: user, //1
        timestamp: timestamp, //1540974799
        token: token,
    });
    centrifuge.subscribe("next-question", function (message) {
        $('#results-modal').modal('show');
        console.log(message);
        var question='#question-'+current_question;
        var back=$(question).data('background');
        console.log($(question).data('background'));
        $('.modal-picture').css('background-image',back);
        $('.modal-section-name').text('Тур "'+$(question).data('section')+'"');
        $(question).css('display','none');
        current_question++;
        question='#question-'+current_question;
        $('.modal-section-name').text('Тур "'+$(question).data('section')+'"');
        $(question).css('display','block');
        $('.question-number').text('Вопрос №'+(current_question+1));
    });
    centrifuge.subscribe("send-answers", function (message) {
        $('#send-answers').click();
    });
    centrifuge.subscribe("close-modal", function (message) {
        remote_signal=1;
        $('#results-modal').modal('hide');
        remote_signal=0;
    });
    centrifuge.subscribe("quiz-final", function (message) {
        $('#final-modal').modal('show');
    });
    centrifuge.subscribe("show-rules", function (message) {
        $('#rules-modal').modal('show');
        console.log(message);
        var rules='';
        rules+='<p>Правила тура"'+message['data']['section_name']+'"';
        rules+='<p>'+message['data']['section_rules']+'</p>';
        var tmp='url(/'+message['data']['section_background']+')';
        $('.modal-picture').css('background-image',tmp);
        $('.section-rules').html(rules);
    });
    centrifuge.subscribe("close-rules", function (message) {
        remote_signal=1;
        $('#rules-modal').modal('hide');
        remote_signal=0;
    });

    centrifuge.connect();
}

function sendAnswers() {
    var form = $('form#game-form');
    var data = new FormData(form);
    $.ajax({
        url: '/test/create', // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data:new FormData(form), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,
        dataType:'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}