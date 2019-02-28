<?php $url = Yii::$app->urlManager->createAbsoluteUrl(['manage/mail-change-pass', 'timestamp' => $time, 'adminuser' => $adminuser, 'token' => $token]); ?>
<html>
<head>
    <base target="_blank">
    <style type="text/css">
        ::-webkit-scrollbar {
            display: none;
        }
    </style>
    <style id="cloudAttachStyle" type="text/css">
        #divNeteaseBigAttach, #divNeteaseBigAttach_bak {
            display: none;
        }
    </style>
</head>
<body tabindex="0" role="listitem">
<style type="text/css">
    body {
        margin: 0 auto;
        padding: 0;
        font-family: Microsoft Yahei, Tahoma, Arial;
        color: #333333;
        background-color: #fff;
        font-size: 12px;
    }

    a {
        color: #00a2ca;
        line-height: 22px;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
        color: #00a2ca;
    }
</style>

<table width="640" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="font-family:'Microsoft YaHei';">
    <tbody>
    <tr>
        <td>
            <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" height="40"></table>
        </td>
    </tr>

    <tr>
        <td>
            <table width="800" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#00a1cc" height="48" style="font-family:'Microsoft YaHei';">
                <tbody>
                    <tr>
                        <td width="74" height="26" border="0" align="center" valign="middle" style="padding-left:20px;"><a href="http://www.aliyun.com/?&amp;utm_campaign=sys&amp;utm_medium=system&amp;utm_source=sys_email&amp;msctype=email&amp;mscmsgid=149915061900171168&amp;v=q" target="_blank"><img src="http://gtms04.alicdn.com/tps/i4/T1CkCDFppcXXXLbgbn-74-26.png" alt="Yuncms" width="74" height="26" border="0"></a></td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td>

            <table width="800" border="0" align="left" cellpadding="0" cellspacing="0" style=" border:1px solid #edecec; border-top:none; border-bottom:none; padding:0 20px;font-size:14px;color:#333333;">
                <tbody>
                <tr>
                    <td width="760" height="56" border="0" align="left" colspan="2"
                        style="font-family:'Microsoft YaHei'; font-size:16px;vertical-align:bottom;"><a data-auto-link="1">尊敬的 <?php echo $adminuser; ?></a>：
                    </td>
                </tr>
                <tr>
                    <td width="760" height="20" border="0" align="left" colspan="2">&nbsp;</td>
                </tr>

                <tr>
                    <td width="40" height="32" border="0" align="left" valign="middle"
                        style=" width:40px; text-align:left;vertical-align:middle; line-height:32px; float:left;"><img
                                width="32" height="32" border="0"
                                src="http://gtms02.alicdn.com/tps/i2/T1YoblFq4cXXa94Hfd-32-32.png"></td>
                    <td width="720" height="32" border="0" align="left" valign="middle"
                        style=" width:720px; text-align:left;vertical-align:middle;line-height:32px;font-family:'Microsoft YaHei';">
                        请单击下方链接来进行密码修改：
                    </td>
                </tr>

                <tr>
                    <td width="720" height="20" colspan="2" style="padding-left:40px;">&nbsp;</td>
                </tr>

                <tr>
                    <td width="720" height="32" colspan="2" style="padding-left:40px;font-family:'Microsoft YaHei';">
                        <a href="<?php echo $url; ?>">点击这里修改密码</a>
                    </td>
                </tr>

                <tr>
                    <td width="720" height="20" colspan="2" style="padding-left:40px;">&nbsp;</td>
                </tr>

                <tr>
                    <td width="720" height="32" colspan="2" style="padding-left:40px;font-family:'Microsoft YaHei';">
                        如果以上链接不能打开，请将下面地址复制到您的浏览器(如IE)的地址栏，打开页面后同样可以完成修改密码。
                    </td>
                </tr>

                <tr>
                    <td width="720" height="32" colspan="2" style="padding-left:40px;font-family:'Microsoft YaHei';">（该链接在10分钟内有效，如超时请登录<a target="_blank" href="http://adm.yuncms.com/index.php?r=public%2Fseekpass">yuncms后台登录</a>重新发送验证邮件）
                    </td>
                </tr>

                <tr>
                    <td width="720" height="32" colspan="2" style="padding-left:40px;">&nbsp;</td>
                </tr>

                <tr>
                    <td width="720" height="32" colspan="2" style="padding-left:40px;font-family:'Microsoft YaHei';">
                        <a style="color: #0088cc; text-decoration: underline;word-break: break-all;word-wrap: break-word;display: block;width: 640px;font-size:12px;"
                           href="<?php echo $url; ?>"><?php echo $url; ?></a>
                    </td>
                </tr>

                <tr>
                    <td width="720" height="32" colspan="2" style="padding-left:40px;">&nbsp;</td>
                </tr>
                <tr>
                    <td width="720" height="32" colspan="2" style="padding-left:40px;">&nbsp;</td>
                </tr>

                <tr>
                    <td width="720" height="14" colspan="2"
                        style="padding-bottom:16px; border-bottom:1px dashed #e5e5e5;font-family:'Microsoft YaHei';">
                        Philisen Studio.
                    </td>
                </tr>
                <tr>
                    <td width="720" height="14" colspan="2"
                        style="padding:8px 0 28px;color:#999999; font-size:12px;font-family:'Microsoft YaHei';">
                        此为系统邮件请勿回复
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    <tr>
        <td>
            <table width="800" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
                <tbody>
                <tr>
                    <td width="800" height="100" align="center" valign="middle"><img border="0" height="100" src="http://gtms02.alicdn.com/tps/i2/T17.moFz4iXXb_Ybw7-800-100.jpg">
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>

    </tbody>
</table>

<style type="text/css">
    body {
        font-size: 14px;
        font-family: arial, verdana, sans-serif;
        line-height: 1.666;
        padding: 0;
        margin: 0;
        overflow: auto;
        white-space: normal;
        word-wrap: break-word;
        min-height: 100px
    }

    td, input, button, select, body {
        font-family: Helvetica, 'Microsoft Yahei', verdana
    }

    pre {
        white-space: pre-wrap;
        white-space: -moz-pre-wrap;
        white-space: -pre-wrap;
        white-space: -o-pre-wrap;
        word-wrap: break-word;
        width: 95%
    }

    th, td {
        font-family: arial, verdana, sans-serif;
        line-height: 1.666
    }

    img {
        border: 0
    }

    header, footer, section, aside, article, nav, hgroup, figure, figcaption {
        display: block
    }

    blockquote {
        margin-right: 0px
    }
</style>


<style id="ntes_link_color" type="text/css">a, td a {
        color: #064977
    }</style>

</body>
</html>