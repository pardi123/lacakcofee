<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE; 
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Router';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['beranda-admin'] = "admin/AdminPage/berandaAdmin";
$route['index']= "Welcome";
$route['auth'] = "auth/Auth/login";
$route['add-user'] = "auth/Auth/registUser";
$route['changePassword'] = "Welcome/changePassWord";
$route['validasiPass'] = "Welcome/ValidatePass";
$route['newPass'] = "Welcome/newPass";
$route['logout'] = "auth/Auth/logout";


// --- Admin page --- //
$route['kelola-provinsi'] = "admin/AdminPage/kelolaprovinsi";
$route['kelola-kota'] = "admin/AdminPage/kelolaKota";
$route['kelola-store'] = "admin/AdminPage/addStore";
$route['kelola-user'] = "admin/AdminPage/kelolaUser";

//--- Admin Lokasi ---- ///
$route['add-provinsi'] = "admin/AdminLokasi/addProvinsi";
$route['data-provinsi'] = "admin/AdminLokasi/dataProvinsi";
$route['form-provinsi'] = "admin/AdminLokasi/formProvinsi";
$route['edit-provinsi'] = "admin/AdminLokasi/editProvinsi";
$route['delete-provinsi'] = "admin/AdminLokasi/deleteProvinsi";
$route['add-kota'] = "admin/AdminLokasi/addKota";
$route['data-kota'] = "admin/AdminLokasi/dataKota";
$route['form-kota'] = "admin/AdminLokasi/formKota";
$route['edit-kota']= "admin/AdminLokasi/editKota";
$route['delete-kota']= "admin/AdminLokasi/deleteKota";
$route['reload-kota'] = "admin/AdminLokasi/reloadKota";

// --- Admin-cafe --- //
$route['add-cafe'] = "admin/CafeAdmin/addCafe";
$route['data-cafe'] = "admin/CafeAdmin/dataCafe";
$route['formCafe'] = "admin/CafeAdmin/formCafe";
$route['edit-cafe'] = "admin/CafeAdmin/editCafe";
$route['delete-cafe'] = "admin/CafeAdmin/deleteCafe";
$route['formAva'] = "admin/CafeAdmin/formAva";
$route['add-ava'] = "admin/CafeAdmin/addAva";
$route['form-menu'] = "admin/CafeAdmin/formMenu";
$route['add-menu'] = "admin/CafeAdmin/addMenu";
//--- Admin User ---//
$route['delete-user'] = "admin/CafeAdmin/deleteUser";
$route['data-user'] = "admin/CafeAdmin/dataUser";

// --- LandingPage --- //
$route['cari-cafe'] = "User/cariCafe/";
$route['cafe/(:any)'] = "User/cafe/$1";
$route['profile'] = "User/profile";
$route['kunjungan'] = "User/baruDilihat";


//--- ActionUser --- //
$route['followUser'] = "User/followUser";
$route['edit-profile'] = "User/editProfile";
$route['profile-person/(:any)'] = "User/profilePerson/$1";
$route['edit-photo-user'] = "User/editPhoto";
$route['add-ulasan'] = "User/addUlasan";
//--- Store Page -- //
$route['beranda-store'] = "store/StorePage/berandaStore";
$route['store-kelola-menu'] = "store/StorePage/kelolaCafe";
$route['kelola-foto']  = "store/StorePage/kelolaFoto";
$route['kelola-media'] = "store/StorePage/kelolaMedia";

//---Store Action -- //
$route['data-menu'] = "store/StoreAction/dataMenu";
$route['delete-menu']  = "store/StoreAction/deleteMenu";
$route['data-foto'] = "store/StoreAction/dataFoto";
$route['delete-foto'] = "store/StoreAction/deleteFoto";
$route['delete-video'] = "store/StoreAction/deleteVideo";
$route['add-media'] = "store/StoreAction/addMedia";
$route['data-media'] = "store/StoreAction/dataMedia";
$route['delete-media'] = "store/StoreAction/deletemedia";
