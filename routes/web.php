<?php

use App\Http\Controllers\ReferralController;
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
// This is an import of the Jetstream routes. We needed this so we can change the path to of user/profile to account.
require __DIR__.'/jetstream.php';

Route::get('/', function () {
    $homePageSlug = App\Models\Setting::where('key', 'home_page')->first()->value;
    $homePage = App\Models\CmsPage::find($homePageSlug);
    return (new App\Http\Controllers\CmsPageController)->show($homePage->slug);
})->name('home');

// This controls the referral system
Route::get('/invite/{referralCode:code}', [ReferralController::class, 'index'])->name('invite.index');
Route::post('/invite/{referralCode:code}', [ReferralController::class, 'store'])->name('invite.store');
Route::post('/invite/more', [ReferralController::class, 'more'])->name('invite.more');


Route::group(['prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', App\Livewire\Game\Admin\Dash::class)->name('admin');
    Route::get('/users', App\Livewire\Game\Admin\User\UList::class)->name('admin.users');
    Route::get('/users/create', App\Livewire\Game\Admin\User\UShow::class);
    Route::get('/users/{user}/edit', App\Livewire\Game\Admin\User\UShow::class);
    Route::get('/game', App\Livewire\Game\Admin\GameAdmin::class)->name('admin.game');
    Route::get('/game/levels', App\Livewire\Game\Admin\Levels\LList::class)->name('admin.levels');
    Route::get('/settings', App\Livewire\Cms\Admin\Settings::class)->name('admin.settings');

    Route::get('cms', App\Livewire\Cms\Admin\Pages\PList::class)->name('admin.cms.pages');
    Route::get('cms/create', App\Livewire\Cms\Admin\Pages\PEdit::class);
    Route::get('cms/{page}', App\Livewire\Cms\Admin\Pages\PEdit::class);
    Route::get('cms/{page}/s', App\Livewire\Cms\Admin\Pages\SEdit::class);
    Route::get('cms/{page}/s/{section}', App\Livewire\Cms\Admin\Pages\SEdit::class);
});

Route::group(['prefix' => 'game'], function () {
    Route::get('/', \App\Livewire\Game\GameHome::class)->name('game.home');
    Route::get('/giver', \App\Livewire\Game\Quest\Giver::class)->name('game.giver');
    Route::get('/profile', \App\Livewire\Game\User\Me\Profile::class)->name('game.profile');
    Route::get('/log', \App\Livewire\Game\Quest\Log::class)->name('game.log');

    //Guild stuff coming in v3
    // Route::get('/my-guild', \App\Livewire\Game\Guild\MyGuild::class)->name('game.my-guild');
    // Route::get('/guild-list', \App\Livewire\Game\Guild\GuildList::class)->name('game.guild-list');
});

// Not sure if this is needed anymore.
// Route::middleware([
//    'auth:sanctum',
//    config('jetstream.auth_session'),
//    'verified',
// ])->group(function () {
//    Route::get('/admin', function () {
//        return view('dashboard');
//    })->name('admin');
// });

Route::get('/favicon.ico', function () {
    $favicon = \App\Models\Setting::where('key', 'favicon')->first();
    $faviconPath = $favicon ? asset('storage/'.$favicon->value) : '/favicon.ico';
    return redirect($faviconPath);
});
//CMS Wildcard Route
Route::get('/{slug}', [App\Http\Controllers\CmsPageController::class, 'show'])->name('pages.show');


