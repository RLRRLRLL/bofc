<?php

/**
 * $url = string
 */
function checkLinks($url)
{
	return request()->is($url.'*') ? 'active' : '';
}