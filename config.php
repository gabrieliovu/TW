<?php


$initialCookie = [
    'comenzi' => [
        'suc' => 0,
        'cafea' => 0,
		'zacusca' => 0,
		'teme' => 0,
		'gogosi' => 0,
		'apa' => 0
    ],
	'price' => [
        'suc' => 2,
        'cafea' => 5,
		'zacusca' => 3,
		'teme' => 10,
		'gogosi' => 5,
		'apa' => 2
    ]
	
];

if (isset($_COOKIE['userCookieData'])) {
    $userData = json_decode($_COOKIE['userCookieData'], true);

} else {

    $cookie = json_encode($initialCookie);
    setcookie('userCookieData', $cookie, 0, '/', null);
    $_COOKIE['userCookieData'] = $cookie;
}
