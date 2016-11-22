<?php /* Smarty version Smarty-3.1.16, created on 2016-11-21 07:50:52
         compiled from "/var/www/html/codoforum/admin/layout/templates/mail/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10374848595832a75c796a49-78780618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87494134a467c56cab9af1c6988ad52d44d7ff33' => 
    array (
      0 => '/var/www/html/codoforum/admin/layout/templates/mail/configuration.tpl',
      1 => 1438641914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10374848595832a75c796a49-78780618',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5832a75c7bc3a4_98073505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832a75c7bc3a4_98073505')) {function content_5832a75c7bc3a4_98073505($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_get_opt')) include '/var/www/html/codoforum/sys/CODOF/Smarty/plugins/modifier.get_opt.php';
?><section class="content-header" id="breadcrumb_forthistemplate_hack">
    <h1>&nbsp;</h1>
    <ol class="breadcrumb" style="float:left; left:10px;">
         <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
         <li class=""><i class="fa fa-envelope"></i> Mail Settings</li>
         <li class="active"><i class="fa fa-gear"></i> Configuration</li>
    </ol>
    
</section>
<div class="col-md-6">
<div  class="box box-info">
<form class="box-body" action="?page=mail/configuration" role="form" method="post" enctype="multipart/form-data">



Mail Type:


<select name='mail_type' class="form-control">
    <option value='smtp' <?php if (smarty_modifier_get_opt("mail_type")=='smtp') {?> selected <?php }?>>SMTP</option>
    <option value='mail'  <?php if (smarty_modifier_get_opt("mail_type")=='mail') {?> selected <?php }?>>mail()</option>
    
</select><br>

<hr>
<span style="font-size:smaller">The below settings are required only if you have selected SMTP above.</span>

<br><br>
SMTP Protocol:
<input type="text" class="form-control" name="smtp_protocol" value="<?php echo smarty_modifier_get_opt("smtp_protocol");?>
" />

<br/>

SMTP Server:
<input type="text" class="form-control" name="smtp_server" value="<?php echo smarty_modifier_get_opt("smtp_server");?>
" /><br/>

SMTP Port:
<input type="text" class="form-control" name="smtp_port" value="<?php echo smarty_modifier_get_opt("smtp_port");?>
" /><br/>

SMTP username:
<input type="text" class="form-control" name="smtp_username" value="<?php echo smarty_modifier_get_opt("smtp_username");?>
" /><br/>

SMTP Password:
<input type="text" class="form-control" name="smtp_password" value="<?php echo smarty_modifier_get_opt("smtp_password");?>
" /><br/>


<input type="hidden" name="CSRF_token" value="<?php echo $_smarty_tpl->tpl_vars['token']->value;?>
" />

<input type="submit" value="Save" class="btn btn-primary"/>
</form>
 
<?php }} ?>
