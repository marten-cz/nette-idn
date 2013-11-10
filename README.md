# Nette IDN extension

To register this extension into the Nette, add the latte macro extension to your config file.

**Nette 2.0.x**

	factories:
		nette.latte:
			class: Nette\Latte\Engine
			setup:
				- Marten\NetteIdn\IdnMacros::install(::$service->getCompiler())

**Nette 2.1.x**

	latte:
		macros:
			- Marten\NetteIdn\IdnMacros::install

Then you need to configure your IDN account and API class.

	idn:
		class: Marten\NetteIdn\Api('username', 'password')
