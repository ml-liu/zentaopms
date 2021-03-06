<?php
/**
 * The assigntome block view file of block module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.zentao.net
 */
?>
<div id='assigntomeBlock'>
  <?php foreach($hasViewPriv as $type => $bool):?>
  <div id="<?php echo $type?>">
    <?php include "{$type}block.html.php";?>
  </div>
  <?php endforeach;?>
</div>
<style>
#assigntomeBlock #todo,
#assigntomeBlock #task {border-bottom: 1px solid #eee;}
</style>