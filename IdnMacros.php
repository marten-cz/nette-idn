<?php

namespace Marten\NetteIdn;

use Nette\Latte\MacroNode;
use Nette\Latte\PhpWriter;


class IdnMacros extends \Nette\Latte\Macros\MacroSet
{

	public static function install(\Nette\Latte\Compiler $compiler)
	{
		$me = new static($compiler);
		//$set->addMacro('id', NULL, NULL, array($set, 'macroId'));

		$me->addMacro('idn', array($me, 'imageLink'));
	}


	/**
	 * Get IDN image url
	 *
	 * {idn destination [,] [params]}
	 *
	 * @param \Nette\Latte\MacroNode $node Macro node
	 * @param \Nette\Latte\PhpWriter $writer PHP Writer
	 *
	 * @return string
	 */
	public function imageLink(MacroNode $node, PhpWriter $writer)
	{
		return $writer->write('echo %escape(%modify($_presenter->getContext()->getService(\'idn\')->latteImage(%node.word, %node.array?)))');

		return $writer->write('echo %escape(%modify(' . ($node->name === 'plink' ? '$_presenter' : '$_control') . '->link(%node.word, %node.array?)))');
		return $writer->write('if ($_l->tmp = array_filter(%node.array)) echo \' id="\' . %escape(implode(" ", array_unique($_l->tmp))) . \'"\'');
	}

}