<?php

use App\Mail\SendMail;
use App\Models\Participant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UploadAbstractController;
use App\Http\Controllers\UploadFulltextController;

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

Route::get('/', [HomeController::class, 'index'])->name('home.index');


Route::get('/rundown-icics2023', [HomeController::class, 'rundown'])->name('home.rundown');

Route::get('/registration-fee', [HomeController::class, 'registrationFee'])->name('home.registration-fee');

Route::get('/scientific-committe', function () {
    return view('homepage.scientific-committe', [
        'title' => 'Scientific Committee'
    ]);
});

Route::get('/steering-committe', function () {
    return view('homepage.steering-committe', [
        'title' => 'Steering Committee'
    ]);
});

Route::get('/organizing-committe', function () {
    return view('homepage.organizing-committe', [
        'title' => 'Organizing Committee'
    ]);
});

Route::get('/contact', [HomeController::class, 'contact'])->name('home.contact');

Route::get('/field-trip', function () {
    return view('homepage.field-trip', [
        'title' => 'Field Trip'
    ]);
});

Route::get('/fgd-mbkm', function () {
    return view('homepage.fgd-mbkm', [
        'title' => 'FGD MBKM'
    ]);
});


Route::get('/fgd-akreditasi-internasional', function () {
    return view('homepage.fgd-akreditasi', [
        'title' => 'FGD Akreditasi Internasional'
    ]);
});

Route::get('/kongres-hki', function () {
    return view('homepage.kongres-hki', [
        'title' => 'Kongres HKI'
    ]);
});

Route::get('/forum-ketua-jurusan-kimia', function () {
    return view('homepage.forum-ketua', [
        'title' => 'Forum Ketua Jurusan Kimia'
    ]);
});

Route::get('/fgd-akreditasi-internasional', function () {
    return view('homepage.fgd-akreditasi', [
        'title' => 'FGD Akreditasi Internasional'
    ]);
});


Route::get('/international-scientific-poster', function () {
    return view('homepage.poster', [
        'title' => 'International Scientific Poster Competition'
    ]);
});

Route::get('/about-conference', function () {
    return view('homepage.about', [
        'title' => 'About'
    ]);
});

Route::get('/download-template-article', [DownloadController::class, 'downloadTemplate']);
Route::get('/download-guidebook-poster-competition-icics-2023', [DownloadController::class, 'downloadGuidebook']);
Route::get('/download-program-abstract-book-icics2023', [DownloadController::class, 'downloadAbstractBook']);

Route::get('/dashboard', function () {
    if (Auth::user()->role === 'administrator') {
        $regon = Participant::where('attendance', 'online')->count();
        $regof = Participant::where('attendance', 'offline')->count();
        $profon = Participant::where('participant_type', 'professional presenter')->where('attendance', 'online')->count();
        $profof = Participant::where('participant_type', 'professional presenter')->where('attendance', 'offline')->count();
        $studon = Participant::where('participant_type', 'student presenter')->where('attendance', 'online')->count();
        $studof = Participant::where('participant_type', 'student presenter')->where('attendance', 'offline')->count();
        $parton = Participant::where('participant_type', 'participant')->where('attendance', 'online')->count();
        $partof = Participant::where('participant_type', 'participant')->where('attendance', 'offline')->count();

        $title = "Dashboard";
        return view('administrator.dashboard', compact('title', 'regon', 'regof', 'profon', 'profof', 'studon', 'studof', 'parton', 'partof'));
    } else {
        return view('participant.dashboard', [
            'title' => 'Dashboard'
        ]);
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //PROFILE
    Route::get('/profile', function () {
        if (Auth::user()->role == 'administrator') {
            return abort(403);
        }
        return view('participant.profile', [
            'title' => 'My Profile'
        ]);
    });
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'verified'])->group(function () {

    //ADMINISTRATOR
    Route::get('/registered-participant', [ParticipantController::class, 'index']);
    Route::get('/validation-hki-member', [ParticipantController::class, 'validateMember']);
    Route::get('/review-abstract', [UploadAbstractController::class, 'review']);
    Route::get('/payment-validation', [PaymentController::class, 'validation']);
    Route::get('/participant-have-paid', [PaymentController::class, 'participantPaid']);
    Route::get('/presenter-have-paid', [PaymentController::class, 'presenterPaid']);
    Route::get('/uploaded-paper', [UploadFulltextController::class, 'uploadedPaper']);
    Route::get('/send-email', [UploadFulltextController::class, 'sendEmail']);
    Route::get('/dashboard-admin', [AdminController::class, 'globalSetting'])->name('dashboard-admin');
    Route::get('scope-conference', [AdminController::class, 'scope'])->name('scope');
    Route::get('important-dates', [AdminController::class, 'importantDates'])->name('important-dates');
    Route::get('rundown', [AdminController::class, 'rundown'])->name('rundown');
    Route::get('front-image-slider', [AdminController::class, 'frontImageSlider'])->name('front-image-slider');
    Route::get('participant-type', [AdminController::class, 'participantType'])->name('participant-type');
    Route::get('downloads-file', [AdminController::class, 'downloadFile'])->name('downloads-file');
    Route::get('speaker', [AdminController::class, 'speaker'])->name('speaker');
    Route::get('data-loa-invoice', [AdminController::class, 'dataLoaInvoice'])->name('data-loa-invoice');
    Route::get('loa', function () {
        return view('administrator.pdf.loa');
    });

    Route::get('summernote', function () {
        return view('administrator.summernote');
    });

    //PARTICIPANT
    Route::get('/payment', [PaymentController::class, 'payment']);
    Route::get('/abstrak', [ParticipantController::class, 'abstract']);
    Route::get('/upload-fulltext', [UploadFulltextController::class, 'upload']);
    Route::get('/change-password', function () {
        if (auth::user()->role == 'administrator') {
            return view('administrator.change-password', [
                'title' => 'Change Password'
            ]);
        } else {
            return view('participant.change-password', [
                'title' => 'Change Password'
            ]);
        }
    });
});

Route::get('/test', function () {
    return view('test', [
        'title' => 'Test'
    ]);
});
require __DIR__ . '/auth.php';