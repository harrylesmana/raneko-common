<?php

namespace Raneko\Common;

/**
 * Common helper class.
 * @author Harry Lesmana <harry.lesmana@msn.com>
 * @since 2022-11-17
 */
class Helper {

    private static $data = array();

    const KEY_CONFIG_INI_FILE = "config_ini_file";
    const KEY_CONFIG_INI_DATA = "config_ini_data";

    private static function setObject($key, $value) {
        self::$data[$key] = $value;
    }

    private static function getObject($key) {
        return isset(self::$data[$key]) ? self::$data[$key] : NULL;
    }

    /**
     * UUID v4.
     * @return string
     */
    public static function uuid4($separator = "") {
        $data = openssl_random_pseudo_bytes(16);

        $data[6] = chr(ord($data[6]) & 0x0f | 0x40); /* set version to 0010 */
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80); /* set bits 6-7 to 10 */

        $result = strtoupper(vsprintf("%s%s{$separator}%s{$separator}%s{$separator}%s{$separator}%s%s%s", str_split(bin2hex($data), 4)));

        return $result;
    }

    /**
     * Set the configuration file.
     * @param string $file Absolute path to the INI configuration file.
     * @since 2022-09-21
     */
    public static function setConfigIni($file) {
        if (file_exists($file)) {
            self::setObject(self::KEY_CONFIG_INI_FILE, $file);
            $reader = new \Laminas\Config\Reader\Ini();
            $data = $reader->fromFile($file);
            self::setObject(self::KEY_CONFIG_INI_DATA, $data);
        } else {
            throw new \Exception("Configuration file '{$file}' does not exist");
        }
    }

    /**
     * Get the current INI configuration file location.
     * @return string|NULL Absolute path of the INI configuration file.
     * @since 2022-09-21
     */
    public static function getConfigIni() {
        return self::getObject(self::KEY_CONFIG_INI_FILE);
    }

    /**
     * Get configuration from the pre-configured INI file.
     * @param string $key
     * @return mixed
     */
    public static function getConfig($key = NULL) {
        $config = NULL;

        /* INI version */
        $configData = self::getObject(self::KEY_CONFIG_INI_DATA);
        if (!is_null($configData)) {
            if (!is_null($key)) {
                $config = isset($configData[$key]) ? $configData[$key] : NULL;
            } else {
                $config = $configData;
            }
        }
        return $config;
    }

}
