
The Compass
=======

> 概念学习  最小化学习路径

## 移动开发-iOS方向

  Something over here！[iOS](https://github.com/FLYKingdom/MyCode/blob/master/%E7%A7%BB%E5%8A%A8%E7%AB%AF/iOS.md)

## 后端开发-PHP方向

开发框架：框架laravel Yii thinkphp

### [laravel](https://www.golaravel.com/)

  Laravel 简洁优雅的PHP开发框架
  
  [学习路径](https://docs.golaravel.com/docs/4.2/introduction/#where-to-start)：[安装与配置](#安装配置)->[路由](#路由)->[请求与输入](#请求与输入)->视图与响应->控制器->配置数据库->查询构造器->Eloquent ORM->身份验证
  
  #### [安装配置](https://docs.golaravel.com/docs/4.2/quick/#installation)
  
  安装4.2:
  
    composer create-project laravel/laravel=4.2 laravelTest --prefer-dist
  
  配置：app/conf app.php key（32位）debug（true便于调试 线上配置为false）
        
  nginx.conf  配置MAMP_VirtualHost_iteration_begin_MAMP 在location/下添加 try_files $uri $uri/ /index.php?$query_string ; 
  
  服务器指向路径为/public(内含index.php)
  
  #### [路由](https://docs.golaravel.com/docs/4.2/routing/#route-filters)
  
  基本路由 路由参数 路由过滤器 命名路由 路由组 子域名路由 路由前缀 路由与模型绑定 抛出404错误 控制器路由
  
  #### [请求与输入](https://docs.golaravel.com/docs/4.2/requests/)
  
  ##### [IoC 容器](https://docs.golaravel.com/docs/4.2/ioc/) ：设计模式-控制反转
  
  > 解决相互依赖的方法： 闭包回调和自动解析 绑定和注册（单例和已存在实例绑定到容器）
  
  > 注册服务提供器-服务提供器可以注册事件监听器、视图合成器、Artisan命令等等?(服务器用来干什么的)? 
  
  > 容器事件监听 
  
  ##### [请求的生命周期](https://docs.golaravel.com/docs/4.2/lifecycle/#request-lifecycle)：
  
  * 1、客户端请求发送，经网络传输到达服务器处理 传递给index.php文件
  
  * 2、bootstrap/start.php文件创建应用程序application对象并检测环境 
  
  * 3、内部的framework/start.php文件 会配置相关设置并加载服务提供器
  
  * 4、加载应用程序app/start目录下的文件 配置环境参数
  
  * 5、加载app/routes.php文件
  
  * 6、将Request对象发送给应用程序对象，经处理返回Response对象
  
  * 7、将Response对象发送给客户端
  
  ##### [请求与输入](https://docs.golaravel.com/docs/4.2/requests/)
  
  
  
  拓展阅读：[Nginx学习文档](http://www.nginx.cn/doc/)  Apache .htaccess
  
  拓展关键字：[控制反转](https://baike.baidu.com/item/%E6%8E%A7%E5%88%B6%E5%8F%8D%E8%BD%AC/1158025?fr=aladdin#3) XML Java 反射机制 负载均衡 虚拟机

数据库 memberCache/redis 缓存技术

环境搭建与部署 高负载网站

PHP架构 静态化设计 OOP编程思想

NoSQL相关技术 索引/查询/存储 优化

[RPC](https://github.com/FLYKingdom/MyCode/blob/master/%E6%9E%B6%E6%9E%84%E5%AD%A6%E4%B9%A0/RPC%E6%9E%B6%E6%9E%84%E5%AD%A6%E4%B9%A0%E8%B0%83%E7%A0%94.md)

SSH Linux命令行

服务器 选择apache Nginx Tomcat部署 反向代理和负载均衡 静态html

scorm标准 Linux环境开发

高并发 多线程

数据分析/数据挖掘

设计模式

单元测试

小程序

微服务

音视频

动画游戏

相关语言：golang（go）python

## 后端开发-Java方向

项目经理 架构师 CTO 

## 大数据

数据方向 数据分析 更好的规划

## 数据结构和算法

复杂度分析

## 其他 

[leetcode](https://leetcode-cn.com/problemset/all/)


