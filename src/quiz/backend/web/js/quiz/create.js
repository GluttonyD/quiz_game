var section_list;
var question_list;
var section_count = 0;

$(document).ready(function () {
    getLists();

    $(document).on('click', '#add-section', function (e) {
        e.preventDefault();
        section_count++;
        var i = 0;
        var input = '';
        var select_id = 'quiz-section-' + section_count
        input += '<div id="section-' + section_count + '" class="row">';
        input += '<div class="form-group col-md-9">';
        input += '<label for="quiz-section">Название раздела</label>';
        input += '<select  id="' + select_id + '" class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="QuizForm[sections][' + section_count + ']">';
        for (i = 0; i < section_list.length; i++) {
            input += '<option value="' + section_list[i]['id'] + '">' + section_list[i]['name'] + '</option>'
        }
        input += '</select>';
        input += '</div>';
        input += '<div class="form-group col-md-3">';
        input += '<label for="test-question-count">Количество</label>';
        input += '<input type="text" id="section-question-'+section_count+'" class="section-question-count form-control" data-section="'+section_count+'" value="">';
        input += '</div>';
        input += '</div>';
        $('.section-list').append(input);
        $('#' + select_id).select2();
    });
    $(document).on('click', '#remove-section', function (e) {
        e.preventDefault();
        if (section_count > 0) {
            var section_id = '#section-' + section_count;
            $(section_id).remove(section_id);
            section_count--;
        }
    });

    $(document).on('change','.section-question-count',function (e) {
        e.preventDefault();
        var section_id='#quiz-section-'+$('#'+e.target.id).data('section');
        console.log($(section_id).text());
        var questions='<div class="row">';
        questions+='<div class="col-md-4">';
        questions+='<div class="box box-success">';
        questions+='<div class="box-header with-border">';
        questions+='<h3 class="box-title">Вопросы блока '+$(section_id).text()+'</h3';
        for(var i=0;i<$('#'+e.target.id).val();i++){
            questions+=
        }
        questions+='</div>';
        questions+='</div>';
        questions+='</div>';

        $('.quiz-question-list').append(questions);
    });

});

function getLists() {
    $.ajax({
        url: '/quiz/get-lists', // Url to which the request is send
        type: "GET",             // Type of request to be send, called as method
        data: {}, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: true,
        dataType: 'json',// To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            section_list = data['sections'];
            question_list = data['questions'];
            console.log(section_list);
        }
    });
}