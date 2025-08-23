<?php

 $games = [
        [
            'title' => 'Plants Vs Zombies',
            'release_date' => '2009/05/05',
            'rating' => 4.5,
            'author' => 'PopCap Games'
        ],
        [
            'title' => 'The Last of Us',
            'release_date' => '2013/06/14',
            'rating' => 5.0,
            'author' => 'Naughty Dog'
        ],
        [
            'title' => 'God of War',
            'release_date' => '2018/04/20',
            'rating' => 4.8,
            'author' => 'Santa Monica Studio'
        ],
        [
            'title' => 'Ghost of Tsushima',
            'release_date' => '2020/07/17',
            'rating' => 4.9,
            'author' => 'Sucker Punch Productions'
        ],
        [
            'title' => 'Horizon Zero Dawn',
            'release_date' => '2017/02/28',
            'rating' => 4.6,
            'author' => 'Guerrilla Games'
        ],
        [
            'title' => 'Crash Bandicoot 4: It\'s About Time',
            'release_date' => '2020/11/12',
            'rating' => 4.8,
            'author' => 'Naughty Dog'
        ]
    ];

    $result = array_filter($games, function($game) {
        return $game['rating'] >= "4.9";
    });

require 'index.view.php';