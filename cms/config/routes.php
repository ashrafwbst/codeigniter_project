<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['admin'] = "admin/admin/index";
$route['admin/index'] = "admin/admin/index";
$route['admin/login'] = "admin/admin/login";
$route['admin/login/error'] = "admin/admin/login";
$route['admin/login/check'] = "admin/admin/loginCheck";
$route['admin/login/:any'] = "admin/admin/login";
$route['admin/logout'] = "admin/admin/logout";
$route['admin/analytics/:num'] = "admin/admin/analytics";
$route['admin/analytics'] = "admin/admin/analytics";
$route['admin/admin/deleteEmailLogs/:any'] = "admin/admin/deleteEmailLogs";
$route['admin/admin/deleteEmailLogs'] = "admin/admin/deleteEmailLogs";
$route['admin/admin/deleteLoginLogs/:any'] = "admin/admin/deleteLoginLogs";
$route['admin/admin/deleteLoginLogs'] = "admin/admin/deleteLoginLogs";
$route['admin/admin/saveDraft'] = "admin/admin/saveDraft";
$route['admin/users'] = "admin/users";
$route['admin/users/new'] = "admin/users/addUser";
$route['admin/users/new/add'] = "admin/users/confirm";
$route['admin/users/delete'] = "admin/users/delete";
$route['admin/users/delete/:any'] = "admin/users/delete";
$route['admin/users/edit'] = "admin/users/editUser";
$route['admin/users/edit/:any'] = "admin/users/editUser";
$route['admin/users/edited/:any'] = "admin/users/edited";
$route['admin/users/:num'] = "admin/users";
$route['admin/user/forgot'] = 'admin/users/forgot';
$route['admin/users/view'] = "admin/users/viewUsers";
$route['admin/users/view/:any'] = "admin/users/viewUsers";
$route['admin/reset/:any'] = 'admin/users/getPassword';
$route['admin/settings'] = "admin/admin/settings";
$route['admin/settings/update'] = "admin/admin/updateSettings";
$route['admin/settings/gensitemap'] = "admin/admin/genSitemap";
$route['admin/settings/testsendmail'] = "admin/admin/testSendMail";
$route['admin/social'] = "admin/admin/social";
$route['admin/social/update'] = "admin/admin/updateSocial";
$route['admin/navigation'] = "admin/navigation";
$route['admin/navigation/save'] = "admin/navigation/saveNav";
$route['admin/navigation/new'] = "admin/navigation/newNav";
$route['admin/navigation/insert'] = "admin/navigation/insert";
$route['admin/navigation/edit'] = "admin/navigation/editNav";
$route['admin/navigation/edit/:any'] = "admin/navigation/editNav";
$route['admin/navigation/delete'] = "admin/navigation/deleteNav";
$route['admin/navigation/delete/:any'] = "admin/navigation/deleteNav";
$route['admin/navigation/update/:any'] = "admin/navigation/update";
$route['admin/navigation/:any'] = "admin/navigation";
$route['admin/lang'] = "admin/languages";
$route['admin/lang/indexSave'] = "admin/languages/indexSave";
$route['admin/lang/new'] = "admin/languages/addLang";
$route['admin/lang/insert'] = "admin/languages/insert";
$route['admin/lang/delete'] = "admin/languages/delete";
$route['admin/lang/delete/:any'] = "admin/languages/delete";
$route['admin/lang/edit'] = "admin/languages/editLang";
$route['admin/lang/edit/:any'] = "admin/languages/editLang";
$route['admin/lang/edited/:any'] = "admin/languages/edited";
$route['admin/lang/:num'] = "admin/languages";
$route['admin/pages'] = "admin/pages";
$route['admin/pages/new'] = "admin/pages/addPages";
$route['admin/pages/asCopy'] = "admin/pages/asCopy";
$route['admin/pages/insert'] = "admin/pages/insert";
$route['admin/pages/delete'] = "admin/pages/delete";
$route['admin/pages/delete/:any'] = "admin/pages/delete";
$route['admin/pages/edit'] = "admin/pages/editPages";
$route['admin/pages/edit/:any'] = "admin/pages/editPages";
$route['admin/pages/edited/:any'] = "admin/pages/edited";
$route['admin/pages/:num'] = "admin/pages";
$route['admin/uploadindex'] = "admin/admin/uploadIndex";
$route['admin/uploadindex/:num'] = "admin/admin/uploadIndex";
$route['admin/fileupload'] = "admin/admin/filesUpload";
$route['admin/filehtmlupload'] = "admin/admin/htmlUpload";
$route['admin/uploadindex_save'] = "admin/admin/uploadIndexSave";
$route['admin/uploadDownload'] = "admin/admin/uploadDownload";
$route['admin/uploadDownload/:num'] = "admin/admin/uploadDownload";
$route['admin/forms'] = "admin/forms";
$route['admin/forms/new'] = "admin/forms/addForms";
$route['admin/forms/insert'] = "admin/forms/insert";
$route['admin/forms/delete/:any'] = "admin/forms/delete";
$route['admin/forms/delete'] = "admin/forms/delete";
$route['admin/forms/deleteField/:any/:any'] = "admin/forms/deleteField";
$route['admin/forms/deleteField/:any'] = "admin/forms/deleteField";
$route['admin/forms/deleteField'] = "admin/forms/deleteField";
$route['admin/forms/edit/:any'] = "admin/forms/editForms";
$route['admin/forms/edit'] = "admin/forms/editForms";
$route['admin/forms/edited/:any'] = "admin/forms/edited";
$route['admin/forms/view'] = "admin/forms/viewForm";
$route['admin/forms/view/:any'] = "admin/forms/viewForm";
$route['admin/forms/view/:any/:num'] = "admin/forms/viewForm";
$route['admin/forms/view/delete'] = "admin/forms/deleteViewData";
$route['admin/forms/view/:num/delete'] = "admin/forms/deleteViewData";
$route['admin/forms/:num'] = "admin/forms";
$route['admin/upgrade'] = "admin/upgrade";
$route['admin/upgrade/download'] = "admin/upgrade/download";
$route['admin/upgrade/install'] = "admin/upgrade/install";
$route['admin/upgrade/optimize'] = "admin/upgrade/dbOptimize";
$route['admin/upgrade/backup'] = "admin/upgrade/dbBackup";
$route['admin/upgrade/filebackup'] = "admin/upgrade/fileBackup";
$route['admin/upgrade/photobackup'] = "admin/upgrade/photoBackup";
$route['admin/upgrade/downloadErrLog'] = "admin/upgrade/downloadErrLog";
$route['admin/upgrade/clearAllCache'] = "admin/upgrade/clearAllCache";
$route['admin/upgrade/clearAllDBCache'] = "admin/upgrade/clearAllDBCache";
$route['admin/upgrade/clearAllErrLog'] = "admin/upgrade/clearAllErrLog";
$route['admin/upgrade/clearAllSession'] = "admin/upgrade/clearAllSession";
$route['admin/upgrade/:any'] = "admin/upgrade";
$route['admin/linkstats'] = "admin/linkstats";
$route['admin/linkstats/new'] = "admin/linkstats/addLinks";
$route['admin/linkstats/insert'] = "admin/linkstats/insert";
$route['admin/linkstats/view'] = "admin/linkstats/view";
$route['admin/linkstats/view/:any'] = "admin/linkstats/view";
$route['admin/linkstats/view/:any/:num'] = "admin/linkstats/view";
$route['admin/linkstats/deleteindexurl'] = "admin/linkstats/deleteIndexByURL";
$route['admin/linkstats/deleteviewid'] = "admin/linkstats/deleteViewByID";
$route['admin/linkstats/:num'] = "admin/linkstats";
$route['admin/genlabel'] = "admin/General_label";
$route['admin/genlabel/edit/:any'] = "admin/General_label/edit";
$route['admin/genlabel/edit'] = "admin/General_label/edit";
$route['admin/genlabel/updated/:any'] = "admin/General_label/updated";
$route['admin/genlabel/synclang'] = "admin/General_label/syncLang";
$route['admin/genlabel/:num'] = "admin/General_label";
$route['admin/plugin/setstatus/:any'] = "admin/Plugin_manager/setstatus";
$route['admin/plugin/([a-zA-Z]+)/add'] = "admin/plugin/$1/add";
$route['admin/plugin/([a-zA-Z]+)/addsave'] = "admin/plugin/$1/addSave";
$route['admin/plugin/([a-zA-Z]+)/edit/:any'] = "admin/plugin/$1/edit";
$route['admin/plugin/([a-zA-Z]+)/editsave/:any'] = "admin/plugin/$1/editSave";
$route['admin/plugin/([a-zA-Z]+)/delete/:any'] = "admin/plugin/$1/delete";
$route['admin/plugin/([a-zA-Z]+)/view/:any'] = "admin/plugin/$1/view";
$route['admin/plugin/([a-zA-Z]+)/([a-zA-Z]+)/:any/:num'] = "admin/plugin/$1/$2/$3";
$route['admin/plugin/([a-zA-Z]+)/([a-zA-Z]+)/:any'] = "admin/plugin/$1/$2/$3";
$route['admin/plugin/([a-zA-Z]+)/([a-zA-Z]+)/:num'] = "admin/plugin/$1/$2";
$route['admin/plugin/([a-zA-Z]+)/([a-zA-Z]+)'] = "admin/plugin/$1/$2";
$route['admin/plugin/([a-zA-Z]+)/:num'] = "admin/plugin/$1";
$route['admin/plugin/([a-zA-Z]+)'] = "admin/plugin/$1";
$route['admin/plugin/:num'] = "admin/Plugin_manager";
$route['admin/plugin'] = "admin/Plugin_manager";
$route['admin/widget/([a-zA-Z]+)/:num'] = "admin/widget/$1";
$route['admin/widget/([a-zA-Z]+)'] = "admin/widget/$1";
$route['admin/widget/:num'] = "admin/widget";
$route['admin/widget'] = "admin/widget";
$route['admin/pwidget/([a-zA-Z]+)/:num'] = "admin/pwidget/$1";
$route['admin/pwidget/([a-zA-Z]+)'] = "admin/pwidget/$1";
$route['admin/pwidget/:num'] = "admin/pwidget";
$route['admin/pwidget'] = "admin/pwidget";
$route['admin/loginlogs'] = "admin/Login_logs";
$route['admin/actionslogs'] = "admin/Actions_logs";
$route['admin/bfsettings'] = "admin/Login_logs/settings";
$route['admin/bfsettings/save'] = "admin/Login_logs/settings_save";
$route['admin/bfsettings/whiteipsave'] = "admin/Login_logs/whiteipsave";
$route['admin/bfsettings/whiteipdel/:num'] = "admin/Login_logs/whiteipdel";
$route['admin/bfsettings/whiteipdel'] = "admin/Login_logs/whiteipdel";
$route['admin/bfsettings/blackipsave'] = "admin/Login_logs/blackipsave";
$route['admin/bfsettings/blackipdel/:num'] = "admin/Login_logs/blackipdel";
$route['admin/bfsettings/blackipdel'] = "admin/Login_logs/blackipdel";
$route['admin/bfsettings/genPrivateKey'] = "admin/Login_logs/genPrivateKey";
$route['admin/loginlogs/deleteindexurl'] = "admin/Login_logs/deleteLoginLogs";
$route['admin/loginlogs/:num'] = "admin/Login_logs";
$route['admin/actionslogs/deleteindex'] = "admin/Actions_logs/delActionsLogs";
$route['admin/actionslogs/:num'] = "admin/Actions_logs";
$route['admin/emaillogs'] = "admin/Email_logs";
$route['admin/emaillogs/deleteindexurl'] = "admin/Email_logs/deleteEmailLogs";
$route['admin/emaillogs/:num'] = "admin/Email_logs";
$route['admin/tinyMCEfile'] = "admin/admin/tinyMCEfile";
$route['admin/tinyMCEfile/:num'] = "admin/admin/tinyMCEfile";
$route['admin/members'] = "admin/members";
$route['admin/members/new'] = "admin/members/addUser";
$route['admin/members/new/add'] = "admin/members/confirm";
$route['admin/members/delete'] = "admin/members/delete";
$route['admin/members/delete/:any'] = "admin/members/delete";
$route['admin/members/edit'] = "admin/members/editUser";
$route['admin/members/edit/:any'] = "admin/members/editUser";
$route['admin/members/edited/:any'] = "admin/members/edited";
$route['admin/members/:num'] = "admin/members";
$route['admin/members/view'] = "admin/members/viewUsers";
$route['admin/members/view/:any'] = "admin/members/viewUsers";
$route['admin/groups'] = "admin/groups";
$route['admin/groups/add'] = "admin/groups/add";
$route['admin/groups/insert'] = "admin/groups/insert";
$route['admin/groups/delete'] = "admin/groups/delete";
$route['admin/groups/delete/:any'] = "admin/groups/delete";
$route['admin/groups/edit'] = "admin/groups/edit";
$route['admin/groups/edit/:any'] = "admin/groups/edit";
$route['admin/groups/update/:any'] = "admin/groups/update";
$route['admin/groups/:num'] = "admin/groups";
$route['admin/pm'] = "admin/Pm";
$route['admin/pm/view'] = "admin/Pm/viewMSG";
$route['admin/pm/view/:num'] = "admin/Pm/viewMSG";
$route['admin/pm/newpm'] = "admin/Pm/newMSG";
$route['admin/pm/newpm/:num'] = "admin/Pm/newMSG";
$route['admin/pm/insert'] = "admin/Pm/insert";
$route['admin/pm/delete/:num'] = "admin/Pm/delete";
$route['admin/pm/setread/:num'] = "admin/Pm/setRead";
$route['admin/pm/setunread/:num'] = "admin/Pm/setUnRead";
$route['admin/pm/sendpm'] = "admin/Pm/sendIndex";
$route['admin/pm/sendpm/:num'] = "admin/Pm/sendIndex";
$route['admin/pm/indexsave'] = "admin/Pm/indexSave";
$route['admin/pm/:num'] = "admin/Pm";
$route['admin/banner'] = "admin/banner";
$route['admin/banner/new'] = "admin/banner/addBanner";
$route['admin/banner/insert'] = "admin/banner/insert";
$route['admin/banner/edit'] = "admin/banner/editBanner";
$route['admin/banner/edit/:any'] = "admin/banner/editBanner";
$route['admin/banner/update/:any'] = "admin/banner/update";
$route['admin/banner/view'] = "admin/banner/view";
$route['admin/banner/view/:any'] = "admin/banner/view";
$route['admin/banner/view/:any/:any'] = "admin/banner/view";
$route['admin/banner/deleteindex'] = "admin/banner/deleteIndex";
$route['admin/banner/:num'] = "admin/banner";

