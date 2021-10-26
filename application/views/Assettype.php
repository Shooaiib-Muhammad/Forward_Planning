

    <?php
if(!($this->session->has_userdata('user_id'))){
  redirect('login');
}else{
?>


<?php
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


<?php
  $Month=date('m');
$Year=date('Y');
$Day=date('d');
$CurrentDate=$Year.'-'.$Month.'-'.$Day;
?>
<br><br>
<div id="panel-7" class="panel">
                                    <div class="panel-hdr">
                                        <h2>
                                Line Wise  <span class="fw-300"><i>Planning</i></span>
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
                                               
                                                <div class="row">
                                             
                       
                       
     <div class="col-md-2">
                       <label >Plane Date :</label>
                        <div class="form-group-inline">
                            
                            <input name="date" id="plan_date" class="form-control" value="<?php echo $CurrentDate;?>" type="date">
                        </div>
                    </div>
                   
                  
                     <div class="col-md-2">
                    <div class="form-group">
                            <lable class="form-control-label" for="duration">Select MPNo:</lable>
                            
                            <select class="form-control mySelectMatProEdit" name="Type" id="Type">
                             <option value="">Select MPNo :</option>
                               <?php
                                
                                  foreach ($CallMPno as $Key) {
                           
                         ?>

                        <option value="<?php echo $Key['MPID'] ?>" ><?php echo $Key['MPID'] ?></option>
                        <?php
                        }
                       
                  ?>
                            </select>
                        </div>
                        </div>
                           <div class="col-md-2">
                       <label >Article Code :</label>
                        <div class="form-group-inline">
                            
                            <input name="KITName" id="Article" class="form-control" type="text" readonly="true">
                            
                             <input name="ID" id="CID" class="form-control" type="text" hidden="true" >
                             <input name="ID" id="MID" class="form-control" type="text"hidden="true"  >
                             <input name="ID" id="AID" class="form-control" type="text"  hidden="true" >
                        </div>
                    </div>
                       <div class="col-md-2">
                       <label >Size :</label>
                        <div class="form-group-inline">
                            
                            <input name="SR" id="Size" class="form-control" type="text">
                        </div>
                    </div> 
                       <div class="col-md-2">
                       <label >Factory Code:</label>
                        <div class="form-group-inline">
                            
                            <input name="ER" id="factryCode" class="form-control" type="text">
                        </div>
                    </div>
                      <div class="col-md-2">
                       <label >Plan Qty:</label>
                        <div class="form-group-inline">
                            
                            <input name="ER" id="TotalQty" class="form-control" type="text">
                        </div>
                    </div>
                   <div class="col-md-2">
                    <div class="form-group">
                            <lable class="form-control-label" for="duration">Select Line:</lable>
                            
                            <select class="form-control" name="Type" id="LineID">
                             <option value="">Select Line :</option>
                           <?php
                                
                                  foreach ($GetLines as $Key) {
                           
                         ?>

                        <option value="<?php echo $Key['LineID'] ?>" ><?php echo $Key['LineName'] ?></option>
                        <?php
                        }
                       
                  ?>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-2">
                       <label >Qty:</label>
                        <div class="form-group-inline">
                            
                            <input name="ER" id="Quantity" class="form-control" type="text">
                        </div>
                    </div>
                    <div class="col-md-2">
                       <label >Balance:</label>
                        <div class="form-group-inline">
                            
                            <input name="ER" id="balance" class="form-control" type="text">
                        </div>
                    </div>
                     <div class="col-md-3">
                       <label style="background-color: #fff; color: #fff;" >Schedule End Date</label>
                        <div class="form-group-inline">
                            
                             <button class="btn btn-primary" id="enter" >Save</button>
                        </div>
                    </div>
                      
</div>
                   
  <br><br>
<div class="row" >
    <div class="col-md-8" id="Data" >
         <div class="table-responsive-lg">
        <table class="table table-striped table-hover table-sm" id="tableExport">
                                                       <thead style="background-color:black; color:white;">
                                                           
                                                                <th>MP No</th>
                                                                <th>Line Name</th>
                                                                  <th>Plane Date</th>
                                                                <th>Status</th> 
                                                            </thead>
                                                       <tbody >
                    </tbody>
                    </table>
    </div>
</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
   
    
                            </div>
                        </div>
                    </main>
            
                    <?php
        $this->load->view('after-main');
       ?>
      

<script>
    
$(document).ready(function(){
  loadData()
$("#plan_date").change(function() {

            
            loadData()
        });
    $("select[name=Type]").change(function() {

            loadtype()
            loadBalance()
        });
        
        function loadtype(){
//alert("Please select");
            var Type = $("select[name='Type']").val()
            url = "<?php echo base_url("index.php/Linewise/json_by_machine/") ?>" + Type 
            //alert(url);
            $.get(url, function(data){
            
               console.log(data);


                    Article = data[0].ArtCode
                     Size = data[0].ArtSize
                      factryCode = data[0].FactoryCode
                       TotalQty = data[0].TotalQty
                        CID = data[0].ClientID
                      MID = data[0].ModelID
                       AID = data[0].ArtID
                          balance = data[0].Balance
                    // html += '<option value="'+element.SecID+'" >'+element.SecName+'</option>'
//                 alert(Article);
//                 alert(Size);
//                 alert(factryCode);
//                 alert(TotalQty);
// console.log(Article);
// console.log(Size);
// console.log(factryCode);
// console.log(TotalQty);
                $("#Article").val(Article)
                 $("#Size").val(Size)
                    $("#factryCode").val(factryCode)
                       $("#TotalQty").val(TotalQty)
                       $("#CID").val(CID)
                    $("#MID").val(MID)
                       $("#AID").val(AID)
                        $("#balance").val(balance)
            })
        }

 function loadData(){

 let plan_date = document.getElementById('plan_date').value;
  //alert(date1);
            url = "<?php echo base_url("index.php/Linewise/getDataMpData/") ?>" + plan_date
//alert(url);
 $.get(url, function(data) {
 //alert(data);
     $("#Data").html(data)
 });
        }
});
$('#enter').click(function(){
    let plan_date = document.getElementById('plan_date').value;
    let lineID = document.getElementById('LineID').value;
    let MPNo = $("#Type").val();
    let Qty = $('#Quantity').val();
      //let RDate = $("#Rdate").val();
  url = "<?php echo base_url('index.php/Linewise/insertion/') ?>"+ Qty + "/" + MPNo + "/" + lineID + "/" + plan_date
  alert(url);
   $.get(url, function(data){
            
               console.log(data);
location.reload();
            })
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