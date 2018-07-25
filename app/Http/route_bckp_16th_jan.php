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

//Route::group(['middleware' => ['web']], function () {

/* Route::get('/', function () {

    return view('auth.login');

}); */

Route::get(

'/',['uses'=>'Home@index',

'as'=>'Homi.index']

);

/* Route::get('/home', function () {

    return view('admin.admin_layout');

}); */

Route::group(array('middleware' =>'App\Http\Middleware\AdminMiddleware'), function()

{

//Route::get('home', 'AdminController@create');



/********************New Route  For Admin End*************************/

Route::get(

'/admin/dashboard',['uses'=>'Dashboard@index',

'as'=>'dashboard.index']

);



Route::get(

'/admin/aboutus',['uses'=>'Aboutus@index',

'as'=>'aboutus.index']

);

Route::get(

'/admin/aboutus/{about_id}/edit',['uses'=>'Aboutus@show',

'as'=>'aboutus.show']

);

Route::post(

'/admin/aboutus/Update',['uses'=>'Aboutus@update',

'as'=>'aboutus.update']
);

Route::get(
'/admin/services/add',['uses'=>'Services@create',
'as'=>'services.create']
);
Route::post(
'/admin/services/add',['uses'=>'Services@store',
'as'=>'services.store']
);
Route::get(
'/admin/services',['uses'=>'Services@index',
'as'=>'services.index']
);
Route::get(
'/admin/services/{services_id}/edit',['uses'=>'Services@show',
'as'=>'services.show']
);
Route::post(
'/admin/services/Update',['uses'=>'Services@update',
'as'=>'services.update']
);
Route::get(
'/admin/services/{our_id}/delete',['uses'=>'Services@destroy',
'as'=>'services.delete']
);

Route::get(

'/admin/testimonial',['uses'=>'Testimonial@index',

'as'=>'testimonial.index']

);

Route::get(

'/admin/testimonial/add',['uses'=>'Testimonial@create',

'as'=>'testimonial.create']

);

Route::post(

'/admin/testimonial/add',['uses'=>'Testimonial@store',

'as'=>'testimonial.store']

);

Route::get(

'/admin/testimonial/{test_id}/edit',['uses'=>'Testimonial@show',

'as'=>'testimonial.show']

);

Route::get(

'/admin/testimonial/{test_id}/delete',['uses'=>'Testimonial@destroy',

'as'=>'testimonial.delete']

);

Route::post(

'/admin/testimonial/update',['uses'=>'Testimonial@update',

'as'=>'testimonial.update']

);

Route::get(

'/admin/ourpartner',['uses'=>'Ourpartner@index',

'as'=>'ourpartner.index']

);

Route::get(

'/admin/ourpartner/add',['uses'=>'Ourpartner@create',

'as'=>'ourpartner.create']

);

Route::get(

'/admin/ourpartner/{our_id}/edit',['uses'=>'Ourpartner@show',

'as'=>'ourpartner.show']

);

Route::post(

'/admin/ourpartner/update',['uses'=>'Ourpartner@update',

'as'=>'ourpartner.update']

);

Route::post(

'/admin/ourpartner/add',['uses'=>'Ourpartner@store',

'as'=>'ourpartner.store']

);

Route::get(

'/admin/ourpartner/{our_id}/delete',['uses'=>'Ourpartner@destroy',

'as'=>'ourpartner.delete']

);





Route::get(

'/admin/banner',['uses'=>'Banner@index',

'as'=>'banner.index']

);

Route::get(

'/admin/banner/add',['uses'=>'Banner@create',

'as'=>'banner.create']

);

Route::get(

'/admin/banner/{our_id}/edit',['uses'=>'Banner@show',

'as'=>'banner.show']

);

Route::post(

'/admin/banner/update',['uses'=>'Banner@update',

'as'=>'banner.update']

);

Route::post(

'/admin/banner/add',['uses'=>'Banner@store',

'as'=>'banner.store']

);

Route::get(

'/admin/banner/{our_id}/delete',['uses'=>'Banner@destroy',

'as'=>'banner.delete']

);





Route::get(

'/admin/pac',['uses'=>'Packagecpntroller@index',

'as'=>'pac.index']

);

Route::get(

'/admin/pac/add',['uses'=>'Packagecpntroller@create',

'as'=>'pac.create']

);

Route::get(

'/admin/pac/{our_id}/edit',['uses'=>'Packagecpntroller@show',

'as'=>'pac.show']

);

Route::post(

'/admin/pac/update',['uses'=>'Packagecpntroller@update',

'as'=>'pac.update']

);

Route::post(

'/admin/pac/add',['uses'=>'Packagecpntroller@store',

'as'=>'pac.store']

);

Route::get(

'/admin/pac/{our_id}/delete',['uses'=>'Packagecpntroller@destroy',

'as'=>'pac.delete']

);









Route::get(

'/admin/howitworks',['uses'=>'Howitworks@index',

'as'=>'howitworks.index']

);

Route::get(

'/admin/howitworks/add',['uses'=>'Howitworks@create',

'as'=>'howitworks.create']

);

Route::get(

'/admin/howitworks/{our_id}/edit',['uses'=>'Howitworks@show',

'as'=>'howitworks.show']

);

Route::post(

'/admin/howitworks/update',['uses'=>'Howitworks@update',

'as'=>'howitworks.update']

);

Route::post(

'/admin/howitworks/add',['uses'=>'Howitworks@store',

'as'=>'howitworks.store']

);

Route::get(

'/admin/howitworks/{our_id}/delete',['uses'=>'Howitworks@destroy',

'as'=>'howitworks.delete']

);

Route::post(

'/admin/bannerajax/post',['uses'=>'Banner@get_data',

'as'=>'bannerajax.post']

);

Route::post(

'/admin/partnerajax/post',['uses'=>'Ourpartner@get_data',

'as'=>'partnerajax.post']

);



Route::get(

'/admin/cms',['uses'=>'Cms@index',

'as'=>'cms.index']

);

Route::get(

'/admin/cms/add',['uses'=>'Cms@create',

'as'=>'cms.create']

);

Route::get(

'/admin/cms/{our_id}/edit',['uses'=>'Cms@show',

'as'=>'cms.show']

);

Route::post(

'/admin/cms/update',['uses'=>'Cms@update',

'as'=>'cms.update']

);

Route::post(

'/admin/cms/add',['uses'=>'Cms@store',

'as'=>'cms.store']

);

Route::get(

'/admin/cms/{our_id}/delete',['uses'=>'Cms@destroy',

'as'=>'cms.delete']

);

/***********************New Route  For Admin EndNew Route  For Admin End**********************/











Route::post(

'/pdf/Upload',['uses'=>'pdf_upload@create',

'as'=>'pdf.upload.post']

);

Route::get(

'/pdf/Upload',['uses'=>'pdf_upload@index',

'as'=>'pdf.upload']

);

Route::post(

'/loginx',['uses'=>'Admincontroller@post_login',

'as'=>'login.post']

);

Route::get(

'/loginx',['uses'=>'Admincontroller@show_login',

'as'=>'loginx']

);



Route::get(

'/profile',['uses'=>'AdminProfile@index',

'as'=>'profile.index']

);

Route::post(

'/profile',['uses'=>'AdminProfile@store',

'as'=>'profile.post']

);

//Route For User Mangement

Route::get(

'/usermanagement',['uses'=>'UserManagement@index',

'as'=>'usermanagement.list']

);

Route::get(

'/usermanagement/{user_id}/edit',['uses'=>'UserManagement@edit',

'as'=>'usermanagement.edit']

);

Route::post(

'/usermanagement/update',['uses'=>'UserManagement@update',

'as'=>'usermanagement.update']

);

Route::post(

'/usermanagement/change_password',['uses'=>'UserManagement@change_password',

'as'=>'usermanagement.change_password']

);



Route::get(

'/user/{user_id}/delete',['uses'=>'UserManagement@delete_user',

'as'=>'user.delete']

);



Route::get(

'/emailcontent',['uses'=>'EmailManage@index',

'as'=>'emailcontent.index']

);

Route::get(

'/emailcontent/{mail_id}/edit',['uses'=>'EmailManage@show',

'as'=>'emailcontent.show']

);

Route::post(

'/emailcontent/edit',['uses'=>'EmailManage@edit',

'as'=>'emailcontent.edit']

);

Route::get(

'/admin/contactmanagement',['uses'=>'Contactus@index',

'as'=>'contactmanagement.list']

);

Route::get(

'/admin/contactmanagement/{contact_id}/delete',['uses'=>'Contactus@destroy',

'as'=>'contactmanagement.delete']

);

Route::get(

'/admin/contactmanagement/{contact_id}/show',['uses'=>'Contactus@show',

'as'=>'contactmanagement.show']

);

Route::post(

'/admin/contactmanagement/edit',['uses'=>'Contactus@edit',

'as'=>'contactmanagement.edit']

);

Route::get(

'/admin/contactmanagement/add',['uses'=>'Contactus@create',

'as'=>'contactmanagement.add']

);

Route::post(

'/admin/contactmanagement/add',['uses'=>'Contactus@store',

'as'=>'contactmanagement.store']

);



/*****************************New added category********************************/

Route::get(

'/admin/workcategory',['uses'=>'Workcategorycontroller@index',

'as'=>'workcategory.index']

);

Route::get(

'/admin/workcategory/add',['uses'=>'Workcategorycontroller@create',

'as'=>'workcategory.create']

);

Route::get(

'/admin/workcategory/{our_id}/edit',['uses'=>'Workcategorycontroller@show',

'as'=>'workcategory.show']

);

Route::post(

'/admin/workcategory/update',['uses'=>'Workcategorycontroller@update',

'as'=>'workcategory.update']

);

Route::post(

'/admin/workcategory/add',['uses'=>'Workcategorycontroller@store',

'as'=>'workcategory.store']

);

Route::get(

'/admin/workcategory/{our_id}/delete',['uses'=>'Workcategorycontroller@destroy',

'as'=>'workcategory.delete']

);



/*************************New Added Subcategory******************************/

Route::get(

'/admin/worksubcatcon',['uses'=>'Worksubcatcon@index',

'as'=>'worksubcatcon.index']

);

Route::get(

'/admin/worksubcatcon/add',['uses'=>'Worksubcatcon@create',

'as'=>'worksubcatcon.create']

);

Route::get(

'/admin/worksubcatcon/{our_id}/edit',['uses'=>'Worksubcatcon@show',

'as'=>'worksubcatcon.show']

);

Route::post(

'/admin/worksubcatcon/update',['uses'=>'Worksubcatcon@update',

'as'=>'worksubcatcon.update']

);

Route::post(

'/admin/worksubcatcon/add',['uses'=>'Worksubcatcon@store',

'as'=>'worksubcatcon.store']

);

Route::get(

'/admin/worksubcatcon/{our_id}/delete',['uses'=>'Worksubcatcon@destroy',

'as'=>'worksubcatcon.delete']

);











/*************************Newly Added For Estimation ******************************/











/*******************************************************/









/*******************************************************/

});



