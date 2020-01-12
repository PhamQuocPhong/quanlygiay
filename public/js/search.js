
$(document).ready(function() {
      $('#search').keyup(function(e){
         e.preventDefault();
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

         var keySearch = this.value;

         var getURL = window.location.origin + '/search' ;

         alert(getURL);

          $.ajax({
                url: getURL,
                method: 'get',
                data: {
                   suggest: keySearch
                },
                success: function(result){
                    $('.table').show();
                    $('.table').html(result);
                }
              }); 

      });

        $('body').click(function(e){
             $('.search .table').hide();
      });
      
});