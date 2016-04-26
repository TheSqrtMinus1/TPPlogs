<!doctype html>
<html>
<head>
<link rel="icon" type="image/png" href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXZwQWcAAAAgAAAAIACH+pydAAABAUlEQVRIx+2VvQ3CMBBGPQojuKSkpMwYlJQpGYERMoJHSJkRKBkhpTvIZ+mss3MXnwSIAopPUeK79+z82YUQ3CfjfkPgvX9IeUlQgPazGItMhd93Y44EL8bdVZWI8DjGAjAdYgqHo4bXaZL1CpbCevZvE6xuzdLUuj1FLWIVEPw2zcVRk5CgXsVKkGciwDVJ7rEIzn7KgJYg1TL4yY9tAYq0974OBDwmwbHrCgnOKRqY4KgxCXiGYXklY0xHnEtQnk0BSfr+khsAp9QwHvSYPjQU4WECiKZ6BRIY9Ri3fcmChIJrUjR482+KRg1K4C14cz+gXzGB6lj2he9tOP9Nn/IEfN0fBbbre5sAAAAASUVORK5CYII=">
<title>Results</title>
<link href='https://fonts.googleapis.com/css?family=Inconsolata%7CUbuntu' rel='stylesheet' type='text/css'>
<link href='/resources/css/tpp.css' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
<?php
$pg = 0;
$pagenum = 0;
$file = 'tpp.log';
$searchfor = $_GET['query'];
$pagenum = $_GET['page'];
$pg = $pagenum * 100 + 1;
$contents = file_get_contents($file);
$pattern = preg_quote($searchfor, '/');
$pattern = "/^.*$pattern.*\$/m";
if(preg_match_all($pattern, $contents, $matches)){
echo "Found matches:\n";
foreach (array_slice($matches[0],$pg,100,true) as $str){
echo '<p>'.htmlspecialchars($str).'</p>';echo "\r\n";
}
}
else{
   echo "No matches found";
}
echo "</div>";

$pgnext = $pagenum + 1;
$nexturl = "file.php?query="."$searchfor"."&page="."$pgnext";

echo "<a id='infscroll' href='$nexturl'>next</a>";

?>
</div>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
        <script src="/resources/js/Kappa.js/dist/kappa.min.js"></script>
	<script>
            $(function () {
                $('.main').kappa();
            });
        </script>
</body>
</html>
