<?php


namespace App\Helper;


class Helper
{

    //turkish date format
    public function dateFormat($date){
        setlocale(LC_TIME, 'tr_TR.utf8');
        return $date->formatLocalized(' %d.%m.%Y %A, %H:%M');
    }
}
