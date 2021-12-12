<?php
    return[
        [
            'label'=>'Tài khoản',
            'route'=>'admin.index',
            'icon'=>'fas fa-user-circle',
            'color'=>'success',
            'item'=>[
                [
                    'label'=>'Đăng xuất',
                    'route'=>'dangxuat'
                ]
               
               
            ]
        ],

        [
            'label'=>'Home',
            'route'=>'admin.index',
            'icon'=>'fas fa-home',
            'color'=>'Default',
        ],
        [
            'label'=>'Danh mục',
            'route'=>'danhmuc.index',
            'color'=>'orange',
            'icon'=>'fas fa-clipboard'
        ],

        [
            'label'=>'Khách hàng',
            'route'=>'khachhang.index',
            'icon'=>'fas fa-users',
            'color'=>'info',
            

        ],

        [
            'label'=>'Danh mục con',
            'route'=>'admin.index',
            'color'=>'success',
            'icon'=>'fas fa-tags',
            'item'=>[
                [
                    'label'=>'Nhãn hiệu',
                    'route'=>'nhanhieu.index'
                ],
                [
                    'label'=>'Xuất xứ',
                    'route'=>'xuatxu.index'
                ],
                [
                    'label'=>'Bảo hành',
                    'route'=>'baohanh.index'
                ],
                [
                    'label'=>'Tình trạng',
                    'route'=>'tinhtrang.index'
                ],
                [
                    'label'=>'slide',
                    'route'=>'slide.index'
                ],
               
            ]
        ],
        [
            'label'=>'Sản phẩm',
            'route'=>'sanpham.index',
            'color'=>'danger',
            'icon'=>'fas fa-shopping-cart'

        ],
        [
            'label'=>'Chức vụ',
            'route'=>'chucvu.index',
            'color'=>'warning',
            'icon'=>'fas fa-user-tag'

        ],
        [
            'label'=>'Nhân viên',
            'route'=>'nhanvien.index',
            'color'=>'primary',
            'icon'=>'fas fa-users-cog'

        ],
        [
            'label'=>'Đơn hàng',
            'route'=>'donhang.index',
            'color'=>'Info',
            'icon'=>'fas fa-file-invoice-dollar'

        ],
        


    ]


?>