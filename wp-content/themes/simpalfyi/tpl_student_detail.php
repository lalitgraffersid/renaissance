<?php
/*
 Template Name: Student Detils
*/
//get_header();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
    ============================================ -->
    
    <!-- Google Fonts
    ============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/bootstrap.min.css">
    <!-- Bootstrap CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/font-awesome.min.css">
    <!-- owl.carousel CSS
    ============================================ -->
    <!-- <link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/data_table/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/data_table/css/owl.theme.css">
    <link rel="stylesheet" href="<?php //echo get_template_directory_uri(); ?>/data_table/css/owl.transitions.css"> -->
    <!-- animate CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/animate.css">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/normalize.css">
    <!-- meanmenu icon CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/meanmenu.min.css">
    <!-- main CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/main.css">
    <!-- educate icon CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/educate-custon-icon.css">
    <!-- morrisjs CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/calendar/fullcalendar.print.min.css">
    <!-- x-editor CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/editor/select2.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/editor/x-editor-style.css">
    <!-- normalize CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/data-table/bootstrap-editable.css">
    <!-- style CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/style.css">
    <!-- responsive CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/data_table/css/responsive.css">
    <!-- modernizr JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="sparkline13-list">
<div class="sparkline13-hd">
    <div class="main-sparkline13-hd">
        <h1>Student <span class="table-project-n">Details</span> Table</h1>
    </div>
</div>
<div class="sparkline13-graph">
    <div class="datatable-dashv1-list custom-datatable-overright">
        <div id="toolbar">
            <select class="form-control dt-tb">
        <option value="">Export Basic</option>
        <option value="all">Export All</option>
        <option value="selected">Export Selected</option>
      </select>
        </div>
        <table class="custom_table" id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
            data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
            <thead>
                <tr>
                    <th data-field='sno'>S.No.</th>
                    <th data-field='id' >User Id</th>
                    <th data-field='first' >First Name</th>
                    <th data-field='last' >Last Name</th>
                    <th data-field='father'>Father Name</th>
                    <th data-field='mothername' >Mother Name</th>
                    <th data-field='parent_number' >Parent Number</th>
                    <th data-field='dob'>Date Of Birth</th>
                    <th data-field='phone' >Contact Number</th>
                     <th data-field='whatsapp' >Contact Whats Number</th>
                     <th data-field='gender' >Gender</th>
                     <th data-field='cast' >Cast</th>
                     <th data-field='pincode' >Pincode</th>
                    <th data-field='email' >Email</th>
                    <th data-field='country_p' >Per. Country</th>
                    <th data-field='state_p' >Per. State</th>
                    <th data-field='city_p' >Per. City</th>
                    <th data-field='per_address' >Per. Address</th>
                    <th data-field='country' >Country</th>
                    <th data-field='state' >State</th>
                    <th data-field='city' >City</th>
                    <th data-field='cuurent_address' >Current Address</th>
                    <th data-field='last_education' >Last Education</th>
                    <th data-field='education_status'>Education Status</th>
                    <th data-field='course_session' >Session</th>
                    <th data-field='course_group' >Course Group</th>
                    <th data-field='inner_course' >Inner Course</th>
                    <th data-field='course_amount' >Course Amount</th>
                    <th data-field='course_fees' >Course Fees</th>
                    <th data-field='payment' >Registration form fees</th>
                    <th data-field='referred_by_name' data-editable='true'>Counseled By</th>
                    <th data-field='paid_by' >Paid by</th>
                    <th data-field='payment_status' >Payment Status</th>
                    <th data-field='remark' >Remark</th>
                    <th data-field='date' >Created Date</th>
                    <th data-field='edit' >Edit</th>
                </tr>
            </thead>
<?php
global $wpdb;

$results = $wpdb->get_results("SELECT * FROM n9dcB_candidate ORDER BY user_id DESC");
//print_r($results);

?>            
            <tbody>
