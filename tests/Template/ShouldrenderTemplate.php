<?=$this->e($title)?>

<?=str_repeat('=', strlen($title))?>


<?php if ($this->P2RExtension()->shouldRenderElement($el1)): ?>
This is The First Element

<?php endif ?>
<?php if ($this->P2RExtension()->shouldRenderElement($el2)): ?>
This is The Second Element
<?php endif ?>