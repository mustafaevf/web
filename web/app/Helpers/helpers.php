<?php

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

function FormateDate($created_at) {
    $day = substr(substr($created_at, 5, 5), -2, 2);
    $month = substr(substr($created_at, 5, 5), 0, 2);
    $months = [
        '01' => 'января',
        '02' => 'февраля',
        '03' => 'марта',
        '04' => 'апреля',
        '05'=> 'мая',
        '06'=> 'июня',
        '07' => 'июля',
        '08' => 'августа',
        '09' => 'сентября',
        '10' => 'октября',
        '11' => 'ноября',
        '12' => 'декабря'
    ];

    return $day ." ". $months[$month];
}