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



//Route::resource('/', 'HomeController');

//Get Model
Route::post('findmodel', array('uses' => 'ProductCategoryController@findModel'));

//Products
Route::resource('products', 'ProductCategoryController');
Route::resource('product', 'ProductCategoryController@showProducts');
Route::get('products/{id}/detail/{productid}', array('uses' => 'ProductCategoryController@detail'));


//Login Stuff
Route::get('login', array('uses' => 'UserController@showLogin'));
Route::post('login', array('uses' => 'UserController@doLogin'));
Route::get('logout', array('uses' => 'UserController@doLogout'));

//ForgotPassword
Route::get('password', array('uses' => 'UserController@showPassword'));
Route::post('password', array('uses' => 'UserController@resetPassword'));

//Registration
Route::get('/', array('uses' => 'UserController@create'));
Route::get('claim-your-discount', array('uses' => 'UserController@create'));

Route::get('register/confirm', array('uses' => 'UserController@confirm'));
Route::post('register', array('uses' => 'UserController@store'));


//Installers
Route::resource('installers', 'InstallerController');

//Contact
Route::resource('contact', 'ContactController');


//Import
Route::resource('import', 'ImportController@import');


Route::get('how-it-works', function()
{
    return View::make('pages.how-it-works');
});

Route::get('discounts-and-amounts', function()
{
    return View::make('pages.discounts-and-amounts');
});




// ===============================================
// ADMIN SECTION ================================='before' => 'auth'
// ===============================================
Route::group(array('prefix' => 'admin','before' => 'auth'), function()
{

    Route::get('/', function()
    {
        return View::make('admin.dashboard');
    });

    Route::get('users', array('uses' => 'AdminUserController@index'));
    Route::get('users/create', array('uses' => 'AdminUserController@create'));
    Route::post('users/create', array('uses' => 'AdminUserController@store'));

    Route::resource('users', 'AdminUserController');
    Route::get('users/{id}/edit', array('uses' => 'AdminUserController@edit'));
    // Route::get('users/{id}/delete', array('uses' => 'AdminUserController@destroy'));
    Route::get('users/{id}/delete', 'AdminUserController@destroy');


    Route::put('users/update', 'AdminUserController@update');

    Route::get('registrations', array('uses' => 'AdminUserController@showRegistrations'));

    Route::resource('installers', 'InstallerController');
    Route::post('installers/store', 'InstallerController@store');
    Route::get('installers/{id}/delete', 'InstallerController@destroy');

    Route::resource('products', 'ProductCategoryController');
    Route::get('products/{id}/subcategories', array('uses' => 'ProductCategoryController@index'));
    Route::get('products/{id}/files', array('uses' => 'ProductCategoryController@files'));

    Route::post('products/addfile', 'ProductCategoryController@addfile');

    Route::get('products/{id}/models', array('uses' => 'ProductsController@models'));


    Route::post('products/{id}/addmodels', 'ProductsController@addmodels');
    Route::post('products/deletemodel/{id}', 'ProductsController@deletemodel');

    Route::post('products/store', array('uses' => 'ProductCategoryController@store'));

    Route::get('products/{id}/setdefault/{fileid}',array('uses' => 'FileController@setdefault'));
    Route::post('products/deletefile/{id}','FileController@deletefile');

});
//Macros

