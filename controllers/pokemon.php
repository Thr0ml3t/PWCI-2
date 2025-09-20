<?php
    $page = 'Pokedex';
    $currentPage = $_SERVER['REQUEST_URI'];

$pokemonList = [];

$apiUrl = 'https://pokeapi.co/api/v2/pokemon?limit=1';

$apiCurl = curl_init($apiUrl);
curl_setopt($apiCurl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($apiCurl, CURLOPT_TIMEOUT, 10);
curl_setopt($apiCurl, CURLOPT_HEADEROPT, false);
$response = curl_exec($apiCurl);

$responseCode = curl_getinfo($apiCurl,CURLINFO_HTTP_CODE);

$msg = '';

if($responseCode !== 200)
{
    $msg = 'Error: Unable to fetch data from PokeAPI. HTTP Status Code: ' . $responseCode;
}else{
    $data = json_decode($response, true);
    foreach ($data['results'] as $pokemon) {
    $pokemonDetailCurl = curl_init($pokemon['url']);
    curl_setopt($pokemonDetailCurl, CURLOPT_RETURNTRANSFER, true);
    $pokemonDetailResponse = curl_exec($pokemonDetailCurl);
    curl_close($pokemonDetailCurl);

    $pokemonDetails = json_decode($pokemonDetailResponse, true);
    $pokemonList[] = [
        'name' => $pokemon['name'],
        'image' => $pokemonDetails['sprites']['front_default'],
        'height' => $pokemonDetails['height'],
        'weight' => $pokemonDetails['weight'],
        'types' => array_map(fn($type) => $type['type']['name'], $pokemonDetails['types'])
    ];
}
}

require 'views/pokemon.view.php';