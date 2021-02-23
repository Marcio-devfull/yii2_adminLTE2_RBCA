<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 com adminLTE2 integrado e RBCA configurado</h1>
    <br>
</p>

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)


REQUIREMENTS
------------

RBCA - Role Based Access Control<br>
https://www.yiiframework.com/doc/guide/2.0/en/security-authorization <br>

Template usado: <br>
https://github.com/dmstr/yii2-adminlte-asset <br>
https://www.yiiframework.com/extension/yii2-adminlte-asset <br>

INSTALLATION
------------

### Install via Composer

1 - Realize o download do repositório para sua máquina ou você pode usar o seguinte comando com o git instalado: <br>

~~~
$git clone https://github.com/Marcio-devfull/yii2_adminLTE2_rbca.git 
~~~

2 - Abra o terminal e navegue até o diretório do repositório e digite o seguite comando: <br>

~~~                   
$ composer update
~~~

Atenção! Temos que ter o composer instalado de forma global. <br>

~~~
https://getcomposer.org/doc/00-intro.md
~~~

3 - Criar um banco de dado e povoar o banco com os dados do arquivo yii2basic.sql. <br>

4 - Criar um arquivo .env na raíz do projeto, com os seguintes dados:. <br>

~~~
DATABASE_HOST = host de acesso ao seu banco
DATABASE_DATABASE = Nome do seu banco
DATABASE_USER = Usuário
DATABASE_PASSWORD = Senha
~~~

5 - Configurar um chave @app/config/web.php  <br>

De: <br>

~~~
       'request' => [
                  'cookieValidationKey' => '',
        ],
~~~

Para: <br>

~~~

       'request' => [
                  'cookieValidationKey' => 'Sua chave, exemplo: fhsajfdhghjsdfghjsdfhvoiiuosifrh',
        ],

~~~

6 - Retornar no diretório do sistema via terminal e execultar o seguite comando:<br>

~~~
             $ yii serve  ou $ php yii serve
~~~

Atenção para funcionar no servidor temos que realizar as seguinte configurações: <br>

~~~
https://yii2-framework.readthedocs.io/en/stable/guide-pt-BR/start-installation/
~~~

7 - Agora é só acessar a URL http://localhost:8080 no seu navegador web.<br>

8 - Dados para realizar o login:<br>

Super administrador<br>

email = super@admin.com &&
senha = admin

<br>Administrador<br>

email = admin@admin.com &&
senha = admin

<br>Usuário<br>

email = usuario@admin.com
senha = admin



