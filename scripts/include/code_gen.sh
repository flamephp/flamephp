Echo_Green '------------------------------'
Echo_Green ' 执行数据迁移'
Echo_Green '------------------------------'
php artisan migrate

Echo_Green '------------------------------'
Echo_Green ' 执行数据填充'
Echo_Green '------------------------------'
php artisan seed:run

Echo_Green '------------------------------'
Echo_Green ' 开始生成业务代码'
Echo_Green '------------------------------'
php artisan gen:entity
Echo_Green ' ...'
php artisan gen:model
Echo_Green ' ...'
php artisan gen:dao
Echo_Green ' ...'
php artisan gen:service
Echo_Green '------------------------------'
Echo_Green ' 生成业务代码结束'
Echo_Green '------------------------------'
