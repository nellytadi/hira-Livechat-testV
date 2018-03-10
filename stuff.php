  
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Dialog - Animation</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#dialog" ).dialog({
        title: 'Detalhes do produto',
            modal: true,
            resizable: false,
            width: 500,
            maxHeight: 400,
            closeText: 'fechar',
            draggable: true,
            aut
            show: 'fade',
            hide: 'fade',
            dialogClass: 'main-dialog-class',
      
    });
 
    $( "#opener" ).on( "click", function() {
      $( "#dialog" ).dialog( "open" );
    });
  } );
  </script>
  <style type="text/css">

      .main-dialog-class .ui-widget-header{background: url("css/blur-1889747_960_720.jpg") repeat-x scroll 34px 42px #a4cf50;font-size:16px;border:0;text-transform:uppercase}
.main-dialog-class .ui-widget-content{background-image:none;background-color:#fff}
 

  </style>
</head>
<body>
 
<div id="dialog" title="Basic dialog">
  <p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the 'x' icon.</p>
</div>
 
<button id="opener">Open Dialog</button>
 
 
</body>
</html>