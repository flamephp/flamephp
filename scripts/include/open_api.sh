Echo_Green '------------------------------'
Echo_Green ' 生成swagger接口文档'
Echo_Green '------------------------------'

vendor/bin/openapi app/Http/Auth/ app/Entities/ \
  -o public/swagger/auth.json -f json

vendor/bin/openapi app/Http/Manager/ app/Entities/ \
  app/Bundles/Article/Controllers/Manager/ app/Bundles/Article/Requests/ app/Bundles/Article/Responses/ \
  -o public/swagger/manager.json -f json

vendor/bin/openapi app/Http/User/ app/Entities/ \
  -o public/swagger/user.json -f json

vendor/bin/openapi app/Http/Portal/ app/Entities/ \
  -o public/swagger/portal.json -f json

Echo_Green '------------------------------'
Echo_Green ' 生成typescript接口'
Echo_Green '------------------------------'

php artisan gen:interface
