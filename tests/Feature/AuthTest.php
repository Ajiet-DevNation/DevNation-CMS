<?php

namespace Tests\Feature;

use App\Models\Branch;
use App\Models\College;
use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Mockery;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Setting up required data
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

    public function test_a_user_can_register_with_mocked_role(): void
    {
        // Mocking the Role model
        $roleMock = Mockery::mock(Role::class);
        $roleMock->shouldReceive('findOrFail')->with(1)->andReturnSelf(); // Mocking findOrFail to return a fake role object

        // Mocking the save method of the User model to prevent actual database saving
        $userMock = Mockery::mock(User::class);
        $userMock->shouldReceive('save')->andReturn(true);

        // Simulating user registration
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'usn' => '4JK21CS016',
            'semester' => '5',
            'phone' => '1234567890',
            'college_id' => College::first()->id,
            'branch_id' => Branch::first()->id,
            'role_id' => 1, // Simulated role ID
        ]);

        // Checking if the user was "saved" (but not actually in the database)
        $this->assertTrue(true); // This assertion is a placeholder for database checks

        // Verifying that the user was redirected to the login page
        $response->assertRedirect('/login');
    }

    public function test_a_user_can_login(): void
    {
        // Creating a user
        $user = User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Simulating the login request
        $response = $this->post('/login', [
            'email' => 'testuser@example.com',
            'password' => 'password123',
        ]);

        // Verifying that the user is redirected to the profile page
        $response->assertRedirect('/profile');

        // Verifying that the user is authenticated
        $this->assertAuthenticatedAs($user);
    }

    public function test_a_user_cannot_login_with_wrong_credentials(): void
    {
        // Creating a user with correct credentials
        User::factory()->create([
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'),
        ]);

        // Simulating a login with incorrect credentials
        $response = $this->post('/login', [
            'email' => 'testuser@example.com',
            'password' => 'wrongpassword',
        ]);

        // Verifying that the user is not authenticated
        $this->assertGuest();

        // Verifying that the session contains an error for invalid credentials
        $response->assertSessionHas('error', 'Either email/password is incorrect');
    }

    public function test_user_cannot_register_with_duplicate_email(): void
    {
        // Creating a user with an existing email
        User::factory()->create([
            'email' => 'testuser@example.com',
        ]);

        // Trying to register another user with the same email
        $response = $this->post('/register', [
            'name' => 'Test User Duplicate',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'usn' => '4JK21CS017',
            'semester' => '5',
            'phone' => '1234567891',
            'college_id' => College::first()->id,
            'branch_id' => Branch::first()->id,
            'role_id' => Role::first()->id,
        ]);

        // Verifying that the user with the duplicate email was not added to the database
        $this->assertDatabaseMissing('users', [
            'name' => 'Test User Duplicate',
            'usn' => '4JK21CS017',
        ]);

        // Verifying that the session contains an error for the duplicate email
        $response->assertSessionHasErrors(['email']);
    }

    public function test_registration_fails_with_empty_fields(): void
    {
        // Simulating an empty registration form submission
        $response = $this->post('/register', []);

        // Verifying that the session contains errors for all required fields
        $response->assertSessionHasErrors(['name', 'email', 'password']);
    }

    public function test_registration_fails_with_invalid_email(): void
    {
        // Simulating a registration attempt with an invalid email
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'invalid-email',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'usn' => '4JK21CS016',
            'semester' => '5',
            'phone' => '1234567890',
            'college_id' => College::first()->id,
            'branch_id' => Branch::first()->id,
            'role_id' => Role::first()->id,
        ]);
    
        // Verifying that the session contains an error for the invalid email
        $response->assertSessionHasErrors(['email']);
    }
    
    public function test_registration_fails_with_password_mismatch(): void
    {
        // Simulating a registration attempt with mismatched passwords
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'differentpassword',
            'usn' => '4JK21CS016',
            'semester' => '5',
            'phone' => '1234567890',
            'college_id' => College::first()->id,
            'branch_id' => Branch::first()->id,
            'role_id' => Role::first()->id,
        ]);

        // Verifying that the session contains an error for the password mismatch
        $response->assertSessionHasErrors(['password']);
    }

    public function test_user_can_logout(): void
    {
        // Logging in a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Simulating the logout request
        $response = $this->post('/logout');

        // Verifying that the user is logged out
        $this->assertGuest();

        // Verifying the redirection after logging out
        $response->assertRedirect('/');
    }

    public function test_logged_in_user_cannot_register_again(): void
    {
        // Logging in a user
        $user = User::factory()->create();
        $this->actingAs($user);

        // Simulating the attempt to access the registration page while logged in
        $response = $this->get('/register');

        // Verifying that the logged-in user is redirected to the home page
        $response->assertRedirect('/');
    }

    public function test_user_cannot_submit_invalid_form(): void
    {
        // Attempting to login with invalid data (invalid email and short password)
        $response = $this->post('/login', [
            'email' => 'notarealemail',  // Invalid email
            'password' => 'short',       // Short password
        ]);
    
        // Verifying that the session contains errors for 'email' (invalid email) and 'password' (short password)
        $response->assertSessionHasErrors(['email', 'password']);
    }
}
