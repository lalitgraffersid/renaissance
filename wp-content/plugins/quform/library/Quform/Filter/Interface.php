<?php

/**
 * @copyright Copyright (c) 2009-2019 ThemeCatcher (https://www.themecatcher.net)
 */
interface Quform_Filter_Interface
{
    public function filter($value);
    public static function getDefaultConfig();
}