Form::macro('stateSelect', function($name = "state", $selected = null, $options = array()) {



    $states = array(
        '' => "",
        'AL' => "Alabama",
        'AK' => "Alaska",
        'AZ' => "Arizona",
        'AR' => "Arkansas",
        'CA' => "California",
        'CO' => "Colorado",
        'CT' => "Connecticut",
        'DE' => "Delaware",
        'DC' => "District Of Columbia",
        'FL' => "Florida",
        'GA' => "Georgia",
        'HI' => "Hawaii",
        'ID' => "Idaho",
        'IL' => "Illinois",
        'IN' => "Indiana",
        'IA' => "Iowa",
        'KS' => "Kansas",
        'KY' => "Kentucky",
        'LA' => "Louisiana",
        'ME' => "Maine",
        'MD' => "Maryland",
        'MA' => "Massachusetts",
        'MI' => "Michigan",
        'MN' => "Minnesota",
        'MS' => "Mississippi",
        'MO' => "Missouri",
        'MT' => "Montana",
        'NE' => "Nebraska",
        'NV' => "Nevada",
        'NH' => "New Hampshire",
        'NJ' => "New Jersey",
        'NM' => "New Mexico",
        'NY' => "New York",
        'NC' => "North Carolina",
        'ND' => "North Dakota",
        'OH' => "Ohio",
        'OK' => "Oklahoma",
        'OR' => "Oregon",
        'PA' => "Pennsylvania",
        'RI' => "Rhode Island",
        'SC' => "South Carolina",
        'SD' => "South Dakota",
        'TN' => "Tennessee",
        'TX' => "Texas",
        'UT' => "Utah",
        'VT' => "Vermont",
        'VA' => "Virginia",
        'WA' => "Washington",
        'WV' => "West Virginia",
        'WI' => "Wisconsin",
        'WY' => "Wyoming"
    );

echo $selected;

    return Form::select($name, $states, $selected, $options);
});

