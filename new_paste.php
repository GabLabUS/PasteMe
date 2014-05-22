<?php
	$i = true;

	$paste_title = $_POST['title'];
	$paste_content = $_POST['content'];

    if (($paste_content=="")||($paste_content=="Input some content...")) {
        die("invalid input!");
    }

    $paste_title = str_replace('&', '&amp;', $paste_title);
    $paste_title = str_replace('<', '&lt;', $paste_title);
    $paste_title = str_replace('>', '&gt;', $paste_title);
    $paste_title = str_replace('"', '&quot;', $paste_title);

    $paste_content = str_replace('&', '&amp;', $paste_content);
    $paste_content = str_replace('<', '&lt;', $paste_content);
    $paste_content = str_replace('>', '&gt;', $paste_content);
    $paste_content = str_replace('"', '&quot;', $paste_content);
    $paste_content = str_replace(chr(13), '<br />', $paste_content);

	while ($i == true) {
		$paste_code = substr(md5(rand()), 0, 6);
		if (!file_exists('paste/'.$paste_code)) {
			$i = false;
		}
	}

	file_put_contents('paste/'.$paste_code, 
                      $paste_title . "\n"
                      . $paste_content
                     );

    header("location: ../".$paste_code);
?>
