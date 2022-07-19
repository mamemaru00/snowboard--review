
 $(function() {
   $('.btn').click(function() {
     var error;
     var error_result = [];
     if( $('#postplace').val() === '' || $('#postsize').val() === '' || $('.postcomment').val() === '') {
         var error = 1;
         error_result.push('全項目必須入力です。');
     }
    })
});