Form::macro('countrySelect', function($name = "country", $selected = null, $options = array()) {
    $countries = array(
        ''=>'',
        'US'=>'UNITED STATES',
        'AF'=>'AFGHANISTAN',
        'AL'=>'ALBANIA',
        'DZ'=>'ALGERIA',
        'AS'=>'AMERICAN SAMOA',
        'AD'=>'ANDORRA',
        'AO'=>'ANGOLA',
        'AI'=>'ANGUILLA',
        'AQ'=>'ANTARCTICA',
        'AG'=>'ANTIGUA AND BARBUDA',
        'AR'=>'ARGENTINA',
        'AM'=>'ARMENIA',
        'AW'=>'ARUBA',
        'AU'=>'AUSTRALIA',
        'AT'=>'AUSTRIA',
        'AZ'=>'AZERBAIJAN',
        'BS'=>'BAHAMAS',
        'BH'=>'BAHRAIN',
        'BD'=>'BANGLADESH',
        'BB'=>'BARBADOS',
        'BY'=>'BELARUS',
        'BE'=>'BELGIUM',
        'BZ'=>'BELIZE',
        'BJ'=>'BENIN',
        'BM'=>'BERMUDA',
        'BT'=>'BHUTAN',
        'BO'=>'BOLIVIA',
        'BA'=>'BOSNIA AND HERZEGOVINA',
        'BW'=>'BOTSWANA',
        'BV'=>'BOUVET ISLAND',
        'BR'=>'BRAZIL',
        'IO'=>'BRITISH INDIAN OCEAN TERRITORY',
        'BN'=>'BRUNEI DARUSSALAM',
        'BG'=>'BULGARIA',
        'BF'=>'BURKINA FASO',
        'BI'=>'BURUNDI',
        'KH'=>'CAMBODIA',
        'CM'=>'CAMEROON',
        'CA'=>'CANADA',
        'CV'=>'CAPE VERDE',
        'KY'=>'CAYMAN ISLANDS',
        'CF'=>'CENTRAL AFRICAN REPUBLIC',
        'TD'=>'CHAD',
        'CL'=>'CHILE',
        'CN'=>'CHINA',
        'CX'=>'CHRISTMAS ISLAND',
        'CC'=>'COCOS (KEELING) ISLANDS',
        'CO'=>'COLOMBIA',
        'KM'=>'COMOROS',
        'CG'=>'CONGO',
        'CD'=>'CONGO, THE DEMOCRATIC REPUBLIC OF THE',
        'CK'=>'COOK ISLANDS',
        'CR'=>'COSTA RICA',
        'CI'=>'COTE D IVOIRE',
        'HR'=>'CROATIA',
        'CU'=>'CUBA',
        'CY'=>'CYPRUS',
        'CZ'=>'CZECH REPUBLIC',
        'DK'=>'DENMARK',
        'DJ'=>'DJIBOUTI',
        'DM'=>'DOMINICA',
        'DO'=>'DOMINICAN REPUBLIC',
        'TP'=>'EAST TIMOR',
        'EC'=>'ECUADOR',
        'EG'=>'EGYPT',
        'SV'=>'EL SALVADOR',
        'GQ'=>'EQUATORIAL GUINEA',
        'ER'=>'ERITREA',
        'EE'=>'ESTONIA',
        'ET'=>'ETHIOPIA',
        'FK'=>'FALKLAND ISLANDS (MALVINAS)',
        'FO'=>'FAROE ISLANDS',
        'FJ'=>'FIJI',
        'FI'=>'FINLAND',
        'FR'=>'FRANCE',
        'GF'=>'FRENCH GUIANA',
        'PF'=>'FRENCH POLYNESIA',
        'TF'=>'FRENCH SOUTHERN TERRITORIES',
        'GA'=>'GABON',
        'GM'=>'GAMBIA',
        'GE'=>'GEORGIA',
        'DE'=>'GERMANY',
        'GH'=>'GHANA',
        'GI'=>'GIBRALTAR',
        'GR'=>'GREECE',
        'GL'=>'GREENLAND',
        'GD'=>'GRENADA',
        'GP'=>'GUADELOUPE',
        'GU'=>'GUAM',
        'GT'=>'GUATEMALA',
        'GN'=>'GUINEA',
        'GW'=>'GUINEA-BISSAU',
        'GY'=>'GUYANA',
        'HT'=>'HAITI',
        'HM'=>'HEARD ISLAND AND MCDONALD ISLANDS',
        'VA'=>'HOLY SEE (VATICAN CITY STATE)',
        'HN'=>'HONDURAS',
        'HK'=>'HONG KONG',
        'HU'=>'HUNGARY',
        'IS'=>'ICELAND',
        'IN'=>'INDIA',
        'ID'=>'INDONESIA',
        'IR'=>'IRAN, ISLAMIC REPUBLIC OF',
        'IQ'=>'IRAQ',
        'IE'=>'IRELAND',
        'IL'=>'ISRAEL',
        'IT'=>'ITALY',
        'JM'=>'JAMAICA',
        'JP'=>'JAPAN',
        'JO'=>'JORDAN',
        'KZ'=>'KAZAKSTAN',
        'KE'=>'KENYA',
        'KI'=>'KIRIBATI',
        'KP'=>'KOREA DEMOCRATIC PEOPLES REPUBLIC OF',
        'KR'=>'KOREA REPUBLIC OF',
        'KW'=>'KUWAIT',
        'KG'=>'KYRGYZSTAN',
        'LA'=>'LAO PEOPLES DEMOCRATIC REPUBLIC',
        'LV'=>'LATVIA',
        'LB'=>'LEBANON',
        'LS'=>'LESOTHO',
        'LR'=>'LIBERIA',
        'LY'=>'LIBYAN ARAB JAMAHIRIYA',
        'LI'=>'LIECHTENSTEIN',
        'LT'=>'LITHUANIA',
        'LU'=>'LUXEMBOURG',
        'MO'=>'MACAU',
        'MK'=>'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',
        'MG'=>'MADAGASCAR',
        'MW'=>'MALAWI',
        'MY'=>'MALAYSIA',
        'MV'=>'MALDIVES',
        'ML'=>'MALI',
        'MT'=>'MALTA',
        'MH'=>'MARSHALL ISLANDS',
        'MQ'=>'MARTINIQUE',
        'MR'=>'MAURITANIA',
        'MU'=>'MAURITIUS',
        'YT'=>'MAYOTTE',
        'MX'=>'MEXICO',
        'FM'=>'MICRONESIA, FEDERATED STATES OF',
        'MD'=>'MOLDOVA, REPUBLIC OF',
        'MC'=>'MONACO',
        'MN'=>'MONGOLIA',
        'MS'=>'MONTSERRAT',
        'MA'=>'MOROCCO',
        'MZ'=>'MOZAMBIQUE',
        'MM'=>'MYANMAR',
        'NA'=>'NAMIBIA',
        'NR'=>'NAURU',
        'NP'=>'NEPAL',
        'NL'=>'NETHERLANDS',
        'AN'=>'NETHERLANDS ANTILLES',
        'NC'=>'NEW CALEDONIA',
        'NZ'=>'NEW ZEALAND',
        'NI'=>'NICARAGUA',
        'NE'=>'NIGER',
        'NG'=>'NIGERIA',
        'NU'=>'NIUE',
        'NF'=>'NORFOLK ISLAND',
        'MP'=>'NORTHERN MARIANA ISLANDS',
        'NO'=>'NORWAY',
        'OM'=>'OMAN',
        'PK'=>'PAKISTAN',
        'PW'=>'PALAU',
        'PS'=>'PALESTINIAN TERRITORY, OCCUPIED',
        'PA'=>'PANAMA',
        'PG'=>'PAPUA NEW GUINEA',
        'PY'=>'PARAGUAY',
        'PE'=>'PERU',
        'PH'=>'PHILIPPINES',
        'PN'=>'PITCAIRN',
        'PL'=>'POLAND',
        'PT'=>'PORTUGAL',
        'PR'=>'PUERTO RICO',
        'QA'=>'QATAR',
        'RE'=>'REUNION',
        'RO'=>'ROMANIA',
        'RU'=>'RUSSIAN FEDERATION',
        'RW'=>'RWANDA',
        'SH'=>'SAINT HELENA',
        'KN'=>'SAINT KITTS AND NEVIS',
        'LC'=>'SAINT LUCIA',
        'PM'=>'SAINT PIERRE AND MIQUELON',
        'VC'=>'SAINT VINCENT AND THE GRENADINES',
        'WS'=>'SAMOA',
        'SM'=>'SAN MARINO',
        'ST'=>'SAO TOME AND PRINCIPE',
        'SA'=>'SAUDI ARABIA',
        'SN'=>'SENEGAL',
        'SC'=>'SEYCHELLES',
        'SL'=>'SIERRA LEONE',
        'SG'=>'SINGAPORE',
        'SK'=>'SLOVAKIA',
        'SI'=>'SLOVENIA',
        'SB'=>'SOLOMON ISLANDS',
        'SO'=>'SOMALIA',
        'ZA'=>'SOUTH AFRICA',
        'GS'=>'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
        'ES'=>'SPAIN',
        'LK'=>'SRI LANKA',
        'SD'=>'SUDAN',
        'SR'=>'SURINAME',
        'SJ'=>'SVALBARD AND JAN MAYEN',
        'SZ'=>'SWAZILAND',
        'SE'=>'SWEDEN',
        'CH'=>'SWITZERLAND',
        'SY'=>'SYRIAN ARAB REPUBLIC',
        'TW'=>'TAIWAN, PROVINCE OF CHINA',
        'TJ'=>'TAJIKISTAN',
        'TZ'=>'TANZANIA, UNITED REPUBLIC OF',
        'TH'=>'THAILAND',
        'TG'=>'TOGO',
        'TK'=>'TOKELAU',
        'TO'=>'TONGA',
        'TT'=>'TRINIDAD AND TOBAGO',
        'TN'=>'TUNISIA',
        'TR'=>'TURKEY',
        'TM'=>'TURKMENISTAN',
        'TC'=>'TURKS AND CAICOS ISLANDS',
        'TV'=>'TUVALU',
        'UG'=>'UGANDA',
        'UA'=>'UKRAINE',
        'AE'=>'UNITED ARAB EMIRATES',
        'GB'=>'UNITED KINGDOM',
        'UM'=>'UNITED STATES MINOR OUTLYING ISLANDS',
        'UY'=>'URUGUAY',
        'UZ'=>'UZBEKISTAN',
        'VU'=>'VANUATU',
        'VE'=>'VENEZUELA',
        'VN'=>'VIET NAM',
        'VG'=>'VIRGIN ISLANDS, BRITISH',
        'VI'=>'VIRGIN ISLANDS, U.S.',
        'WF'=>'WALLIS AND FUTUNA',
        'EH'=>'WESTERN SAHARA',
        'YE'=>'YEMEN',
        'YU'=>'YUGOSLAVIA',
        'ZM'=>'ZAMBIA',
        'ZW'=>'ZIMBABWE'
    );

    return Form::select($name, $countries, $selected, $options);
});

?>
