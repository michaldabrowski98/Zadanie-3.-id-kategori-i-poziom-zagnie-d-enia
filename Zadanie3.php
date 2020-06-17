<?php
/*
 Zadanie 3.
 Moim zamiarem przy rozwiązywaniu tego zadania było stworzenie programu który wczytuje dane z tabeli oraz będzie działał również kiedy do tabeli dodane zostaną kolejne stopnie zagnieżdżenia. Ponieważ funkcja search zwraca głębiej zagnieżdżoną tabelę wywołując ją kolejny raz można wypisywać dane z kolejnych głębiej zagnieżdżonych list.
*/
$cats = [
	["id" => 1],
	["id" => 2],
	["id" => 3,
		"subcats"=>[
			["id"=>31],
			["id"=>32,
				"subcats"=>[
					["id"=>321],
					["id"=>322]
				]
			]
		]
	],
["id"=>4]
];

foreach( $cats as $cat ){
	echo level( $cat );
	if(	count( $cat ) > 1 ){
		$subcat = search( $cat );	
		search( $subcat );
	}
}
#Funckja zwrca wartość id wraz z poziomem zagnieżdżenia, najniższy poziom to 1
function level( $arr ){
	$form = "Id: %s,	poziom zagnieżdżenia: %s <br/>";
	return sprintf($form, $arr[ "id" ], strlen( strval( $arr[ "id" ] ) ));
}
#Funckja dla każdego elementu tabeli wpisuje jej id i wartość zagnieżdżenia
function search( $arr ){
	if(count( $arr ) > 1){
		foreach( $arr[ "subcats" ] as $subarr ){
						echo level( $subarr );
				}
	}
	return $subarr;	
}
?>