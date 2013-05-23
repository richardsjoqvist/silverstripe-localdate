<?php
/**
 * Localized date names, extension of {@link SS_Datetime}
 */
class LocalDatetime extends SS_Datetime {

	public function Nice() {
		if($this->value) return $this->Format(_t('LocalDatetimeFormat.Nice','d/m/Y g:ia'));
	}

	public function Nice24() {
		if($this->value) return $this->Format(_t('LocalDatetimeFormat.Nice24','d/m/Y H:i'));
	}

	public function Date() {
		if($this->value) return $this->Format(_t('LocalDatetimeFormat.Date','d/m/Y'));
	}

	public function Time() {
		if($this->value) return $this->Format(_t('LocalDatetimeFormat.Time','g:ia'));
	}

	public function Time24() {
		if($this->value) return $this->Format(_t('LocalDatetimeFormat.Time24','H:i'));
	}

	/**
	 * Return the date using a particular formatting string.
	 *
	 * @param string $format Format code string. e.g. "d M Y" (see http://php.net/date)
	 * @return string The date in the requested format
	 */
	public function Format($format) {
		if($this->value) {
			// Return translated date string
			return LocalDateHelper::Format($format, $this->value);
		}
	}

}

