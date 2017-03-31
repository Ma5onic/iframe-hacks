<?php

$content = file_get_contents('http://www.amazon.com');
$content = str_replace('</title>','</title><base href="http://www.amazon.com" target="_top"/>', $content);
echo $content;

echo "
<style>
</style>
";

?>