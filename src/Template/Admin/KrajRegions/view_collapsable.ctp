<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li class="nav-item"><?= $this->Html->link(__('Edit Kraj Region'), ['action' => 'edit', $krajRegion->id], ['class' => 'nav-link']) ?></li>
<li class="nav-item"><?= $this->Form->postLink( __('Delete Kraj Region'), ['action' => 'delete', $krajRegion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $krajRegion->id), 'class' => 'nav-link'] ) ?></li>
<li class="nav-item"><?= $this->Html->link(__('List Kraj Regions'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li class="nav-item"><?= $this->Html->link(__('New Kraj Region'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li class="nav-item"><?= $this->Html->link(__('List Obec Cities'), ['controller' => 'ObecCities', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li class="nav-item"><?= $this->Html->link(__('New Obec City'), ['controller' => 'ObecCities', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li class="nav-item"><?= $this->Html->link(__('List Okres Counties'), ['controller' => 'OkresCounties', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li class="nav-item"><?= $this->Html->link(__('New Okres County'), ['controller' => 'OkresCounties', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', $this->fetch('tb_actions')); ?>

<div class="krajRegions view large-9 medium-8 columns content">
    <h3><?= h($krajRegion->nazev) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Kod') ?></th>
                <td><?= h($krajRegion->kod) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Nazev') ?></th>
                <td><?= h($krajRegion->nazev) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($krajRegion->id) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Obec Cities') ?></h4>
        <?php if (!empty($krajRegion->obec_cities)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Kraj Region Id') ?></th>
                    <th scope="col"><?= __('Okres County Id') ?></th>
                    <th scope="col"><?= __('Kod') ?></th>
                    <th scope="col"><?= __('Nazev') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($krajRegion->obec_cities as $obecCities): ?>
                <tr>
                    <td><?= h($obecCities->id) ?></td>
                    <td><?= h($obecCities->kraj_region_id) ?></td>
                    <td><?= h($obecCities->okres_county_id) ?></td>
                    <td><?= h($obecCities->kod) ?></td>
                    <td><?= h($obecCities->nazev) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'ObecCities', 'action' => 'view', $obecCities->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'ObecCities', 'action' => 'edit', $obecCities->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'ObecCities', 'action' => 'delete', $obecCities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $obecCities->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Okres Counties') ?></h4>
        <?php if (!empty($krajRegion->okres_counties)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Kraj Region Id') ?></th>
                    <th scope="col"><?= __('Kod') ?></th>
                    <th scope="col"><?= __('Nazev') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($krajRegion->okres_counties as $okresCounties): ?>
                <tr>
                    <td><?= h($okresCounties->id) ?></td>
                    <td><?= h($okresCounties->kraj_region_id) ?></td>
                    <td><?= h($okresCounties->kod) ?></td>
                    <td><?= h($okresCounties->nazev) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'OkresCounties', 'action' => 'view', $okresCounties->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'OkresCounties', 'action' => 'edit', $okresCounties->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'OkresCounties', 'action' => 'delete', $okresCounties->id], ['confirm' => __('Are you sure you want to delete # {0}?', $okresCounties->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