//new rotues
$route['album']    = "admin/album"; 
$route['admin/addAlbum'] = "admin/Album/addAlbum";  
$route['admin/album/delete/:num'] = "admin/Album/delete";    
$route['admin/album/update/:num'] = "admin/Album/update";   

$route['admin/album/subimageIndex/:num'] = "admin/album/subimageIndex"; 
$route['admin/addSubAlbum/:num'] = "admin/Album/addSubAlbum";   
$route['admin/updateSubAlbum/:num/:num'] = "admin/Album/updateSubAlbum";   
$route['admin/subAlbum/delete/:num/:num'] = "admin/Album/SubAlbumdelete";  

$route['admin/ourServices'] = "admin/HomeContents/ourServices";  
$route['admin/ourservices/update'] = "admin/HomeContents/ourServicesUpdate";  

$route['admin/ourClients'] = "admin/HomeContents/ourClients";   
$route['admin/addClient'] = "admin/HomeContents/addClient";   
$route['admin/deleteClient/:num'] = "admin/HomeContents/deleteClient";  


$route['admin/ourPartners'] = "admin/HomeContents/ourPartner";  
$route['admin/updatePartner/:num'] = "admin/HomeContents/updatePartner";  

$route['admin/content'] = "admin/HomeContents/mngContent";  
$route['admin/addContent'] = "admin/HomeContents/addContent";  
$route['admin/updateContent/:num'] = "admin/HomeContents/updateContent";  

