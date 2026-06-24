<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class SiteContentController extends Controller
{
    public function index()
    {
        $content = SiteContent::all()->keyBy('key');
        return view('admin.content.index', compact('content'));
    }

    public function update(Request $request)
    {
        $contentData = $request->input('content', []);
        $page = $request->input('page', 'all');

        // 1. Handle Image Uploads
        // We expect images to be sent with keys corresponding to their content key
        // e.g. input name="images[home.hero.image]"
        $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $file) {
                if ($file->isValid()) {
                    $filename = $key . '-' . time() . '.webp';
                    $uploadPath = 'assets/uploads';

                    // Check if we are on shared hosting with public_html
                    if (is_dir(base_path('../public_html'))) {
                        $fullPath = base_path('../public_html/' . $uploadPath);
                    } else {
                        $fullPath = public_path($uploadPath);
                    }

                    if (!file_exists($fullPath)) {
                        mkdir($fullPath, 0755, true);
                    }

                    $path = $fullPath . '/' . $filename;

                    // Process and save as WebP
                    try {
                        $image = $manager->read($file);
                        $image->toWebp(80)->save($path);

                        // Update the content value with the new path
                        // We store the relative path for use in asset()
                        $contentData[$key] = $uploadPath . '/' . $filename;

                    } catch (\Exception $e) {
                        return back()->with('error', 'Failed to process image for ' . $key . ': ' . $e->getMessage());
                    }
                }
            }
        }

        // 2. Update or Create Content Entries
        foreach ($contentData as $key => $value) {
            // Support for complex types (arrays) by JSON encoding them
            $finalValue = is_array($value) ? json_encode($value) : $value;

            SiteContent::updateOrCreate(
                ['key' => $key],
                [
                    'value' => $finalValue,
                    'page' => $page
                ]
            );
        }

        return redirect()->back()->with('success', 'Website content updated successfully!');
    }
}
