<?php

class Input
{
    /**
     * By Default
     * - Dont addslashes as done from Prepared query
     * - always strip html from input
     * - $aOptions = ['addslashes' => false, 'skipStripHtml' => true]
     */
    private static function sanitizeInput($value, $aOptions = [])
    {
        if ($value === null) {
            return $value;
        }

        // Sanitize if array
        if (is_array($value)) {
            foreach ($value as $sKey => $sValue) {
                $value[self::sanitizeInput($sKey, $aOptions)] = self::sanitizeInput($sValue, $aOptions);
            }

            return $value;
        }

        global $_oHTMLPurifier;

        // Remove HTML
        if (!isset($aOptions['skipStripHtml']) || !$aOptions['skipStripHtml']) {
            $value = is_string($value) ? preg_replace('/<[^>]*>/', '', $value) : $value;
        } else {
            $value = $_oHTMLPurifier->purify($value);
        }

        // Add Slashes
        if (isset($aOptions['addslashes']) && $aOptions['addslashes']) {
            $value = addslashes($value);
        }

        return $value;
    }

    public static function get($sName, $aOptions = [])
    {
        $value = isset($_GET[$sName]) ? $_GET[$sName] : null;

        return self::sanitizeInput($value, $aOptions);
    }

    public static function sanitize($value, $aOptions = [])
    {
        return self::sanitizeInput($value, $aOptions);
    }

    public static function post($sName, $aOptions = [])
    {
        $value = isset($_POST[$sName]) ? $_POST[$sName] : null;

        return self::sanitizeInput($value, $aOptions);
    }

    public static function request($sName, $aOptions = [])
    {
        $value = isset($_REQUEST[$sName]) ? $_REQUEST[$sName] : null;

        return self::sanitizeInput($value, $aOptions);
    }

    public static function all($aOptions = [])
    {
        $requestType = $_SERVER['REQUEST_METHOD'];

        if ($requestType == "POST") {
            return self::sanitizeInput($_POST, $aOptions);
        } else if ($requestType == "GET") {
            return self::sanitizeInput($_GET, $aOptions);
        } else if ($requestType == "REQUEST") {
            return self::sanitizeInput($_REQUEST, $aOptions);
        } else {
            return null;
        }
    }
}
