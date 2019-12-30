##  安装
```
composer require zngue/laravel_user
```
## 发布命令
```
php artisan vendor:publish --provider="Zngue\User\ZngUserServiceProvider"
```
##创建数据库
```
CREATE TABLE `zng_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '平台id',
  `nickname` varchar(255) CHARACTER SET utf8mb4 DEFAULT '' COMMENT '昵称',
  `username` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `department_id` varchar(255) DEFAULT NULL COMMENT '部门ID',
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '状态 1正常 0锁定 2离职',
  `memo` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='用户表';

```
### laravel_jwt 安装
安装连接https://learnku.com/articles/10885/full-use-of-jwt
