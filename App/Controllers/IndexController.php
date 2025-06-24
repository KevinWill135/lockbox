<?php

namespace App\Controllers;

class IndexController
{
    public function __invoke()
    {
        return views('index', template: 'guest');
    }
}
