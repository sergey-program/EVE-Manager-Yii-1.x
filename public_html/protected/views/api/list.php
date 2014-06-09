<?php $this->sTitle = 'Api list'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1 class="panel-title">Added api.</h1>
                </div>
                <div class="panel-body">
                    <?php if ($aList): ?>
                        <ul class="list-group">
                            <?php foreach ($aList as $oList): ?>
                                <li class="list-group-item"># <?php echo $oList->id; ?> keyID: <?php echo $oList->keyID; ?> vCode: <?php echo $oList->vCode; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <p class="alert alert-warning">No api were added.</p>
                    <?php
                    endif; ?>

                </div>
            </div>
            <!-- panel -->
        </div>
        <!-- col -->
    </div>
    <!-- row -->
</div>
<!-- container -->