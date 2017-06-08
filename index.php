<?php
 
if(isset($_POST['domain'])){ 
$domainname = $_POST['domain'];
$server = "whois.verisign-grs.com";
$port=43;
 
if(($whoisinfo = fsockopen($server,$port)) == true)
	{
		$output = "";
		fputs($whoisinfo,"$domainname\r\n");
		while(!feof($whoisinfo)) 
			$output .= fgets($whoisinfo,128); 
		fclose($whoisinfo);
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Simple PHP WHOIS Lookup Script</title>
<meta name="description" content="WHOIS lookup service.">
<meta name="keywords" content="whois,lookup,domain">
</head>
<body>
<div class="container">
 
<br>
<hr>
<br>
 
<form action="" method="post">
<div id="lookup_form">
<input type="text" name="domain" value="">
<input type="submit" value="Perform lookup">
</div>
</form>
<?php 	if(isset($output)){ echo "<pre>" . $output . "</pre>"; } ?>
 
</div>
</body>
</html>
