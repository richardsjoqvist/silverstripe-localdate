<?php
/**
 * Localized date names, extension of {@link Time}
 */
class LocalTime extends Time {

	public function Nice() {
		if($this->value) return $this->Format(_t('LocalTimeFormat.Nice','g:ia'));
	}

	public function Nice24() {
		if($this->value) return $this->Format(_t('LocalTimeFormat.Nice24','H:i:s'));
	}

	public function Short() {
		if($this->value) return $this->Format(_t('LocalTimeFormat.Short','H:i'));
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

