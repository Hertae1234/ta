<?php

use Jenssegers\Blade\Blade;

if (!function_exists('view')) 
{
    
    // Parameter pertama adalah nama view
    // Parameter kedua adalah data dalam bentuk array
    function view($view, $data = [])
    {
        // Path folder views
        $viewDirectory = VIEWPATH;
        // Path folder cache
        $cacheDirectory = APPPATH . 'cache';
        $CI =& get_instance();
        $data['message'] = $CI->load->view('message', null, true);

        $blade = new Blade($viewDirectory, $cacheDirectory);
        echo $blade->make($view, $data);
    }
}