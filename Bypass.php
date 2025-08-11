<?php
// A távoli oldal URL-je, amit le akarunk kérni
$targetUrl = "https://condogames.kesug.com/Bypass.json";

// Lekérjük a távoli oldal tartalmát
$response = file_get_contents($targetUrl);

if ($response === FALSE) {
    // Ha nem sikerül, visszaadunk egy hibát JSON-ként
    http_response_code(500);
    echo json_encode(["error" => "Nem sikerült lekérni a távoli adatot"]);
    exit;
}

// Feltételezzük, hogy a távoli válasz JSON, parse-oljuk
$data = json_decode($response, true);

if ($data === null) {
    // Ha nem sikerült JSON-ként értelmezni, hiba
    http_response_code(500);
    echo json_encode(["error" => "Nem érvényes JSON a távoli válasz"]);
    exit;
}

// Feltételezzük, hogy az adatban van "id" kulcs, ezt továbbítjuk
if (!isset($data["id"])) {
    http_response_code(400);
    echo json_encode(["error" => "Hiányzik a modell ID az adatokból"]);
    exit;
}

// Visszaküldjük tiszta JSON-ként
header('Content-Type: application/json');
echo json_encode(["id" => $data["id"]]);
?>
