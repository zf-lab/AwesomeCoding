# 总览


![iOS资深技能树.png](https://p9-juejin.byteimg.com/tos-cn-i-k3u1fbpfcp/6202cf04c4ce4fcd824963f2ff04e8b2~tplv-k3u1fbpfcp-watermark.image?)

# 分类

## 架构与设计模式

### MVC

### MVVM

### MVI

### Clean

### VIPER

## 开发流程

### 敏捷开发流程

- 效率工具

	- 飞书机器人
	- 文档能力

		- 项目管理

	- 画图能力

		- UML
		- 流程图
		- 架构图

	- 编码规范

- CI/CD

	- Jenkins

		- 广发的插件生态支持，可定制性高，但学习成本相对比较高，适合用在大型的、复杂的自动化流程中

	- Fastlane

		- 针对iOS的，方便快速的集成，但是可定制性不够，适合快速集成iOS项目的集成和发布流程

### 设计开发

- 开发语言

	- Swift
	- C++
	- Python
	- Shell
	- Java
	- Objective—C

- 版本控制

	- Git使用与工作流
	- 分支管理与合并
	- Code Review流程
	- GitHub：Git Actions

- UI/UX

	- Auto Layout
	- 动画与过渡效果
	- 自定义UI组件

- 应用框架

	- 系统框架

		- 设备特性与API

			- Core Location
			- Core Bluetooth
			- ARKit
			- Core ML

	- 三方框架

- 数据存储

	- CoreData
	- Realm
	- SQLite
	- GRDB
	- MMKV

- 启动流程

### 调试/测试

- lldb
- 自动化测试

	- 单元测试

		- 单元测试代码，可集成到CI/CD流程中
		- 用于测试指定模块单元，正确性、稳定性测试
		- 方便代码重构，快速测试
		- 建设迭代重复测试

	- UI测试

		- 确定测试场景，编写测试代码
		- 异常页面截图

	- Mocking & Stubbing

		- Mocking模拟（对象）

			- 工具产品

				- XCTest：expectation / waitForExpectations
				- Swift-Cuckoo

			- 优势

				- 独立测试
				- 预测行为，参数模拟
				- 简化测试环境

		- Stubbing存根（模拟方法）

			- 工具产品

				- OHHTTPStubs
				- XCTest：stub

			- 优势

				- 模拟特定返回值，而不直接运行函数计算

	- Monkey测试

		- 随机测试

			- 崩溃测试
			- 界面异常
			- 兼容性测试
			- 边界条件
			- 内存泄漏探测

		- 框架

			- ？？
			- ？？

	- 性能评测

		- Instruments
		- Appium
		- Dokit
		- Perdog

- 代码Review

	- SwiftLint

- 调试与故障排查

	- Xcode调试工具
	- Crash日志分析
	- Bug追踪与修复

### 发布/上线

- 性能优化

	- 启动时间
	- 包体优化

		- 初始包体
		- 增长包体

	- 崩溃治理

		- 多线程治理
		- 内存治理

	- 卡顿治理

		- 页面掉帧率
		- CPU占用率

- 埋点方案
- 日志采集

## 网络与多线程

### 并发：多线程

- GCD (Grand Central Dispatch)
- Operation & OperationQueue
- 线程同步与锁

### 网络编程

- URLSession
- AF/Alamofire
- WebSocket

## 计算机科学与技术

### CPU与指令架构

### 操作系统

### 编译原理

## 算法与数据结构

### 算法

- 动态规划
- 回溯
- 分支限界

### 数据结构

- 数组
- 链表
- 二叉树
- 图

## 领域知识

### 音视频开发

- OpenGL
- Metal
- CoreML

### 图片处理

- OpenCV

### ARKit

## 编程范式

### 响应式编程

- RxSwift
- Combine

### 函数式编程

## 跨平台方案

### ReactNative

### Flutter

### VUE

扩展：[AwesomeCoding](https://github.com/zf-lab/AwesomeCoding)