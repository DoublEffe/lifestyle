<?php
  class Bonus {
    public static function checker($param) {
      if (is_null($param)) {
        throw new TypeError('missing parameters');
      }
      if (!is_string($param['name']) || !ctype_alpha($param['name'])) {
        throw new TypeError('wrong parameters type');
      }
      if (!is_int($param['time'])   ) {
        throw new TypeError('wrong parameters type');
      }
    }
   
  } 