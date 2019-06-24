

mysql:

0、查看mysql的版本
```
mysql --version
brew uninstall mysql 

// 查找mysql安装的路径
终端输入：find ./ -iname "mysql" 

配置全局路径
终端命令：open -e .bash_profile 
在后面追加：export PATH=${PATH}:/usr/local/mysql/bin;
终端执行：source .bash_profile

```

1、安装：https://jingyan.baidu.com/article/fa4125ac0e3c2928ac709204.html

2、安装完成需要重启：

3、解决错误ERROR 1045 (28000)

ERROR 1045 (28000)解决办法: https://blog.csdn.net/qq_35538405/article/details/82080816

```
cd /usr/local/mysql/
sudo su 
mysqld_safe --skip-grant-tables &

// 新打开一个终端：
配置全局路径：
source .bash_profile
mysql
FLUSH PRIVILEGES; // 命令本质上的作用是将当前user和privilige表中的用户信息/权限设置从mysql库(MySQL数据库的内置库)中提取到内存里
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('123456');
更改密码：update mysql.user set authentication_string = passwprd('root123)where user = 'root' and host = 'localhost';


```