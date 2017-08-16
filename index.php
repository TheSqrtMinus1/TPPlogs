<!DOCTYPE html>
<html>
<head>
<link rel="icon" type="image/png" href="./favicon.png">
<title> Twitch Logs </title>
<link href='https://fonts.googleapis.com/css?family=Inconsolata%7CUbuntu' rel='stylesheet' type='text/css'>
<link href='/resources/css/twitch.css' rel='stylesheet' type='text/css'>
</head>
<body>
<form action="file.php" method="get">
Query: <input type="text" name="query" required>
Page Number: <input type="text" name="page">
<br>
<br>
is Case sensitive:
<br>
<input type="radio" name="case" value="yes" checked>yes<br>
<input type="radio" name="case" value="no">no<br>
<input type="submit">
</form>
<br>
<p>
to search for people who have used "/me", just search
</p>
<pre>/me username</pre>
<p>to search for usernames, type the username in lowercase followed by a "&gt;" like this:</p>
<pre>username&gt;</pre>
<p>Download the full log file here:</p>
<a href="twitch.log" download>
<?php
$filename = 'twitch.log';
clearstatcache();
echo $filename . ': ' . filesize($filename) . ' bytes';
?>
</a>
<hr>
<div class="emotes">
<?php
$handle = fopen("twitch.log", "r");
if ($handle) {
    for ($i = 0; $i < 100; $i++) {
        if (($line = fgets($handle)) !== false) {
	echo '<p>'.htmlspecialchars($line).'</p>';echo "\r\n";
	flush();
}
    }
}

?>
</div>
<script src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="/resources/js/kappa.js"></script>
	<script>
            $(function () {
                $('.emotes').kappa();
            });
        </script>
</body>
</html>
