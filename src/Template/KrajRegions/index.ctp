<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
    'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit',
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'KrajRegions'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('KrajRegions/index', ['block' => 'scriptBottom']);
?>
<!-- salt = 
<?php

use Cake\Utility\Security;

echo Security::salt();
?>
-->
<div  ng-app="app" ng-controller="KrajRegionCrudJwtCtrl">
    <div id="example1"></div> 
    <p style="color:red;">{{ captcha_status}}</p>
    <table>
        <tr>
            <td width="200">Utilisateur (username):</td>
            <td><input type="text" id="username" ng-model="user.username" /></td>
        </tr>
        <tr>
            <td width="200">Mot de passe (password):</td>
            <td><input type="text" id="password" ng-model="user.password" /></td>
        </tr>
        <tr>
        <a ng-click="login(user)">[Connexion] </a>
        <a ng-click="logout()">[Déconnexion] </a>
        <a ng-click="changePassword(user.password)">[Changer le mot de passe]</a>              
        </tr>
    </table>
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>  
    <table>
        <tr>
            <td width="150">ID:</td>
            <td><input type="text" id="id" ng-model="krajRegion.id" /></td>
        </tr>
        <tr>
            <td width="150">Name (nazev):</td>
            <td><input type="text" id="nazev" ng-model="krajRegion.nazev" /></td>
        </tr>
        <tr>
            <td width="150">Code (kod):</td>
            <td><input type="text" id="kod" ng-model="krajRegion.kod" /></td>
        </tr>
        <tr>
        <a ng-click="getKrajRegion(krajRegion.id)">[Get KrajRegion] </a> 
        <a ng-click="updateKrajRegion(krajRegion.id, krajRegion.nazev, krajRegion.kod)">[Update KrajRegion] </a> 
        <a ng-click="addKrajRegion(krajRegion.nazev, krajRegion.kod)">[Add KrajRegion] </a> 
        <a ng-click="deleteKrajRegion(krajRegion.id)">[Delete KrajRegion]</a>           
        </tr>
    </table>
    <a ng-click="getAllKrajRegions()">[Get all KrajRegions]</a><br /> 
    <br /> <br />
    <div ng-repeat="krajRegion in krajRegions">
        {{krajRegion.id}} {{krajRegion.nazev}} {{krajRegion.kod}}
    </div>
    <!-- pre ng-show='krajRegions'>{{krajRegions | json }}</pre-->
</div>

