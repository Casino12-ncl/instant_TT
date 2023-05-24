<?php

$model = cmsCore::getModel('users');
$model_con_types = $model->filterEqual('name', 'promo')->getItem('widgets');           
$clicks = $model_con_types['clicks'];
if(cmsCore::getInstance()->request->isAjax()) {
  $insert = [
    'id' => 32,  
    'controller' => 'users',
    'name' => 'promo',
    'version' => '1',
    'clicks' =>$clicks++
  ];
  $update = [ 
    'clicks' =>$clicks++
  ];
  $model->insertOrUpdate('widgets', $insert, $update);
}
?>

<script type="text/javascript">    
  var clicks = <?php echo $clicks;?>  
  function onClick() {
    clicks+=1;
    document.getElementById("clicks").innerHTML = clicks; 
      $.ajax({
        url: '/instant?update',
      });
  };
</script>

<div id="#clicks" onclick="onClick()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#promo">

<?php echo LANG_WD_USERS_PROMO_NAME  ?>

</div>

<?php if($users == 1) {   
  echo  LANG_WD_USERS_PROMO_COUNT . ' :';?>
  <a id="clicks"><?php echo $clicks;?></a>
<?php } ?>

<div class="modal" id="promo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div style='margin: 50% auto;'>
        <div class="modal-header">       
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div style='color:white; background-color: grey'>
        <?php echo $con_types ?>  
        </div> 
      </div>
    </div>
  </div>
</div>  
