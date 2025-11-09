<?php
return [
	'up_menu' => [
		'visible' => true,
		'phone' => "+48 123 456 789",
		'email' => "kontakt@mojastrona.pl",
		'facebook' => 'https://www.facebook.pl',
		'instagram' => 'https://www.instagram.com/',
		'tiktok' => 'https://www.tiktok.com/pl-PL/',
		'x' => 'https://x.com/?lang=pl'
	],
	'header' => [
		'title'       => '20 lat doświadczenia',
		'subtitle'    => 'W projektowaniu ze stali konstrukcyjnej',
		'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti impedit voluptas, nam maiores alias aliquid.',
		'buttons' => [
			1 => ['text' => 'Nasze projekty', 'url' => '#konstrukcje'],
			2 => ['text' => 'Kontakt', 'url' => '#kontakt'],
		],
		'background_image' => get_template_directory_uri() . '/images/background-header.jpg',
		'favicon' => get_template_directory_uri() . '/images/favicon.ico',
		'logo' => 'mojastrona',
	],
	'footer' => [
		'company_shortname' => 'moja firma',
		'company_fullname' => 'Moja firma sp. z o.o.',
		'company_address_1' => 'ul Poznaska 99/9',
		'company_address_2' => '64-300 Poznań, Polska',
		'company_nip' => '1234567890',
		'company_regon' => '1234567890',
		'other_1' => '',
		'other_2' => '',
		'title_copyright' => 'Zastrzeżone',
		'description_copyright' => 'Zdjęcia zamieszczone w realizacjach oraz pozostałe materiały i fotografie dostępne na podstronach witryny www.mojastrona.pl są chronione prawem autorskim. Ich powielanie, kopiowanie lub wykorzystywanie w celach komercyjnych bez pisemnej zgody Moja firma sp. z o.o. jest surowo zabronione.',
	],
	'aside' => [
		'title_empyt' => 'Pracujemy nad częścią tej strony.',
		'description_empty' => 'Ta część strony jest nadal w budowie. Jednak bez problemu możesz dalej korzystać z pozostałej części serwisu.',
	],
	'cookie' => [
		'visible' => true,
		'description' => 'Strona wykorzystuje pliki cookie w celu zapewnienia najlepszej jakości usług.',
		'button_all' => 'Akceptuj wszystkie',
		'button_necessary' => 'Akceptuj niezbędne',
		'display_type' => 'full',
		'display_side' => 'left',
	],
	'map_google' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9757.05986321577!2d16.122895839202826!3d52.311194320778704!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47042ae37b075a01%3A0x5d1524d194e17e84!2s64-300%20Nowy%20Tomy%C5%9Bl!5e0!3m2!1spl!2spl!4v1762042724374!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
	'steps' => [
		1 => [
			'title'       => 'Nasza misja',
			'description' => 'Naszym celem jest zadowolenie klientów poprzez oferowanie najlepszych produktów w najlepszych cenach, w przyjaznej i przyjemnej atmosferze. Nasza ocena utrzymuje się na poziomie 100%, a opinie są doskonałe i pozytywne. Stale dodajemy nowe produkty.',
		],
		2 => [
			'title'       => 'Co robimy',
			'description' => 'Dzięki zespołom doświadczonych specjalistów oferujemy naszym klientom na całym świecie różnorodne rozwiązania. Nasi specjaliści zapewniają klientom kompleksową obsługę, wspierając ich na każdym kroku.',
		],
		3 => [
			'title'       => 'Dlaczego My',
			'description' => 'Kierujemy się pięcioma wartościami, które zawsze przyczyniały się do naszego sukcesu: duma, pasja, nigdy się nie poddawanie, praca zespołowa i dobra zabawa.',
		],
	],
	'counts' => [
		1 => [
			"title" => "Lat doświadczenia",
			"number" => 20,
		],
		2 => [
			"title" => "Wykonanych realizacji",
			"number" => 46,
		],
		3 => [
			"title" => "Wykwalifikowanych specjalistów",
			"number" => 32,
		],
		4 => [
			"title" => "m<sup>2</sup> powierzhcni jednej konstrukcji",
			"number" => 170,
		],
	],
	'write_to_us' => [
		'title' => 'Chcesz wiedzieć więcej?',
		'description' => 'Z przyjemnością odpowiemy na wszystkie Twoje pytania i pokażemy, jak wygląda nasza praca od środka. W prosty sposób wyjaśnimy, z czego powstają nasze konstrukcje i dlaczego są tak trwałe. Chcemy, abyś czuł się pewnie, podejmując decyzję o współpracy z nami.',
		'image' => 'bg_send_email.jpg',
		'button-text' => 'Napisz do nas',
	],
	'category_layouts' => [
		'layout-card' => 'Karty pełne',
		'layout-grid' => 'Siatka',
	],
	'category_texts' => [
		'read_more' => 'Czytaj więcej',
		'see_all'   => 'Zobacz wszystkie',
		'empty_category' => 'Brak wpisów'
	],
	'sections_front_page' => [
		0 => ['section' => 'steps', 'name' => 'Kroki', 'visible' => true],
		1 => ['section' => 'counts', 'name' => 'Odliczanie', 'visible' => true],
		2 => ['section' => 'products', 'name' => 'Produkty', 'visible' => true],
		3 => ['section' => 'write_to_us', 'name' => 'Napisz do nas', 'visible' => true],
		4 => ['section' => 'blog', 'name' => 'Blog', 'visible' => true],
	],
];
