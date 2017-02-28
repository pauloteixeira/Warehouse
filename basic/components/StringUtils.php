<?php
namespace app\components;


use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class StringUtils extends Component
{
  const ACCESS_DENIED       = 401;
  const REDIRECT            = 302;
  const LANGUAGE_EN         = 'en';
  const LANGUAGE_BR         = 'pt_BR';
  const DATE_EN_FORMAT      = 'Y/m/d';
  const DATE_BR_FORMAT      = 'd/m/Y';
  const DATE_YEAR_FORMAT    = 'Y';
  const DATE_MONTH_FORMAT   = 'm';
  const DATE_SQL_FORMAT     = 'Y-m-d';
  const DATETIME_SQL_FORMAT = 'Y-m-d h:i:s';
  const BOOL_TRUE           = 1;
  const BOOL_FALSE          = 0;
  const TRUE                = true;
  const FALSE               = false;
  /**
  * @description hash a string using a sha1 Yii function
  * @name hash()
  * @param String
  * @return String(40)
  **/
  public static function hash($string)
  {
    return hash('sha256', $string);
  }

  public static function generatePassword()
  {
      $chars = array_merge(range('a', 'z'), range('A', 'Z'), range(0, 9));
      $password = '';

      for( $i = 0; $i < 8; $i++ )
      {
          $password .= $chars[rand(1,60)];
      }

      return self::hash($password);
  }

  public static function currentStringDate()
  {
      $format = ( Yii::$app->language == self::LANGUAGE_EN ) ?
                      self::DATE_EN_FORMAT :
                      self::DATE_BR_FORMAT;

      return date($format);
  }

  public static function currentSqlDate()
  {
      return date(self::DATETIME_SQL_FORMAT);
  }

  public static function currentYear()
  {
      return date(self::DATE_YEAR_FORMAT);
  }

  public static function sqlDateToString( $sqlDate ) {
    if( !strlen( $sqlDate ) )
    {
      return '';
    }
    
    $date = new \DateTime($sqlDate);

    return ( Yii::$app->language == self::LANGUAGE_EN ) ?
                self::getEnSQLStringDate($date) :
                self::getBrSQLStringDate($date);
  }

  public static function stringToSqlDate( $stringDate ) {
    $format = ( Yii::$app->language == self::LANGUAGE_EN ) ?
                    self::DATE_EN_FORMAT :
                    self::DATE_BR_FORMAT;

    return \DateTime::createFromFormat( $format, $stringDate )->format( self::DATE_SQL_FORMAT );
  }

  /**
  * @description return American date
  * @name getEnSQLStringDate()
  * @param DateTime()
  * @return StringDate()
  **/
  private function getEnSQLStringDate( $date ) {
    return $date->format(self::DATE_SQL_FORMAT);
  }

  /**
  * @description return Brazilian date
  * @name getBrSQLStringDate()
  * @param DateTime()
  * @return StringDate()
  **/
  private function getBrSQLStringDate( $date ) {
    return $date->format('d/m/Y');
  }

  /**
  * @description return current path
  * @name currentUrl()
  * @param Boolean()
  * @param Boolean()
  * @return String()
  **/
  public static function currentUrl( $withParameter = false, $removeIndex = true ) {
        $path = explode( "/", Yii::$app->request->pathInfo );

        if( $removeIndex ){
            $key = array_search( 'index', $path );

            if($key)
            {
                unset( $path[ $key ] );
                array_values( $path );
            }
        }

        $path = implode('/', $path);

        if( $withParameter )
        {
          return '/' . $path;
        }

        $path = explode( "/", $path );
        array_pop($path);
        $path = implode('/', $path);

        return '/' . $path;
  }

  /**
  * @description return The Registration Number Format
  * @name makeRegistrationNumber($num)
  * @param String()
  * @return String()
  **/
  public static function makeRegistrationNumber( $num ) {
      $format = '0000';
      $countFormat = strlen($format);

      if( strlen( $num ) >= $countFormat ) {
          return '#' . $num;
      }

      return '#' . substr($format, 0, ( $countFormat - strlen( $num ) ) ) . $num;
  }

  /**
  * @description return The string changed the space per some char
  * @name stringToShiftSpaces($value, $char)
  * @param String()
  * @return String()
  **/
  public static function stringToShiftSpaces( $value, $char )
  {
    return str_replace( ' ', $char, preg_replace( 
        array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/",
              "/(É|È|Ê|Ë)/",
              "/(í|ì|î|ï)/",
              "/(Í|Ì|Î|Ï)/",
              "/(ó|ò|õ|ô|ö)/",
              "/(Ó|Ò|Õ|Ô|Ö)/",
              "/(ú|ù|û|ü)/",
              "/(Ú|Ù|Û|Ü)/",
              "/(ñ)/",
              "/(Ñ)/"), explode(" ","a A e E i I o O u U n N"), $value) );
  }

  public static function onlyNumbers( $value )
  {
    return preg_replace('/\D/', '', $value);
  }

  public static function cpfFormat( $value )
  {
    $value = self::onlyNumbers( $value );

    if( !strlen($value) ){
        return '';
    } 

    return substr($value, 0,3) . '.' . substr($value, 3,3) . '.' . substr($value, 6,3) . '-' . substr($value, 9,2);
  }

  public static function debug($object)
  {
    return highlight_string(var_export($object, true));
  }

  public static function generateString()
  {
    return Yii::$app->security->generateRandomString();
  }
}
