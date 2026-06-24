<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

$email = 'admin@example.com';
$password = 'password';

$user = User::firstOrNew(['email' => $email]);
$user->name = 'Admin User';
$user->password = Hash::make($password);
$user->email_verified_at = now();
$user->save();

echo "Credentials Updated:\n";
echo "Email: " . $email . "\n";
echo "Password: " . $password . "\n";
