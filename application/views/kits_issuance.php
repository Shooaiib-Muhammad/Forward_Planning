

    <?php
if(!($this->session->has_userdata('user_id'))){
  redirect('login');
}else{

      $this->load->view('header');
    ?>

<body class="mod-bg-1 ">
        <!-- DOC: script to save and load page settings -->
        <script>
            /**
             *	This script should be placed right after the body tag for fast execution 
             *	Note: the script is written in pure javascript and does not depend on thirdparty library
             **/
            'use strict';

            var classHolder = document.getElementsByTagName("BODY")[0],
                /** 
                 * Load from localstorage
                 **/
                themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
                {},
                themeURL = themeSettings.themeURL || '',
                themeOptions = themeSettings.themeOptions || '';
            /** 
             * Load theme options
             **/
            if (themeSettings.themeOptions)
            {
                classHolder.className = themeSettings.themeOptions;
                console.log("%c✔ Theme settings loaded", "color: #148f32");
            }
            else
            {
                console.log("Heads up! Theme settings is empty or does not exist, loading default settings...");
            }
            if (themeSettings.themeURL && !document.getElementById('mytheme'))
            {
                var cssfile = document.createElement('link');
                cssfile.id = 'mytheme';
                cssfile.rel = 'stylesheet';
                cssfile.href = themeURL;
                document.getElementsByTagName('head')[0].appendChild(cssfile);
            }
            /** 
             * Save to localstorage 
             **/
            var saveSettings = function()
            {
                themeSettings.themeOptions = String(classHolder.className).split(/[^\w-]+/).filter(function(item)
                {
                    return /^(nav|header|mod|display)-/i.test(item);
                }).join(' ');
                if (document.getElementById('mytheme'))
                {
                    themeSettings.themeURL = document.getElementById('mytheme').getAttribute("href");
                };
                localStorage.setItem('themeSettings', JSON.stringify(themeSettings));
            }
            /** 
             * Reset settings
             **/
            var resetSettings = function()
            {
                localStorage.setItem("themeSettings", "");
            }

        </script>
        <!-- BEGIN Page Wrapper -->
        <div class="page-wrapper">
            <div class="page-inner">
                <!-- BEGIN Left Aside -->
                <?php
      $this->load->view('aside');
    ?>
                <!-- END Left Aside -->
                <div class="page-content-wrapper">
                    <!-- BEGIN Page Header -->
                    <?php
      $this->load->view('template');
    ?>
                    <!-- END Page Header -->
                    <!-- BEGIN Page Content -->
                    <!-- the #js-page-content id is needed for some plugins to initialize -->
                    <main id="js-page-content" role="main" class="page-content">
                    <?php
      if($this->session->flashdata('Proinfo')){ 
    
    
      ?>
    <div class="alert alert-danger alert-dismissible show fade" id="msgbox">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      <?php echo $this->session->flashdata('Proinfo');?>
                    </div>
                  </div>
                  <?php
      }

                  ?>
                      
                          <div>
                            <div>
                            
                            <!-- Popup Form Button --> 

<!-- Modal HTML Markup -->
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add/Edit Assets Type </h1>
            </div>
            <div class="modal-body">
                <form name="form" id="myForm" method="POST" action="">
                    <!-- <input type="hidden" name="_token" value=""> -->
                    <div class="form-group" style="display:none;">
                        <label class="control-label">ID</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="project-bid"  name="tid">
                        </div>
                    </div>
              
                    <div class="form-group">
                        <label class="control-label">Asset Type</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="assetName" id="assName" placeholder="Enter Asset Name">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="assetStatus"> Status
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                        <button type="submit" class="btn btn-success" id="saveAssetType" >Save</button>
                        <button type="submit" class="btn btn-success" id="updateAssetType" style="display:none" >Update</button>   

                            <button class="btn btn-success" data-dismiss="modal">Close</button>
                          
                 </div>
                    </div>
                </form>
       
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Delete Asset Type -->
<div class="modal fade" id="ModelDeletetype" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Asset Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete detail of project? (This process is irreversible)
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary btn-confirm-del-type">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>  
    </div>
    </div>
  </div>
</div>


<!-- Modal Delete Asset Type -->
<div class="modal fade" id="ModelDeleteChart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Delete Chart of Asset</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete detail of project? (This process is irreversible)
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-primary btn-confirm-del-chart">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>  
    </div>
    </div>
  </div>
</div>


<div id="ModalAss" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Add / Edit  Charts of Asset</h1>
            </div>
            <div class="modal-body">
                <form name="formChart" id="myformChart" method="POST" action="">
                    <!-- <input type="hidden" name="_token" value=""> -->
                    <div class="form-group" style="display:none;">
                        <label class="control-label">ID</label>
                        <div>
                            <input type="text" class="form-control input-lg" id="project-bid"  name="cid">
                        </div>
                    </div>
                   
                     <div class="form-group">
                     <div>
                     <label for="sel1">Production Type :</label>
                        <select class="form-control" id="sel1" name="assetProdType" >
                        <option value="0" disabled>Select one of the following</option>
                        <option value="1">Production</option>
                             <option value="2">Non Production</option>
                            </select>
                        </div> 
                   </div>
                      <div class="form-group">
                     <div>
                     <label for="sel1">Asset Type :</label>
                        <select class="form-control" id="sel1" name="assetChartType" >
                        <option value="0" disabled>Select one of the following</option>
                        <?php
                                   if (isset($Assettype)) {
                                  foreach ($Assettype as $Key) {
                           
                         ?>

                        <option value="<?php echo $Key['TID'] ?>" ><?php echo $Key['AssertType'] ?></option>
                        <?php
                        }
                       }
                  ?>
    
                            </select>
                        </div> 
                   </div>
                     <div class="form-group">
                        <label class="control-label">Name :</label>
                        <div>
                            <input type="text" class="form-control input-lg" name="assetNameChart" placeholder="Name">
                        </div>
                    </div>
             
                     <div class="form-group">
                        <label class="control-label">UOM: </label>
                        <div>
                            <input type="text" class="form-control input-lg" name="UOM" placeholder="UOM">
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label class="control-label">Password</label>
                        <div>
                            <input type="password" class="form-control input-lg" name="password">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="assetChartStatus"> Status
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                        <button type="submit" class="btn btn-success" id="saveAssetChart" >Save</button>
                        <button type="submit" class="btn btn-success" id="updateAssetChart" style="display:none" >Update</button>   

                            <button class="btn btn-success" data-dismiss="modal">Close</button>
                          
                 </div>
                    </div>
                </form>
       
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
        </div>
<br><br>
<?php
  $Month=date('m');
$Year=date('Y');
$Day=date('d');
$CurrentDate=$Year.'-'.$Month.'-'.$Day;
?>
<div id="exampleModalEditMat"   class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                            Kits  <span class="fw-300"><i>Issuance</i></span>
                                        </h2>
                                        <div class="panel-toolbar">
                                            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                                            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                                            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                                        </div>
                                    </div>
                                    <div class="panel-container show">
                                        <div class="panel-content">
                                            
                                           
                                            <div class="tab-content py-3">
                                                
                                             <div class="row ">
                         <div class="col-sm-1">
                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitch2"  >
                                                                <label class="custom-control-label" for="customSwitch2">Reprint</label>
                                                            </div>
                                           </div>
     <div class="col-md-3">
                       <label >Start Date :</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="date1" class="form-control" type="date" value="<?php echo $CurrentDate;?>" >
                        </div>
                    </div>
                    <div class="col-md-3">
                       <label >End Date</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="date2" class="form-control" type="date" value="<?php echo $CurrentDate;?>" >
                        </div>
                    </div>
                    </div>
                    <div id="poSelectbox" >
                        <div class="row">
                     <div class="col-md-5" >
                       <div class="form-group">
                            <lable class="form-control-label " for="duration">PO Code:</lable>
                            <br>
                           <select class="form-control mySelectMatProEdit" data-live-search="true" searchable="Search here.."  name="PO" id="PO">
                             <option value="">Select Code :</option>
                               
                            </select>
                        </div>
                    </div>
                       <div class="col-md-4">
                       <label >Order Qty:</label>
                        <div class="form-group-inline">
                            
                            <input name="POQty" id="POQty" class="form-control" type="text">
                        </div>
                    </div>
                     <div class="col-md-3">
                       <label >Balance:</label>
                        <div class="form-group-inline">
                            
                            <input name="Balance" id="balance" class="form-control" type="text" readonly>
                        </div>
                    </div>
                    </div>
</div>
                    </div>
                    <br><br>
                    <div class="row"  id="Kitsname">
                     <div class="col-md-2">
                    <div class="form-group">
                            <lable class="form-control-label" for="duration">Kits Name:</lable>
                            <?php
                            //print_r($Kits);
                            ?>
                            <select class="form-control kitsSelectbox" name="duration" id="Kits">
                             <option value="">Select Kits Name :</option>
                                <?php
                                  foreach ($Kits as $Key) {
                         ?>
                        <option value="<?php echo $Key['RecID'] ?>" ><?php echo $Key['SerialNo'] ?></option>
                        <?php
                        }
                  ?>
                            </select>
                        </div>
                        </div>
                           <div class="col-md-1">
                       <label >Quantity:</label>
                        <div class="form-group-inline">
                            
                            <input name="POQty" id="pquantity" class="form-control" type="text">
                        </div>
                    </div>
                       <div class="col-md-1">
                       <label >Westage:</label>
                        <div class="form-group-inline">
                            
                            <input name="SR" id="Westage" class="form-control" type="text" value="0">
                        </div>
                    </div>
                       <div class="col-md-1">
                       <label >Balance:</label>
                        <div class="form-group-inline">
                            
                            <input name="Balance" readonly="readonly"  id="Balance" class="form-control" type="text">
                        </div>
                    </div>
                    <!-- <div class="col-md-2">
                    <div class="form-group">
                            <lable class="form-control-label" for="duration">Received by:</lable>
                            <?php
                            //print_r($Kits);
                            ?>
                            <select class="form-control kitsSelectbox" name="duration" id="Receivedby">
                                <option value="">Select Received by :</option>
                             <option value="658 Ashfa Ahmed">658 / Ashfa Ahmed</option>
                             <option value="4636 Asad Ali">4636 / Asad Ali</option>
                             <option value="1611 Abid Ali">1611 / Abid Ali</option>
                                 <option value="211 Rizwan Akbar">211 / Rizwan Akbar</option>
                            </select>
                        </div>
                        </div> -->
                     <div class="col-md-2">
                       <label >Print Date :</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="issuedate" class="form-control" value="<?php echo $CurrentDate;?>"  type="date">
                        </div>
                    </div>
                     <div class="col-md-2">
                       <label style="background-color: #fff; color: #fff;" >Schedule End Date</label>
                        <div class="form-group-inline">
                            
                             <button class="btn btn-primary" id="searchdata" >Save</button>
                        </div>
                    </div>
                      
</div>
  <br><br>
<div class="row">
     <div class="col-md-12">
    <div class="table-responsive-lg" id="kitsissuance">
                        
                                                
                            </div>
                            </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
    
                            </div>
                        </div>
                        </div>
                    </main>
            </div>
                    <?php
        $this->load->view('after-main');
       ?>
    

<script>
    
     $("#customSwitch2").change(function(e) {

     });
$(document).ready(function(){
    loadData()
       $("#date1").change(function(e) {
//alert('Heloo');
loadPO()
loadData()
     });
 $("#date2").change(function(e) {
//alert('Heloo');
loadPO()
loadData()
     });
     $("#Kits").change(function(e) {
//alert('Heloo');
var PoCode = $("#PoCode").val(); 
//alert(PoCode);
  url = "<?php echo base_url("index.php/Kitsissuance/json_by_machine/") ?>" + PoCode  
  //alert(url);      
 $.get(url, function(data) {
 html = data[0].OrderQty
console.log(html);
                $("#pquantity").val(html)
 });
loadbalance()
     });
      function loadData(){
          //alert('Heloo');
          var date1 =  $("#date1").val()
    var date2 = $("#date2").val()
            url = "<?php echo base_url("index.php/Kitsissuance/getkitsissuance/") ?>" + date1 + "/" + date2 
           // alert(url);
 $.get(url, function(data) {
     $("#kitsissuance").html(data)
 });
      }
  function   loadbalance(){
      //alert('I am here');
          var Kits =  $("#Kits").val()
            url = "<?php echo base_url("index.php/Kitsissuance/json_by_machine_balance/") ?>" + Kits 
             //alert(url);       
 $.get(url, function(data) {
 html = data[0].AvailableBalance
console.log(html);
                $("#Balance").val(html)
 });
        }
     function loadPO(){
         //alert('Heloo');
  var date1 =  $("#date1").val()
    var date2 = $("#date2").val()
            url = "<?php echo base_url("index.php/Kitsissuance/getPO/") ?>" + date1 + "/" + date2 
             //alert(url);
 $.get(url, function(data) {
     $("#poSelectbox").html(data)
 });
        }

         $('.kitsSelectbox').select2(
        {
  dropdownParent: $('#Kitsname')
}
    );
    $('#searchdata').click(function(){
        //alert("heloo");
     var PO = $("#PoCode").val();
  var   KitsiD =$("#Kits").val();
    var pquantity = $("#pquantity").val();
    var issuedate = $('#issuedate').val();
     var  westage = $("#Westage").val();
      var  Balance = $("#Balance").val();
       //var  Receivedby = $("#Receivedby").val();
      //ar replaced = Receivedby.replace("%20", " ");
      var Status 
      if ($('#customSwitch2').is(":checked"))
{
  Status=1;
}
else{
    Status=0;
}
      
    //alert(normal);
    //alert(reprint);
    // if(Balance < pquantity){

    //     alert("Kits Quantity is Greater then Balance")
    // }else{
        //alert("i am here");
if(PO==null){
         alert("Please select PO Code")
     }else if(KitsiD==null){
         alert("Please select Kit")
        }else if(issuedate==null){
         alert("Please select PO issue date")
        }else{
url = "<?php echo base_url('index.php/kitsissuance/insert_data/') ?>"+ PO + "/" + KitsiD + "/" + pquantity + "/" + issuedate  + "/" + westage  + "/" + Status   
  //alert(url);
   $.get(url, function(data){
            
              //loadData()
              location.reload();
            })
     }
    
     
    //  alert(PO);
    //  alert(KitsiD);
    //  alert(pquantity);
    //  alert(issuedate);
    //  alert(westage);

  
  });
});


</script>


<?php
        $this->load->view('Foter');
       ?>
</body>
</html>
<?php

}

?>