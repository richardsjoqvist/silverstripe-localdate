<?php
/**
 * Localized date names helper
 */
class LocalDateHelper {

	/**
	 * @var string $locale
	 */
	private static $locale = null;

	/**
	 * Set which locale to use for dates (overrides current locale)
	 *
	 * @param string $locale Locale string, like "sv_SE", "en_US", "es", "fi" etc
	 */
	public static function setLocale($locale) {
		self::$locale = $locale;
	}

	/**
	 * Return the date using a particular formatting string.
	 *
	 * @param string $format Format code string. e.g. "d M Y" (see http://php.net/date)
	 * @param mixed $value Value to format
	 * @return string The date in the requested format
	 */
	public static function Format($format, $value) {
		if($value){
			// Use current locale if different from configured i18n locale
			$i18nLocale = $currentLocale = i18n::get_locale();
			if(class_exists("Translatable")) $currentLocale = Translatable::get_current_locale();
			if(self::$locale) $currentLocale = self::$locale;
			if($currentLocale != $i18nLocale) i18n::set_locale($currentLocale);
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
			// Reset i18n locale
			if($currentLocale != $i18nLocale) i18n::set_locale($i18nLocale);
			// Return translated date string
			return substr($dateStr, 0, strlen($dateStr)-1);
		}
	}

}

