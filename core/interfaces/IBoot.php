<?php

interface IBoot {
    /**
     * Simple php file requiring
     * @param $path
     */
    public static function script($path);
}