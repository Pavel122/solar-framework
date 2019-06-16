<?php
namespace vendor\libs;

/**
 * Class Cache
 * @package vendor\libs
 */
class Cache
{
    public function __construct()
    {
        // body...
    }

    public function set($key, $data, $tmp_time = 60*60*2)
    {
        $content = [];

        $content['data'] = $data;
        $content['cache_life'] = time() + $tmp_time;
        $file = md5($key);

        if (file_put_contents(CACHE . "/$file.txt", serialize($content)))
            return true;

        return false;
    }

    public function get($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';

        if (file_exists($file)) {
            $content = unserialize(file_get_contents($file));

            if (time() <= $content['cache_life'])
                return $content['data'];
            unlink($file);
        }

        return false;
    }

    public function delete($key)
    {
        $file = CACHE . '/' . md5($key) . '.txt';

        if (file_exists($file))
            unlink($file);
    }
}