<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Sobre', 'icon' => 'dashboard', 'url' => ['/site/about']],
                    ['label' => 'Contato', 'icon' => 'dashboard', 'url' => ['/site/contact']],
                    [
                        'label' => 'Usuários',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Listar', 'icon' => 'file-code-o', 'url' => ['/usuario'],],
                            ['label' => 'Criar', 'icon' => 'file-code-o', 'url' => ['/usuario/create'],],
                        ],
                    ],
                    [
                        'label' => 'Permissões',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Permissões', 'icon' => 'file-code-o', 'url' => ['/permissoes/permissoes'],],
                            ['label' => 'Perfil', 'icon' => 'file-code-o', 'url' => ['/permissoes/perfil'],],
                            ['label' => 'Cadastrar Perfil', 'icon' => 'file-code-o', 'url' => ['/permissoes/cadastrar-perfil'],],
                            ['label' => 'Cadastrar Permissão', 'icon' => 'file-code-o', 'url' => ['/permissoes/cadastrar-permissao'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
