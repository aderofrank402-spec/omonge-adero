<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $compiler = app('blade.compiler');
    $path = resource_path('views/admin/content/index.blade.php');

    echo "Compiling $path...\n";
    $content = file_get_contents($path);
    $compiled = $compiler->compileString($content);

    file_put_contents('debug_view.php', $compiled);
    echo "Saved compiled view to debug_view.php\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
