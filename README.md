## LocalDate SilverStripe module

LocalDate translates formatted date strings to the locale set with i18n::set_locale() if there is a matching language file.
It has been tested with SilverStripe 3.0.5

## Installation

Drop the module into your SilverStripe project and run /dev/build

## Usage

The module will extend and override SS_Datetime. Existing dates will be automatically translated as long as a valid language file exists.

If the language file for your locale is missing you can easily create it yourself. Simply use one of the included language files as a template and save it to your `/mysite/lang` folder. Better yet, fork this repo and add it to the lang-folder and send me a pull request. Sending me an email (<mailto:richard@spiro.se>) with the translated file attached will also do the trick.
