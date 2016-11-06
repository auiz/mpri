<?php
use Apps\Models\Files;
  if(!empty($this->data['record'])){
    $data     = $this->data['record'];
    $edit     = true;
    $formLink = $this->data['baseUrl'].'post/update-category/'.$data['category_id'];
    if( $data['file_id'] ){
      $image = Files::find( $data['file_id']);
      $thumb = $this->data['baseUrl'].$image->attributes['filepath'];
    }
  } else {
    $edit     = false;
    $formLink = $this->data['baseUrl'].'post/add-category';
    $thumb    = '';
  }
?>
<div class="padding">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <!-- <h2><?php echo $this->trans->get('title_new_post')?></h2> -->
          <small>Individual form controls receive some global styling. All textual &lt;input>, &lt;textarea>, and &lt;select> elements with .form-control are set to width: 100%; by default. Wrap labels and controls in .form-group for optimum spacing.</small>
        </div>
        <div class="box-divider m-a-0"></div>
        <div class="box-body">
          <form action="<?php echo $formLink?>" enctype="multipart/form-data" method="POST">
            <?php if( $thumb ){ echo '<img src='.$thumb.' atl="">'; }?>
            <div class="form-group">
              <label for="inputFile"><?php echo $this->trans->get('file_input')?></label>
              <input type="file" id="inputFile" class="form-control has-value" name="fileinput" accept="image/*">
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label for="categoryLabelTH"><?php echo $this->trans->get('name_th')?></label>
                  <input type="text" class="form-control" id="categoryLabelTH" placeholder="<?php echo $this->trans->get('name_th')?>" name="data[name_th]" value="<?php if($edit){ echo $data['name_th']; }?>" required>
                </div>
                <div class="col-sm-6">
                  <label for="categoryLabelEN"><?php echo $this->trans->get('name_en')?></label>
                  <input type="text" class="form-control" id="categoryLabelEN" placeholder="<?php echo $this->trans->get('name_en')?>" name="data[name_en]" value="<?php if($edit){ echo $data['name_en']; }?>" required>
                </div>
              </div>
            </div>
             <div class="form-group">
              <label for="inputTop"><?php echo $this->trans->get( 'top_description' )?></label>
              <textarea ui-jp="summernote" ui-options="{height:'200px'}" class="form-control" id="inputTop" rows="4" placeholder="<?php echo $this->trans->get( 'top_description' )?>" name="data[top_desc]"><?php if ( $edit ) { echo $data['top_desc']; }?></textarea>
              <!-- <div id="inputDetail" ui-jp="summernote" ui-options="{height:'200px'}"></div> -->
            </div>
             <div class="form-group">
              <label for="inputBottom"><?php echo $this->trans->get( 'bottom_description' )?></label>
              <textarea ui-jp="summernote" ui-options="{height:'200px'}" class="form-control" id="inputBottom" rows="4" placeholder="<?php echo $this->trans->get( 'bottom_description' )?>" name="data[bottom_desc]"><?php if ( $edit ) { echo $data['bottom_desc']; }?></textarea>
              <!-- <div id="inputDetail" ui-jp="summernote" ui-options="{height:'200px'}"></div> -->
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <table class="table">
                    <td style="width:20%;vertical-align:middle;"><?php echo $this->trans->get('RSS')?></td>
                    <td>
                      <label class="ui-switch ui-switch-md info m-t-xs" >
                        <input type="checkbox" name="data[rss]" class="has-value"
                        <?php if( $edit && $data['rss']=='on'){ echo 'checked'; }?>>
                        <i></i>
                      </label>
                    </td>
                  </table>
                </div>
                <div class="col-sm-9"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label for="inputSort"><?php echo $this->trans->get('priority')?></label>
                  <input type="number" class="form-control" id="inputSort" placeholder="<?php echo $this->trans->get('priority')?>" name="data[priority]" value="<?php if($edit){ echo $data['priority']; }?>" required>
                </div>
                <div class="col-sm-9"></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-3">
                  <label for="inputClass"><?php echo $this->trans->get('container_class')?></label>
                  <input type="text" class="form-control" id="inputClass" placeholder="<?php echo $this->trans->get('container_class')?>" name="data[container_class]" value="<?php if($edit){ echo $data['container_class']; }?>" required>
                </div>
                <div class="col-sm-9"></div>
              </div>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-sm dark m-b"><?php echo $this->trans->get('save')?></button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>