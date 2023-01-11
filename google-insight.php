<?php 
@$url = $_GET['url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Google Insights</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container"><br><br>
  <form action="" method="get">
    <div class="form-group">
      <label for="email">Website:</label>
      <input type="url" class="form-control" value="<?= $url ?>" placeholder="Enter website url" name="url">
    </div>
    <button type="submit" class="btn btn-default">Submit</button><br><br>
  </form>
</div>

</body>
</html>


<?php

if(!empty($url)){
  echo "<pre style='font-weight:bold;'>";
  $curl_handle=curl_init();
  curl_setopt($curl_handle,CURLOPT_URL,"https://www.googleapis.com/pagespeedonline/v4/runPagespeed?url=".$url."&strategy=mobile&key=YOUR_API_KEY");
  curl_setopt($curl_handle,CURLOPT_CONNECTTIMEOUT,2);
  curl_setopt($curl_handle,CURLOPT_RETURNTRANSFER,1);
  $buffer = curl_exec($curl_handle);
  curl_close($curl_handle);
  if (empty($buffer)){
      print "Nothing returned from url.<p>";
  }
  else{
      print $buffer;
  }
}
  
?>
