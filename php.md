一、php-fpm 无法启动解决办法

Mac 自带 `php-fpm`，在终端执行 php-fpm，会报如下错误：

```
ERROR: failed to open configuration file '/private/etc/php-fpm.conf': No such file or directory (2)
ERROR: failed to load configuration file '/private/etc/php-fpm.conf'
ERROR: FPM initialization failed
```

错误信息显示，不能打开配置文件，`cd /private/etc`，发现没有 `php-fpm.conf` 文件，但是有 `php-fpm.conf.default `文件。这个文件是默认配置，我们可以复制一份，改名为 `php-fpm.conf`，然后再根据需要改动配置。

```
cp /private/etc/php-fpm.conf.default /private/etc/php-fpm.conf
```

执行 `php-fpm`，再次报错：
```
ERROR: failed to open error_log (/usr/var/log/php-fpm.log): No such file or directory (2)
ERROR: failed to post process the configuration
ERROR: FPM initialization failed
```

错误信息显示，不能打开错误日志文件。`cd /usr/var/log` 发现根本没有这个目录，甚至连 var 目录都没有，加上为了避免权限问题，干脆配置到 `/usr/local/var/log` 目录。

修改 `php-fpm.conf` `error_log` 配置为 `/usr/local/var/log/php-fpm.log`，并把 user 和 group 改为和当前用户一样。

执行 `php-fpm`，再次报错：

```
NOTICE: [pool www] 'user' directive is ignored when FPM is not running as root
NOTICE: [pool www] 'group' directive is ignored when FPM is not running as root
```

于是 `sudo php-fpm`，再次报错：

```
ERROR: unable to bind listening socket for address '127.0.0.1:9000': Address already in use (48)
ERROR: FPM initialization failed
```


`/etc/php-fpm.d` 目录下执行`sudo cp www.conf.default www.conf` 然后编辑 `www.conf`，修改 listen 为 `127.0.0.1:9999`。

```
sudo vim /private/etc/php-fpm.d/www.conf
```

最后：
开启php-fpm: `sudo php-fpm -D`


二、xdebug安装
- 参考链接： https://www.jianshu.com/p/c99867e8e49c


