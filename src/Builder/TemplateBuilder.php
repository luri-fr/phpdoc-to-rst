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

namespace JuliusHaertl\PHPDocToRst\Builder;

use \League\Plates\{Engine, Template\Theme};
use \JuliusHaertl\PHPDocToRst\Template\{ ThemeDTO, DefaultTheme};
use \JuliusHaertl\PHPDocToRst\Extension\P2RExtension;
use \phpDocumentor\Reflection\Element;
use \phpDocumentor\Reflection\Php\File;


/**
 * Helper class to build reStructuredText files.
 */
class TemplateBuilder
{
	/**
	 * Instance of template engine
	 * @var \League\Plates\Engine
	 */
	protected $engine;

	/**
	 * Studied PHP File
	 * @var File
	 */
    protected $studiedFile;

    /**
	 * Root Element that is used to build the rst file
	 * @var Element
	 */
    protected $rootElement;

	/**
	 * Load template engin with own extend
	 */
	public function __construct(File $studiedFile, Element $rootElement, Array $extensions, ?ThemeDTO $theme = null) {
		//Saved Data
		$this->studiedFile = $studiedFile;
        $this->rootElement = $rootElement;

		//Default Theme
		if (! $theme instanceof ThemeDTO) {
			$theme = new DefaultTheme();
		}

		//Verify Theme directory
		$temp = $theme;
		do {
			if (!is_dir($temp->Directory))
			{
				throw new \InvalidArgumentException("Error with Theme Definition");
			}

			//Reconstruct Theme Hierarchy
			$hierachy[] =Theme::new($temp->Directory, $temp->Name);;

			//Next
			$temp = $temp->parent;

		} while ($temp != null);

		//Restore good order for theme Hierarchy
		$hierachy = array_reverse($hierachy);


		// Create new Plates instance
		$this->engine = Engine::fromTheme(Theme::hierarchy($hierachy));

		//Load extension Mecanism for test
		$this->engine->loadExtension( new \JuliusHaertl\PHPDocToRst\Template\AccessExtension([new \JuliusHaertl\PHPDocToRst\Template\TestExtension()]));
	}

	public function render($element) {
		return $this->engine->render('ClassHeader', [
			'title' => 'TITRE',
			"element" => $element
		]);
	}

	 /**
     * @return Element that is used to build the rst file
     */
    public function getRootElement()
    {
        return $this->element;
    }

    /**
     * @return File
     */
    public function getStudiedFile()
    {
        return $this->file;
    }
}
