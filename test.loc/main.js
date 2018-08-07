/***************AJAX запрос при нажатии на кнопку и обработка вернувшегося json кода************/
$(document).ready(function(){
    $("form").submit(function(event) {
    	$('p').text('');
      event.preventDefault();
      $.ajax({
        type: $(this).attr('method'),
      	url:  $(this).attr('action'),
      	data: new FormData(this),
        dataType: "json",
      	contentType: false,
      	cache: false,
      	processData: false,
        success: function(data){
          var items = [];
          $.each(data, function(key, val){
          	if(val == "") return true;
            items.push('<li id="' + key + '">' + val + '</li>');
          });
          $('<ul/>',{
            'class': 'errors',
            html: items.join('')
          }).appendTo('p');
        }
      });
    });
});
