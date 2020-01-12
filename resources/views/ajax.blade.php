
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
  <meta name="_token" content="{{csrf_token()}}" />
	<title>Shop giay.vn</title>

  <link rel="stylesheet"  href="{{asset('css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/black.css')}}">
  <link rel="stylesheet"  href="{{asset('css/tab-panel.css')}}">
	<link rel="stylesheet"  href="{{asset('font-awesome/css/font-awesome.css')}}">
  <script src="{{asset('js/jquery.min.js')}}"></script> 

	<script type="text/javascript" src="{{asset('js/scrolls.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/jquery.multipurpose_tabcontent.js')}}"></script>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      
    
</head>

<body>
     <div class="container">
         {!! Form::open(array('route' => 'front.fb', 'class' => '')) !!}
          <div>
              <label  class="email">Your name</label>
                  {!! Form::text('name', null, ['class' => 'input-text', 'placeholder'=>"Your name"]) !!}
          </div><div>
              <label  class="email">Your email</label>
                  {!! Form::text('email', null, ['class' => 'input-text', 'placeholder'=>"Your email"]) !!}
          </div>
          <div>
              <label class="email">Comments</label>
                  {!! Form::textarea('comment', null, ['class' => 'tarea', 'rows'=>"5"]) !!}
          </div><div class="send">
              {!! Form::submit('Send', ['class' => 'button']) !!}
          </div>
          {!! Form::close() !!}
      </div>

</body>


      <script type="text/javascript" src="{{asset('js/function.js')}}"></script>
            <script type="text/javascript" src="{{asset('js/search.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/fadein.js')}}"></script>
      <script type="text/javascript" src="{{asset('js/multislider.js')}}"></script>

      <script type="text/javascript">
          $(document).ready(function(){
            $('#ajaxSubmit').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });
               $.ajax({
                  url: "{{ url('/ajax/post') }}",
                  method: 'post',
                  data: {
                     name: $('#name').val(),
                     type: $('#type').val(),
                     price: $('#price').val()
                  },
                  success: function(result){
                     $('.alert').show();
                     $('.alert').html(result.msg);
                  }
                  });
               });
            });
      </script>

   		<script type="text/javascript">    

          /*
             $('#mixedSlider1').multislider({
                duration: 750,
                interval: 3000
             });  

             $('#mixedSlider2').multislider({
                duration: 750,
                interval: 3000
             });    
    */
   			window.onscroll = function() {FixedBar()};

   			var fixed = document.getElementById("headerBar");
   			var sticky = fixed.offsetTop;
   			function FixedBar()
   			{
				  if (window.pageYOffset >= sticky) {
				    fixed.classList.add("sticky")
				  } else {
				    fixed.classList.remove("sticky");
				  }
   			}

   		</script>

  <script type="text/javascript">   
        scroller.init();
  </script>
 <script>window.jQuery || document.write('<script src="{{asset('js/jquery.min.js')}}"><\/script>')</script>

 
</body>

</html>