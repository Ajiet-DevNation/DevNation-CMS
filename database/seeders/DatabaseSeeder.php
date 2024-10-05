<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\College;
use App\Models\Role;
use App\Models\User;
use App\Models\Events;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        College::factory()->create([
            'name' => 'College of Engineering, Pune',
            'city' => 'Pune',
            'state' => 'Maharashtra',
            'country' => 'India',
        ]);

        Branch::factory()->create([
            'name' => 'Computer Science',
            'slug' => 'CS',
        ]);

        Role::factory()->create([
            'name' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
            'is_verified' => true,
            'is_alumini' => false,
            'branch_id' => Branch::first()->id,
            'college_id' => College::first()->id,
            'role_id' => Role::first()->id,
            'usn' => '4JK21CS016',
            'semester' => '5',
            'phone' => '1234567890',
        ]);


        for ($i = 0; $i < 10; $i++) {
            // public->storage image upload
            $bannerPath = "public/assets/img/photos/b" . ($i+1) . ".jpg"; 
            $bannerUrl = Storage::disk('public')->putFile('events', new \Illuminate\Http\File($bannerPath));

            $randDate = randomDate(date('Y-m-d', strtotime('-10 days')), date('Y-m-d', strtotime('+10 days')));

            Events::factory()->create([
                'name' => 'Webinar',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, ipsum? Vero, quo. Laudantium consectetur inventore non placeat harum ab perferendis explicabo molestias reprehenderit amet tempora, suscipit dolor. Nihil quisquam est quod quo praesentium culpa, corporis asperiores reiciendis harum expedita sunt nobis, voluptates ratione consequatur nulla, iure fugiat dolorem modi suscipit.',
                'event_type' => 'webinar',
                'location' => 'Pune, India',
                'banner' => $bannerUrl, // Use the generated URL here
                'speaker' => 'John Doe',
                'speaker_mail' => 'jdoe@me.com',
                'status' => 'published',
                'is_featured' => true,
                'requires_registration' => true,
                'max_attendees' => 100,
                'start_date' => $randDate,
                'end_date' => now(),
                'has_certificate' => true,
            ]);
        }
    }
}

function randomDate($sStartDate, $sEndDate, $sFormat = 'Y-m-d H:i:s')
{
    // Convert the supplied date to timestamp
    $fMin = strtotime($sStartDate);
    $fMax = strtotime($sEndDate);

    // Generate a random number from the start and end dates
    $fVal = mt_rand($fMin, $fMax);

    // Convert back to the specified date format
    return date($sFormat, $fVal);
}
