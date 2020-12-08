<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObecCity[]|\Cake\Collection\CollectionInterface $obecCities
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Obec City'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Okres Counties'), ['controller' => 'OkresCounties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Okres County'), ['controller' => 'OkresCounties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="obecCities index large-9 medium-8 columns content">
    <h3><?= __('Obec Cities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kraj_region_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('okres_county_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('kod') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nazev') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obecCities as $obecCity): ?>
            <tr>
                <td><?= $this->Number->format($obecCity->id) ?></td>
                <td><?= $obecCity->has('kraj_region') ? $this->Html->link($obecCity->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $obecCity->kraj_region->id]) : '' ?></td>
                <td><?= $obecCity->has('okres_county') ? $this->Html->link($obecCity->okres_county->id, ['controller' => 'OkresCounties', 'action' => 'view', $obecCity->okres_county->id]) : '' ?></td>
                <td><?= h($obecCity->kod) ?></td>
                <td><?= h($obecCity->nazev) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $obecCity->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $obecCity->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $obecCity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obecCity->id)]) ?>
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
