<?php

use Illuminate\Support\Facades\App;

/**
 * $url = string
 */
function checkLinks($url)
{
	return request()->is($url.'*') ? 'active' : '';
}