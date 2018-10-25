<?php
/**
 * ${CLASS_NAME}
 *
 * Created 10/25/18 10:02 AM
 * Description of this file here....
 *
 * @author Nate Nolting <naten@paulbunyan.net>
 * @package ${NAMESPACE}
 * @subpackage Subpackage
 */

class WordpressHelperShortCodes
{

    /**
     * @param $attributes
     * @param null $content
     * @param null $tag
     * @return string|null
     */
    public static function getEnv($attributes, $content = null, $tag = null) {
        if ($attributes) {
            return function_exists('env') ? env($attributes[0], $attributes[0]) : getenv($attributes[0]);
        }
        return null;
    }

}