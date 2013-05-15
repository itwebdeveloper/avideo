<?php /* Smarty version Smarty-3.1.13, created on 2013-05-14 19:48:59
         compiled from "index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16867122685192cd42938dd5-10082415%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e43b807af9cc8df7d350c3baf9e47f167c9520a0' => 
    array (
      0 => 'index.tpl',
      1 => 1368620280,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16867122685192cd42938dd5-10082415',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5192cd42a02c21_23302919',
  'variables' => 
  array (
    'name' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5192cd42a02c21_23302919')) {function content_5192cd42a02c21_23302919($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_capitalize')) include '/localhost/test/libs/plugins/modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) include '/localhost/test/libs/plugins/modifier.date_format.php';
?><html>
<head>
<title>Info</title>
</head>
<body>

<pre>
User Information:

Name: <?php echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['name']->value);?>

Addr: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>

Date: <?php echo smarty_modifier_date_format(time(),"%b %e, %Y");?>

</pre>

</body>
</html><?php }} ?>