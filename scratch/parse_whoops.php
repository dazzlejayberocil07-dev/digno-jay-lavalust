<?php
$ch = curl_init('https://digno-jay.onrender.com/api/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    'username' => 'admin',
    'password' => 'admin123'
]));

$response = curl_exec($ch);
curl_close($ch);

if (preg_match('/<div class="exception-title"[^>]*>(.*?)<\/div>/s', $response, $m)) {
    echo "EXCEPTION TITLE: " . strip_tags($m[1]) . "\n";
}
if (preg_match('/<div class="message"[^>]*>(.*?)<\/div>/s', $response, $m)) {
    echo "EXCEPTION MSG: " . strip_tags($m[1]) . "\n";
}
if (preg_match_all('/<span class="file"[^>]*>(.*?)<\/span>/s', $response, $m)) {
    echo "FILES:\n" . implode("\n", array_map('strip_tags', array_slice($m[1], 0, 5))) . "\n";
}

file_put_contents(__DIR__ . '/whoops.html', $response);
echo "\nSaved full whoops HTML to scratch/whoops.html\n";