// event manger
$route['blog_event_manager']    = "admin/EventBlog/indexEvent"; 
$route['admin/addblog']="admin/EventBlog/addBlog";
$route['admin/blog/delete/:num']="admin/EventBlog/deleteBlog";
$route['admin/blog/update/:num']="admin/EventBlog/updateBlog";










//new rotues


$route['admin/sliders'] = "admin/sliders";
$route['admin/sliders/new'] = "admin/sliders/addslider";
$route['admin/sliders/insert'] = "admin/sliders/insert";
$route['admin/sliders/edit'] = "admin/sliders/editsliders";
$route['admin/sliders/edit/:any'] = "admin/sliders/editsliders";
$route['admin/sliders/update/:any'] = "admin/sliders/update";
$route['admin/sliders/view'] = "admin/sliders/view";
$route['admin/sliders/view/:any'] = "admin/sliders/view";
$route['admin/sliders/view/:any/:any'] = "admin/sliders/view";
$route['admin/sliders/deleteindex'] = "admin/sliders/deleteIndex";
$route['admin/sliders/:num'] = "admin/sliders";



$route['admin/export/getcsv/:any'] = "admin/export/getCSV";
$route['admin/export/getcsv'] = "admin/export/getCSV";
$route['admin/export/importcsv/:any'] = "admin/export/importCSV";
$route['admin/export/importcsv'] = "admin/export/importCSV";
$route['admin/export/importdb/:any'] = "admin/export/importDB";
$route['admin/export/importdb'] = "admin/export/importDB";
$route['admin/export/:any'] = "admin/export/index";
$route['admin/export'] = "admin/export/index";
$route['admin/filemanager'] = "admin/Filemanager/index";
$route['admin/filemanager/index'] = "admin/Filemanager/index";
$route['admin/filemanager/connector'] = "admin/Filemanager/connector";
$route['admin/filemanager/connectorNodel'] = "admin/Filemanager/connectorNodel";
$route['admin/filemanager/templateCopy'] = "admin/Filemanager/templateCopy";
$route['admin/carousel'] = "admin/Carousel/index";
$route['admin/carousel/add'] = "admin/Carousel/addNew";
$route['admin/carousel/insert'] = "admin/Carousel/insert";
$route['admin/carousel/edit'] = "admin/Carousel/editPhoto";
$route['admin/carousel/edit/:any'] = "admin/Carousel/editPhoto";
$route['admin/carousel/update/:any'] = "admin/Carousel/update";
$route['admin/carousel/addYoutube/:num'] = "admin/Carousel/addYoutube";
$route['admin/carousel/addUrl/:num'] = "admin/Carousel/addUrl";
$route['admin/carousel/filesUpload/:num'] = "admin/Carousel/filesUpload";
$route['admin/carousel/filesSave'] = "admin/Carousel/filesSave";
$route['admin/carousel/deleteIndex'] = "admin/Carousel/deleteIndex";
$route['admin/carousel/:num'] = "admin/Carousel";
$route['admin/manifest'] = "admin/admin/manifest";
$route['admin/service_worker.js'] = "admin/admin/serviceWorker";
$route['admin/lang/:any'] = "admin/admin/setLang/$1";


