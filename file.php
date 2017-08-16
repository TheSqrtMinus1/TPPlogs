<!doctype html>
<html>
<head>
<link rel="icon" type="image/png" href="./favicon.png">
<title>Results</title>
<link href='https://fonts.googleapis.com/css?family=Inconsolata%7CUbuntu' rel='stylesheet' type='text/css'>
<link href='/resources/css/twitch.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
<?php
$file = 'twitch.log';
$searchfor = $_GET['query'];
$pagenum = $_GET['page'];
$case = $_GET['case'];
$pgoffset = $pagenum * 100 ;
$contents = file_get_contents($file);
$pattern = preg_quote($searchfor, '/');
if ($case == "yes") {
$pattern = "/^.*$pattern.*\$/m";
} elseif ($case == "no"){
$pattern = "/^.*$pattern.*\$/mi";
}
else {
$pattern = "/^.*$pattern.*\$/m";
echo "<p>Somehow, you didn't specify case sensitivity. Defaulting to \"yes\"...</p><br>";
}
if(preg_match_all($pattern, $contents, $matches)){
echo "Found matches:\n";
foreach (array_slice($matches[0],$pgoffset,100,true) as $str){
echo '<p>'.htmlspecialchars($str).'</p>';echo "\r\n";
}
}
else{
   echo "No matches found";
}
echo "</div>";
$pgnext = $pagenum + 1;
$nexturl = "file.php?query="."$searchfor"."&page="."$pgnext"."&case="."$case";
echo "<a href=\"" . $nexturl ."\">nextpage</a>";

?>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="/resources/js/kappa.js"></script>
	<script>
            $(function () {
                $('.main').kappa();
            });
        </script>
</body>
</html>
