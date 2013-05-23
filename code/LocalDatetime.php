<?php
/**
 * Localized date names, extension of {@link SS_Datetime}
 */
class LocalDatetime extends SS_Datetime {

	public function Nice() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Nice','d/m/Y g:ia'));
	}

	public function Nice24() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Nice24','d/m/Y H:i'));
	}

	public function Date() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Date','d/m/Y'));
	}

	public function Time() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Time','g:ia'));
	}

	public function Time24() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Time24','H:i'));
	}

	/**
	 * Return the date using a particular formatting string.
	 *
	 * @param string $format Format code string. e.g. "d M Y" (see http://php.net/date)
	 * @return string The date in the requested format
	 */
	public function Format($format) {
		if($this->value){
			// Set date
			$date = new DateTime($this->value);
			// Flag escaped chars (or there will be problems with formats like "F\D")
			$escapeId = '-'.time().'-';
			$format = str_replace('\\', $escapeId.'\\', $format);
			// Get formatted date
			$dateStr = $date->Format($format);
			// Translate all word-strings
			$dateStr = preg_replace_callback("/([a-z]*)([^a-z])/isU",array($this,'FormatLocalDate'),$dateStr.' ');
			// Remove escape flags
			$dateStr = str_replace($escapeId, '', $dateStr);
			// Return translated date string
			return substr($dateStr,0,strlen($dateStr)-1);
		}
	}

	/**
	 * Callback for Format() translations
	 *
	 * @param array $m
	 * @return string
	 */
	private function FormatLocalDate($m) {
		if(empty($m[1])) {
			// Nothing to translate
			return $m[0];
		}
		return _t('LocalDate.'.$m[1],$m[1]).$m[2];
	}

}

