<?php

namespace Models;


use Zehir\Settings\Setup;

class Languages
{

    public static function getDataByLangId($param,$t='id'){
        foreach (Setup::$enableLanguages as $l) {
            if ($l[$t] == $param)
                return $l;
        }
        return null;
    }

    public static function getLangTextByCode($lang){
        $r = self::getDataByLangId(strtoupper($lang),'lang');
        return $r ? $r : false;
    }

    public static function getLangIdByCode($code){
        $r = self::getDataByLangId($code,'lang');
        return $r ? $r['id'] : 3;
    }

    public static function getCodeByLangId($langId)
    {
        $r =  self::getDataByLangId($langId);
        return $r ? $r['lang'] : null;
    }
}