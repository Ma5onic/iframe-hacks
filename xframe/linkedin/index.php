<?php

$content = file_get_contents('http://www.linkedin.com');
$content = str_replace('</title>','</title><base href="http://www.linkedin.com" target="_top"/>', $content);
echo $content;

echo "

<style>
.logo{visibility:hidden;}
.container > h1{
	background-image:url(http://desk.cybrhome.com/widgets/about/logo.png);
	background-repeat:no-repeat;
	background-position:center;
	background-size:contain !important;
	height:30px;
	width:180px;
	}
</style>

";


?>