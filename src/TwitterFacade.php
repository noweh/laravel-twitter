<?php

namespace Noweh\Twitter;

use Illuminate\Support\Facades\Facade;

class TwitterFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'twitter';
	}
}
