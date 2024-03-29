#### 环境与工具
- window 集成开发环境：XAMPP
- PHPStorm
- 微信小程序开发工具
- PostMan
- Navicat(数据库管理)
- nginx (项目目录：/usr/local/var/www)
- 单元测试（如果时间允许）
- Composer

#### 安装方式
- Composer安装
- Git安装
- 直接下载
- thinkphp（5.0.7） 完全开发手册：https://www.kancloud.cn/manual/thinkphp5/118003
```
应用项目：https://github.com/top-think/think  下载完成改名工程名：Zerg
核心框架：https://github.com/top-think/framework 下载完成改名：thinkphp 拖入Zerg工程中
```

#### 项目的独立命名
- 服务端：Zerg
- 微信小程序：Protoss（零食商贩）
- CMS: Terran
- thinkphp 5.0.7


#### 数据库设计（当前进度：上：64 中：P22）
数据库名：zerg
character Set: utf8mb4
collation: utf8mb4_bin

可以参考项目Koa vue：https://github.com/Tzcodejs/mini-shop
tp5: https://github.com/zengzhuoyu/Zerg 、有sql文件：https://github.com/VincentPHP/zerg 包含cms后台：https://github.com/1982204777/qiyue
零食铺子小程序：https://github.com/JQHee/ProtossWx
抢购：https://www.cnblogs.com/bluealine/p/11039336.html
恢复库存：https://www.jianshu.com/p/f5809a61d4fe

##### 一、首页
```
1.轮播图： 可跳转到商品详情、也可以跳转到其它类型
2.专题（3个主题）：一组商品的集合->点击跳转到商品专题页面（展示一张头图和商品列表）
3.下拉刷新整个页面
```
数据表的设计
```
```
##### 二、分类
```
1.左侧显示一级分类 右侧显示商品列表 -> 点击可跳转到商品详情
2.增加切换动画
3.分类切换不用每次调用接口
```
##### 三、商品详情
```
1.商品头图一张
2.选择数量
3.加入购物车 加入购物车加入一个动画
4.显示商品概要
5.显示商品详情
6.显示产品参数
7.显示售后保障
```
##### 四、购物车
```
1.购物车信息全部换成在小程序中
2.商品数量 不可减为0 动态计算价格
3.全选
4.删除商品
5.支付后删除商品
```

##### 五、我的
```
1.获取用户微信信息 注意处理用户拒绝的场景
2.地址管理 修改 添加 地址三级联动选择
3.我的订单 -> 点击可进入订单详情
4.订单分类 （待付款、已付款、已发货）
5.下单页面 展示购买商品金额、可修改收货地址、点击可以拉取微信支付
6.支付结果 失败/成功
7.用户登录令牌 用户启动后检测令牌 如果接口返回401重新获取令牌并访问
```



