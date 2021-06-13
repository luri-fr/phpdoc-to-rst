<?php
use \JuliusHaertl\PHPDocToRst\Template\TemplateEngine;
?>
<?=$this->e($title)?>

<?=str_repeat('=', strlen($title))?>


<?=$this->e($this->P2RExtension()->call(TemplateEngine::SECTION_AFTER_TITLE, $element)) ?>


Bonjour à tous.
<?=$this->e($this->P2RExtension()->call('NOT_HERE', $element)) ?>