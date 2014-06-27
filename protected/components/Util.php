<?php

class Util extends CComponent
{
	/**
	 * Обрезка на заданное количество символов
	 * @param unknown_type $string
	 * @param unknown_type $limit
	 */
	public static function crop($string, $limit=100)
	{
		$string = strip_tags($string);
	
		if (strlen($string) >= $limit )
		{
			$substring_limited = substr($string,0, $limit);
			return substr($substring_limited, 0, strrpos($substring_limited, ' ' )).' ...';
		}
		else
		{
			//Если количество символов строки меньше чем задано,
			//то просто возращаем оригинал
			return $string;
		}
	}
}

