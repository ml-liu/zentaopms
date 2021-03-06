<?php
/**
 * The build contact lists view file of my module of ZentaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Fei Chen<chenfei@cnezsoft.com>
 * @package     my
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php 
if($contactLists)
{
    echo html::select('contactListMenu', $contactLists, '', "class='form-control chosen' onchange=\"setMailto('mailto', this.value)\"");
}
else
{
    echo '<span class="input-group-btn">';
    echo '<a title="' . $lang->user->contacts->manage . '" href="' . $this->createLink('my', 'managecontacts', "listID=0&mode=new", '', true) . "\" target='_blank' data-icon='cog' data-title='{$lang->user->contacts->manage}' class='btn btn-icon iframe'><i class='icon icon-cog'></i></a>";
    echo '<button type="button" title="' . $lang->refresh . '" class="btn btn-icon" onclick="ajaxGetContacts(this)"><i class="icon icon-refresh"></i></button>';
    echo '</span>';
}
?>
<style>
#contactListMenu + .chosen-container {min-width: 100px;}
</style>