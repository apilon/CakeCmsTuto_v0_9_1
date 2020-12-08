<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObecCity $obecCity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Obec City'), ['action' => 'edit', $obecCity->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Obec City'), ['action' => 'delete', $obecCity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obecCity->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Obec Cities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Obec City'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Okres Counties'), ['controller' => 'OkresCounties', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Okres County'), ['controller' => 'OkresCounties', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="obecCities view large-9 medium-8 columns content">
    <h3><?= h($obecCity->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Kraj Region') ?></th>
            <td><?= $obecCity->has('kraj_region') ? $this->Html->link($obecCity->kraj_region->id, ['controller' => 'KrajRegions', 'action' => 'view', $obecCity->kraj_region->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Okres County') ?></th>
            <td><?= $obecCity->has('okres_county') ? $this->Html->link($obecCity->okres_county->id, ['controller' => 'OkresCounties', 'action' => 'view', $obecCity->okres_county->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Kod') ?></th>
            <td><?= h($obecCity->kod) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Nazev') ?></th>
            <td><?= h($obecCity->nazev) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($obecCity->id) ?></td>
        </tr>
    </table>
</div>
