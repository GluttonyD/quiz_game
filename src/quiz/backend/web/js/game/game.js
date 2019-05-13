var question_count=$('#game-questions').data('count');
var current_question=0;
var current_section_count;
var current_section_id=$('#game-questions').data('first_section');
var offset=0;
var background;

$(document).ready(function () {
    $('#results-modal').modal('hide');
    $('#rules-modal').modal('show');
    $('#rules-modal').on('hide.bs.modal',function (e) {
        $('#results-modal').modal('show');
        closeRules();

    });
    $('#results-modal').on('hide.bs.modal',function (e) {
        sendCloseSignal();
    });
    getSectionCount(current_section_id);
   $(document).on('click','#next-question',function (e) {
      e.preventDefault();
      if(current_question<(current_section_count-1)+offset) {
          $('#results-modal').modal('show');
          $('#question-' + current_question + '').css('display', 'none');
          current_question++;
          $('#question-' + current_question + '').css('display', 'block');
          $('.question-number').text('Вопрос №'+(current_question+1));
          // $('.modal-question-text').text(  $('#question-' + current_question + '').text());
          sendNextQuestion();
      }
      if(current_question==(current_section_count-1)+offset){
          $('#next-question').css('display','none');
          $('#show-section-results').css('display','block');
      }
   });

   $(document).on('click','#show-section-results',function (e) {
       e.preventDefault();
       var next_section='.game-section#'+current_section_id;
       var id=$(next_section).data('next_section');
       if(id) {
           offset += current_section_count;
           getSectionCount(id);
           current_section_id=id;
           $('#next-question').css('display', 'block');
           $('#show-section-results').css('display', 'none');
           $('#question-' + current_question + '').css('display', 'none');
           current_question++;
           $('.question-number').text('Вопрос №'+(current_question+1));
           $('#question-' + current_question + '').css('display', 'block');
           sendNextQuestion();
           $('#rules-modal').modal('show');
           showRules(id);
           showStart();

       }
       else{
           alert('Результаты последнего блока');
           sendAnswers();
           setTimeout(blablabla(),120*1000);
           setTimeout(getResults(),120*1000);
       }
   })
});

function getSectionCount(section_id) {
    $.ajax({
        url: '/game/get-section-count', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data:{section_id:section_id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
            current_section_count=Number(data['count']);
            var tmp='url(/'+data['background']+')';
            $('#game-questions').css('background-image',tmp);
            $('.modal-picture').css('background-image',tmp);
        }
    });
}

function sendNextQuestion() {
    $.ajax({
        url: '/game/next-question', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data:{}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}

function sendCloseSignal() {
    $.ajax({
        url: '/game/close-signal', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data:{}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}

function sendAnswers() {
    $.ajax({
        url: '/game/send-answers', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data:{}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}

function getResults() {
    $.ajax({
        url: '/game/get-results', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data:{}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}

function blablabla() {
    for(var i=0;i<100000;i++){
        var l=1;
    }

}

function showRules(section_id=null) {
    $.ajax({
        url: '/game/show-rules', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data:{section_id:section_id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            if(section_id){
                var rules='';
                rules+='<p>Правила тура"'+data['section_name']+'"';
                rules+='<p>'+data['section_rules']+'</p>';
                $('.section-rules').html(rules);
            }
        }
    });
}

function closeRules(section_id=null) {
    $.ajax({
        url: '/game/close-rules', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data:{section_id:section_id}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}

function showStart() {
    $.ajax({
        url: '/game/show-start', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            console.log(data);
        }
    });
}