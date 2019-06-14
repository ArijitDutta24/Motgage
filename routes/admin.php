<?php
/*
 * For Admin Section
 */

//------------------Start Admin Login Route---------------------//
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin.guest']], function () { 

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login')->name('admin.login');
    Route::get('reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post('reset-password', 'Auth\ResetPasswordController@reset')->name('admin.password.reset-password');
    Route::post('reset-password', 'Auth\ResetPasswordController@reset')->name('admin.password.update');

});
//---------------------End Admin Login Route---------------------//



Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['admin.auth']], function () {

        //------------Start Admin Logout Route--------------//
        Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');
        //-------------End Admin Logout Route---------------//



        //-----------Start Admin Dashboard Route------------//
    Route::get('dashboard', 'AdminDashboardController@index')->name('admin.dashboard');

    Route::get('profile', 'AdminDashboardController@profile')->name('admin.profile');

    Route::post('update/{id}', 'AdminDashboardController@profileUpdate')->name('admin.updateProfile');
    Route::post('imgUpdate/{id}', 'AdminDashboardController@profileImageUpdate')->name('admin.profilePicUpdate');
        //------------End Admin Dashboard Route------------//








        //-------------Start Admin Client Route------------// 
    Route::group(['prefix' => 'client'], function () {

        //Add
    	Route::get('/add', 'client\ClientController@add')->name('admin.client');
     	Route::post('/add', 'client\ClientController@store')->name('admin.addClient');

        //List
    	Route::get('/list', 'client\ClientController@index')->name('admin.clientList');

        //Edit
    	Route::get('/edit/{id}', 'client\ClientController@edit')->name('admin.cliEdit');
    	Route::post('/update/{id}', 'client\ClientController@update')->name('admin.cliUpdate');

        //Status
    	Route::get('/active/{id}', 'client\ClientController@status')->name('admin.active');

        //Personal Details
    	Route::get('/userDetails/{id}', 'client\ClientController@userDetails')->name('admin.proDetails');

        //Property Details
    	Route::get('/bidDetails/{id}', 'client\ClientController@bidDetails')->name('admin.bidDetails');
    	
        //Delete
        Route::delete('/delete/{id}', 'client\ClientController@delete')->name('admin.clientDelete');
    	
    });
        //--------------End Admin Client Route--------------//










        //-------------Start Admin Bidder Route-------------//
    Route::get('bidder', 'AdminDashboardController@listBidder')->name('admin.bidder');
        //--------------End Admin Bidder Route--------------//








        //-------------Start Admin CMS Route---------------//
    Route::group(['prefix' => 'cms'], function () {

		Route::get('/', 'cms\CmsController@index')->name('admin.cms');
    	Route::get('/{id}', 'cms\CmsController@edit')->name('admin.cmsEdit');
    	Route::post('/{id}', 'cms\CmsController@update')->name('admin.cmsUpdate');

    });
        //--------------End Admin CMS Route---------------//










        //-----------Start Admin Category Route-----------//
    Route::group(['prefix' => 'category'], function () {
        
        //List
        Route::get('/', 'category\CategoryController@index')->name('admin.catList');
        //Sub List
        Route::get('/detail/{id}', 'category\CategoryController@subdetail')->name('admin.catDet');
        //Sub Sub List
        Route::get('/subdetail/{id}', 'category\CategoryController@subsubdetail')->name('admin.catSubDet');
        //Ajax Fetch
        Route::post('/fetch', 'category\CategoryController@ajaxFetch')->name('admin.catFetch');
        

        //Add
        Route::get('/add', 'category\CategoryController@add')->name('admin.catAdd');
        Route::post('/add', 'category\CategoryController@store')->name('admin.catStore');
        

        //Edit
        Route::get('/edit/{id}', 'category\CategoryController@edit')->name('admin.catEdit'); 
        Route::post('/edit/{id}', 'category\CategoryController@update')->name('admin.catUpdate');

        //Delete
        Route::delete('/delete/{id}', 'category\CategoryController@delete')->name('admin.catDel');
        

    });
        //-------------End Admin Category Route-------------//








      //-----------Start Admin Property Route-----------//
    Route::group(['prefix' => 'property'], function () {
        
        //List
        Route::get('/', 'property\PropertyController@index')->name('admin.propList');

        //Gallery
        Route::get('/gallery/{id}', 'property\PropertyController@gallery')->name('admin.propGalleryList');

        //Details
        Route::get('/details/{id}', 'property\PropertyController@details')->name('admin.propdetails');

        //Add
        Route::get('/add', 'property\PropertyController@add')->name('admin.propAdd');
        Route::post('/add', 'property\PropertyController@store')->name('admin.propStore');


        //Ajax Fetch Record
        Route::post('/fetch', 'property\PropertyController@ajaxFetch')->name('admin.catPropFetch');
        Route::post('/subfetch', 'property\PropertyController@ajaxSubFetch')->name('admin.catPropSubFetch');
        


        //Edit
        Route::get('/edit/{id}', 'property\PropertyController@edit')->name('admin.propedit');
        Route::post('/edit/{id}', 'property\PropertyController@update')->name('admin.propupdate');


        //Gallery Edit
        Route::post('/galleryedit/{id}', 'property\PropertyController@galleryUpdate')->name('admin.mainPicUpdate'); 

        Route::post('/multipleImageEdit/{id}', 'property\PropertyController@multipleImageUpdate')->name('admin.mulPicUpdate');        


        //Delete
        Route::post('/softdelete/{id}', 'property\PropertyController@softDelete')->name('admin.softdelete');
        Route::post('/delete/{id}', 'property\PropertyController@delete')->name('admin.propdelete');

        //Gallery Delete
        Route::post('/picturedelete/{id}', 'property\PropertyController@galleryDelete')->name('admin.gallerydelete');

        //Status
        Route::get('/status/{id}', 'property\PropertyController@status')->name('admin.propstatus');
        
        
        
        

    });
        //-------------End Admin Property Route-------------//


        //-------------End Admin Currency Route-------------//

            Route::group(['prefix' => 'currency'], function () {
        
        //List
        Route::get('/', 'currency\CurrencyController@index')->name('admin.currList');

        
        //Add
        Route::get('/add', 'currency\CurrencyController@add')->name('admin.currAdd');
        Route::post('/add', 'currency\CurrencyController@store')->name('admin.currStore');

        

        //Edit
        Route::get('/edit/{id}', 'currency\CurrencyController@edit')->name('admin.curredit');
        Route::post('/edit/{id}', 'currency\CurrencyController@update')->name('admin.currupdate');


        //Delete
        Route::post('/softdelete/{id}', 'currency\CurrencyController@softDelete')->name('admin.currsoftdelete');
        Route::post('/delete/{id}', 'currency\CurrencyController@delete')->name('admin.currdelete');


        //Status
        Route::get('/status/{id}', 'currency\CurrencyController@status')->name('admin.currstatus');
        
        
        
        

    });


        //-------------End Admin Currency Route-------------//





        //-------------Start Admin Bidding Route-------------//
        Route::group(['prefix' => 'bidding'], function () {

            Route::get('/live', 'bidding\BiddingController@liveAcutionList')->name('admin.liveAuctionList');
            Route::get('/sold', 'bidding\BiddingController@soldAcutionList')->name('admin.soldAuctionList');
            Route::get('/expired', 'bidding\BiddingController@expiredAcutionList')->name('admin.expiredAuctionList');
            // Route::get('/{id}', 'cms\CmsController@edit')->name('admin.cmsEdit');
            // Route::post('/{id}', 'cms\CmsController@update')->name('admin.cmsUpdate');

        });
        //--------------End Admin Bidding Route--------------//

});
