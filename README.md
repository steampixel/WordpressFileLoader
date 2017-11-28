# Wordpress File Loader

Easily add your custom PHP files directly into your wordpress using shortcodes.

## Shortcode

* [phpfile path="path/to/your/file.php"]

## Testing

* To test the phpfile shortcode you can use the following configuration: [phpfile path="wp-content/plugins/sp-fileloader/tests/test.php"] This should output: "PHP file loader is working :-)"

## Security Warnings

This plugin can be used to include php files directly into your Wordpress. Including php files can be dangerous and maybe harm your Wordpress or your server. Only include php files you trust! Remote inclusion is not possible.
