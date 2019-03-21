<!DOCTYPE html>
<html>
<head>
    <title>Database error page</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> 
   <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>

<!-- the body section -->
<body>
<section class="error-container">
    <header><h1 class="text-danger">We have a problem!</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <div class="wrapper">

            <!-- BEGIN notify -->

            <!-- END notify -->




            <div id="content">
                <div class="wrapper">

                    <!-- BEGIN notify -->

                    <!-- END notify -->




                    <pre style="line-height: 1.25; white-space: pre;">
            \          SORRY            /
             \                         /
              \    This page does     /
               ]   not exist yet.    [    ,'|
               ]                     [   /  |
               ]___               ___[ ,'   |
               ]  ]\             /[  [ |:   |
               ]  ] \           / [  [ |:   |
               ]  ]  ]         [  [  [ |:   |
               ]  ]  ]__     __[  [  [ |:   |
               ]  ]  ] ]\ _ /[ [  [  [ |:   |
               ]  ]  ] ] (#) [ [  [  [ :===='
               ]  ]  ]_].nHn.[_[  [  [
               ]  ]  ]  HHHHH. [  [  [
               ]  ] /   `HH("N  \ [  [
               ]__]/     HHH  "  \[__[
               ]         NNN         [
               ]         N/"         [
               ]         N H         [
              /          N            \
             /           q,            \
            /                           \
                    </pre>


                </div>
            </div>


        </div>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        
    </footer>
</section>
</body>
</html>