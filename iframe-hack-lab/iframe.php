<?php

// set maximum execution time to infinite to allow iframe website to load
ini_set('max_execution_time', 0); 




// create a header stream to set http headers
$opts = array(
  'http'=>array(
    'method'=>"GET",
    'header'=>"Accept-language: hi\r\n" .
			  "User-Agent:Mozilla/5.0 (Windows NT 6.2; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/35.0.1916.153 Safari/537.36 \r\n" .
              "Cookie: foo=bar\r\n"
  )
);

// store headers data in a single variable
$context = stream_context_create($opts);

//cURL header try
//$ch = curl_init();
//curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');




// Open the file using the HTTP headers set above
$content = file_get_contents('http://www.google.com', false, $context);

// Open the file without using the HTTP headers set above
//$content = file_get_contents('http://www.google.com');

// Specify the base url form the original url in case css and js are called relatively by requested html
$content = str_replace('</title>','</title><base href="http://www.google.com" target="_top" />', $content);

// manually inject custom css/js or other static files into html using correct absolute path
//$content = str_replace('</head>','<link rel="stylesheet" href="http://127.0.0.1/research/iframe_hack_lab/iframe.css" /></head>', $content);








//javascript to fetch current url of caller ie html file that calls php
// referrer contains full current url, path contains parent path only without filename
echo "
<script language='javascript'>
var referrer = document.referrer;
var path = referrer;
path = path.substring(0, path.lastIndexOf('/'));
//document.write(referrer);
//document.write(path);
</script>
";



// php to get url of html with iframe src php
$fullurl=$_SERVER['HTTP_REFERER'];
$pathonly=substr($fullurl, 0, strrpos( $fullurl, '/'));
//echo $fullurl; echo $pathonly;

// create path of css/js file to be injected into html
$filename="iframe.css";
$filepath=$pathonly."/".$filename;
//echo $filepath;

//$csslinker= '<link rel="stylesheet" href="'.$filepath.'" type="text/css" title="My Style">';
//echo $csslinker;

// recommended method : static file forced injection using generated filepath
//$content = str_replace('</head>','<link rel="stylesheet" href="'.$filepath.'" /></head>', $content);


// direct injection works best
echo "
<style>
#lga{
	background-image:url(http://127.0.0.1/chapp/chapp_dev/desk/widgets/about/logo.png);
	background-repeat:no-repeat;
	background-position:center;
	height:200px;
	}
#hplogo{display:none;}
</style>";




// flipkart hack : strip js function noxfs from html page to avoid auto fullscreen but works only once when homepage opens
// $content = str_replace('noxfs();','', $content);


// to be used to bypass or break iframe when required for eg google search 
//$content = str_replace('</head>','<base target="_parent"></head>', $content);
//echo '<base target="_parent">';

//finally spit generated html code into iframe
echo $content;

?>