$route['member'] = 'Member';
$route['member/login'] = 'Member/login';
$route['member/login/check'] = 'Member/loginCheck';
$route['member/logout'] = 'Member/logout';
$route['member/register'] = 'Member/registMember';
$route['member/register/save'] = 'Member/saveMember';
$route['member/confirm/:any'] = 'Member/confirmedMember';
$route['member/edit'] = 'Member/editMember';
$route['member/edit/save'] = 'Member/saveEditMember';
$route['member/forgot'] = 'Member/forgot';
$route['member/reset/:any'] = 'Member/getPassword';
$route['member/indexpm'] = 'Member/indexPM';
$route['member/indexpm/:num'] = 'Member/indexPM';
$route['member/sendpm'] = 'Member/sendIndexPM';
$route['member/sendpm/:num'] = 'Member/sendIndexPM';
$route['member/viewpm'] = "Member/viewPM";
$route['member/viewpm/:num'] = "Member/viewPM";
$route['member/setread/:num'] = "Member/setReadPM";
$route['member/setunread/:num'] = "Member/setUnReadPM";
$route['member/insertpm'] = "Member/insertPM";
$route['member/indexpmsave'] = "Member/indexPMSave";
$route['member/deletepm/:num'] = "Member/deletePM";
$route['member/newpm'] = "Member/newPM";
$route['member/list'] = 'Member/memberList';
$route['member/list/:num'] = 'Member/memberList';
$route['member/viewuser'] = 'Member/viewUser';
$route['member/viewuser/:num'] = 'Member/viewUser';
$route['member/:any'] = 'Member';

