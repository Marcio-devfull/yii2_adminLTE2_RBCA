<?php

namespace app\controllers;

use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;
use yii\web\Response;

class PermissoesController extends \yii\web\Controller
{
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['permissoes', 'permissao', 'regras', 'perfil', 'cadastrar-perfil', 'cadastrar-permissao'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['permissoes'],
                        'roles' => [Yii::$app->user->isGuest ? '@' : 'permissoes/permissoes'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['permissao'],
                        'roles' => [Yii::$app->user->isGuest ? '@' : 'permissoes/permissao'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['regras'],
                        'roles' => [Yii::$app->user->isGuest ? '@' : 'permissoes/regras']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['perfil'],
                        'roles' => [ Yii::$app->user->isGuest ? '@' : 'permissoes/perfil']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['cadastrar-perfil'],
                        'roles' => [Yii::$app->user->isGuest ? '@' : 'permissoes/cadastrar-perfil']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['cadastrar-permissao'],
                        'roles' => [Yii::$app->user->isGuest ? '@' : 'permissoes/cadastrar-permissao']
                    ]
                ],
                'denyCallback' => function(){
                    if(!Yii::$app->user->isGuest) {
                        return $this->redirect('/site/error');
                    } else {
                        return $this->redirect('/site/login');
                    }
                },
            ]
        ];
    }
    
    
    
    public function actionPermissoes()
    {
        $auth = Yii::$app->authManager;
        $permissoes = $auth->getPermissions();
        
        return $this->render('permissoes', [
            'permissoes' => $permissoes
        ]);
    }

    public function actionRegras($perfil)
    {
        
        $auth = Yii::$app->authManager;
        $role = $auth->getRole($perfil);

        if (!$perfil || empty($role) ) {
            return $this->redirect('/site/error');
        }

        $permissoes = $auth->getPermissionsByRole($perfil);
        $permissoes_perfil = [];

        foreach ( $permissoes as $permissao) {
            $permissoes_perfil[] = $permissao->name;
        }

        $permissoes = $auth->getPermissions();

        if(Yii::$app->request->isPost) {
            $auth->removeChildren($role);

            $permissoes_form = Yii::$app->request->post('permissoes');

            foreach($permissoes_form as $perm) {
                $item = $auth->getPermission($perm);
                $auth->addChild($role, $item);
            }

            return $this->redirect('/permissoes/perfil');
        }
       
        return $this->render('regras', [
            'permissoes_perfil' => $permissoes_perfil,
            'permissoes' => $permissoes
        ]);
    }

    public function actionPerfil()
    {
        $auth = Yii::$app->authManager;
        $perfis = $auth->getRoles();
        
        return $this->render('perfil', [
            'perfis' => $perfis
        ]);
    }

    public function actionCadastrarPerfil()
    {
        $auth = Yii::$app->authManager;
        $perfis = $auth->getRoles();

        if( Yii::$app->request->isPost ) {
            $perfil = Yii::$app->request->post('perfil');
            $perfil_pai= Yii::$app->request->post('perfil_pai');
            
            $perfil = $auth->createRole($perfil);
            $auth->add($perfil);

            if (!empty($perfil_pai)) {
                $perfil_pai = $auth->getRole($perfil_pai);
                $auth->addChild($perfil_pai, $perfil);
            }
        }

        return $this->render('cadastrar-perfil', [
            'perfis' => $perfis
        ]);
    }

    public function actionCadastrarPermissao()
    {
        $auth = Yii::$app->authManager;

        if( Yii::$app->request->isPost ) {
            $permissao = Yii::$app->request->post('permissao');
            
            $permissao = $auth->createPermission($permissao);
            $auth->add($permissao);
        }

        return $this->render('cadastrar-permissao');
    }

}
