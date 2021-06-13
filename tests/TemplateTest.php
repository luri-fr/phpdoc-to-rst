<?php

namespace JuliusHaertl\PHPDocToRst\Test;

use JuliusHaertl\PHPDocToRst\Template\{
	TemplateEngine,
	ThemeDTO,
	DefaultTheme
};
use \JuliusHaertl\PHPDocToRst\Builder\FileBuilder2;
use phpDocumentor\Reflection\Php\Project;
use phpDocumentor\Reflection\Element;
use phpDocumentor\Reflection\Php\File;


class TemplateTest extends \PHPUnit\Framework\TestCase
{
	/**
	 * Basic test with template engine. We can't use P2RExtension system here
	 */
    public function testTemplateEngine() {
		// In prod, we use the DefaultTheme or a real theme (see testRealTheme())
		// But we use a special test template theme
		$testTheme = new ThemeDTO(__DIR__ . DIRECTORY_SEPARATOR . 'Template', 'Test');


		//Load Engine and render a simple template
		$engine = new TemplateEngine([], $testTheme);
		$res = $engine->render('BasicTemplate', ['title' => 'TEST']);

		//Assert
		$expected = <<<EXP
TEST
====

Bonjour à tous.
EXP;
		$this->assertEquals($expected, $res);
	}

	/**
	 * Here, we test the standard launch in the different builder with P2RExtension system active
	 * We test standard Render() function of this exension systeme
	 */
	public function testP2RExtensionRender() {
		//
		// MOCK (but we can't mock File and Project because there are Final)
		//
		$elementMock = $this->createMock(Element::class);

		$projectMock = new Project('test');

		$fileMock = new File('ONSENFOUT', '/path/to/file');


		// In prod, we use the DefaultTheme or a real theme (see testRealTheme())
		// But we use a special test template theme
		$testTheme = new ThemeDTO(__DIR__ . DIRECTORY_SEPARATOR . 'Template', 'Test');


		//
		// CODE
		//

		//Here, we load and use engine and extension with intermediate of FileBuilder2 like in prod
		//Simply, we use an basic test extension

		//Instance extension
		$extensions = [new Extension\TestExtension($projectMock)];

		//Load Engine with P2Rextension
		$engine = new TemplateEngine($extensions, $testTheme);

		//Instanciate builder and internaly render
		$builder = new ForPlatesTestBuilder($fileMock, $elementMock, $engine);



		//
		// Assert
		//
		$expected = <<<EXP
CLASS TEST
==========

in  /path/to/file

Bonjour à tous.

EXP;
		$this->assertEquals($expected, $builder->getContent());
	}

	/**
	 * Here we test the ShouldRenderElement function of P2RextensionSystem
	 */
	public function testP2RExtensionShouldRenderElement() {
		//
		// MOCK (but we can't mock File and Project because there are Final)
		//
		$element1 = $this->createMock(Element::class);
		$element1->method('getName')->willReturn('un');
		$element2 = $this->createMock(Element::class);
		$element2->method('getName')->willReturn('deux');

		$builderMock = $this->createMock(FileBuilder2::class);

		$projectMock = new Project('test');


		// In prod, we use the DefaultTheme or a real theme (see testRealTheme())
		// But we use a special test template theme
		$testTheme = new ThemeDTO(__DIR__ . DIRECTORY_SEPARATOR . 'Template', 'Test');


		//
		// CODE
		//

		//Here, we load and use engine and extension with intermediate of FileBuilder2 like in prod
		//Simply, we use an basic test extension

		//Instance extension
		$extensions = [new Extension\TestExtension($projectMock)];

		//Load Engine with P2Rextension
		$engine = new TemplateEngine($extensions, $testTheme);

		//We render direct, for a example of real, see testP2RExtensionRender()
		$data = [
		   'title' => 'TEST3',
		   'el1' => $element1,
		   'el2' => $element2
	   ];

	   $content = $engine->renderWithExtension($builderMock, 'ShouldrenderTemplate', $data);



		//
		// Assert
		//
		$expected = <<<EXP
TEST3
=====

This is The Second Element

EXP;
		$this->assertEquals($expected, $content);
	}

	/**
	 * We simply here test if a real Theme work
	 * (undestand here, we test to remplace an existing template by an another in our theme
	 */
	public function testRealTheme() {
		//
		// DEFAULT THEME
		//
		$defaultEngine = new TemplateEngine();
		$defaultContent = $defaultEngine->render('PhpNamespace', ['namespace' => 'test/namespace']);

		//Assert
		$expected = '.. php:namespace:: test/namespace';
		$this->assertEquals($expected, $defaultContent);

		//
		// CUSTOM THEME
		//
		//
		//Always declare default theme because if an template file not exist in your theme, it's failback to default theme
		$defaultTheme = new DefaultTheme();
		$testTheme = new ThemeDTO(__DIR__ . DIRECTORY_SEPARATOR . 'Template', 'Test', $defaultTheme);

		$ourEngine = new TemplateEngine([], $testTheme);
		$ourContent = $ourEngine->render('PhpNamespace', ['namespace' => 'test/namespace']);

		//Assert
		$expected = 'Bonjour test/namespace';
		$this->assertEquals($expected, $ourContent);
	}

}
