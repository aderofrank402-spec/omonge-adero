<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$post = App\Models\Post::orderBy('updated_at', 'desc')->first();
if ($post) {
    echo "Dumping content for Post ID: {$post->id}\n";
    file_put_contents('temp_content_dump.txt', $post->content);
} else {
    echo "No posts found.\n";
}
