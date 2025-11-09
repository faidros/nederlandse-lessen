<?php
// Script to generate admin password hash

echo "=== Admin Password Generator ===\n\n";

if ($argc < 2) {
    echo "Använd: php generate_admin_password.php ditt-lösenord\n";
    echo "Exempel: php generate_admin_password.php mySecurePass123\n";
    exit(1);
}

$password = $argv[1];
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Ditt lösenord: $password\n";
echo "Password hash: $hash\n\n";
echo "Kopiera hashen ovan och ersätt ADMIN_PASSWORD i config.php\n";
