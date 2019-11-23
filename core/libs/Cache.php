<?php

namespace core\libs;

class Cache
{
    public function set($key, $data, $seconds = 3600) {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        $filename = $this->generateFilename($key);
        if (file_put_contents($filename, serialize($content))) {
            return true;
        }
        return false;
    }

    public function get($key) {
        $filename = $this->generateFilename($key);
        if (file_exists($filename)) {
            $content = unserialize(file_get_contents($filename));
            if (time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($filename);
        }
        return false;
    }

    public function delete($key) {
        $filename = $this->generateFilename($key);
        if (file_exists($filename)) {
            unlink($filename);
        }
    }

    private function generateFilename($key) {
        return CACHE . '/' . $key . '_' . md5($key) . '.txt';
    }
}