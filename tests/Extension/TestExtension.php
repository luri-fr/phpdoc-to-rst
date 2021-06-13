<?php
/**
 * @copyright Copyright (c) 2017 Julius Härtl <jus@bitgrid.net>
 * @author    Julius Härtl <jus@bitgrid.net>
 * @license   GNU AGPL version 3 or any later version
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU Affero General Public License as
 *  published by the Free Software Foundation, either version 3 of the
 *  License, or (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU Affero General Public License for more details.
 *
 *  You should have received a copy of the GNU Affero General Public License
 *  along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace JuliusHaertl\PHPDocToRst\Test\Extension;

use JuliusHaertl\PHPDocToRst\Extension\P2RExtension;
use JuliusHaertl\PHPDocToRst\Builder\FileBuilder2;
use phpDocumentor\Reflection\Element;
use JuliusHaertl\PHPDocToRst\Template\TemplateEngine;

class TestExtension extends P2RExtension
{

    /**
     * A simply test with an template
     */
    public function render($type, FileBuilder2 $builder, Element $element)
    {
		if ($type != TemplateEngine::SECTION_AFTER_TITLE) {
			return;
		}

		$data = [
		   'file' => $builder->getStudiedFile()->getPath()
	   ];

	   return $builder->getTemplateEngine()->render('TestExtensionTemplate', $data);
    }

    /**
     * A simply test
     */
    public function shouldRenderElement(Element $element)
    {
        if ($element->getName() == 'deux') {
			return true;
		}

		return false;
    }

}
