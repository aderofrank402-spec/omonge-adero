<?php

// Define the path to your application
$appPath = __DIR__ . '/../aderobrian';

// 1. Load Laravel
require $appPath . '/vendor/autoload.php';
$app = require_once $appPath . '/bootstrap/app.php';

// 2. Resolve the Kernel
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Helper function to run commands and print output
function runCommand($command, $kernel)
{
    echo "<h2>Running: <code>$command</code></h2>";
    echo "<pre>";
    try {
        $status = $kernel->call($command);
        echo htmlspecialchars($kernel->output());
    } catch (Exception $e) {
        echo "ERROR: " . htmlspecialchars($e->getMessage());
    }
    echo "</pre><hr>";
}

echo "<h1>🚀 Deployment Script</h1>";

// 3. FORCE CLEAR CACHES (Delete files manually first to fix path issues)
// This fixes the "Windows paths on Linux server" 500 error
$files = glob($appPath . '/bootstrap/cache/*.php');
echo "<h2>Cleaning bootstrap/cache...</h2><ul>";
foreach ($files as $file) {
    if (is_file($file)) {
        unlink($file);
        echo "<li>Deleted: " . basename($file) . "</li>";
    }
}
echo "</ul><hr>";

// 4. Run Artisan Commands
runCommand('cache:clear', $kernel);
runCommand('config:clear', $kernel);
runCommand('route:clear', $kernel);
runCommand('view:clear', $kernel);

// 5. Run Migrations
runCommand('migrate --force', $kernel);

// 6. Create Storage Link
runCommand('storage:link', $kernel);

echo "<h1>✅ Deployment Complete!</h1>";
echo "<p style='color:red; font-weight:bold;'>PLEASE DELETE THIS FILE (deploy.php) NOW FOR SECURITY!</p>";
