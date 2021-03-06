<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',['as'=>'admin.index', 'uses'=>'HomeController@index']);

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

	//Kasir
	    Route::group(['prefix'=>'kasir'], function(){
            Route::get('/{id}',['as'=>'adminltein.kasir.index', 'uses'=>'Admin\KasirController@index']);
            Route::post('/add-item/{id}',['as'=>'admin.kasir.add-item', 'uses'=>'Admin\KasirController@addItem']);
            Route::post('/submit-transaksi','Admin\KasirController@submitTransaksi');
            Route::get('delete-item/{id}', ['as'=>'admin.kasir.delete-item', 'uses'=>'Admin\KasirController@deleteItem']);
            Route::get('hapus/{id}', ['as'=>'admin.kasir.index', 'uses'=>'Admin\TransaksiController@delete']);
        });
            Route::get('/autocomplete',['as'=>'autocomplete', 'uses'=>'Admin\KasirController@autocomplete']);
    
    //Transaksi
        Route::group(['prefix'=>'transaksi'], function(){
                Route::get('/', ['as'=>'admin.transaksi.index', 'uses'=>'Admin\TransaksiController@index']);
                Route::get('/add-transaksi',['as'=>'admin.transaksi.add-transaksi', 'uses'=>'Admin\TransaksiController@addTransaksi']);
                Route::get('/{id}/view-transaksi',['as'=>'admin.transaksi.view-transaksi', 'uses'=>'Admin\TransaksiController@viewTransaksi']);
        }); 
//User History
        Route::group(['prefix'=>'user-history'], function(){
            Route::get('/', ['as'=>'admin.user-history.index', 'uses'=>'Admin\UserHistoryController@index']);
        });        
           
	//Barang
        Route::group(['prefix'=>'barang'], function(){
            Route::get('/',['as'=>'admin.barang.index', 'uses'=>'Admin\BarangController@index']);
            Route::get('/tambah',['as'=>'admin.barang.tambah', 'uses'=>'Admin\BarangController@tambah']);
            Route::post('/tambah',['as'=>'admin.barang.post.tambah', 'uses'=>'Admin\BarangController@postTambah']);
            Route::get('/{id}/hapus',['as'=>'admin.barang.hapus', 'uses'=>'Admin\BarangController@hapus']);
           	Route::get('/{kode_barang}/edit',['as'=>'admin.barang.edit', 'uses'=>'Admin\BarangController@edit']);
            Route::post('/{kode_barang}/edit',['as'=>'admin.barang.edit', 'uses'=>'Admin\BarangController@postEdit']);

        });

        Route::group(['prefix'=>'merk'], function(){
            Route::get('/',['as'=>'admin.barang.index', 'uses'=>'Admin\MerkController@index']);
            Route::get('/tambah',['as'=>'admin.barang.tambah', 'uses'=>'Admin\BarangController@tambah']);
            Route::post('/tambah',['as'=>'admin.barang.post.tambah', 'uses'=>'Admin\BarangController@postTambah']);
            Route::get('/{id}/hapus',['as'=>'admin.barang.hapus', 'uses'=>'Admin\BarangController@hapus']);
            Route::get('/{id}/edit',['as'=>'admin.barang.edit', 'uses'=>'Admin\MerkController@edit']);
            Route::post('/{id}/edit',['as'=>'admin.barang.edit', 'uses'=>'Admin\MerkController@postEdit']);

        });
    //StokBarang
        Route::group(['prefix'=>'stok_barang'], function(){
            Route::get('/',['as'=>'admin.stok_barang.index', 'uses'=>'Admin\StokBarangController@index']);
            Route::get('/{id}/hapus',['as'=>'admin.stok_barang.hapus', 'uses'=>'Admin\StokBarangController@hapus']);
            Route::get('/{id}/edit',['as'=>'admin.stok_barang.edit', 'uses'=>'Admin\StokBarangController@edit']);
            Route::post('/{id}/edit',['as'=>'admin.stok_barang.edit', 'uses'=>'Admin\StokBarangController@postEdit']);
            // Route::get('/tambah',['as'=>'admin.stok_barang.tambah', 'uses'=>'Admin\StokBarangController@tambah']);
            // Route::post('/tambah',['as'=>'admin.stok_barang.post.tambah', 'uses'=>'Admin\StokBarangController@postTambah']);

        });
        
});
