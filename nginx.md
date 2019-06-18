#### mac nginx环境安装
参考链接：https://www.cnblogs.com/tandaxia/p/8810648.html

```
brew install nginx
// 安装完成项目的工程目录：/usr/local/var/www
// 启动
sudo nginx
// 重启
sudo nginx -s reload
```

虚拟主机配置：vim /etc/hosts
```
##
# Host Database
#
# localhost is used to configure the loopback interface
# when the system is booting.  Do not change this entry.
##
127.0.0.1	localhost
127.0.0.1       www.hjq.com
127.0.0.1       192.168.43.128
# 百度商城
127.0.0.1       www.bmall.com
# tpfoa
127.0.0.1       www.tpfoa.com
127.0.0.1       127.0.0.1
255.255.255.255	broadcasthost
::1             localhost
0.0.0.0 account.jetbrains.com
```

vim /usr/local/etc/nginx/nginx.conf
```
#user  nobody;
worker_processes  1;

#error_log  logs/error.log;
#error_log  logs/error.log  notice;
#error_log  logs/error.log  info;

#pid        logs/nginx.pid;


events {
    worker_connections  1024;
}


http {
    include       mime.types;
    default_type  application/octet-stream;

    #log_format  main  '$remote_addr - $remote_user [$time_local] "$request" '
    #                  '$status $body_bytes_sent "$http_referer" '
    #                  '"$http_user_agent" "$http_x_forwarded_for"';

    #access_log  logs/access.log  main;

    sendfile        on;
    #tcp_nopush     on;

    #keepalive_timeout  0;
    keepalive_timeout  65;

    #gzip  on;

    server {
        listen       80;
        server_name  www.hjq.com;
        #set $root /var/www/;

        #charset koi8-r;

        #access_log  logs/host.access.log  main;


        location / {
            root   /usr/local/var/www;
            index  index.php;

            # if (!-e $request_filename) {
            #     #一定要用(.*)匹配整个URI，包含URI第一个字符反斜杠/
            #     #rewrite ^(.*)$ /index.php?s=$1 last;
            #     rewrite  ^/(.*)index.php(.*)$  $1/index.php?s=$2  last; 
            #     break;
            # }
        }

        #error_page  404              /404.html;

        # redirect server error pages to the static page /50x.html
        #
        error_page   500 502 503 504  /50x.html;
        location = /50x.html {
            root   html;
        }

        # proxy the PHP scripts to Apache listening on 127.0.0.1:80
        #
        #location ~ \.php$ {
        #    proxy_pass   http://127.0.0.1;
        #}

        # pass the PHP scripts to FastCGI server listening on 127.0.0.1:9000
        #
        # 配置支持 pathinfo 模式
        location ~ \.php(.*)$ { # 正则匹配.php后的pathinfo部分
            root html;
            fastcgi_pass   127.0.0.1:9000;
            fastcgi_index  index.php;
            fastcgi_param  SCRIPT_FILENAME  $DOCUMENT_ROOT$fastcgi_script_name;
            fastcgi_param PATH_INFO $1; # 把pathinfo部分赋给PATH_INFO变量
            include        fastcgi_params;
        }

        # location ~ \.php$ {
        #    root           html;
        #    fastcgi_pass   127.0.0.1:9000;
        #    fastcgi_index  index.php;
        #    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #    include        fastcgi_params;
        # }

        # deny access to .htaccess files, if Apache's document root
        # concurs with nginx's one
        #
        #location ~ /\.ht {
        #    deny  all;
        #}
    }





    # another virtual host using mix of IP-, name-, and port-based configuration
    #
    #server {
    #    listen       8000;
    #    listen       somename:8080;
    #    server_name  somename  alias  another.alias;

    #    location / {
    #        root   html;
    #        index  index.html index.htm;
    #    }
    #}


    # HTTPS server
    #
    #server {
    #    listen       443 ssl;
    #    server_name  localhost;

    #    ssl_certificate      cert.pem;
    #    ssl_certificate_key  cert.key;

    #    ssl_session_cache    shared:SSL:1m;
    #    ssl_session_timeout  5m;

    #    ssl_ciphers  HIGH:!aNULL:!MD5;
    #    ssl_prefer_server_ciphers  on;

    #    location / {
    #        root   html;
    #        index  index.html index.htm;
    #    }
    #}
    include servers/*;
}

# 在http节点后面加上rtmp配置：
rtmp {
  server {
    listen 1935;
    application rtmplive {
        live on;
        record off;
      }
    }
  }

```

