# FlamePHP

> 运行环境要求PHP8.1，启用 Redis 等扩展。

## 环境准备

### Docker 环境

```shell

```

注意在`cmd`模式下运行以上代码。

### WSL2 环境

推荐参考 PHPUnit [部署文档](https://docs.phpunit.de/en/10.0/installation.html)，快速搭建开发环境。

```shell
curl -sSL https://packages.sury.org/php/README.txt | sudo bash -x
sudo apt update
sudo apt install php-cli \
                 php-json \
                 php-mbstring \
                 php-xml \
                 php-pcov \
                 php-xdebug \
                 php-...
```

### WAMP 环境

推荐使用 [Laragon](https://laragon.org/download/) 集成开发环境。

## 快速开始

### 克隆代码

```
git clone git@github.com/flamephp/flamephp.git
cd flamephp
composer config -g repos.packagist composer https://packagist.pages.dev
composer install
```

### ENV配置

```
cp .env.example .env
```

### 数据库配置

编辑 .env 文件，修改数据库连接信息：

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=force
DB_USERNAME=root
DB_PASSWORD=
```

### 数据迁移

```
php artisan migrate
```

### 数据填充

```
php artisan seed:run
```

### 运行

现在只需要做最后一步来验证是否正常运行。

进入命令行下面，执行下面指令

```
php artisan serve
```

在浏览器中输入地址：

http://127.0.0.1:8000/

## 开发

### 目录结构

```

```

### 请求周期

开发实行分层调用：

```
API 网关 -> index.php -> 启动核心框架
	-> request 请求验证层（表单验证）
	-> controller 按照MCA路由分发处理请求（M：模块，C：控制器，A：处理方法）
	-> service 调用业务逻辑服务层
	-> handler 通用逻辑层（如外部短信服务等）
	-> model 调用数据表关系模型层
	-> DB 底层查询数据库
```

返回的数据按照逆向数据流响应给客户端的API.

### 配置伪静态

打开生成的 nginx 配置文件，设置伪静态规则：

```
location / {
    if (!-f $request_filename) {
   	    rewrite  ^(.*)$  /index.php?r=/$1  last;
    }
}
```

### 生成代码和API文档

```shell
./scripts/gen.sh
```

### 调试模式

应用默认是部署模式，在开发阶段，可以修改环境变量APP_DEBUG开启调试模式，上线部署后切换到部署模式。

本地开发的时候可以在应用根目录下面定义.env文件。
