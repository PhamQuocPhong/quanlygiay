  

       var getURL = window.location + '/get' ;

       // FILTER TO PIRCE

        for (var i = 1; i <= $("#filter-to-price li").length; i++) {
                $('.to' + i).click(function(e){

                    $( this ).parent().find( 'li.active' ).removeClass( 'active' );
                    $( this ).addClass( 'active' );


                    for (var i = 1; i <= $(".box-producer input").length; i++) {
                        $('#trademark' + i).prop('checked', false);
                    }

                     var el = this.value;


                    e.preventDefault();
                     $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });


                     $.ajax({
                            url: getURL,
                            method: 'get',
                            data: {
                               require: el

                            },
                            success: function(result){
                               $('.result-filter').show();
                               $('.result-filter').html(result);
                   
                            }
                        });
                 });
           }  
  
        // FILTER TO THUONG HIEU

        for (var i = 1; i <= $(".box-producer input").length; i++) {
           $('#trademark' + i).change(function(e){


              $(' #filter-to-price li').parent().find( 'li.active' ).removeClass( 'active' );

              var el = this.value;

               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });


               $.ajax({
                      url: getURL,
                      method: 'get',
                      data: {
                         require: el

                      },
                      success: function(result){
                         $('.result-filter').show();
                         $('.result-filter').html(result);
             
                      }
                  });
            });
        }

        // FILTER TO SELECT OPTION

         $('.filter-price').change(function(e){


              $('.filter-price').children();

              var el = this.value;

               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });


               $.ajax({
                      url: getURL,
                      method: 'get',
                      data: {
                         require: el

                      },
                      success: function(result){
                         $('.result-filter').show();
                         $('.result-filter').html(result);
             
                      }
                  });
          });
