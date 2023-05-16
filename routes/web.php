<?php

use App\Http\Controllers\Login;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ParentChildController;
use App\Http\Controllers\Register;
use App\Http\Controllers\SquadController;
use App\Http\Controllers\TrainingResultController;
use App\Http\Controllers\UpdateProfileController;
use App\Models\Squad;
use App\Models\TrainingResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/populate', function () {
    User::create([
        'username' => fake()->userName(),
        'firstName' => fake()->firstName(),
        'lastName' => fake()->lastName(),
        'middleName' => "Stephen",
        'dateOfBirth' => fake()->date(),
        'address' => fake()->address(),
        'postCode' => fake()->postcode(),
        'number' => fake()->phoneNumber(),
        'role' => "admin",
        'gender' => "Male",
        'email' => "steveijatomi@gmail.com",
        'password' => Hash::make("aaaaa"),
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });

    Route::middleware(['admin'])->group(function () {
        Route::post('/create-squad', [SquadController::class, "createSquad"]);
        Route::post('/assign-squad', [SquadController::class, "assignUserToSquad"]);
    });

    Route::middleware(['adminOrCoach'])->group(function () {
        Route::get('/manage-squads', [SquadController::class, "showSquadManagementPage"]);
        Route::get('/squad-details/{squadId}', [SquadController::class, "squadDetailsPage"]);
        Route::get('/edit-squad/{squadId}', [SquadController::class, "editSquadPage"]);
        Route::post('/update-squad-details/{squadId}', [SquadController::class, "updateSquadDetails"]);
        Route::get('/upload-result', [TrainingResultController::class, "uploadResultPage"]);
        Route::post('/upload-result', [TrainingResultController::class, "addResult"]);
    });

    Route::middleware(['adminOrParent'])->group(function () {
        Route::get('/register-user', [Register::class, "registerUserDashboardPage"]);
    });

    Route::middleware(['parent'])->group(function () {
        Route::post('/register-child', [Register::class, "registerChild"]);
        Route::get('/manage-kids', [ParentChildController::class, 'getManageKidsPage']);
        Route::get('/manage-kids/{childId}', [ParentChildController::class, "updateChildsPage"]);
        Route::post('/manage-kids', [ParentChildController::class, "postManageChild"]);
    });
    Route::get('/logout', [LogoutController::class,'logout']);

    Route::get('/view-results', [TrainingResultController::class, 'viewResultsPage']);
    Route::post('/view-results', [TrainingResultController::class, "viewResults"]);
    Route::get('/view-results/{squadId}', [TrainingResultController::class, "viewSquadResult"]);

    Route::get('/update-profile', [UpdateProfileController::class, "updateProfilePage"]);
    Route::post('/update-profile', [UpdateProfileController::class, "updateProfile"]);

    Route::post('/update-profile/{id}', [UpdateProfileController::class, "updateProfileWithId"]);
});

Route::get('/login', [Login::class, 'loginPage'])->name('login');
Route::post('/login', [Login::class, "logUserIn"]);


Route::get('/register', [Register::class, 'registerPage']);
Route::post('/register', [Register::class, 'registerUser']);
