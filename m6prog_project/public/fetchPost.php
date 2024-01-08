<?php

$data = file_get_contents('php://input');
// echo $data;

$json = json_decode($data);



echo $json->article;
echo $json->maxPrice;

$html = "
<section>
    <h1>you searched</h1>
<p>Article: <span>{$json->article}</span></p>
<p>Max Price: <span>>{$json->maxPrice}</span></p>
</section>";

echo $html;