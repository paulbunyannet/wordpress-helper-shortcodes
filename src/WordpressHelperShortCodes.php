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

    /**
     * @param $attributes
     * @param null $content
     * @param null $tag
     * @return mixed
     */
    public static function getBlogInfo($attributes, $content = null, $tag = null)
    {
        $attr = shortcode_atts(['key' => '', 'filter' => ''], $attributes);
        /** @var string $key */
        /** @var string $filter */
        return get_bloginfo($attr['key'], $attr['filter']);
    }
}