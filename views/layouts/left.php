<aside class="main-sidebar">

    <section class="sidebar">

      
  

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
					['label' => 'BILAH NAVIGASI', 'options' => ['class' => 'header']],
					['label' => 'Beranda', 'url' => ['/']],
                    ['label' => 'Data Kelas', 'url' => ['kelas/']],
					
					['label' => 'Data Tugas', 'url' => ['tugas/']],
					['label' => 'Data Mata Pelajaran', 'url' => ['mata-pelajaran/']],
					
                   
					[
                        'label' => 'Data Pengguna',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                           ['label' => 'Siswa', 'url' => ['siswa/']],
					['label' => 'Guru', 'url' => ['guru/']],
					['label' => 'Admin', 'url' => ['admin/']],
                            
                        ],
                    ],
					 ['label' => 'LOGOUT', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
