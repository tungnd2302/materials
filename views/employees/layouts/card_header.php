<div class="card-header border-transparent">
    <h3 class="card-title">
        Danh sách <?php echo $this->listName ?>
        &nbsp
        <?php if($_SESSION['user']['rolename'] == 'teamlead'): ?>
            <a href="?controller=<?php echo $this->controllerName ?>&action=create" >
            <i class="fa fa-plus-circle"></i>
            </a>
        <?php endif; ?>
    </h3>

    <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
        <i class="fas fa-times"></i>
        </button>
    </div>
</div>