Route::group(array('middleware' =>'App\Http\Middleware\UserMiddleware'), function()

{



Route::get(

'/developer',['uses'=>'Home@developer',

'as'=>'home.developer']

);

Route::get(

'/home/logout',['uses'=>'Frontuserauth@getlogout',

'as'=>'home.logout']

);

Route::get(

'/exterior',['uses'=>'Home@exterior',

'as'=>'home.exterior']

);

Route::get(

'/interior',['uses'=>'Home@interior',

'as'=>'home.interior']

);

Route::get(

'/frontendprofile',['uses'=>'Frontuserauth@profile',

'as'=>'frontuserauth.profile']

);

Route::post(

'/frontendprofile',['uses'=>'Frontuserauth@update_profile',

'as'=>'frontuserauth.update_profile']

);

Route::post(

'/frontendprofilepass',['uses'=>'Frontuserauth@change',

'as'=>'frontuserauth.profilepass']

);

Route::post(

'/frontendprofilepass',['uses'=>'Frontuserauth@upload',

'as'=>'upload-post']

);

Route::get(

'/frontendprofilepass',['uses'=>'Frontuserauth@profilepass',

'as'=>'frontuserauth.profilepass']

);

Route::get(

'/checkout/{our_id}',['uses'=>'Checkoutcon@index',

'as'=>'checkout.index']

);



});









