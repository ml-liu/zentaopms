<?php
/**
 * The link story view of project module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     project
 * @version     $Id: linkstory.html.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id="mainMenu" class="clearfix">
  <div class="btn-toolbar pull-left">
    <span class='btn btn-link btn-active-text'><span class='text'><?php echo $lang->project->linkStory;?></span></span>
  </div>
  <div class='btn-toolbar pull-right'>
    <?php common::printBack($this->server->http_referer, 'btn btn-link');?>
  </div>
</div>
<div id="mainContent" class="main-content">
  <div id='queryBox' class='show'></div>
  <form class='main-table table-story' method='post' data-ride='table' id='linkStoryForm'>
    <table class='table table-fixed' id='linkStoryList'> 
      <thead>
        <tr>
          <th class='c-id'>
            <?php if($allStories):?>
            <div class="checkbox-primary check-all" title="<?php echo $lang->selectAll?>">
              <label></label>
            </div>
            <?php endif;?>
            <?php echo $lang->idAB;?>
          </th>
          <th class='w-pri'><?php echo $lang->priAB;?></th>
          <th class='w-150px'><?php echo $lang->story->product;?></th>
          <th class='w-150px'><?php echo $lang->story->module;?></th>
          <th><?php echo $lang->story->title;?></th>
          <th class='w-120px'><?php echo $lang->story->plan;?></th>
          <th class='w-80px'><?php echo $lang->story->stage;?></th>
          <?php if($productType != 'normal'):?>
          <th class='w-80px'><?php echo $lang->product->branchName[$productType];?></th>
          <?php endif;?>
          <th class='w-user'><?php echo $lang->openedByAB;?></th>
          <th class='w-80px text-center'><?php echo $lang->story->estimateAB;?></th>
        </tr>
      </thead>
      <tbody>
      <?php $storyCount = 0;?>
      <?php foreach($allStories as $story):?>
      <?php if(isset($prjStories[$story->id])) continue;?>
      <?php $storyLink = $this->createLink('story', 'view', "storyID=$story->id");?>
      <tr>
        <td class='cell-id'>
          <?php echo html::checkbox('stories', array($story->id => sprintf('%03d', $story->id)));?>
          <?php echo html::hidden("products[$story->id]", $story->product);?>
        </td>
        <td><span class='label-pri <?php echo 'label-pri-' . $story->pri;?>' title='<?php echo zget($lang->story->priList, $story->pri, $story->pri);?>'><?php echo zget($lang->story->priList, $story->pri, $story->pri);?></span></td>
        <td class='text-left' title='<?php echo $products[$story->product]->name?>'><?php echo html::a($this->createLink('product', 'browse', "productID=$story->product&branch=$story->branch"), $products[$story->product]->name, '_blank');?></td>
        <td class='text-left' title='<?php echo zget($modules, $story->module, '')?>'><?php echo zget($modules, $story->module, '')?></td>
        <td class='text-left nobr' title="<?php echo $story->title?>"><?php echo html::a($storyLink, $story->title);?></td>
        <td title='<?php echo $story->planTitle;?>'><?php echo $story->planTitle;?></td>
        <td><?php echo zget($lang->story->stageList, $story->stage);?></td>
        <?php if($productType != 'normal'):?>
        <td><?php if(isset($branchGroups[$story->product][$story->branch])) echo $branchGroups[$story->product][$story->branch];?></td>
        <?php endif;?>
        <td><?php echo zget($users, $story->openedBy);?></td>
        <td class='text-center'><?php echo $story->estimate;?></td>
      </tr>
      <?php $storyCount++;?>
      <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'>
      <?php if($storyCount):?>
      <div class="checkbox-primary check-all"><label><?php echo $lang->selectAll?></label></div>
      <div class='table-actions btn-toolbar'>
        <?php echo html::submitButton('', '', 'btn');?>
      </div>
      <?php else:?>
      <div class='text'><?php echo $lang->project->whyNoStories;?></div>
      <?php endif;?>
    </div>
  </form>
</div>
<script type='text/javascript'>
$(function()
{
    ajaxGetSearchForm();
});
</script>
<?php include '../../common/view/footer.html.php';?>
