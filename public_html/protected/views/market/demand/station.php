<?php $this->sTitle = 'Station Orders'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <img class="img-thumbnail margin-right-15" src="http://image.eveonline.com/Character/<?php echo $cCharacter->getCharacterID(); ?>_32.jpg">
                    <?php echo $cCharacter->getCharacterName(); ?>
                </div>
            </div>
            <!-- panel -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <img class="img-thumbnail margin-right-15" src="http://image.eveonline.com/Type/<?php echo $cStation->getStationTypeID(); ?>_32.png">
                    <?php echo $cStation->getStationName(); ?>
                </div>
            </div>
            <!-- panel -->
            <?php if ($cCharacter->getDemandsCount($cStation->getStationID(), clDemand::TYPE_SELL)): ?>
                <h1>Sell</h1>
                <ul class="list-group">
                    <?php foreach ($cStation->getDemands($cCharacter->getCharacterID(), clDemand::TYPE_SELL) as $cDemand): ?>
                        <li class="list-group-item list-group-item-success">
                            <div class="pull-right line-height-42">Need: <strong><?php echo $cDemand->getNeed($cCharacter->getCharacterID()); ?></strong> Demand: <?php echo $cDemand->getQuantity(); ?></div>
                            <img class="img-thumbnail" src="http://image.eveonline.com/Type/<?php echo $cDemand->getTypeID(); ?>_32.png">
                            <span class=" margin-left-15"><?php echo $cDemand->getTypeName(); ?></span>
                        </li>
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group">
                                        <li class="list-group-item">Jita Buy: 123 123.12</li>
                                        <li class="list-group-item">Jita Sell: 123 123.12</li>
                                        <li class="list-group-item">My Buy: 123 123.12</li>
                                        <li class="list-group-item">My Sell: 123 123.12</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="list-group margin-bottom-0">
                                        <?php foreach ($cDemand->getOrders($cCharacter->getCharacterID()) as $cOrder): ?>
                                            <li class="list-group-item list-group-item-info">
                                                <div class="pull-right"><?php echo $cOrder->getVolRemaining(); ?> / <?php echo $cOrder->getVolEntered(); ?></div>
                                                <span>#<?php echo $cOrder->getOrderID(); ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="alert alert-warning text-center">Has no sell demands...</p>
            <?php endif; ?>

            <?php if ($cCharacter->getDemandsCount($cStation->getStationID(), clDemand::TYPE_BUY)): ?>
                <h1>Buy</h1>
                <ul class="list-group">
                    <?php foreach ($cStation->getDemands($cCharacter->getCharacterID(), clDemand::TYPE_BUY) as $cDemand): ?>
                        <li class="list-group-item">
                            <img class="img-thumbnail margin-right-15" src="http://image.eveonline.com/Type/<?php echo $cDemand->getTypeID(); ?>_32.png">
                            <?php echo $cDemand->getTypeName(); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="alert alert-warning text-center">Has no buy demands...</p>
            <?php endif; ?>
        </div>
        <!-- col -->
    </div>
    <!-- row -->
</div>
<!-- container -->