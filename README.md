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

## 写入

```php
<?php
$file   = 'config.yml';
$data   = yml_read($file);
$data['mysql']['port'] = 3307;
yml_write($file,$data);
```