<?php 
    require_once('configs/materials.php');
 
    $controllerSearchFields = (array_key_exists($this->controllerName,$MaterialsSearchPage)) ? $MaterialsSearchPage[$this->controllerName] : $MaterialsSearchPage['default'];
    $searchField = (isset($_GET['fieldSearch'])) ? $_GET['fieldSearch'] : '';
    $searchFieldHTML = (isset($_GET['fieldSearch'])) ? $MaterialsSearchField[$_GET['fieldSearch']] : 'Chọn tìm kiếm';
    $contentSearch = (isset($_GET['contentSearch'])) ? $_GET['contentSearch'] : '';

    // count

    $countActive = 0;
    $countAll = 0;
    $countInactive = 0;
    if($counts > 0){
        foreach($counts as $count){
            if($count['status'] == 'deliveried'){
                $countActive = $count['count'];
            }else{
                $countInactive = $count['count'];
            }
        }
    }
    
    $countAll = $countActive + $countInactive; 

    
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-transparent">
                <h3 class="card-title">Bộ lọc</h3>
                    <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 d-flex">
                        <div class="dropdown">
                            <button type="button" class="btn btn-default dropdown-toggle no_border_radius" id="contentSearch" data-toggle="dropdown" data-field="<?php echo $searchField ?>">
                                <?php echo $searchFieldHTML; ?>
                            </button>   
                            <div class="dropdown-menu no_boder_left search_box">
                                <?php foreach($controllerSearchFields as $field): ?>
                                    <a class="dropdown-item searchfield" href="#" data-field="<?php echo $field ?>">
                                         <?php echo $MaterialsSearchField[$field]  ?> 
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <input type="text" class="form-control w40 no_boder_left no_border_radius " name="search" value="<?php echo $contentSearch ?>">
                        <a href="" class="btn btn-default no_border_radius no_boder_left" id="searchButton">Tìm kiếm</a>
                    </div>
                    <div class="col-md-6 d-flex">
                    <!-- &fieldSearch=users.id&contentSearch=1 -->
                        <?php
                            $link = '';
                            if(isset($_GET['fieldSearch'])){
                                $link = '&fieldSearch=' . $_GET['fieldSearch'] . '&contentSearch='. $_GET['contentSearch'];
                            }
                            $allEnableClass = (!isset($_GET['status']) || $_GET['status'] == 'all') ? 'primary' : 'danger';
                            $activeEnableClass = (isset($_GET['status']) && $_GET['status'] == 'deliveried') ? 'primary' : 'danger';
                            $inactiveEnableClass = (isset($_GET['status']) && $_GET['status'] == 'notdeliveried') ? 'primary' : 'danger';
                        ?>
                        <a href="?controller=<?php echo $this->controllerName ?>&action=list&status=all<?php echo $link ?>" class="btn btn-<?php echo  $allEnableClass ?> mr-2">
                            Tất cả
                            <span class="badge bg-white"><?php echo $countAll ?></span>
                        </a>
                        <a href="?controller=<?php echo $this->controllerName ?>&action=list&status=deliveried<?php echo $link ?>" class="btn btn-<?php echo  $activeEnableClass ?> mr-2">
                            Đã giao
                            <span class="badge bg-white"><?php echo $countActive ?></span>
                        </a>
                        <a href="?controller=<?php echo $this->controllerName ?>&action=list&status=notdeliveried<?php echo $link ?>" class="btn btn-<?php echo  $inactiveEnableClass ?>">
                            Chưa giao
                            <span class="badge bg-white"><?php echo $countInactive ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>