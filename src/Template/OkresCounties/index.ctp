<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\OkresCounty[]|\Cake\Collection\CollectionInterface $okresCounties
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Okres County'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Obec Cities'), ['controller' => 'ObecCities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Obec City'), ['controller' => 'ObecCities', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="okresCounties index large-9 medium-8 columns content">
    <h3><?= __('Okres Counties') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kraj_region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nazev') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($okresCounties as $okresCounty): ?>
            <tr>
                <td><?= $this->Number->format($okresCounty->id) ?></td>
                <td><?= $okresCounty->has('kraj_region') ? $this->Html->link($okresCounty->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $okresCounty->kraj_region->id]) : '' ?></td>
                <td><?= h($okresCounty->kod) ?></td>
                <td><?= h($okresCounty->nazev) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $okresCounty->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $okresCounty->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $okresCounty->id], ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounty->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
