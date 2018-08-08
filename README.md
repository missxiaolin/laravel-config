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
Yaml::getInstance()->load($file);
```

## 写入

```php
<?php
$file   = 'config.yml';
$data   = Yaml::getInstance()->save($file, $data);
$data['mysql']['port'] = 3307;
yml_write($file,$data);
```