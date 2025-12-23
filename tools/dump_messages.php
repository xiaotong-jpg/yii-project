<?php
// Dump message_board.content into a UTF-8 text file (one message per line)
$host = '127.0.0.1';
$db = 'yii2advanced';
$user = 'root';
$pass = '';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try {
    $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    fwrite(STDERR, "DB connect error: " . $e->getMessage() . "\n");
    exit(2);
}

$file = __DIR__ . DIRECTORY_SEPARATOR . 'msg_all.txt';
$f = fopen($file, 'w');
if (!$f) { fwrite(STDERR, "Failed to open $file for writing\n"); exit(2); }

$stmt = $pdo->query("SELECT content FROM message_board WHERE content IS NOT NULL AND TRIM(content)<>''");
$count = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $line = trim($row['content']);
    // normalize newlines
    $line = preg_replace('/[\r\n]+/', ' ', $line);
    fwrite($f, $line . "\n");
    $count++;
}
fclose($f);
fwrite(STDOUT, "Wrote $count messages to $file\n");
