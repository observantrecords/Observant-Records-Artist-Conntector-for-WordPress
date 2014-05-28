<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array( 'as' => 'home', 'before' => 'auth', 'uses' => 'ArtistController@browse' ) );

// Artist
Route::model('artist', 'Artist');
Route::get('/artist/browse', array( 'as' => 'artist.browse', 'before' => 'auth', 'uses' => 'ArtistController@browse' ) );
Route::get( '/artist/view/{id}', array( 'as' => 'artist.view', 'before' => 'auth', 'uses' => 'ArtistController@view' ) );
Route::get( '/artist/add', array( 'as' => 'artist.add', 'before' => 'auth', 'uses' => 'ArtistController@add' ) );
Route::get( '/artist/edit/{id}', array( 'as' => 'artist.edit', 'before' => 'auth', 'uses' => 'ArtistController@edit' ) );
Route::get( '/artist/delete/{id}', array( 'as' => 'artist.delete', 'before' => 'auth', 'uses' => 'ArtistController@delete' ) );
Route::post( '/artist/update/{artist?}', array( 'as' => 'artist.update', 'before' => 'auth|csrf', 'uses' => 'ArtistController@update' ) );
Route::post( '/artist/remove/{artist}', array( 'as' => 'artist.remove', 'before' => 'auth|csrf', 'uses' => 'ArtistController@remove' ) );

// Album
Route::model('album', 'Album');
Route::get('/album/browse/{id}', array( 'as' => 'album.browse', 'before' => 'auth', 'uses' => 'AlbumController@browse' ) );
Route::get( '/album/view/{id}', array( 'as' => 'album.view', 'before' => 'auth', 'uses' => 'AlbumController@view' ) );
Route::get( '/album/add/{id}', array( 'as' => 'album.add', 'before' => 'auth', 'uses' => 'AlbumController@add' ) );
Route::get( '/album/edit/{id}', array( 'as' => 'album.edit', 'before' => 'auth', 'uses' => 'AlbumController@edit' ) );
Route::get( '/album/delete/{id}', array( 'as' => 'album.delete', 'before' => 'auth', 'uses' => 'AlbumController@delete' ) );
Route::post( '/album/update/{album?}', array( 'as' => 'album.update', 'before' => 'auth', 'uses' => 'AlbumController@update' ) );
Route::post( '/album/remove/{album}', array( 'as' => 'album.remove', 'before' => 'auth', 'uses' => 'AlbumController@remove' ) );

// Release
Route::model('release', 'Release');
Route::get('/release/browse/{id}', array( 'as' => 'release.browse', 'before' => 'auth', 'uses' => 'ReleaseController@browse' ) );
Route::get( '/release/view/{id}', array( 'as' => 'release.view', 'before' => 'auth', 'uses' => 'ReleaseController@view' ) );
Route::get( '/release/add/{id}', array( 'as' => 'release.add', 'before' => 'auth', 'uses' => 'ReleaseController@add' ) );
Route::get( '/release/edit/{id}', array( 'as' => 'release.edit', 'before' => 'auth', 'uses' => 'ReleaseController@edit' ) );
Route::get( '/release/delete/{id}', array( 'as' => 'release.delete', 'before' => 'auth', 'uses' => 'ReleaseController@delete' ) );
Route::post( '/release/update/{album?}', array( 'as' => 'release.update', 'before' => 'auth', 'uses' => 'ReleaseController@update' ) );
Route::post( '/release/remove/{album}', array( 'as' => 'release.remove', 'before' => 'auth', 'uses' => 'ReleaseController@remove' ) );

// Tracks
Route::model('track', 'Track');
Route::get('/track/browse/{id}', array( 'as' => 'track.browse', 'before' => 'auth', 'uses' => 'TrackController@browse' ) );
Route::get( '/track/view/{id}', array( 'as' => 'track.view', 'before' => 'auth', 'uses' => 'TrackController@view' ) );
Route::get( '/track/add/{id}', array( 'as' => 'track.add', 'before' => 'auth', 'uses' => 'TrackController@add' ) );
Route::get( '/track/edit/{id}', array( 'as' => 'track.edit', 'before' => 'auth', 'uses' => 'TrackController@edit' ) );
Route::get( '/track/delete/{id}', array( 'as' => 'track.delete', 'before' => 'auth', 'uses' => 'TrackController@delete' ) );
Route::post( '/track/update/{album?}', array( 'as' => 'track.update', 'before' => 'auth', 'uses' => 'TrackController@update' ) );
Route::post( '/track/remove/{album}', array( 'as' => 'track.remove', 'before' => 'auth', 'uses' => 'TrackController@remove' ) );

