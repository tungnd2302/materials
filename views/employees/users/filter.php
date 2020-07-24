<?php 
    $searchField = (isset($_GET['fieldSearch'])) ? $_GET['fieldSearch'] : '';
    $searchFieldHTML = (isset($_GET['fieldSearch'])) ? 'Tìm kiếm ' . $_GET['fieldSearch'] : 'Chọn tìm kiếm';
    $contentSearch = (isset($_GET['contentSearch'])) ? $_GET['contentSearch'] : '';

    // count

    $countActive = 0;
    $countAll = 0;
    $countInactive = 0;
    foreach($counts as $count){
        if($count['enable'] == 'active'){
            $countActive = $count['count'];
        }else{
            $countInactive = $count['count'];
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
                    <div class="col-md-4 d-flex">
                        <div class="dropdown">
                            <button type="button" class="btn btn-default dropdown-toggle no_border_radius" id="contentSearch" data-toggle="dropdown" data-field="<?php echo $searchField ?>">
                                <?php echo $searchFieldHTML; ?>
                            </button>   
                            <div class="dropdown-menu no_boder_left search_box">
                                <a class="dropdown-item searchfield" href="#" data-field="users.id">Tìm kiếm id</a>
                                <a class="dropdown-item searchfield" href="#" data-field="username">Tìm kiếm username</a>
                                <a class="dropdown-item searchfield" href="#" data-field="fullname">Tìm kiếm fullname</a>
                                <a class="dropdown-item searchfield" href="#" data-field="all">Tìm kiếm tất cả</a>
                            </div>
                        </div>
                        <input type="text" class="form-control w40 no_boder_left no_border_radius " name="search" value="<?php echo $contentSearch ?>">
                        <a href="" class="btn btn-default no_border_radius no_boder_left" id="searchButton">Tìm kiếm</a>
                    </div>
                    <div class="col-md-4 d-flex">
                        <a href="" class="btn btn-primary mr-2">
                            Tất cả
                            <span class="badge bg-white"><?php echo $countAll ?></span>
                        </a>
                        <a href="" class="btn btn-danger mr-2">
                            Kích hoạt
                            <span class="badge bg-white"><?php echo $countActive ?></span>
                        </a>
                        <a href="" class="btn btn-danger">
                            Chưa kích hoạt
                            <span class="badge bg-white"><?php echo $countInactive ?></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>