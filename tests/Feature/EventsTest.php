<?php

namespace Tests\Feature;

use App\Models\Events;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EventsTest extends TestCase
{
    use RefreshDatabase;

    public function test_event_can_be_created_without_banner()
    {
        // Vytvor event bez banner obrázka
        $event = Events::create([
            'name' => 'Test Event',
            'event_type' => 'Conference',
            'description' => 'This is a test event',
            'start_date' => now(),
            'end_date' => now()->addDays(1),
            'location' => 'Test Location',
            'status' => 'published',
            'speaker' => 'Test Speaker',
            'speaker_mail' => 'speaker@example.com', // Pridali sme speaker_mail
        ]);

        // Over, že event bol úspešne vytvorený
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'name' => 'Test Event',
        ]);
    }

    public function test_event_can_be_created_with_banner()
    {
        // Nastav falošné úložisko pre testovanie
        Storage::fake('public');

        // Vytvor falošný obrázok
        $image = \Illuminate\Http\UploadedFile::fake()->image('banner.jpg', 500, 600);

        // Vytvor event s banner obrázkom
        $event = Events::create([
            'name' => 'Test Event with Banner',
            'event_type' => 'Conference',
            'description' => 'This is a test event with a banner',
            'start_date' => now(),
            'end_date' => now()->addDays(1),
            'location' => 'Test Location',
            'status' => 'published',
            'speaker' => 'Test Speaker',
            'speaker_mail' => 'speaker@example.com', // Pridali sme speaker_mail
            'banner' => $image->store('banners', 'public'),
        ]);

        // Over, že event bol vytvorený v databáze
        $this->assertDatabaseHas('events', [
            'id' => $event->id,
            'name' => 'Test Event with Banner',
        ]);

        // Skontroluj, že obrázok bol uložený
        Storage::disk('public')->assertExists($event->banner);
    }

    public function test_event_banner_is_resized_to_300x300()
    {
        // Nastav falošné úložisko pre testovanie
        Storage::fake('public');

        // Vytvor falošný obrázok
        $image = \Illuminate\Http\UploadedFile::fake()->image('banner.jpg', 500, 600);

        // Vytvor event s banner obrázkom
        $event = Events::create([
            'name' => 'Test Event with Resized Banner',
            'event_type' => 'Conference',
            'description' => 'This is a test event with a resized banner',
            'start_date' => now(),
            'end_date' => now()->addDays(1),
            'location' => 'Test Location',
            'status' => 'published',
            'speaker' => 'Test Speaker',
            'speaker_mail' => 'speaker@example.com', // Pridali sme speaker_mail
            'banner' => $image->store('banners', 'public'),
        ]);

        // Získaj cestu k obrázku a over jeho veľkosť
        $imagePath = Storage::disk('public')->path($event->banner);
        [$width, $height] = getimagesize($imagePath);

        // Overenie, že bol obrázok zmenšený na 300x300
        $this->assertEquals(300, $width);
        $this->assertEquals(300, $height);
    }
}

