<?php
/**
 * The set view file of custom module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     custom
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<?php include 'header.html.php';?>
<div id='mainContent' class='main-row'>
  <div class='side-col' id='sidebar'></div>
  <div class='main-col main-content'>
    <form method='post' target='hiddenwin'>
      <div class='main-header'>
        <div class='heading'>
          <strong><?php echo $lang->custom->working?></strong>
        </div>
      </div>
      <table class='table table-form'>
        <tr>
          <th class='text-top'><?php echo $lang->custom->working;?></th>
          <td>
            <?php $checkedKey = isset($config->global->flow) ? $config->global->flow : 'full';?>
            <?php foreach($lang->custom->workingList as $key => $value):?>
            <p><label class="radio-inline"><input type="radio" name="flow" value="<?php echo $key?>"<?php echo $key == $checkedKey ? " checked='checked'" : ''?> id="flow<?php echo $key;?>"><?php echo $value;?></label></p>
            <?php endforeach;?>
          </td>
        </tr>
        <tr><td></td><td><?php echo html::submitButton('', '', 'btn btn-primary btn-wide')?></td></tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
