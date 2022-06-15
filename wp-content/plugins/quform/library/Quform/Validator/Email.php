<?php

/**
 * @copyright Copyright (c) 2009-2019 ThemeCatcher (https://www.themecatcher.net)
 */
class Quform_Validator_Email extends Quform_Validator_Abstract
{
    const INVALID = 'emailAddressInvalid';
    const INVALID_FORMAT = 'emailAddressInvalidFormat';

    /**
     * Mailer instance used for validation
     *
     * @var PHPMailer
     */
    protected static $mailer = null;

    /**
     * Check email address validity
     *
     * @param   string   $value  Email address to be checked
     * @return  boolean          True if email is valid, false if not
     */
    public function isValid($value)
    {
        $this->reset();

        if ( ! is_string($value)) {
            $this->error(self::INVALID);
            return false;
        }

        if ( ! class_exists('PHPMailer')) {
            require_once ABSPATH . WPINC . '/class-phpmailer.php';
        }

        if (self::$mailer === null) {
            self::$mailer = new PHPMailer;
        }

        self::$mailer->CharSet = $this->config('charset');

        $address = is_callable(array(self::$mailer, 'punyencodeAddress')) ? self::$mailer->punyencodeAddress($value) : $value;

        $valid = PHPMailer::validateAddress($address, apply_filters('quform_email_validation_method', 'php', $address, self::$mailer, $this));

        if ( ! $valid) {
            $this->error(self::INVALID_FORMAT, compact('value'));
        }

        return $valid;
    }

    /**
     * Get all message templates or the single message with the given key
     *
     * @param   string|null   $key
     * @return  array|string
     */
    public static function getMessageTemplates($key = null)
    {
        $messageTemplates = array(
            self::INVALID => __('Invalid data type, string expected',  'quform'),
            self::INVALID_FORMAT => __('Invalid email address',  'quform')
        );

        if (is_string($key)) {
            return array_key_exists($key, $messageTemplates) ? $messageTemplates[$key] : null;
        }

        return $messageTemplates;
    }

    /**
     * Get the default config for this validator
     *
     * @param   string|null  $key  Get the config by key, if omitted the full config is returned
     * @return  array
     */
    public static function getDefaultConfig($key = null)
    {
        $config = apply_filters('quform_default_config_validator_email', array(
            'charset' => 'UTF-8',
            'messages' => array(
                self::INVALID => '',
                self::INVALID_FORMAT => ''
            )
        ));

        $config['type'] = 'email';

        if (Quform::isNonEmptyString($key)) {
            return Quform::get($config, $key);
        }

        return $config;
    }
}
