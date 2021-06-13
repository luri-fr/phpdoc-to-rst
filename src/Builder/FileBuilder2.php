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

namespace JuliusHaertl\PHPDocToRst\Builder;

use JuliusHaertl\PHPDocToRst\Extension\Extension;
use JuliusHaertl\PHPDocToRst\Template\TemplateEngine;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Php\File;

/**
 * Abstract building class to build rst doc from a php file with use Plates
 */
abstract class FileBuilder2
{
    /** @var File */
    protected File $studiedFile;

    /**
	 * Root Element that is used to build the rst file
	 * @var Element
	 */
    protected Element $rootElement;

	/**
	 * Templates engine with use internaly Plates
	 * @var TemplateEngine
	 */
	protected TemplateEngine $engine;

	/**
	 * @var string
	 */
    protected string $content;



    public function __construct(File $studiedFile, Element $rootElement, TemplateEngine $engine)
    {
        $this->studiedFile = $studiedFile;
        $this->rootElement = $rootElement;
		$this->engine = $engine;

        $this->render();
    }

    abstract protected function render();

    /**
     * @return Element that is used to build the rst file
     */
    public function getRootElement() : Element
    {
        return $this->rootElement;
    }

    /**
     * @return File
     */
    public function getStudiedFile() : File
    {
        return $this->studiedFile;
    }

	public function getTemplateEngine() : TemplateEngine
    {
        return $this->engine;
    }


	public function getContent() : string
    {
        return $this->content;
    }
}
