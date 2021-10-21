<?php
require("../../TMQ/function.php");
$id = intval($_GET['id']);
$get = $db->query("SELECT * FROM `TMQ_chuyenmuc` WHERE `id` = '$id'")->fetch();
//get thông tin chuyên mục
//1
$thongtin1 = explode("\n",$get['thongtin_1']);
$count_info1 = count($thongtin1);
//2
$thongtin2 = explode("\n",$get['thongtin_2']);
$count_info2 = count($thongtin2);
//3
$thongtin3 = explode("\n",$get['thongtin_3']);
$count_info3 = count($thongtin3);
//4
$thongtin4 = explode("\n",$get['thongtin_4']);
$count_info4 = count($thongtin4);
?>
  <div class="row form-group">
<?php
 if($get['thongtin_1'] != null){
?>
      <div class="col-3">
                                         <label class=" form-control-label"><?=$thongtin1[0];?></label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        <?php if($thongtin1[1] == 'input'){ ?>
                                        <input type="text" class="form-control" name="thongtin1" id="thongtin1" />
                                        <?php }elseif($thongtin1[1] == 'select'){ ?>
                                            <select name="thongtin1" id="thongtin1" class="form-control">
                                             <?php 
                        for($i = 2; $i < $count_info1; $i++){
			            echo '<option value="'.$thongtin1[$i].'">'.$thongtin1[0].' '.$thongtin1[$i].'</option>';
			           
			              }
                                             ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    </div>
                                    <?php } ?>
            
<?php if($get['thongtin_2'] != null){ ?>


  <div class="col-3">
                                         <label class=" form-control-label"><?=$thongtin2[0];?></label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        <?php if($thongtin2[1] == 'input'){ ?>
                                    
                                        <input type="text" class="form-control" name="thongtin2" id="thongtin2" />
                                        <?php }elseif($thongtin2[1] == 'select'){ ?>
                                <select name="thongtin2" id="thongtin2" class="form-control">
                                             <?php 
                        for($i = 2; $i < $count_info2; $i++){
			            echo '<option value="'.$thongtin2[$i].'">'.$thongtin2[0].' '.$thongtin2[$i].'</option>';
			           
			              }
                                             ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    </div>
                                    <?php } ?>    
<?php if($get['thongtin_3'] != null){ ?>


  <div class="col-3">
                                         <label class=" form-control-label"><?=$thongtin3['0'];?></label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        <?php if($thongtin3[1] == 'input'){ ?>
                                        <input type="text" class="form-control" name="thongtin3" id="thongtin3" />
                                        <?php }elseif($thongtin3[1] == 'select'){ ?>
                                            <select name="thongtin3" id="thongtin3" class="form-control">
                                             <?php 
                        for($i = 2; $i < $count_info3; $i++){
			            echo '<option value="'.$thongtin3[$i].'">'.$thongtin3['0'].' '.$thongtin3[$i].'</option>';
			           
			              }
                                             ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    </div>
                                    <?php } ?>    
<?php if($get['thongtin_4'] != null){ ?>


  <div class="col-3">
                                         <label class=" form-control-label"><?=$thongtin4[0];?></label>
                                          <div class="input-group">
                                             <div class="input-group-addon"><i class="ti-dropbox-alt"></i></div>
                                        <?php if($thongtin4[1] == 'input'){ ?>
                                        <input type="text" class="form-control" name="thongtin4" id="thongtin4" />
                                        <?php }elseif($thongtin4[1] == 'select'){ ?>
                                            <select name="thongtin4" id="thongtin4" class="form-control">
                                             <?php 
                        for($i = 2; $i < $count_info4; $i++){
			            echo '<option value="'.$thongtin4[$i].'">'.$thongtin4[0].' '.$thongtin4[$i].'</option>';
			           
			              }
                                             ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                    </div>
                                    <?php } ?>                                        