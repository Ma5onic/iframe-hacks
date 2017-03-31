<?php

$content = file_get_contents('http://www.stackoverflow.com');
$content = str_replace('</title>','</title><base href="http://www.stackoverflow.com" target="_top"/>', $content);
echo $content;

echo "

<style>
</style>

";


?>