<?php 
    $i=1;
    foreach ( $results as $result ) { 

        if ($result->country_p) {
            $getcountry = $wpdb->get_row("SELECT name FROM n9dcB_countries where id = " . $result->country_p . " ");
            $countryp = $getcountry->name;
            $getstate = $wpdb->get_row("SELECT name FROM n9dcB_state where id = " . $result->state_p . " ");
            $statep = $getstate->name;
            $getcity = $wpdb->get_row(
                "SELECT * FROM  n9dcB_city where id = " . $result->city_p . " ");
            $cityp = $getcity->name;

            $curcountry = $wpdb->get_row("SELECT name FROM n9dcB_countries where id = " . $result->country . " ");
            $countrycur = $curcountry->name;
            $curstate = $wpdb->get_row("SELECT name FROM n9dcB_state where id = " . $result->state . " ");
            $statecur = $curstate->name;
            $curcity = $wpdb->get_row(
                "SELECT * FROM  n9dcB_city where id = " . $result->city . " ");
            $citycur = $curcity->name;
        }else{
            $countryp = "empty" ;
            $statep = "empty" ;
            $cityp = "empty" ;

            $countrycur = $result->country ;
            $statecur = $result->state ;
            $citycur = $result->city ;
    }
?>
    <tr>
        <td><?php echo $i ; ?></td>
        <td><?php echo $result->user_id ; ?></td>
        <td><?php echo $result->firstname ; ?></td>
        <td><?php echo $result->lastname ; ?></td>
        <td><?php echo $result->fathername ; ?></td>
        <td><?php echo $result->mothername ; ?></td>
        <td><?php echo $result->parent_number ; ?></td>
        <td><?php if ($result->dob2) {
            echo $result->dob2 ;
        }else{
            echo $result->dob ;
        }  ?></td>
        <td><?php echo $result->contact_number ; ?></td>
        <td><?php echo $result->contact_whats ; ?></td>
        <td><?php echo $result->gender ; ?></td>
        <td><?php echo $result->cast ; ?></td>
        <td><?php echo $result->pincode ; ?></td>
        <td><?php echo $result->email ; ?></td>
        <td><?php echo $countryp ; ?></td>
        <td><?php echo $statep ; ?></td>
        <td><?php echo $cityp ; ?></td>
        <td><?php echo $result->permanentaddress ; ?></td>
        <td><?php echo $countrycur ; ?></td>
        <td><?php echo $statecur ; ?></td>
        <td><?php echo $citycur ; ?></td>
        <td><?php echo $result->currentaddress ; ?></td>
        <td><?php echo $result->last_education ; ?></td>
        <td><?php echo $result->education_status ;?></td>
        <td><?php echo $result->session ; ?></td>
        <td><?php echo $result->course_group ; ?></td>
        <td><?php echo $result->inner_course ; ?></td>
        <td><?php echo $result->course_amount ; ?></td>
        <td><?php echo $result->course_fees ; ?></td>
        
        <td><?php echo $result->payment_status ; ?></td>
        <td><?php echo $result->referred_by_name ; ?></td>
        <td><?php echo $result->paid_by ; ?></td>
        <td><?php echo $result->payment_by ; ?></td>
        <td><?php echo $result->remark ; ?></td>
        <td><?php echo date('d/m/Y',strtotime($result->created_date)); ?></td> 
        
        <td>
            <a class="btn btn-info btn-block" href="https://renaissance.ac.in/edit-student-details?id=<?php echo $result->user_id ; ?>"> Edit <a/>
        </td>
        
    </tr>
    <?php $i++; } ?>    
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Static Table End -->

    <!-- jquery
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/bootstrap.min.js"></script>
    <!-- wow JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/wow.min.js"></script>
    <!-- price-slider JS
    ============================================ -->
    <!-- <script src="<?php //echo get_template_directory_uri(); ?>/data_table/js/jquery-price-slider.js"></script> -->
    <!-- meanmenu JS
    ============================================ -->
     <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
    ============================================ -->
   <!--  <script src="<?php //echo get_template_directory_uri(); ?>/data_table/js/owl.carousel.min.js"></script> -->
    <!-- sticky JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/metisMenu/metisMenu-active.js"></script>
    <!-- data table JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/tableExport.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/data-table-active.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/data-table/bootstrap-table-export.js"></script>
    <!--  editable JS
    ============================================ -->
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/editable/jquery.mockjax.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/editable/mock-active.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/editable/select2.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/editable/moment.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/editable/bootstrap-datetimepicker.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/editable/bootstrap-editable.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/data_table/js/editable/xediable-active.js"></script>
    <!-- Chart JS
    ============================================ -->
   <!--  <script src="<?php //echo get_template_directory_uri(); ?>/data_table/js/chart/jquery.peity.min.js"></script>
    <script src="<?php //echo get_template_directory_uri(); ?>/data_table/js/peity/peity-active.js"></script> -->
    <!-- tab JS
    ============================================ -->
    <!-- <script src="<?php //echo get_template_directory_uri(); ?>/data_table/js/tab.js"></script> -->
    <!-- plugins JS
    ============================================ -->
   <!--  <script src="<?php //echo get_template_directory_uri(); ?>/data_table/js/plugins.js"></script> -->
    <!-- main JS
    ============================================ -->
    <!-- <script src="<?php //echo get_template_directory_uri(); ?>/data_table/js/main.js"></script> -->
    <!-- tawk chat JS
    ============================================ -->
   
</body>

</html>

<?php
//get_footer();
