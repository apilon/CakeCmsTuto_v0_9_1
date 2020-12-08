<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty $okresCounty
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Okres County'), ['action' => 'edit', $okresCounty->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Okres County'), ['action' => 'delete', $okresCounty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounty->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Okres Counties'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Okres County'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Obec Cities'), ['controller' => 'ObecCities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Obec City'), ['controller' => 'ObecCities', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="okresCounties view large-9 medium-8 columns content">
    <h3><?= h($okresCounty->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Kraj Region') ?></th>
            <td><?= $okresCounty->has('kraj_region') ? $this->Html->link($okresCounty->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $okresCounty->kraj_region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kod') ?></th>
            <td><?= h($okresCounty->kod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nazev') ?></th>
            <td><?= h($okresCounty->nazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($okresCounty->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Obec Cities') ?></h4>
        <?php if (!empty($okresCounty->obec_cities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Kraj Region Id') ?></th>
                <th scope="col"><?= __('Okres County Id') ?></th>
                <th scope="col"><?= __('Kod') ?></th>
                <th scope="col"><?= __('Nazev') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($okresCounty->obec_cities as $obecCities): ?>
            <tr>
                <td><?= h($obecCities->id) ?></td>
                <td><?= h($obecCities->kraj_region_id) ?></td>
                <td><?= h($obecCities->okres_county_id) ?></td>
                <td><?= h($obecCities->kod) ?></td>
                <td><?= h($obecCities->nazev) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ObecCities', 'action' => 'view', $obecCities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ObecCities', 'action' => 'edit', $obecCities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ObecCities', 'action' => 'delete', $obecCities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obecCities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
