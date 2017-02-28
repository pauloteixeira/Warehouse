<?php
namespace app\components;


use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class StringUtils extends Component
{
  
  const DATETIME_SQL_FORMAT = 'Y-m-d h:i:s';
  
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

  public static function debug($object)
  {
    return highlight_string(var_export($object, true));
  }

  public static function generateString()
  {
    return Yii::$app->security->generateRandomString();
  }
}
