# LocalDate SilverStripe module

LocalDate translates formatted date strings if there is a matching language file.

## Requirements

* SilverStripe 3.1

## Notes

* Compatible with [Translatable](https://github.com/silverstripe/silverstripe-translatable)

## Installation

1. Drop the module into your SilverStripe project and run /dev/build
2. Set the correct locale in your project `_config.php` using `i18n::set_locale('xx_XX');`

You may also set the language manually using `LocalDateHelper::setLocale('xx_XX');` at any time.

## Usage

The module will extend and override SS_Datetime and Date. Existing dates will be automatically translated as long as a valid language file exists as long as they are of SS_Datetime or Date type.

The locale for the translated date is based on (in order):

1. Any valid locale set with the `LocalDateHelper::setLocale('xx_XX');`
2. The current locale for `Translatable` if the module is installed
3. The current i18n-setting

If the language file for your locale is missing you can easily create it yourself. Simply use one of the included language files as a template and save it to your `/mysite/lang` folder. Better yet, fork this repo and add it to the lang-folder and send me a pull request. Sending me an email (<mailto:richard@spiro.se>) with the translated file attached will also do the trick.

## Troubleshooting

If you are having trouble getting the module to work, you can try to add the injection code in `_config.php` in the [old fashioned way](https://github.com/richardsjoqvist/silverstripe-localdate/blob/959cf6143f6fd3705416a1489df834905d46704f/_config.php).
