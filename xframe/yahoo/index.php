<?php

$content = file_get_contents('http://www.yahoo.com');
$content = str_replace('</title>','</title><base href="http://www.yahoo.com" target="_top"/>', $content);
echo $content;

echo "

<style>
#yucs-logo-ani{display:none;}
.logo-container{
	background-image:url(http://desk.cybrhome.com/widgets/about/logo.png);
	background-repeat:no-repeat;
	background-position:center;
	background-size:cover !important;
	height:30px;
	}
</style>

";


?>