@echo off
chcp 65001 >nul
title Yii2 一键部署

echo [1/5] 安装依赖...
if not exist "vendor" (
    if not exist "composer.phar" (
        echo 下载 Composer...
        php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
        php composer-setup.php --filename=composer.phar
        del composer-setup.php
    )
    echo 安装 Composer 依赖包...
    php composer.phar install --ignore-platform-reqs
)

echo.
echo [2/5] 初始化Yii...
php init --env=Development --overwrite=All

echo.
echo [3/5] 配置数据库...
set /p DB_NAME=数据库名[默认: yii2advanced]: 
if "%DB_NAME%"=="" set DB_NAME=yii2advanced

set /p DB_USER=用户[默认: root]: 
if "%DB_USER%"=="" set DB_USER=root

set /p DB_PASS=密码 [直接回车表示空密码]: 

echo 正在创建数据库配置文件...
(
echo ^<?php
echo return [
echo     'components' =^> [
echo         'db' =^> [
echo             'class' =^> 'yii\db\Connection',
echo             'dsn' =^> 'mysql:host=127.0.0.1;dbname=%DB_NAME%',
echo             'username' =^> '%DB_USER%',
echo             'password' =^> '%DB_PASS%',
echo             'charset' =^> 'utf8mb4',
echo         ],
echo     ],
echo ];
) > "common\config\main-local.php"

echo.
echo [4/5] 数据库迁移（导入SQL文件）...
if not exist "data\install.sql" (
    echo 错误: 找不到 data\install.sql 文件！
    pause
    exit /b 1
)

REM 自动检测 MySQL 路径
set MYSQL_BIN=mysql
where mysql >nul 2>&1
if errorlevel 1 (
    REM 如果 PATH 中没有，尝试常见路径
    if exist "C:\xampp\mysql\bin\mysql.exe" (
        set MYSQL_BIN=C:\xampp\mysql\bin\mysql.exe
    ) else if exist "D:\xampp\mysql\bin\mysql.exe" (
        set MYSQL_BIN=D:\xampp\mysql\bin\mysql.exe
    ) else if exist "E:\xampp\mysql\bin\mysql.exe" (
        set MYSQL_BIN=E:\xampp\mysql\bin\mysql.exe
    ) else (
        echo 错误: 找不到 MySQL 可执行文件！
        echo 请确保 MySQL 已安装或在系统 PATH 中
        set /p MYSQL_BIN=请输入 MySQL 完整路径（例如: C:\xampp\mysql\bin\mysql.exe）: 
    )
)

REM 获取脚本所在目录并转换为正斜杠路径（用于 source 命令）
set "SCRIPT_DIR=%~dp0"
set "SCRIPT_DIR=%SCRIPT_DIR:~0,-1%"
set "SCRIPT_DIR=%SCRIPT_DIR:\=/%"

echo 正在创建/重置数据库并导入数据...
if "%DB_PASS%"=="" (
    "%MYSQL_BIN%" -u %DB_USER% -e "drop database if exists %DB_NAME%;create database %DB_NAME% character set utf8mb4 collate utf8mb4_general_ci;use %DB_NAME%;source %SCRIPT_DIR%/data/install.sql;"
) else (
    "%MYSQL_BIN%" -u %DB_USER% -p%DB_PASS% -e "drop database if exists %DB_NAME%;create database %DB_NAME% character set utf8mb4 collate utf8mb4_general_ci;use %DB_NAME%;source %SCRIPT_DIR%/data/install.sql;"
)

if errorlevel 1 (
    echo.
    echo 数据库导入失败，请检查:
    echo 1. MySQL 服务是否启动
    echo 2. 用户 %DB_USER% 是否有权限创建数据库
    echo 3. MySQL 路径是否正确
    echo.
) else (
    echo 数据库导入成功！
)

echo.
echo [5/5] 创建目录...
if not exist "frontend\runtime" mkdir frontend\runtime
if not exist "backend\runtime" mkdir backend\runtime
if not exist "console\runtime" mkdir console\runtime
if not exist "frontend\runtime\sessions" mkdir frontend\runtime\sessions
if not exist "backend\runtime\sessions" mkdir backend\runtime\sessions
if not exist "console\runtime\cache" mkdir console\runtime\cache

echo.
echo ========================================
echo 部署完成！
echo ========================================
echo 数据库: %DB_NAME%
echo 用户: %DB_USER%
echo.
echo 请确保:
echo 1. MySQL 服务已启动
echo 2. Web 服务器已配置并运行
echo 3. 目录权限已正确设置
echo ========================================
pause