// Ecommerce
Route::model('ecommerce', 'Ecommerce');
Route::get('/ecommerce/browse/{id}', array( 'as' => 'ecommerce.browse', 'before' => 'auth', 'uses' => 'EcommerceController@browse' ) );
Route::get( '/ecommerce/view/{id}', array( 'as' => 'ecommerce.view', 'before' => 'auth', 'uses' => 'EcommerceController@view' ) );
Route::get( '/ecommerce/add/{id}', array( 'as' => 'ecommerce.add', 'before' => 'auth', 'uses' => 'EcommerceController@add' ) );
Route::get( '/ecommerce/edit/{id}', array( 'as' => 'ecommerce.edit', 'before' => 'auth', 'uses' => 'EcommerceController@edit' ) );
Route::get( '/ecommerce/delete/{id}', array( 'as' => 'ecommerce.delete', 'before' => 'auth', 'uses' => 'EcommerceController@delete' ) );
Route::post( '/ecommerce/update/{album?}', array( 'as' => 'ecommerce.update', 'before' => 'auth', 'uses' => 'EcommerceController@update' ) );
Route::post( '/ecommerce/remove/{album}', array( 'as' => 'ecommerce.remove', 'before' => 'auth', 'uses' => 'EcommerceController@remove' ) );

// Songs
Route::model('song', 'Song');
Route::get('/song/browse/{id}', array( 'as' => 'song.browse', 'before' => 'auth', 'uses' => 'SongController@browse' ) );
Route::get( '/song/view/{id}', array( 'as' => 'song.view', 'before' => 'auth', 'uses' => 'SongController@view' ) );
Route::get( '/song/add/{id}', array( 'as' => 'song.add', 'before' => 'auth', 'uses' => 'SongController@add' ) );
Route::get( '/song/edit/{id}', array( 'as' => 'song.edit', 'before' => 'auth', 'uses' => 'SongController@edit' ) );
Route::get( '/song/delete/{id}', array( 'as' => 'song.delete', 'before' => 'auth', 'uses' => 'SongController@delete' ) );
Route::post( '/song/update/{album?}', array( 'as' => 'song.update', 'before' => 'auth', 'uses' => 'SongController@update' ) );
Route::post( '/song/remove/{album}', array( 'as' => 'song.remove', 'before' => 'auth', 'uses' => 'SongController@remove' ) );

// Recordings
Route::model('recording', 'Recording');
Route::get('/recording/browse/{id}', array( 'as' => 'recording.browse', 'before' => 'auth', 'uses' => 'RecordingController@browse' ) );
Route::get( '/recording/view/{id}', array( 'as' => 'recording.view', 'before' => 'auth', 'uses' => 'RecordingController@view' ) );
Route::get( '/recording/add/{id}', array( 'as' => 'recording.add', 'before' => 'auth', 'uses' => 'RecordingController@add' ) );
Route::get( '/recording/edit/{id}', array( 'as' => 'recording.edit', 'before' => 'auth', 'uses' => 'RecordingController@edit' ) );
Route::get( '/recording/delete/{id}', array( 'as' => 'recording.delete', 'before' => 'auth', 'uses' => 'RecordingController@delete' ) );
Route::post( '/recording/update/{album?}', array( 'as' => 'recording.update', 'before' => 'auth', 'uses' => 'RecordingController@update' ) );
Route::post( '/recording/remove/{album}', array( 'as' => 'recording.remove', 'before' => 'auth', 'uses' => 'RecordingController@remove' ) );

// Authentication
Route::get( '/login', array( 'as' => 'auth.login', 'uses' => 'AuthController@login') );
Route::get( '/logout', array( 'as' => 'auth.logout', 'uses' => 'AuthController@sign_out' ) );
Route::post( '/signin', array( 'as' => 'auth.signin', 'uses' => 'AuthController@sign_in' ) );