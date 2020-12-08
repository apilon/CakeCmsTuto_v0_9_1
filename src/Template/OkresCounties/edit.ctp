<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty $okresCounty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $okresCounty->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounty->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Okres Counties'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Obec Cities'), ['controller' => 'ObecCities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Obec City'), ['controller' => 'ObecCities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="okresCounties form large-9 medium-8 columns content">
    <?= $this->Form->create($okresCounty) ?>
    <fieldset>
        <legend><?= __('Edit Okres County') ?></legend>
        <?php
            echo $this->Form->control('kraj_region_id', ['options' => $krajRegions]);
            echo $this->Form->control('kod');
            echo $this->Form->control('nazev');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
