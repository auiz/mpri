<?php
use Apps\Models\Role;
$roles = $this->data['roleList'];
if(!empty($this->data['record'])){
    $data     = $this->data['record'];
    $edit     = true;
    $formLink = $this->data['baseUrl'].'user/update-user/'.$data['user_id'];
  } else {
    $edit     = false;
    $formLink = $this->data['baseUrl'].'user/add-user';
  }
?>
<div class="padding">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header">
          <!-- <h2><?php echo $this->trans->get('title_new_user')?></h2> -->
          <small>Individual form controls receive some global styling. All textual &lt;input>, &lt;textarea>, and &lt;select> elements with .form-control are set to width: 100%; by default. Wrap labels and controls in .form-group for optimum spacing.</small>
        </div>
        <div class="box-divider m-a-0"></div>
        <div class="box-body">
          <form role="form" action="<?php echo $formLink?>" method="POST">
            <div class="form-group">
              <label for="inputUsername"><?php echo $this->trans->get('user_username')?></label>
              <input type="text" class="form-control" id="inputUsername" placeholder="<?php echo $this->trans->get('user_username')?>" name="data[username]"
              <?php if( $edit ){ echo 'disabled value="'.$data['username'].'"';} else { echo 'required value=" "';}?> autocomplete="off">
            </div>
            <div class="form-group">
              <label for="inputPassword"><?php echo $this->trans->get('password')?></label>
              <input type="password" class="form-control" id="inputPassword" placeholder="<?php echo $this->trans->get('password')?>" name="data[password]" autocomplete="off"
              <?php if( !$edit ){ echo 'required value=""'; }?>>
            </div>
            <div class="form-group">
              <label for="inputpFirstname"><?php echo $this->trans->get('user_firstname')?></label>
              <input type="text" class="form-control" id="inputpFirstname" placeholder="<?php echo $this->trans->get('user_firstname')?>" name="data[firstname]"
              <?php if( $edit ){ echo 'value="'.$data['firstname'].'"';} else { echo 'required'; }?>>
            </div>
            <div class="form-group">
              <label for="inputLastname"><?php echo $this->trans->get('user_lastname')?></label>
              <input type="text" class="form-control" id="inputLastname" placeholder="<?php echo $this->trans->get('user_lastname')?>" name="data[lastname]"
              <?php if( $edit ){ echo 'value="'.$data['lastname'].'"';} else { echo 'required'; }?>>
            </div>
            <div class="form-group">
              <label for="selectRole"><?php echo $this->trans->get('role')?></label>
                <select name="data[role_id]" class="form-control" id="selectRole"><!-- ui-jp="select2" ui-options="{tags:true}" -->
                  <?php
                  foreach($roles as $_role){
                    $selected = (!empty($data) && $data['role_id']==$_role->role_id) ? 'selected':'';
                    echo '<option value="'.$_role->role_id.'" '.$selected.'>'.$_role->role_name.'</option>';
                  }
                  ?>
                </select>
            </div>
            <div class="form-group">
              <label for="inputEmail"><?php echo $this->trans->get('user_email_addr')?></label>
              <div class="input-group">
                <div class="input-group-addon">@</div>
                <input type="email" class="form-control" id="inputEmail" placeholder="<?php echo $this->trans->get('user_email_addr')?>" name="data[email]"
                <?php if( $edit ){ echo 'value="'.$data['email'].'"';} else { echo 'required'; }?>>
              </div>
            </div>
            <button type="submit" class="btn btn-sm dark m-b"><?php echo $this->trans->get('save')?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>