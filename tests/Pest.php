<?php

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(Tests\TestCase::class, RefreshDatabase::class)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

function createAllRoles() : void
{
    Role::create(['name'=> 'Super@Administrateur']);
    Role::create(['name'=> 'Administrateur']);
    Role::create(['name'=> 'Caissiere']);
    Role::create(['name'=> 'Controlleur']);
    Role::create(['name'=> 'participant']);
}

/**
 * Function to create the super Administrator for the testing sessions
 */

function createSuperAdministrator() : User
{
    $user = User::create([
        'name' => '@dmin.istrateur',
        'email' => 'adminGala@C2E.com',
        'password' => Hash::make("Password"),
        'isAdmin' => true
    ]);
    
    Role::create(['name'=> 'Super@Administrateur']);
    $user->assignRole('Super@Administrateur') ;

    return $user ;
}
