<?php
header('Content-Type: application/json');

// A te oldalad URL-je, amit lekérünk
$url = "https://condogames.kesug.com/Bypass.Json";

// Lekérjük a tartalmat
$response = file_get_contents($url);

if ($response === FALSE) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to fetch data"]);
    exit;
}

// Ha kell, itt lehet feldolgozni $response-t (pl. JSON dekódolás, módosítás)

// Egyszerűen továbbadjuk a választ
echo $response;
?>
