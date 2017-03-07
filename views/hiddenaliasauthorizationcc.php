<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

print '<?xml version="1.0" encoding="UTF-8" ?>';
?>
<authorizationService version="4">
  <body merchantId="<?= $merchantId ?>">
  <transaction refno="<?= $refno ?>">
      <request>
          <amount><?= $amount ?></amount>
          <currency><?= $currency ?></currency>
          <aliasCC><?= $aliasCC ?></aliasCC>
          <expm><?= $expm?></expm>
          <expy><?= $expy ?></expy>
          <sign><?= $sign ?></sign>
      </request>
  </transaction>
  </body>
</authorizationService>