$route['plugin/([a-zA-Z]+)/view/:num/:any/:num'] = "plugin/$1/view";
$route['plugin/([a-zA-Z]+)/view/:num/:any'] = "plugin/$1/view";
$route['plugin/([a-zA-Z]+)/category/:any/:any/:num'] = "plugin/$1/category";
$route['plugin/([a-zA-Z]+)/category/:any/:any'] = "plugin/$1/category";
$route['plugin/([a-zA-Z]+)/category/:any/:num'] = "plugin/$1/category";
$route['plugin/([a-zA-Z]+)/category/:any'] = "plugin/$1/category";
$route['plugin/([a-zA-Z]+)/getWidget/([a-zA-Z]+)/:num'] = "plugin/$1/getWidget";
$route['plugin/([a-zA-Z]+)/getWidget/([a-zA-Z]+)'] = "plugin/$1/getWidget";
$route['plugin/([a-zA-Z]+)/([a-zA-Z]+)/([a-zA-Z]+)/([a-zA-Z]+)/:num'] = "plugin/$1/$2/$3/$4";
$route['plugin/([a-zA-Z]+)/([a-zA-Z]+)/([a-zA-Z]+)/([a-zA-Z]+)'] = "plugin/$1/$2/$3/$4";
$route['plugin/([a-zA-Z]+)/([a-zA-Z]+)/([a-zA-Z]+)/:num'] = "plugin/$1/$2/$3";
$route['plugin/([a-zA-Z]+)/([a-zA-Z]+)/([a-zA-Z]+)'] = "plugin/$1/$2/$3";
$route['plugin/([a-zA-Z]+)/([a-zA-Z]+)/:num'] = "plugin/$1/$2";
$route['plugin/([a-zA-Z]+)/([a-zA-Z]+)'] = "plugin/$1/$2";
$route['plugin/([a-zA-Z]+)/:num'] = "plugin/$1";
$route['plugin/([a-zA-Z]+)'] = "plugin/$1";
$route['plugin'] = "home";
$route['formsubmit'] = 'Formsubmit/index';
$route['formsaction/:any'] = 'formsaction';
$route['formsaction'] = 'formsaction';
$route['link/:any'] = 'linkstats';
$route['link'] = 'linkstats';
$route['banner/:any'] = 'banner';
$route['banner'] = 'banner';
$route['lang/:any'] = "home/setLang";

