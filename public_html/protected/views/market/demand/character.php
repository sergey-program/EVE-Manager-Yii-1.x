<?php $this->sTitle = 'Market Demands'; ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#MarketLocation_stationID").select2({
            placeholder: "Имя станции",
            minimumInputLength: 3,
            multiple: false,
            quietMillis: 500,
            id: function (entry) {
                return entry.stationID;
            },
            ajax: {
                url: "<?php echo Yii::app()->createUrl('ajax/findStation'); ?>",
                dataType: 'json',
                cache: false,
                data: function (term, page) {
                    return {q: term, page_limit: 0, page: page};
                },
                results: function (data, page) {
                    var more = (page * 10) < data.length;
                    return {results: data, more: more};// more: more};
                }
            },
            formatResult: function (entry) {
                var sMarkUp = '';
                console.log(entry);
                sMarkUp += '<img class="img-thumbnail margin-right-15" src="http://image.eveonline.com/Type/' + entry.stationTypeID + '_32.png" style="float:left">';
                sMarkUp += '<p style="padding-top: 12px;">' + entry.stationName + '</p>';
                sMarkUp += '<div class="clearfix"></div>';

                return sMarkUp;
            },
            formatSelection: function (entry) {
                return entry.stationName;
            },
            dropdownCssClass: "bigdrop" // apply css that makes the dropdown taller
        });
    });
</script>

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
            <?php if ($cCharacter->getDemandsCount()): ?>
                <ul class="list-group">
                    <?php foreach ($cCharacter->getDemands() as $cStation): ?>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $cStation->getDemandsCount(); ?></span>
                            <img class="img-thumbnail margin-right-15" src="http://image.eveonline.com/Type/<?php echo $cStation->getTypeID(); ?>_32.png">
                            <a href="<?php echo Yii::app()->createUrl('market/demand/station', array('sCharacterID' => $cCharacter->getCharacterID(), 'sStationID' => $cStation->getStationID())); ?>"><?php echo $cStation->getStationName(); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p class="alert alert-warning text-center">Has no demands...</p>
            <?php endif; ?>
        </div>
        <!-- col -->
    </div>
    <!-- row -->
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $form = $this->beginWidget('CActiveForm', array('htmlOptions' => array('role' => 'form', 'style' => 'width: 100%;'))); ?>

                    <div class="form-group">
                        <?php echo $form->textField($oLocation, 'stationID', array('class' => 'form-control')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo CHtml::submitButton('создать новую точку сбыта', array('class' => 'btn btn-default center-block')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div>
            </div>
            <!-- panel -->
        </div>
        <!-- col -->
    </div>
    <!-- row -->
</div>
<!-- container -->