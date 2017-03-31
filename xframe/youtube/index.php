<?php

// create a header stream to set http headers
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: en-IN\r\n" .
			  "Content-language: en\r\n" .
			  "User-Agent:Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36 \r\n" .
              "Cookie: foo=bar\r\n"
  )
);

// store headers data in a single variable
$context = stream_context_create($opts);

$content = file_get_contents('https://www.youtube.com/?gl=IN', false, $context);
$content = str_replace('</title>','</title><base href="https://www.youtube.com" target="_top"/>', $content);
echo $content;

echo "

<style>
</style>

";


?>