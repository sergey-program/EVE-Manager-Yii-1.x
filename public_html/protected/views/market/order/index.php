<?php $this->sTitle = 'Market Orders'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <?php if ($aCharacter): ?>
                <ul class="list-group">
                    <?php foreach ($aCharacter as $cCharacter): ?>
                        <li class="list-group-item">
                            <span class="badge"><?php echo $cCharacter->getOrdersCount(); ?></span>
                            <a href="#"><?php echo $cCharacter->getCharacterName(); ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>