var answers_count=0;

$(document).ready(function () {
   $('.select2').select2();

   $(document).on('change','#question-type',function (e) {
       if($('#question-type').val()=='1'){
           var buttons='<h3 class="box-title">Ответ на вопрос</h3>';
           buttons+='<button class="btn btn-danger btn-flat" id="remove-answer">Убрать ответ</button>';
           buttons+='<button class="btn btn-success btn-flat" id="add-answer">Добавить ответ</button>';
           $('#answer-header').html(buttons);
       }
       if($('#question-type').val()=='2'){
           var header='<h3 class="box-title">Ответ на вопрос</h3>';
           $('#answer-header').html(header);
           var input='<label for="answer-text">Текст ответа</label>';
           input+='<input type="text" class="form-control" id="answer-text" name="QuestionForm[answers]">';
           $('#answer-body').html(input);
       }
   });

   $(document).on('click','#add-answer',function (e) {
       e.preventDefault();
       var input='';
       answers_count++;
       input+='<div id="answer-'+answers_count+'" class="row">';
       input+='<div class="form-group col-md-9">';
       input+='<label for="answer-text">Текст ответа</label>';
       input+='<input id="answer-text" class="form-control" name="QuestionForm[answers]['+answers_count+'][text]">';
       input+='</div>';
       input+='<div class="form-group col-md-3">';
       input+='<label for="right-answer">Правильный?</label>';
       input+='<select id="right-answer" class="form-control select2" name="QuestionForm[answers]['+answers_count+'][is_right]">';
       input+='<option selected="selected" value="1">Да</option>';
       input+='<option value="0">Нет</option>';
       input+='</select>';
       input+='</div>';
       input+='</div>';
       $('#answer-body').append(input);
   });
    $(document).on('click','#remove-answer',function (e) {
        e.preventDefault();
        if(answers_count>0) {
            var answer_id = '#answer-' + answers_count;
            $(answer_id).remove(answer_id);
            answers_count--;
        }
    });
});