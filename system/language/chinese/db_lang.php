<?php
defined('BASEPATH') OR exit('不允许直接访问脚本');

$lang['db_invalid_connection_str'] = '无法根据您提交的连接字符串确定数据库设置。';
$lang['db_unable_to_connect'] = '无法使用提供的设置连接到数据库服务器。';
$lang['db_unable_to_select'] = '无法选择指定的数据库： %s';
$lang['db_unable_to_create'] = '无法创建指定的数据库： %s';
$lang['db_invalid_query'] = '您提交的查询无效。';
$lang['db_must_set_table'] = '您必须设置要与查询一起使用的数据库表。';
$lang['db_must_use_set'] = '您必须使用“set”方法更新条目。';
$lang['db_must_use_index'] = '您必须指定要与批量更新匹配的索引。';
$lang['db_batch_missing_index'] = '提交批量更新的一行或多行缺少指定的索引。';
$lang['db_must_use_where'] = '除非它们包含“where”子句，否则不允许更新。';
$lang['db_del_must_use_where'] = '除非它们包含“where”或“like”子句，否则不允许删除。';
$lang['db_field_param_missing'] = '要获取字段，需要将表的名称作为参数。';
$lang['db_unsupported_function'] = '此功能不适用于您正在使用的数据库。';
$lang['db_transaction_failure'] = '事务失败：执行回滚。';
$lang['db_unable_to_drop'] = '无法删除指定的数据库。';
$lang['db_unsupported_feature'] = '您正在使用的数据库平台不支持的功能。';
$lang['db_unsupported_compression'] = '您选择的文件压缩格式不受服务器支持。';
$lang['db_filepath_error'] = '无法将数据写入您提交的文件路径。';
$lang['db_invalid_cache_path'] = '您提交的缓存路径无效或可写。';
$lang['db_table_name_required'] = '该操作需要表名。';
$lang['db_column_name_required'] = '该操作需要列名。';
$lang['db_column_definition_required'] = '该操作需要列定义。';
$lang['db_unable_to_set_charset'] = '无法设置客户端连接字符集： %s';
$lang['db_error_heading'] = '发生数据库错误';
