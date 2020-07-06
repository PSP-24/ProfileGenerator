<?php

namespace PSP\profilegenerator;

class Welcome
{
    public function index(String $sName)
    {
        return 'Hi ' . $sName . '! Have you installed auth?';
    }
}
?>