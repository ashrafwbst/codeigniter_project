<?php
defined('BASEPATH') OR exit('不允许直接访问脚本');

$lang['email_must_be_array'] = '电子邮件验证方法必须传递给数组。';
$lang['email_invalid_address'] = '无效的邮件地址： %s';
$lang['email_attachment_missing'] = '无法找到以下电子邮件附件： %s';
$lang['email_attachment_unreadable'] = '无法打开此附件： %s';
$lang['email_no_from'] = '无法发送没有“发件人”标题的邮件.';
$lang['email_no_recipients'] = '您必须包含收件人： To, Cc, or Bcc';
$lang['email_send_failure_phpmail'] = '无法使用PHP mail（）发送电子邮件。您的服务器可能未配置为使用此方法发送邮件。';
$lang['email_send_failure_sendmail'] = '无法使用PHP Sendmail发送电子邮件。您的服务器可能未配置为使用此方法发送邮件。';
$lang['email_send_failure_smtp'] = '无法使用PHP SMTP发送电子邮件。您的服务器可能未配置为使用此方法发送邮件。';
$lang['email_sent'] = '您的邮件已使用以下协议成功发送： %s';
$lang['email_no_socket'] = '无法打开Sendmail的套接字。请检查设置。';
$lang['email_no_hostname'] = '您没有指定SMTP主机名。';
$lang['email_smtp_error'] = '遇到以下SMTP错误： %s';
$lang['email_no_smtp_unpw'] = '错误：您必须分配SMTP用户名和密码。';
$lang['email_failed_smtp_login'] = '无法发送AUTH LOGIN命令。错误： %s';
$lang['email_smtp_auth_un'] = '无法验证用户名。错误： %s';
$lang['email_smtp_auth_pw'] = '无法验证密码。错误： %s';
$lang['email_smtp_data_failure'] = '无法发送数据： %s';
$lang['email_exit_status'] = '退出状态代码： %s';
