<?php
/**
 * Localized date names helper
 */
class LocalDateHelper {

	/**
	 * Return the date using a particular formatting string.
	 *
	 * @param string $format Format code string. e.g. "d M Y" (see http://php.net/date)
	 * @param mixed $value Value to format
	 * @return string The date in the requested format
	 */
	public static function Format($format, $value) {
		if($value){
			// Set date
			$date = new DateTime($value);
			// Flag escaped chars (or there will be problems with formats like "F\D")
			$escapeId = '-'.time().'-';
			$format = str_replace('\\', $escapeId.'\\', $format);
			// Get formatted date
			$dateStr = $date->Format($format);
			// Translate all word-strings
			$dateStr = preg_replace_callback(
				"/([a-z]*)([^a-z])/isU",
				function($m){
					if(empty($m[1])) {
						// Nothing to translate
						return $m[0];
					}
					return _t('LocalDate.'.$m[1], $m[1]).$m[2];
				},
				$dateStr.' ');
			// Remove escape flags
			$dateStr = str_replace($escapeId, '', $dateStr);
			// Return translated date string
			return substr($dateStr, 0, strlen($dateStr)-1);
		}
	}

}