$route['search'] = 'search';

$route['corecss.css'] = "home/getCoreCSS";
$route['corejs.js'] = "home/getCoreJS";
/*Routes for the product*/
//------Admin----
$route['admin/products'] = "admin/products";
$route['admin/addproduct'] = "admin/products/addProduct";
$route['admin/product/save'] = "admin/products/storeProduct";
$route['admin/product/edit/:any'] = "admin/products/editProduct";
$route['admin/product/update/:any'] = "admin/products/updateProduct";
$route['admin/product/delete/:any'] = "admin/products/deleteProduct";
$route['admin/product/categories'] = "admin/products/categories";
$route['admin/addproductcategory'] = "admin/products/addCategory";
$route['admin/product/savecategory'] = "admin/products/saveCategory";
$route['admin/product/editcategory/:any'] = "admin/products/editCategory";
$route['admin/product/updatecategory/:any'] = "admin/products/updatecategory";
$route['admin/product/deletecategory/:any'] = "admin/products/deletecategory";
$route['admin/products/deleteimage/:any'] = "admin/products/deleteImage";
$route['admin/productsubimages/:any'] = "admin/products/AddExtraImage";
$route['admin/product/subcategories'] = "admin/products/subcategories";
$route['admin/addproductsubcategory'] = "admin/products/addsubCategory";
$route['admin/product/savesubcategory'] = "admin/products/savesubCategory";
$route['admin/product/editsubcategory/:any'] = "admin/products/editsubCategory";
$route['admin/product/updatesubcategory/:any'] = "admin/products/updatesubcategory";
$route['admin/product/deletesubcategory/:any'] = "admin/products/deletesubcategory";
$route['admin/product/getsubcategories'] = "admin/products/getsubcategories";

