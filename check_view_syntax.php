<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $compiler = app('blade.compiler');
    $path = resource_path('views/admin/content/index.blade.php');
    if (!file_exists($path)) {
        die("View not found at $path\n");
    }

    echo "Compiling $path...\n";
    $content = file_get_contents($path);
    $compiled = $compiler->compileString($content);
    echo "Compilation successful. Length: " . strlen($compiled) . "\n";

    $temp = sys_get_temp_dir() . '/blade_check_' . md5($path) . '.php';
    file_put_contents($temp, $compiled);

    echo "Linting compiled file: $temp\n";
    $output = [];
    $return = 0;
    exec("php -l \"$temp\"", $output, $return);

    echo "PHP Lint Output:\n" . implode("\n", $output) . "\n";

    if ($return !== 0) {
        echo "SYNTAX ERROR FOUND!\n";
        // Print lines around the error if possible?
        // Usually lint output says "on line X".
        // Let's print the file content with line numbers for context.
        $lines = explode("\n", $compiled);
        foreach ($output as $out) {
            if (preg_match('/line\s+(\d+)/', $out, $matches)) {
                $errLine = $matches[1];
                echo "Context around line $errLine:\n";
                $start = max(1, $errLine - 5);
                $end = min(count($lines), $errLine + 5);
                for ($i = $start; $i <= $end; $i++) {
                    echo "$i: " . $lines[$i - 1] . "\n";
                }
            }
        }
    } else {
        echo "PHP Syntax OK.\n";
    }

    unlink($temp);

} catch (\Exception $e) {
    echo "Blade Compilation Error: " . $e->getMessage() . "\n";
}
