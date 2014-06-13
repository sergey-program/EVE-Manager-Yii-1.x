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
            <?php if ($cCharacter->getDemandsCount($cStation->getStationID())): ?>
                <ul class="list-group">
                    <?php foreach ($cCharacter->getDemands($cStation->getStationID()) as $cDemand): ?>
                        <li class="list-group-item">
                            <img class="img-thumbnail margin-right-15" src="http://image.eveonline.com/Type/<?php echo $cDemand->getTypeID(); ?>_32.png">
                            <?php echo $cDemand->getTypeName(); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="alert alert-warning text-center">Has no orders...</p>
            <?php endif; ?>
        </div>
        <!-- col -->
    </div>
    <!-- row -->
</div>
<!-- container -->