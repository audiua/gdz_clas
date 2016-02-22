<?php $this->renderPartial('//layouts/header'); ?>
<body>
    <div class="container">
        <div class="row">
        	<?php $this->renderPartial('//layouts/menu'); ?>
        </div>
        
        <div class="row">
            
            <div class="content">
                    <?= $content; ?>
            </div>

	        <?php $this->renderPartial('//layouts/sidebar'); ?>
            
        </div>
        
        <div class="row">
        	<?php $this->renderPartial('//layouts/footer'); ?>
        </div>

    </div>
</body>
</html>