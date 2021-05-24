<?php

use Illuminate\Support\Facades\App;

/**
 * $url = string
 */
function checkLinks($url)
{
	return request()->is($url.'*') ? 'active' : '';
}

/**
 * Dispatch alerts from Livewire components.
 * 
 * src: resources/views/components/global/alertbox.blade.php
 */
function throwAlert($instance, $type, $message, $persistent = false)
{
	$instance->dispatchBrowserEvent('show-alert', [
		'type' => $type,
		'message' => $message,
		'persistent' => $persistent
	]);
}