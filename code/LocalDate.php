<?php
/**
 * Localized date names, extension of {@link Date}
 */
class LocalDate extends Date {

	public function Nice() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Nice','d/m/Y'));
	}

	public function Long() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Long','j F Y'));
	}

	public function Full() {
		if($this->value) return $this->Format(_t('LocalDateFormat.Full','j M Y'));
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

