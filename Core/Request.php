<?php

namespace Core;

class Request
{
        public function get($key, $prefix = null, $default = null)
        {
                return isset($_GET[$key]) ? ($prefix ?: null) . $_GET[$key] : $default;
        }

        public function post($key, $default = null)
        {
                return isset($_POST[$key]) ? $_POST[$key] : $default;
        }

        public function all()
        {
                return $_POST;
        }
}
