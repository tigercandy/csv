<?php
/**
 * Author: tangchunlinit@foxmail.com
 * Date: 2018/3/1
 * Time: 下午2:10
 */

class Arr
{
    /**
     * Get a subset of the items from the given array.
     *
     * @param  array $array
     * @param  array|string $keys
     * @return array
     */
    public function array_only($array, $keys)
    {
        return Arr::only($array, $keys);
    }

    /**
     * Get a subset of the items from the given array.
     *
     * @param  array $array
     * @param  array|string $keys
     * @return array
     */
    public static function only($array, $keys)
    {
        return array_intersect_key($array, array_flip((array)$keys));
    }
}