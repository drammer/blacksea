(function($) {
   $(document).ready(function(){

       $('.wrapp-select select').change(function(){
                   // сам ajax запрос
           $.post(MyAjax.ajaxurl, $('#calendar_filtr').serialize(), function (data) {
               // меняем прелоадер полученными данными
               $('#archive-video-wrapp-content').html(data).animate({height: $('.ajax-archive-video-wrapp').height()+40});

           });
       })
   })
})(jQuery)
