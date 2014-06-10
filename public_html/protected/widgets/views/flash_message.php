<?php if ($this->hasMessage()): ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php foreach ($this->getMessage() as $sKey => $sValue): ?>
                <p class="alert alert-<?php echo $sKey; ?> text-center"><?php echo $sValue; ?></p>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>