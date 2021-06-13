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

use \League\Plates\{ Engine, Template\Template };
use \League\Plates\Extension\ExtensionInterface;
use \phpDocumentor\Reflection\Element;
use \JuliusHaertl\PHPDocToRst\Extension\P2RExtension;

/**
 * A Plates extension who is designed for launch PHPDocToRst extension. (only the P2RExtension)
 */
class AccessP2RExtension  implements ExtensionInterface
{
	/**
	 * Plates engine
	 * @var Engine
	 */
	protected Engine $engine;

	/**
	 * The template is assigned as a parameter on each function call.
	 * Must be public for work
	 * @var type
	 */
	public Template $template; // must be public

	/**
	 * P2RExtension Extension mecanism for PHPDocToRst
	 * @var P2RExtension[]
	 */
    protected $extensions;

	/**
	 * A Plates extension who is designed for launch PHPDocToRst extension. (only the P2RExtension).
	 * So, you must pass an array with the P2RExtension to call
	 *
	 * @param P2RExtension[] $extensions Array of extension to execute
	 * @throws InvalidArgumentException If a extension not implement TemplateExtension interface
	 */
	public function __construct(Array $extensions)
    {
		//verify
		foreach ($extensions as $v) {
			if (! $v instanceof P2RExtension) {
				throw new \InvalidArgumentException(get_class($v) . " not implement TemplateExtension Interface");
			}
		}

		//save extension list
        $this->extensions = $extensions;
    }

	public function register(Engine $engine)
    {
        $this->engine = $engine;

		$engine->registerFunction('P2RExtension', [$this, 'getObject']);
    }

    public function getObject()
    {
        return $this;
    }

	/**
	 * Call All the Extensions with $type type.
	 *
	 * WARNING : You must define builder var in template layout who call this
	 *
	 * @param mixed $type
	 * @param Element $element
	 * @return type
	 */
	public function call($type, Element $element)
	{
		if (!array_key_exists('builder', $this->template->data())) {
			throw new InvalidArgumentException("Call extension (type=$type) in " . __FILE__ . 'but builer is not set');
		}

		$builder = $this->template->data()['builder'];

		foreach ($this->extensions as $extension) {
            $ret[] = $extension->render($type, $builder, $element);
        }

		return implode(' ', $ret);
	}

	/**
	 * Return true if the Element must be rendered
	 *
	 * @param Element $element
	 * @return bool
	 */
	public function shouldRenderElement(Element $element) : bool
    {
        foreach ($this->extensions as $extension) {
            if ($extension->shouldRenderElement($element) === false) {
                return false;
            }
        }
        return true;
    }
}
