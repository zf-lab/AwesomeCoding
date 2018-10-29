规划- 目标
=======

技术方向
-----------

### 概念学习  最小化学习路径

[1] 移动开发-iOS方向 

遇到的坑-注意啦

  1、图片使用slicing 拉伸时 注意图片的尺寸大小 view的size<picture的size时死活没拉伸效果，[设置CapWidth CapHeight CapInsets resizingMode](https://www.jianshu.com/p/0038823122dc),据说button的image要代码设置。
  
  2、popView的封装添加 offsetSep（todo github上传）

增强 辅助 用户体验

自动化测试/动画绘制

视频/地图类等 App开发

[2] 后端开发-PHP方向

技术能力：

框架laravel Yii thinkphp

[laravel](https://www.golaravel.com/)
-----------
  Laravel 简洁优雅的PHP开发框架
  
  学习路径：[安装与配置](#安装配置)->[路由](#路由)->请求与输入->视图与响应->控制器->配置数据库->查询构造器->Eloquent ORM->身份验证
  
  ## [安装配置](https://docs.golaravel.com/docs/4.2/quick/#installation)
  
  安装4.2:
  
    composer create-project laravel/laravel=4.2 laravelTest --prefer-dist
  
  配置：app/conf app.php key（32位）debug（true便于调试 线上配置为false）
        
  nginx.conf  配置MAMP_VirtualHost_iteration_begin_MAMP 在location/下添加 try_files $uri $uri/ /index.php?$query_string ; 
  
  服务器指向路径为/public(内含index.php)
  
  ## [路由](https://docs.golaravel.com/docs/4.2/routing/#route-filters)
  
  基本路由 路由参数 路由过滤器 命名路由 路由组 子域名路由 路由前缀 路由与模型绑定 抛出404错误 控制器路由
  
  ## 请求与输入
  
  运行方式的概述：
  
  请求的生命周期
  
  [IoC 容器](https://docs.golaravel.com/docs/4.2/ioc/)
  
  设计模式-控制反转：Class A中用到了Class B的对象b，一般情况下，需要在A的代码中显式的new一个B的对象。
采用依赖注入技术之后，A的代码只需要定义一个私有的B对象，不需要直接new来获得这个对象，而是通过相关的容器控制程序来将B对象在外部new出来并注入到A类里的引用中。而具体获取的方法、对象被获取时的状态由配置文件（如XML）来指定。
  
  拓展阅读：[Nginx学习文档](http://www.nginx.cn/doc/)  Apache .htaccess
  
  拓展关键字：控制反转 负载均衡 虚拟机

TODO
--

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

[3] 后端开发-Java方向

项目经理 架构师 CTO 

[4] 大数据

数据方向 数据分析 更好的规划

[5] [leetcode](https://leetcode-cn.com/problemset/all/)

数据结构和算法
---

复杂度分析


