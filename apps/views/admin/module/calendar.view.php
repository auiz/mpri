<?php
if(!empty($this->data['record'])){
    $data     = $this->data['record']->offsetGet(0)->attributes;
    $edit     = true;
  } else {
    $edit     = false;
  }
  $formLink = $this->data['baseUrl'].'module/save-calendar';
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
          <form action="<?php echo $formLink?>" method="POST" id="embed-form">
            <div class="form-group">
              <textarea class="form-control" id="inputDetail" rows="4" placeholder="<?php echo $this->trans->get('embed')?>" name="data[embed]" required><?php if($edit){ echo base64_decode($data['embed']); }?></textarea>
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