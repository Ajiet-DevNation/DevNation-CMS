<?php

namespace App\Models;

use App\Notifications\NotifyAttendenceOfEventToUserNotification;
use App\Notifications\NotifyEventToUserNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'event_type',
        'location',
        'banner', // Image field that we want to resize
        'poster',
        'speaker',
        'speaker_mail',
        'status',
        'is_featured',
        'requires_registration',
        'max_attendees',
        'has_certificate',
        'notify_attendees',
        'notify_attendance',
        'attendence_code',
        'attendance_code_is_valid',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
        'requires_registration' => 'boolean',
        'has_certificate' => 'boolean',
        'notify_attendees' => 'boolean',
        'notify_attendance' => 'boolean',
    ];

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegisteraion::class);
    }

    protected static function booted()
    {
        static::saving(function ($event) {
            // Resize the banner image if it exists
            if ($event->banner && Storage::disk('public')->exists($event->banner)) {
                $event->banner = self::resizeImage($event->banner);
            }
        });

        static::updated(function ($event) {
            if ($event->isDirty('notify_attendees') && $event->notify_attendees) {
                $registrations = EventRegisteraion::where('event_id', $event->id)->where('status', 'success')->get();

                foreach ($registrations as $registration) {
                    $registration->user->notify(new NotifyEventToUserNotification($event));
                }
            }

            if ($event->isDirty('notify_attendance') && $event->notify_attendance) {
                $registrations = EventRegisteraion::where('event_id', $event->id)
                    ->where('status', 'success')
                    ->get();
    
                foreach ($registrations as $registration) {
                    $registration->user->notify(new NotifyAttendenceOfEventToUserNotification($event));
                }
            }
        });
    }

    // Function to resize the image to fixed dimensions of 300x300 without preserving the aspect ratio
    protected static function resizeImage($imagePath)
    {
        try {
            // Path to the image
            $fullImagePath = Storage::disk('public')->path($imagePath);

            // Open the original image using GD
            $sourceImage = imagecreatefromstring(file_get_contents($fullImagePath));
            if ($sourceImage === false) {
                return $imagePath; // Return the original path if opening fails
            }

            // Set fixed dimensions to 300x300 pixels
            $newWidth = 300;
            $newHeight = 300;

            // Create a new blank image with 300x300 dimensions
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

            // Resize the original image to the new dimensions without preserving aspect ratio
            imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($sourceImage), imagesy($sourceImage));

            // Overwrite the original image with the resized version
            imagejpeg($resizedImage, $fullImagePath, 90);

            // Free up memory
            imagedestroy($sourceImage);
            imagedestroy($resizedImage);

            return $imagePath; // Return the updated image path
        } catch (\Exception $e) {
            return $imagePath; // Return the original path if resizing fails
        }
    }
}
