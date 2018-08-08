# laravel-config


## 文件内容
```yaml
local:
    mysql:
        host: 127.0.0.1
        port: 3307
dev:
    mysql:
        host: 127.0.0.1
        port: 3306
        
## 读取

```php
<?php
$file   = 'config.yml';
yml_read($file);
```