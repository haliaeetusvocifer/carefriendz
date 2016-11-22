<?php /* Smarty version Smarty-3.1.16, created on 2016-11-21 07:48:45
         compiled from "/var/www/html/codoforum/admin/layout/templates/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18934361045832a6dd738735-03022685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0ddcbaa59a0316dd9a03ab865448cc2368a603d4' => 
    array (
      0 => '/var/www/html/codoforum/admin/layout/templates/config.tpl',
      1 => 1438641914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18934361045832a6dd738735-03022685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5832a6dd784629_54097585',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832a6dd784629_54097585')) {function content_5832a6dd784629_54097585($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/var/www/html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-wrench"></i> Global Settings</li>
    </ol>

</section>
<div class="col-md-6">
    <div  class="box box-info">
        <form class="box-body" action="?page=config" role="form" method="post" enctype="multipart/form-data">
            <!--
                Site URL: 
            <input type="text" class="form-control" name="site_url" value="<?php echo smarty_modifier_get_opt("site_url");?>
" /><br/>
            -->

            <label>Site Title</label>
            <input type="text" class="form-control" name="site_title" value="<?php echo smarty_modifier_get_opt("site_title");?>
" /><br/>

            <label>Site Description</label>
            <input type="text" class="form-control" name="site_description" value="<?php echo smarty_modifier_get_opt("site_description");?>
" /><br/>

            <label>Admin Email</label>
            <input type="text" class="form-control" name="admin_email" value="<?php echo smarty_modifier_get_opt("admin_email");?>
" /><br/>
            <!--
            Captcha Public Key:
            <input type="text" class="form-control" name="captcha_public_key" value="<?php echo smarty_modifier_get_opt("captcha_public_key");?>
" /><br/>
            
            Captcha Private Key:
            <input type="text" class="form-control" name="captcha_private_key" value="<?php echo smarty_modifier_get_opt("captcha_private_key");?>
" /><br/>
            -->
            <label>Password Min Length</label>
            <input type="text" class="form-control" name="register_pass_min" value="<?php echo smarty_modifier_get_opt("register_pass_min");?>
" /><br/>

            <label>Num of posts(All topics Page)</label>
            <input type="text" class="form-control" name="num_posts_all_topics" value="<?php echo smarty_modifier_get_opt("num_posts_all_topics");?>
" /><br/>

            <label>Num of posts(while viewing a category)</label>
            <input type="text" class="form-control" name="num_posts_cat_topics" value="<?php echo smarty_modifier_get_opt("num_posts_cat_topics");?>
" /><br/>

            <label>Num of posts(While viewing a topic)</label>
            <input type="text" class="form-control" name="num_posts_per_topic" value="<?php echo smarty_modifier_get_opt("num_posts_per_topic");?>
" /><br/>

            <label>Forum attachment path</label>
            <input type="text" class="form-control" name="forum_attachments_path" value="<?php echo smarty_modifier_get_opt("forum_attachments_path");?>
" /><br/>

            <label>Allowed Upload types(comma separated)</label>
            <input type="text" class="form-control" name="forum_attachments_exts" value="<?php echo smarty_modifier_get_opt("forum_attachments_exts");?>
" /><br/>

            <label>Max Upload size(MB)</label>
            <input type="text" class="form-control" name="forum_attachments_size" value="<?php echo smarty_modifier_get_opt("forum_attachments_size");?>
" /><br/>

            <label>Allowed Mimetypes</label>
            <input type="text" class="form-control" name="forum_attachments_mimetypes" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>

            <!--
            <input type="text" class="form-control" name="forum_attachments_multiple" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>
            
            <input type="text" class="form-control" name="forum_attachments_parallel" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>
            <input type="text" class="form-control" name="forum_attachments_max" value="<?php echo smarty_modifier_get_opt("forum_attachments_mimetypes");?>
" /><br/>
            -->
            <label>Min characters for a post</label>
            <input type="text" class="form-control" name="reply_min_chars" value="<?php echo smarty_modifier_get_opt("reply_min_chars");?>
" /><br/>

            <label>
                Account registrations require admin approval ?
            </label>
            <br/>
            <input id='reg_req'
                   class="simple form-control" name="reg_req_admin" 
                   <?php ob_start();?><?php echo smarty_modifier_get_opt("reg_req_admin");?>
<?php $_tmp1=ob_get_clean();?><?php if ($_tmp1=="yes") {?> checked="checked" <?php }?>
                   type="checkbox"  data-toggle="toggle"
                   data-size="mini"
                   data-on="yes" data-off="no"
                   data-onstyle="success" data-offstyle="danger">
            <br/><hr/>

            <!--
            Captcha:
            <input type="text" class="form-control" name="captcha" value="<?php echo smarty_modifier_get_opt("captcha");?>
" /><br/>
            -->
            <input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
            <input type="submit" value="Save" class="btn btn-primary"/>
        </form>
        <br/>
        <br/>
    </div>
</div><?php }} ?>
