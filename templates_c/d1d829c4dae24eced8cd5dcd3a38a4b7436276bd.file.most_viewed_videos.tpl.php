<?php /* Smarty version Smarty-3.1.13, created on 2013-05-14 22:21:25
         compiled from "most_viewed_videos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19181199825192d8237ae250-05325809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd1d829c4dae24eced8cd5dcd3a38a4b7436276bd' => 
    array (
      0 => 'most_viewed_videos.tpl',
      1 => 1368629447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19181199825192d8237ae250-05325809',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5192d82382c910_35574456',
  'variables' => 
  array (
    'video_select' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5192d82382c910_35574456')) {function content_5192d82382c910_35574456($_smarty_tpl) {?>  <?php echo $_smarty_tpl->getSubTemplate ("/localhost/test/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

  <body>
    <div class="aux_box">
      <div class="container_12">
        <div class="wrapper">
          <div class="grid_12">
            <div class="date"></div>
            <ul class="user">
              <li><a href="#">login</a></li>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="main_box">
      <div class="container_12">
      <!--==============================header=================================-->
          <div class="grid_12">
            <header>
              <h1><a class="logo" href="index.html">Avideo</a></h1>
              <nav>
                  <ul class="sf-menu">
                    <li><a href="videos.php">Videos</a></li>
                    <li><a href="most_viewed_videos.php">Most viewed</a>
            					<ul>
            						<li><a href="most_viewed_videos.php">Most viewed</a></li>
            						<li><a href="most_viewed_videos.php?period=today">Most viewed - Today</a></li>
            						<li><a href="most_viewed_videos.php?period=week">Most viewed - Last week</a></li>
            						<li><a href="most_viewed_videos.php?period=month">Most viewed - Last month</a></li>
                      </ul>
                    </li>
                    <li><a href="most_commented_videos.php">Most commented</a>
            					<ul>
            						<li><a href="most_voted_videos.php">Most commented</a></li>
            						<li><a href="most_voted_videos.php?period=today">Most voted - Today</a></li>
            						<li><a href="most_voted_videos.php?period=week">Most voted - Last week</a></li>
            						<li><a href="most_voted_videos.php?period=month">Most voted - Last month</a></li>
                      </ul>
                    </li>
                 </ul>
                </nav>
              <div class="clear"></div>
            </header>
            <div class="bg"></div>
          </div>
          <div class="clear"></div>
      <!--==============================content================================-->
          <section id="content">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['video_select']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
                <div class="grid_3">
                  <div class="division">
                  	<p><strong><a href="video.php?id=<?php echo $_smarty_tpl->tpl_vars['video_select']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ID'];?>
"><?php echo $_smarty_tpl->tpl_vars['video_select']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a></strong></p>
                    <a href="video.php?id=<?php echo $_smarty_tpl->tpl_vars['video_select']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['ID'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['video_select']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['thumbnail_default'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['video_select']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
" width="220" height="153" /></a>
                    Views: <?php echo $_smarty_tpl->tpl_vars['video_select']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['views'];?>

                  </div>
                </div>
<?php endfor; endif; ?>
          </section>
      </div>  
    </div>
  <?php echo $_smarty_tpl->getSubTemplate ("/localhost/test/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>