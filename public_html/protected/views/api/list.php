<?php $this->sTitle = 'Api list'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if ($cApiList): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="panel-title">Added api.</h1>
                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?php foreach ($cApiList as $cApi): ?>
                                <li class="list-group-item"># <?php echo $cApi->getID(); ?> keyID: <?php echo $cApi->getKeyID(); ?> vCode: <?php echo $cApi->getVCode(); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php else: ?>
                <p class="alert alert-warning text-center">No api were added.</p>
            <?php endif; ?>
            <!-- panel -->
        </div>
        <!-- col -->
    </div>
    <!-- row -->
</div>
<!-- container -->