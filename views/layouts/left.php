<aside class="main-sidebar">

    <section class="sidebar">

      
  

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
					['label' => 'BILAH NAVIGASI', 'options' => ['class' => 'header']],
					['label' => 'Beranda','icon' => 'home', 'url' => ['/']],
                    ['label' => 'Data Kelas','icon' => 'building', 'url' => ['kelas/']],
					['label' => 'Data Tugas','icon' => 'list', 'url' => ['tugas/']],
					['label' => 'Data Mata Pelajaran','icon' => 'book', 'url' => ['mata-pelajaran/']],

                   
					[
                        'label' => 'Data Pengguna',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                           ['label' => 'Siswa','icon' => 'user text-green', 'url' => ['siswa/']],
					['label' => 'Guru','icon' => 'user text-yellow', 'url' => ['guru/']],
					['label' => 'Admin','icon' => 'user text-blue','url' => ['admin/']],
                            
                        ],
                    ],
					 ['label' => 'Keluar','icon' => 'gear text-danger', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
