<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  </head>
<body>
  <div id="dialog-form" title="Create new user">
           <p class="validateTips">All form fields are required.</p>
           <form>
          <fieldset>
          <label for="name">Name</label>
           <input type="text" name="name" id="name" class="text">
           <label for="email">Email</label>
          <input type="text" name="email" id="email" value="" class="text">
          <label for="password">Password</label>
           <input type="password" name="password" id="password" value="" class="text">
         </fieldset>
         </form>
        </div>
        <button id="create-user">Create new user</button></body>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
                <script>
                $( "#dialog-form" ).dialog( "open" );
                  $( "#create-user" ).button().click(function() {

                  $( "#dialog-form" ).dialog( "open" );

                    });
                 });
       </script>

</html>
