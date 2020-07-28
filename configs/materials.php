<?php 
    $MaterialsSearchField = [
        'username' => 'Tìm kiếm username',
        'depts.id' => 'Tìm kiếm id',
        'users.id' => 'Tìm kiếm id',
        'categories.id' => 'Tìm kiếm id',
        'fullname' => 'Tìm kiếm fullname',
        'name' => 'Tìm kiếm tên',
        'all' => 'Tìm kiếm tất cả',
        'depts.name' => 'Tìm kiếm phòng ban',
    ];

    $MaterialsSearchPage = [
        'users' => ['users.id','all','fullname','depts.name','username'],
        'depts' => ['depts.id','all','name'],
        'categories' => ['categories.id','all','name'],
        'default' => ['id','all','name'],
    ];

?>