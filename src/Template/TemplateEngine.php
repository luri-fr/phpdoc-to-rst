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

use \League\Plates\{Engine, Template\Theme};
use \JuliusHaertl\PHPDocToRst\Template\{
	ThemeDTO,
	DefaultTheme,
	AccessP2RExtension
};
use \JuliusHaertl\PHPDocToRst\Extension\P2RExtension;
use \JuliusHaertl\PHPDocToRst\Builder\FileBuilder2;


/**
 * Helper class to build reStructuredText files.
 */
class TemplateEngine
{
	const SECTION_BEFORE_DESCRIPTION = self::class.'::SECTION_BEFORE_DESCRIPTION';
    const SECTION_AFTER_DESCRIPTION = self::class.'::SECTION_AFTER_DESCRIPTION';
    const SECTION_AFTER_TITLE = self::class.'::SECTION_AFTER_TITLE';
    const SECTION_AFTER_INTRODUCTION = self::class.'::SECTION_AFTER_INTRODUCTION';

	/**
	 * Instance of template engine
	 * @var \League\Plates\Engine
	 */
	protected $engine;

	/**
	 * Load the template engine and add our extension
	 *
	 * @param P2RExtension[]|null $extensions Array of P2RExtension to use
	 * @param ThemeDTO|null $theme if yoy don't want the default theme, you can use this param
	 * @throws \InvalidArgumentException
	 */
	public function __construct(?Array $extensions = [], ?ThemeDTO $theme = null) {
		//Default Theme
		if (! $theme instanceof ThemeDTO) {
			$theme = new DefaultTheme();
		}

		//Verify Theme directory
		$temp = $theme;
		do {
			if (!is_dir($temp->directory))
			{
				throw new \InvalidArgumentException("Error with Theme Definition");
			}

			//Reconstruct Theme Hierarchy
			$hierachy[] =Theme::new($temp->directory, $temp->name);

			//Next
			$temp = $temp->parent;

		} while ($temp != null);

		//Restore good order for theme Hierarchy
		$hierachy = array_reverse($hierachy);


		// Create new Plates instance
		$this->engine = Engine::fromTheme(Theme::hierarchy($hierachy));

		//Load extensio
		$this->engine->loadExtension( new AccessP2RExtension($extensions));
	}

	/**
     * Render a template with the P2Rextension mecanism
	 *
	 * @param  FileBuilder2   $builder  builder used for launch this function. (Necessary for extension)
     * @param  string         $name    Name of template laout
     * @param  array          $data    Data about template
     * @return string
     */
	public function renderWithExtension(FileBuilder2 $builder, $name, array $data = array()) : string
	{
		if (empty($data)) {
			$data = ['builder' => $builder];
		} else {
			$data = array_merge($data, ['builder' => $builder]);
		}
		return $this->engine->render($name, $data);
	}

	/**
     * Render a template without extension
	 *
	 * @param  FileBuilder2   $builder  builder used for launch this function. (Necessary for extension)
     * @param  string         $name    Name of template laout
     * @param  array          $data    Data about template
     * @return string
     */
	public function render($name, array $data = array()) : string
	{
		return $this->engine->render($name, $data);
	}
}
