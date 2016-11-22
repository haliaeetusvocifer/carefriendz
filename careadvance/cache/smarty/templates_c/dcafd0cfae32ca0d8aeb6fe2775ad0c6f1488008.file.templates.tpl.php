<?php /* Smarty version Smarty-3.1.16, created on 2016-11-21 07:51:03
         compiled from "/var/www/html/codoforum/admin/layout/templates/mail/templates.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5535285905832a767ec9dd1-81881782%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dcafd0cfae32ca0d8aeb6fe2775ad0c6f1488008' => 
    array (
      0 => '/var/www/html/codoforum/admin/layout/templates/mail/templates.tpl',
      1 => 1438641914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5535285905832a767ec9dd1-81881782',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5832a767ef2bb2_81111121',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832a767ef2bb2_81111121')) {function content_5832a767ef2bb2_81111121($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/var/www/html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class=""><i class="fa fa-envelope"></i> Mail Settings</li>
         <li class="active"><i class="fa fa-file"></i> Templates</li>
    </ol>
    
</section>
<div class="col-md-6">
<div  class="box box-info">
<form class="box-body" action="?page=mail/templates" role="form" method="post" enctype="multipart/form-data">

Await Approval Subject:
<input type="text" class="form-control" name="await_approval_subject" value="<?php echo smarty_modifier_get_opt("await_approval_subject");?>
"/><br/>
Await Approval Message:
<textarea class="form-control" style="height:200px" name="await_approval_message"><?php echo smarty_modifier_get_opt("await_approval_message");?>
</textarea><br/>

Post Notify Subject:
<input type="text" class="form-control" name="post_notify_subject" value="<?php echo smarty_modifier_get_opt("post_notify_subject");?>
"/><br/>
Post Notify Message:
<textarea class="form-control" style="height:200px" name="post_notify_message"><?php echo smarty_modifier_get_opt("post_notify_message");?>
</textarea><br/>

Password Reset Subject:
<input type="text" class="form-control" name="password_reset_subject" value="<?php echo smarty_modifier_get_opt("password_reset_subject");?>
"/><br/>
Password Reset Message:
<textarea class="form-control" style="height:200px" name="password_reset_message"><?php echo smarty_modifier_get_opt("password_reset_message");?>
</textarea><br/>
<input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />
<input type="submit" value="Save" class="btn btn-primary"/>
</form>
 
<?php }} ?>
