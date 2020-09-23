<aside class="main-sidebar">

    <section class="sidebar">

      
    <?php
$session = Yii::$app->session;

foreach ($_SESSION as $session_name => $session_value)
{
$nama_sesi=$session_name;
 //echo "<h4>$nama_sesi</h4>";
}

 if($nama_sesi=="user") {?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
					['label' => 'BILAH NAVIGASI', 'options' => ['class' => 'header']],
					['label' => 'Beranda','icon' => 'home', 'url' => ['/']],
                    ['label' => 'Data Kelas','icon' => 'building', 'url' => ['kelas/']],
					['label' => 'Data Tugas','icon' => 'list', 'url' => ['tugas/admin']],
					['label' => 'Data Mata Pelajaran','icon' => 'book', 'url' => ['mata-pelajaran/admin']],
                   
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
                    ['label' => 'LOGOUT','icon' => 'book', 'url' => ['site/logout']],   
					
                ],
            ]
        ) ?>
        <?php } else?>
        <?php if ($nama_sesi=="siswa") {?>
            <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
					['label' => 'BILAH NAVIGASI', 'options' => ['class' => 'header']],
					['label' => 'Beranda','icon' => 'home', 'url' => ['/']],
                    //['label' => 'Data Kelas','icon' => 'building', 'url' => ['kelas/siswa']],
					['label' => 'Kelas & Tugas','icon' => 'list', 'url' => ['tugas/siswa']],
                    ['label' => 'LOGOUT','icon' => 'book', 'url' => ['site/logout']],   
					
                ],
            ]
        ) ?>
        <?php } else ?>
        <?php if($nama_sesi=="guru") {?>
            <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
					['label' => 'BILAH NAVIGASI', 'options' => ['class' => 'header']],
                    ['label' => 'Beranda','icon' => 'home', 'url' => ['/']],
                    ['label' => 'Mapel & Kelas','icon' => 'book', 'url' => ['mata-pelajaran/']],
                    ['label' => 'Data Kelas','icon' => 'building', 'url' => ['kelas/']],
                    ['label' => 'Data Tugas','icon' => 'list', 'url' => ['tugas/']],
                   
                    ['label' => 'LOGOUT','icon' => 'book', 'url' => ['site/logout']],   
					
                ],
            ]
        ) ?>
        <?php } ?>
    </section>

</aside>
