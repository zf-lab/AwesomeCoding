
The Compass
=======

> 概念学习  最小化学习路径

> How to use: Commond+F 搜索关键词->基本习得概述->进入链接深入学习

> [Now to learn](#单元测试)

## 移动开发-iOS方向

  Something over there！[iOS](https://github.com/FLYKingdom/MyCode/blob/master/%E7%A7%BB%E5%8A%A8%E7%AB%AF/iOS.md)

## 后端开发-PHP方向

> 开发框架：框架laravel Yii thinkphp

### [laravel](https://www.golaravel.com/) (Laravel 简洁优雅的PHP开发框架)
  
  [学习路径](https://docs.golaravel.com/docs/4.2/introduction/#where-to-start)：
  
  [安装与配置](#安装配置)->[路由](#路由)->[请求与输入](#请求与输入)->[视图与响应](#视图与响应)
  
  ->[控制器](#控制器)->[配置数据库](#配置数据库)->[查询构造器](#查询构造器)
  
  ->[Eloquent ORM](#Eloquent_ORM)->[身份验证](#身份验证)
  
  ->[Cache](#Cache)->[Session](#Session)->[错误日志](#错误日志)->[单元测试](#单元测试)
  
  #### [安装配置](https://docs.golaravel.com/docs/4.2/quick/#installation)
  
  > 安装4.2:
  
    composer create-project laravel/laravel=4.2 laravelTest --prefer-dist
  
  > 配置：app/conf app.php key（32位）debug（true便于调试 线上配置为false）
        
  > nginx.conf  配置MAMP_VirtualHost_iteration_begin_MAMP 在location/下添加 try_files $uri $uri/ /index.php?$query_string ; 
  
  > 服务器指向路径为/public(内含index.php)
  
  #### [路由](https://docs.golaravel.com/docs/4.2/routing/#route-filters)
  
  > 基本路由 路由参数 路由过滤器 命名路由 路由组 子域名路由 路由前缀 路由与模型绑定 抛出404错误 控制器路由
  
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
  
  > 基本输入数据 Input::get()等；Cookies 队列等等；form前输入回填；上传文件；请求信息；
  
  #### [视图与响应](https://docs.golaravel.com/docs/4.2/responses/#basic-responses)
  
  > 模版系统：[Blade](https://docs.golaravel.com/docs/4.2/templates/)
  
  > 基本响应-重定向-视图-视图组件-特殊响应-响应宏
  
  #### [控制器](https://docs.golaravel.com/docs/4.2/controllers/#basic-controllers)
  
  > 基本控制器(文件系统/composer.json)-控制器过滤器(请求生命周期阶段处理)-隐式控制器(定义路由)-资源控制器（RESTful风格/Route::resource）-处理缺失的方法
  
  #### [配置数据库](https://docs.golaravel.com/docs/4.2/database/)
  
  > -[数据库基础使用](https://docs.golaravel.com/docs/4.2/database/)（配置/事务/读写链接/日志/多数据库）
  
  > -[查询构造器](https://docs.golaravel.com/docs/4.2/queries)（PDO/查询构造器）
  
  > -[Eloquent ORM](#Eloquent_ORM)(这个东东好多呀/需要单独看基本/高级使用/数据库_模型交互)
  
  > -[结构生成器](https://docs.golaravel.com/docs/4.2/schema/#introduction)（不考虑数据库操作数据库表）
  
  > -[数据迁移和数据填充](https://docs.golaravel.com/docs/4.2/migrations/)(配合结构生成器管理应用程序结构/数据填充生成测试数据)
  
  > -[Redis配置](https://docs.golaravel.com/docs/4.2/redis/)（框架配置、使用和流水线）
  
  #### 查询构造器
  
  something over here！
  
  #### [Eloquent_ORM](https://docs.golaravel.com/docs/4.2/eloquent/#query-scopes)
  
  something over here！
  
  #### [身份验证](https://docs.golaravel.com/docs/4.2/security/)
  
  > 设定/存储密码 设置auth.php Hash类加密算法
  
  > 用户认证 登录认证以及认证信息、状态处理
  
  > 保护路由 设置认证用户可访问路径链接
  
  > CSRF保护 防止跨站攻击 表单验证
  
  > HTTP简易认证 可设置简易快速认证不需要登录页面/可设置无状态HTTP简易过滤无session或cookie
  
  > 忘记密码和重设密码（快速集成后台认证的功能）
  
  > 加密Crypt::encrypt decrypt（设置随机字符串key app.php）
  
  > 认证驱动 （默认database和eloquent、额外 [认证扩充文件](https://docs.golaravel.com/docs/4.2/extending/#authentication))
  
  说明：users表中的remember_token用于保留用户认证身份/用户sessionID认证后自动重新产生
  
  #### [Cache](https://docs.golaravel.com/docs/4.2/cache/)
  
  > 配置Cache.php
  
  > 缓存使用 Cache::put()...等等
  
  > 缓存标签 Cache::tags() /递增递减
  
  > 数据库缓存 使用 Schema 声明
  
  * [Memcached](#Memcached)
  
  * [Redis](#Redis)
  
  #### [Session](https://docs.golaravel.com/docs/4.2/session/)
  
  > 配置session.php （flash键值关键字避免使用）
  
  > Session使用 Session::put()
  
  > 快闪数据（Flash Data）
  
  > [Session 驱动](https://docs.golaravel.com/docs/4.2/session/#session-drivers)
  
  #### [错误与日志](https://docs.golaravel.com/docs/4.2/errors/)
  
  > 配置文件 (start/global.php文件/[Monolog](https://github.com/seldaek/monolog)日志库 日志等级)
  
  > 错误处理 基本的处理程序和设定处理程序监听不同类型的处理
  
  > HTTP 异常处理 not found 404 未授权401 代码异常500
  
  > 日志 (RFC 5424log Protocol级别:debug, info, notice, warning, error, critical, and alert)(注册日志监听)
 
  #### 单元测试


  拓展阅读：[Nginx学习文档](http://www.nginx.cn/doc/)  Apache .htaccess
  
  拓展关键字：[控制反转](https://baike.baidu.com/item/%E6%8E%A7%E5%88%B6%E5%8F%8D%E8%BD%AC/1158025?fr=aladdin#3) XML Java 反射机制 负载均衡 虚拟机

### 缓存

  #### [Memcached](http://www.runoob.com/memcached/memcached-tutorial.html)
  
  
  
  #### [Redis](http://www.runoob.com/redis/redis-tutorial.html)
  
  
  
环境搭建与部署 高负载网站

PHP架构 静态化设计 OOP编程思想

NoSQL相关技术 索引/查询/存储 优化

[RPC](https://github.com/FLYKingdom/MyCode/blob/master/%E6%9E%B6%E6%9E%84%E5%AD%A6%E4%B9%A0/RPC%E6%9E%B6%E6%9E%84%E5%AD%A6%E4%B9%A0%E8%B0%83%E7%A0%94.md)

服务器 选择apache Nginx Tomcat部署 反向代理和负载均衡 静态html

scorm标准 Linux环境开发 / SSH Linux命令行

高并发 多线程

数据分析/数据挖掘/设计模式/单元测试

小程序/微服务/音视频/动画游戏

相关语言：golang（go）python

## 后端开发-Java方向

项目经理 架构师 CTO 

## 大数据

数据方向 数据分析 更好的规划

## 数据结构和算法

复杂度分析

## 其他 

[leetcode](https://leetcode-cn.com/problemset/all/)


