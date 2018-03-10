<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Display month &amp; year menus</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>
</head>

</html>

<?php
echo strtotime("11/08/2017 11:24:00AM").'<br>';
echo strtotime("11/08/2017 11:24:00PM").'<br>';
echo strtotime("11/08/2017 11:24").'<br>';
echo strtotime("11/08/2017 23:24").'<br>';
echo time().'<br>';
$fromtime=$_GET['fromtime'];
$fromdate=$_GET['fromdate'];
$totime=$_GET['totime'];
$todate=$_GET['todate'];
                                               //echo $fromtime;
$fromtimedate=strtotime($fromdate.' '.$fromtime);
$totimedate=date("m/d/y G:i:A<br>", $totime.$todate);
echo $fromtimedate;
//12:59 11/08/2017
echo getdate().'<br>';
print date("m/d/y G:i:A<br>", 1510616290).'<br>';
$date_array = getdate();
foreach ( $date_array as $key => $val )
{
print "$key = $val<br />";
}
?>