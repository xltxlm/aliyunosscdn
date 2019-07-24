项目[\xltxlm\aliyunosscdn\]
--------
> 阿里云oss和cdn的操作方法.;

# 代码编写原则:
- 遵循代码轮廓由后台配置生成,保证不会掺杂人为造成的错误
- 每一个特性都有对应的测试代码
- 向对象编程.每个类只实现一个__invoke函数
- 向对象编程,参数全采用set/get操作,抛弃函数,免去思考每个参数应该写的位置
- 实现的代码,字符串全采用有逻辑意义的常量来替代,用数据结构[php-ds]替代数组操作
- 本框架设计目标是提供每一种确定并且固定的逻辑,尽量砍掉扩展性,更适合管理维护

## 关于composer

> 目前不考虑提供稳定的版本支持.

```shell
$ composer require "xltxlm/aliyunosscdn":"@dev"
```


