<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "KrajRegions",
    "action" => "getKrajRegions",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('ObecCities/add_edit', ['block' => 'scriptBottom']);
?><?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ObecCity $obecCity
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Obec Cities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Kraj Regions'), ['controller' => 'KrajRegions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Kraj Region'), ['controller' => 'KrajRegions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Okres Counties'), ['controller' => 'OkresCounties', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Okres County'), ['controller' => 'OkresCounties', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="obecCities form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="krajRegionsController">
    <?= $this->Form->create($obecCity) ?>
    <fieldset>
        <legend><?= __('Add Obec City') ?></legend>
        <div>
            <?= __('Regions') . ' ' . '(Kraje)' ?> : 
            <select 
                name="kraj_region_id"
                id="kraj-region-id" 
                ng-model="krajRegion" 
                ng-options="krajRegion.nazev for krajRegion in krajRegions track by krajRegion.id"
                >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            <?= __('Counties') . ' ' . '(Okresy)' ?> : 
            <!-- pre ng-show='krajRegions'>{{ krajRegions | json }}></pre-->
            <select
                name="okres_county_id"
                id="okres-county-id" 
                ng-disabled="!krajRegion" 
                ng-model="okresCounty"
                ng-options="okresCounty.nazev for okresCounty in krajRegion.okres_counties track by okresCounty.id"
                >
                <option value=''>Select</option>
            </select>
        </div>

        <?php
//            echo $this->Form->control('kraj_region_id', ['options' => $krajRegions]);
//            echo $this->Form->control('okres_county_id', ['options' => [__('Please select a KrajRegion first')]]);
        echo $this->Form->control('kod');
        echo $this->Form->control('nazev');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