Route::group(['middleware' => ['web'],'before' =>['auth']], function()

{

Route::get('/admin/login',[

	'uses'=>'Admincontroller@index',

	'as'=>'login',



]);

Route::post('/admin/login',[

	'uses'=>'Admincontroller@postlogin',

	'as'=>'admin.login.post',



]);

Route::post(

'/sendresetlink',['uses'=>'AdminProfile@send_reset_link',

'as'=>'sendresetlink']

);



Route::get(

'/mailverification/{token}/{id}',['uses'=>'AdminProfile@mailverification',

'as'=>'mailverification']

);



Route::post(

'/resetpassword',['uses'=>'AdminProfile@reset_password',

'as'=>'resetpassword']

);





Route::get('/admin/logout',[

	'uses'=>'Admincontroller@getlogout',

	'as'=>'admin.logout',



]);

Route::get(

'/home',['uses'=>'Home@index',

'as'=>'home.index']

);

Route::get('/clear-cache', function() {

    $exitCode = Artisan::call('cache:clear');

    // return what you want

});



//FOR FRONTEN USER LOGIN SCREEEN

Route::get('/login',[

	'uses'=>'Frontuserauth@index',

	'as'=>'frontlogin',



]);

Route::post('/login',[

	'uses'=>'Frontuserauth@postlogin',

	'as'=>'frontlogin',



]);

Route::get('/register',[

	'uses'=>'Frontuserauth@register',

	'as'=>'frontloginregister',



]);

Route::get('/forgetpassword',[

	'uses'=>'Frontuserauth@forgetpassword',

	'as'=>'forgetpassword',



]);

Route::post('/register',[

	'uses'=>'Frontuserauth@store',

	'as'=>'frontloginregister',

]);

Route::post(
'/registerajax/post',['uses'=>'Frontuserauth@get_states',
'as'=>'registerajax.post']
);
Route::post(
'/registerajax/post',['uses'=>'Frontuserauth@get_states',
'as'=>'registerajax.post']
);
Route::post(
'/registerajaxcity/post',['uses'=>'Frontuserauth@get_cities',
'as'=>'registerajaxcity.post']
);



Route::post('/frontsendresetlink',[

	'uses'=>'Frontuserauth@send_reset_link',

	'as'=>'frontsendresetlink',



]);

Route::post('/frontresetpassword',[

	'uses'=>'Frontuserauth@reset_password',

	'as'=>'frontresetpassword',



]);

Route::get(

'/frontmailverification/{token}/{id}',['uses'=>'Frontuserauth@mailverification',

'as'=>'frontmailverification']

);

Route::post('/register/mailcheck',[

	'uses'=>'Frontuserauth@mail_check',

	'as'=>'register.mailcheck',



]);

Route::get(

'/about',['uses'=>'Home@about',

'as'=>'home.about']

);

Route::get(

'/contact',['uses'=>'contact@index',

'as'=>'contact.index']

);

Route::get(

'/package',['uses'=>'Pacfront@index',

'as'=>'package.index']

);



Route::post('/contact/post',[

	'uses'=>'contact@contact_post',

	'as'=>'contact.contact_post',



]);

Route::get(

'/paypal',['uses'=>'PaymentCon@getCheckout',

'as'=>'paypal.index']

);



Route::get('payPremium', ['as'=>'payPremium','uses'=>'PaymentCon@payPremium']);

Route::post('getCheckout', ['as'=>'getCheckout','uses'=>'PaymentCon@getCheckout']);

Route::get('getDone', ['as'=>'getDone','uses'=>'PaymentCon@getDone']);

Route::get('getCancel', ['as'=>'getCancel','uses'=>'PaymentCon@getCancel']);

});

