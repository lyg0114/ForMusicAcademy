



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <span class = "buttons">Bold button</span>
    <span class = "buttons" id="Italic" >Italic button</span>
    <input id ="res" type="button" value="예약하기"/>

    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript">




		    $("#res").bind("click", function(){

    			//alert("click " + $(this).text());
          alert("씨발!!");

    		});

        $("#res").trigger("click");

    // 		$(".buttons").click( function(){

    // 			alert("click " + $(this).text());

    // 		});


/*
    		$(".buttons").bind("dblclick", function(){

    			alert("double-click " + $(this).text());

    		});

*/

    // 		$(".buttons").dblclick( function(){

    // 			alert("double-click " + $(this).text());

    // 		});






    </script>







     </body>
</html>
