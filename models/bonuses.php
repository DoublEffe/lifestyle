<?php
  class Bonuses {
    public static function checker($param) {
      if (is_null($param)) {
        throw new TypeError('missing parameters');
      }
      $s=explode('-', $param['date']);
      if (!is_string($param['date']) || !checkdate(intval($s[1]),intval($s[2]),intval($s[0]))) {
        throw new TypeError('wrong parameters type');
      }
      if (!is_int($param['bonus_ref'])) {
        throw new TypeError('wrong parameters type');
      }
      if (!is_int($param['sold'])   ) {
        throw new TypeError('wrong parameters type');
      }
    }

   
  } 