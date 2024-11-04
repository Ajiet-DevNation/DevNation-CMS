<?php

namespace Tests\Feature;

use App\Models\gallery;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class GalleryTest extends TestCase
{
    use RefreshDatabase;

    public function test_gallery_can_be_created_without_image()
    {
        Storage::fake('public');
        $image = \Illuminate\Http\UploadedFile::fake()->image('empty.jpg', 1, 1);

        $gallery = gallery::create([
            'name' => 'Test Gallery',
            'description' => 'This is a test gallery',
            'image' => $image->store('galleries', 'public'),
        ]);

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'name' => 'Test Gallery',
        ]);

        Storage::disk('public')->assertExists($gallery->image);
    }

    public function test_gallery_can_be_created_with_image()
    {
        Storage::fake('public');
        $image = \Illuminate\Http\UploadedFile::fake()->image('gallery_image.jpg', 800, 600);

        $gallery = gallery::create([
            'name' => 'Test Gallery with Image',
            'description' => 'This is a test gallery with an image',
            'image' => $image->store('galleries', 'public'),
        ]);

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'name' => 'Test Gallery with Image',
        ]);

        Storage::disk('public')->assertExists($gallery->image);
    }

    public function test_gallery_image_is_resized_to_300x300()
    {
        Storage::fake('public');
        $image = \Illuminate\Http\UploadedFile::fake()->image('gallery_image.jpg', 800, 600);

        $gallery = gallery::create([
            'name' => 'Test Gallery with Resized Image',
            'description' => 'This is a test gallery with a resized image',
            'image' => $image->store('galleries', 'public'),
        ]);

        $imagePath = Storage::disk('public')->path($gallery->image);
        [$width, $height] = getimagesize($imagePath);

        $this->assertEquals(300, $width);
        $this->assertEquals(300, $height);
    }

    public function test_gallery_saves_multiple_images_with_resizing()
    {
        Storage::fake('public');
        $image1 = \Illuminate\Http\UploadedFile::fake()->image('gallery_image1.jpg', 800, 600);
        $image2 = \Illuminate\Http\UploadedFile::fake()->image('gallery_image2.jpg', 1024, 768);

        $galleryImages = [
            $image1->store('galleries', 'public'),
            $image2->store('galleries', 'public'),
        ];

        $gallery = gallery::create([
            'name' => 'Test Gallery with Multiple Images',
            'description' => 'This gallery contains multiple images.',
            'image' => $image1->store('galleries', 'public'),
            'gallery_images' => $galleryImages,
        ]);

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'name' => 'Test Gallery with Multiple Images',
        ]);

        foreach ($gallery->gallery_images as $imagePath) {
            Storage::disk('public')->assertExists($imagePath);

            $fullImagePath = Storage::disk('public')->path($imagePath);
            [$width, $height] = getimagesize($fullImagePath);

            $this->assertEquals(300, $width);
            $this->assertEquals(300, $height);
        }
    }

    public function test_gallery_main_image_can_be_updated_with_resizing()
    {
        Storage::fake('public');
        $originalImage = \Illuminate\Http\UploadedFile::fake()->image('original_image.jpg', 800, 600);

        $gallery = gallery::create([
            'name' => 'Test Gallery',
            'description' => 'A gallery to test updating the main image.',
            'image' => $originalImage->store('galleries', 'public'),
        ]);

        $imagePath = Storage::disk('public')->path($gallery->image);
        [$width, $height] = getimagesize($imagePath);
        $this->assertEquals(300, $width);
        $this->assertEquals(300, $height);

        $newImage = \Illuminate\Http\UploadedFile::fake()->image('new_image.jpg', 1024, 768);
        $gallery->update([
            'image' => $newImage->store('galleries', 'public'),
        ]);

        $newImagePath = Storage::disk('public')->path($gallery->image);
        [$newWidth, $newHeight] = getimagesize($newImagePath);

        $this->assertEquals(300, $newWidth);
        $this->assertEquals(300, $newHeight);
    }

    public function test_gallery_images_are_serialized_and_deserialized_correctly()
    {
        Storage::fake('public');
        $image1 = \Illuminate\Http\UploadedFile::fake()->image('gallery_image1.jpg', 800, 600);
        $image2 = \Illuminate\Http\UploadedFile::fake()->image('gallery_image2.jpg', 1024, 768);

        $galleryImages = [
            $image1->store('galleries', 'public'),
            $image2->store('galleries', 'public'),
        ];

        $gallery = gallery::create([
            'name' => 'Test Gallery',
            'description' => 'A gallery to test serialization of gallery images.',
            'image' => $image1->store('galleries', 'public'),
            'gallery_images' => $galleryImages,
        ]);

        $this->assertDatabaseHas('galleries', [
            'id' => $gallery->id,
            'gallery_images' => json_encode($galleryImages),
        ]);

        $this->assertIsArray($gallery->gallery_images);
        $this->assertCount(2, $gallery->gallery_images);
        $this->assertEquals($galleryImages, $gallery->gallery_images);
    }

    public function test_deleting_gallery_removes_images_from_storage()
    {
        Storage::fake('public');
        $image1 = \Illuminate\Http\UploadedFile::fake()->image('gallery_image1.jpg', 800, 600);
        $image2 = \Illuminate\Http\UploadedFile::fake()->image('gallery_image2.jpg', 1024, 768);

        $galleryImages = [
            $image1->store('galleries', 'public'),
            $image2->store('galleries', 'public'),
        ];

        $gallery = gallery::create([
            'name' => 'Test Gallery for Deletion',
            'description' => 'A gallery to test deletion of images.',
            'image' => $image1->store('galleries', 'public'),
            'gallery_images' => $galleryImages,
        ]);

        foreach (array_merge([$gallery->image], $gallery->gallery_images) as $imagePath) {
            Storage::disk('public')->assertExists($imagePath);
        }

        $gallery->delete();

        foreach (array_merge([$gallery->image], $galleryImages) as $imagePath) {
            Storage::disk('public')->assertMissing($imagePath);
        }
    }
}
