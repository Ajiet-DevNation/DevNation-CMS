<?php

namespace Tests\Unit;

use App\Models\College;
use App\Models\Branch;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserNotificationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Set up necessary data before each test.
     */
    public function setUp(): void
    {
        parent::setUp();

        // Create College, Branch, and Role records to ensure they exist for UserFactory
        College::factory()->create([
            'name' => 'Test College',
            'city' => 'Test City',
            'state' => 'Test State',
            'country' => 'Test Country',
        ]);

        Branch::factory()->create([
            'name' => 'Computer Science',
            'slug' => 'CS',
        ]);

        Role::factory()->create([
            'name' => 'Student',
            'description' => 'Regular student role',
        ]);
    }

    /**
     * Test if the notification via method returns mail channel.
     */
    public function test_notification_via_method_returns_mail_channel()
    {
        // Create a user to pass into the notification
        $user = User::factory()->create();

        // Create the notification
        $notification = new \App\Notifications\UserNotification($user);

        // Ensure that the notification is using the 'mail' channel
        $this->assertContains('mail', $notification->via($user));
    }

    /**
     * Test if the notification's mail message is created correctly.
     */
    public function test_notification_to_mail_method_creates_mail_message()
    {
        // Create a user to pass into the notification
        $user = User::factory()->create();

        // Create the notification
        $notification = new \App\Notifications\UserNotification($user);

        // Mock the notifiable object
        $notifiable = \Mockery::mock(\Illuminate\Notifications\Notifiable::class);

        // Ensure that the mail message is returned correctly
        $mailMessage = $notification->toMail($notifiable);

        // Assert that the mail message contains a greeting, line, and action URL
        $this->assertStringContainsString('Greetings! ' . $user->name, $mailMessage->greeting);
        $this->assertStringContainsString('Your account has been successfully created and is now active.', $mailMessage->introLines[0]);
        $this->assertStringContainsString('/login', $mailMessage->actionUrl);
    }

    /**
     * Test if the notification to array method returns empty array.
     */
    public function test_notification_to_array_method_returns_empty_array()
    {
        // Create a user to pass into the notification
        $user = User::factory()->create();

        // Create the notification
        $notification = new \App\Notifications\UserNotification($user);

        // Ensure that the array representation of the notification is empty
        $this->assertEmpty($notification->toArray($user));
    }
}
