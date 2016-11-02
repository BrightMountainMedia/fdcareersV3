<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function() {
	// -------------------- Pages -------------------- //
	// Home
	Route::get('/', 'Pages\HomeController@index');
	
	// Search Jobs
	Route::get('/search', 'Pages\SearchController@index');
	
	// About Us
	Route::get('/about', 'Pages\AboutUsController@index');
	
	// FAQ
	Route::get('/faq', 'Pages\FAQController@index');
	
	// Contact Us
	Route::get('/contact', 'Pages\ContactUsController@index');
	Route::post('/contact/send', 'Pages\ContactUsController@send');

	// Privacy Policy
	Route::get('/privacy', 'Pages\PrivacyController@index');

	// -------------------- User Settings -------------------- //
	// User Dashboard
	Route::get('/dashboard', 'Settings\DashboardController@index');

	// Update Notification Details
	Route::put('/settings/notification/details', 'Settings\Profile\NotificationDetailsController@update');

	// Get User Count for Kiosk
	Route::get('/spark/kiosk/users', 'Kiosk\MetricsController@users');

	// Get Subscriber Count for Kiosk
	Route::get('/spark/kiosk/subscribers', 'Kiosk\MetricsController@subscribers');

	// ---------- Departments ---------- //
	// Show all Departments
	Route::get('/departments', 'Pages\DepartmentController@index');

	// Get all Departments that a specific user owns
	Route::get('/settings/user/{id}/departments', 'Settings\Department\SettingsDepartmentController@allUserDepartments');

	// Add Department
	Route::post('/settings/department/department_add', 'Settings\Department\SettingsDepartmentController@store');

	// Departments Search...
	Route::post('/settings/departments/department_search', 'Settings\Department\SettingsDepartmentController@performBasicSearch');

	// Show Department Profile
	Route::get('/settings/department/{id}/department_profile', 'Settings\Department\SettingsDepartmentController@show');

	// Update Department Photo
	Route::post('/settings/department/{id}/department_photo', 'Settings\Department\Profile\DepartmentPhotoController@store');
	
	// Update Department Information
	Route::put('/settings/department/{id}/department_update', 'Settings\Department\SettingsDepartmentController@update');

	// Get Department Count for Kiosk
	Route::get('/spark/kiosk/departments', 'Kiosk\MetricsController@departments');

	// ---------- Positions ---------- //
	// Show all Positions
	Route::get('/positions', 'Pages\PositionController@index');
	Route::get('/positions/state/{state}', 'Pages\PositionController@index');

	// Get all Positions that a specific department owns
	Route::get('/settings/department/{id}/positions', 'Settings\Position\SettingsPositionController@allDepartmentPositions');

	// Add Position
	Route::post('/settings/position/position_add', 'Settings\Position\SettingsPositionController@store');

	// Show Position Profile
	Route::get('/settings/position/{id}/position_profile', 'Settings\Position\SettingsPositionController@show');

	// Uplaod the 1st Document
	Route::put('/settings/position/{id}/doc1_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc1_title');
	Route::post('/settings/position/{id}/doc1_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc1_url');
	Route::post('/settings/position/{id}/doc1_update', 'Settings\Position\Docs\PositionDocsController@storeDoc1');

	// Uplaod the 2nd Document
	Route::put('/settings/position/{id}/doc2_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc2_title');
	Route::post('/settings/position/{id}/doc2_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc2_url');
	Route::post('/settings/position/{id}/doc2_update', 'Settings\Position\Docs\PositionDocsController@storeDoc2');

	// Uplaod the 3rd Document
	Route::put('/settings/position/{id}/doc3_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc3_title');
	Route::post('/settings/position/{id}/doc3_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc3_url');
	Route::post('/settings/position/{id}/doc3_update', 'Settings\Position\Docs\PositionDocsController@storeDoc3');

	// Uplaod the 4th Document
	Route::put('/settings/position/{id}/doc4_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc4_title');
	Route::post('/settings/position/{id}/doc4_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc4_url');
	Route::post('/settings/position/{id}/doc4_update', 'Settings\Position\Docs\PositionDocsController@storeDoc4');

	// Uplaod the 5th Document
	Route::put('/settings/position/{id}/doc5_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc5_title');
	Route::post('/settings/position/{id}/doc5_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc5_url');
	Route::post('/settings/position/{id}/doc5_update', 'Settings\Position\Docs\PositionDocsController@storeDoc5');

	// Uplaod the 6th Document
	Route::put('/settings/position/{id}/doc6_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc6_title');
	Route::post('/settings/position/{id}/doc6_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc6_url');
	Route::post('/settings/position/{id}/doc6_update', 'Settings\Position\Docs\PositionDocsController@storeDoc6');

	// Get Position Count for Kiosk
	Route::get('/spark/kiosk/positions', 'Kiosk\MetricsController@positions');

	// Show specific Position
	// Route::get('/position/{id}', 'Pages\PositionController@show');

	// Show specific Department
	// Route::get('/department/{id}', 'Pages\DepartmentController@show');
});