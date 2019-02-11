<?php
/**
 * Created by PhpStorm.
 * User: jack
 * Date: 2018/9/8
 * Time: 上午9:18
 */

use Jenssegers\Optimus\Optimus;

// returns true if $needle is a substring of $haystack
function contains($needle, $haystack)
{
    return strpos($haystack, $needle) !== false;
}

/**
 * hash id encoder helper
 * @param int $id
 * @return int
 */
function hashid_encode(int $id)
{
    $optimus = new Optimus(config('hashid.prime'), config('hashid.inverse'), config('hashid.random'));
    $encoded = $optimus->encode($id);
    return $encoded;
}

/**
 * hash id decoder helper
 * @param int $encodeId
 * @return int
 */
function hashid_decode(int $encodeId)
{
    $optimus = new Optimus(config('hashid.prime'), config('hashid.inverse'), config('hashid.random'));
    $id = $optimus->decode($encodeId);
    return $id;
}
