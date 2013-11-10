<?php

namespace Marten\NetteIdn;

class Api extends \Marten\Idn\Api
{


	public function latteImage($path, $args)
	{
		return call_user_func_array(array($this, 'image'), array_merge(array($path), $args));
	}


}
