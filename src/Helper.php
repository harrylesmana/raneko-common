<?php

namespace Raneko\Common;

/**
 * Common helper class.
 * @author Harry Lesmana <harry.lesmana@msn.com>
 * @since 2022-11-17
 */
class Helper {

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

}