//--end admin
$route['products'] = 'Product';
$route['products/:any'] = 'Product';
$route['product/:any'] = 'Product/product';
$route['admin/products/storevisit'] = 'admin/products/storevisitDetail';
/*END*/
$route['blog'] = 'Home/blog'; 
$route['myblog'] = 'Home/blog'; 


$route['contact'] = 'Home/contact';
$route['restaurant/touchdetail'] = 'Home/contactEmail';


$route['our-company'] = 'Home/company';

$route['corporate'] = 'Home/corporate';

$route['private_event'] = 'Home/private_event';

$route['space'] = 'Home/space';

$route['menu'] = 'Home/menu';

$route['our-services'] = 'Home/services';

$route['gallery'] = 'Home/gallery';
$route['gallery/:any'] = 'Home/albumgallery';

// $route['blog/:any'] = 'Home/blogDetail';
$route['blog/:num'] = 'Home/blog';
$route['eventEmail'] = 'Home/eventEmail';
$route['blogD/:num']    = 'Home/blogDetail';








$route['^(?!admin|member|formsaction|link|banner|plugin|search).*'] = 'home';
$route['default_controller'] = 'home';
$route['404_override'] = 'home/error_404';
$route['translate_uri_dashes'] = FALSE;

//--------------------------------backend-----------------------------------
$route['admin/upload_index'] = "admin/ecoadmin/uploadIndex";
$route['admin/upload_index/:num'] = "admin/ecoadmin/uploadIndex";
$route['admin/file_upload'] = "admin/ecoadmin/filesUpload";
$route['admin/filehtml_upload'] = "admin/ecoadmin/htmlUpload";
$route['admin/upload_index_save'] = "admin/ecoadmin/uploadIndexSave";
$route['admin/upload_Download'] = "admin/ecoadmin/uploadDownload";
$route['admin/upload_Download/:num'] = "admin/ecoadmin/uploadDownload";