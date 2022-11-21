<?php

namespace Raneko\Common;

/**
 * Common helper class.
 * @author Harry Lesmana <harry.lesmana@msn.com>
 * @since 2022-11-17
 */
class Helper {

    private static $data = array();

    const KEY_COMMON_CONFIG_INI_FILE = "raneko-common_config_ini_file";
    const KEY_COMMON_CONFIG_INI_DATA = "raneko-common_config_ini_data";
    const TRANSFER_ARRAY_OPT_NULL_IF_NOT_FOUND = "raneko-common_transfer_opt_null_if_not_found";
    const TRANSFER_ARRAY_OPT_REMOVE_IF_NOT_FOUND = "raneko-common_transfer_opt_remove_if_not_found";

    protected static function setObject($key, $value) {
        self::$data[$key] = $value;
    }

    protected static function getObject($key) {
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

        $result = vsprintf("%s%s{$separator}%s{$separator}%s{$separator}%s{$separator}%s%s%s", str_split(bin2hex($data), 4));

        return $result;
    }

    /**
     * Convert UUID4 into Binary(16) for storage.
     * @param string $uuid Human readable representation of the UUID4.
     * @param string $separator
     * @return string Binary(16) representation of the UUID4.
     */
    public static function uuid4ToBin($uuid, $separator = "-") {
        return pack("h*", str_replace($separator, '', $uuid));
    }

    /**
     * Convert Binary(16) into human readable UUID4.
     * @param string $uuidBin Binary(16) representation of the UUID4.
     * @return string Human readable representation of the UUID4.
     */
    public static function uuid4FromBin($uuidBin, $separator = "") {
        $uuidReadable = unpack("h*", $uuidBin);
        $uuidReadable = preg_replace("/([0-9a-f]{8})([0-9a-f]{4})([0-9a-f]{4})([0-9a-f]{4})([0-9a-f]{12})/", "$1{$separator}$2{$separator}$3{$separator}$4{$separator}$5", $uuidReadable);
        $uuidReadable = array_merge($uuidReadable);

        return $uuidReadable[0];
    }

    /**
     * Set the configuration file.
     * @param string $file Absolute path to the INI configuration file.
     * @since 2022-09-21
     */
    public static function setConfigIni($file) {
        if (file_exists($file)) {
            self::setObject(self::KEY_COMMON_CONFIG_INI_FILE, $file);
            $reader = new \Laminas\Config\Reader\Ini();
            $data = $reader->fromFile($file);
            self::setObject(self::KEY_COMMON_CONFIG_INI_DATA, $data);
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
        return self::getObject(self::KEY_COMMON_CONFIG_INI_FILE);
    }

    /**
     * Get configuration from the pre-configured INI file.
     * @param string $key
     * @return mixed
     */
    public static function getConfig($key = NULL) {
        $config = NULL;

        /* INI version */
        $configData = self::getObject(self::KEY_COMMON_CONFIG_INI_DATA);
        if (!is_null($configData)) {
            if (!is_null($key)) {
                $config = isset($configData[$key]) ? $configData[$key] : NULL;
            } else {
                $config = $configData;
            }
        }
        return $config;
    }

    /**
     * Transfer Key & Value from one array to another array following given map and options.
     * @param array $sourceArray
     * @param array $mapArray Map of the Source Key is mapped to which Target Key. Non associative array element will be treated as if the Source Key is the same as the Target Key.
     * @param array $option
     */
    public static function transferArray($sourceArray, $mapArray, $option = array(self::TRANSFER_ARRAY_OPT_NULL_IF_NOT_FOUND)) {
        $result = array();

        /* Normalizing the map from mix of associate and non-associative to be fully associative */
        $normalizedMap = array();
        foreach ($mapArray as $sourceKey => $targetKey) {
            $newTargetKey = $targetKey;
            $newSourceKey = $sourceKey;
            if (is_numeric($sourceKey)) {
                $sourceKey = $targetKey;
            }
            $normalizedMap[$sourceKey] = $targetKey;
            /* Initiate the target array's keys */
            $result[$targetKey] = NULL;
        }

        /* Run through each element in the Source Array */
        foreach ($sourceArray as $sourceKey => $sourceValue) {
            /* Check if this source key is mapped to a target key, if not it means this source key is not desired */
            $targetKey = isset($normalizedMap[$sourceKey]) ? $normalizedMap[$sourceKey] : NULL;
            if (!is_null($targetKey)) {
                $result[$targetKey] = $sourceValue;
            }
        }

        return $result;
    }

}
