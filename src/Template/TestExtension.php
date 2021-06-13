<?php
/**
 * @copyright Copyright (c) 2017 Julius Härtl <jus@bitgrid.net> Copyright (c) 2021 Luri <vic@luri.dev> for this file
 * @author    Luri <vic@luri.dev> (for this file)
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

namespace JuliusHaertl\PHPDocToRst\Template;

use League\Plates\Engine;
use phpDocumentor\Reflection\Element;

/**
 * 4 Test Plate extension mécanism
 */
Class TestExtension implements TemplateExtension
{
	/**
     * @inherit
     */
    public function render(string $type, Engine $engine, Element $element) {
		if ($type == 'RENDER_HERE') {
			return $engine->render('ExtensionTest', [
				'element' => $element
				]);
		}
	}
}
