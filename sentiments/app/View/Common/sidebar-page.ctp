<div class="content_box">
    <div class ="row">
        <div class="span3 sidebar">
            <h3>Related actions</h3>
                <ul>
                    <?php echo $this->fetch('sidebar'); ?>
                </ul>
        </div>
    
        <div class="span8 content_box">
            <h2><?php echo $this->fetch('title'); ?></h2>
            <div class="primary-content">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
    </div>
</div>