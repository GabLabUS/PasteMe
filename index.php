<?php
    $page_title = 'MakeIt';
    $input = substr($_SERVER["REQUEST_URI"], 1);
    if ($input == '') {
        $content = file_get_contents('templates/default');
    } elseif (file_exists('paste/'.$input)) {
        $handle = fopen('paste/'.$input, 'r');
        $paste_title = fgets($handle,2048);
        $paste_content = substr(file_get_contents('paste/'.$input), strlen($paste_title));
        $content = file_get_contents('templates/paste');
        $content = str_replace('%title%', $paste_title, $content);
        $content = str_replace('%bin%', $paste_content, $content);
	$page_title = $paste_title;
        fclose($handle);
    } else {
        $content = file_get_contents('templates/error');
    }
?>
<html>
	<head>
		<title>PasteMe - <?php echo($page_title);?></title>
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/bootstrap-theme.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>
        <div class="container">
            <?php echo($content); ?>
        </div>
        <center><span align="center" id="credits">PasteMe by <a href="http://gablab.eu/">Gabriele Assentato</a></span>
    <body>
</html>
