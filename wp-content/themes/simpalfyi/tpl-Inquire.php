<?php
/*
 Template Name: Inquire-Page
*/
get_header();
?>

<style type="text/css">
    .bannerText{
        padding: 0px 220px;
        margin-top: 0px;
    }
    .bannerText h2{
        color: #FFFFFF;
        font-size: 1.6rem;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: 3px;
        font-family: "Poppins", Sans-serif;
    }
    .bannerText p{
        display: block;
        color: #FFFFFF;
        font-size: 2.8rem;
        font-weight: 200;
        line-height: 1.3em;
        letter-spacing: 2px;
    }
    .top-heading{
        color: #333;
        text-align: center;
        font-size: 32px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: "Poppins", Sans-serif;
        padding: 20px 20px 20px 20px;
    }
    .top-subheading{
           color: #333;
        text-align: center;
        font-size: 20px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: "Poppins", Sans-serif;
        padding: 20px 20px 0px 20px;
    }
    hr.solid {
      border-top: 3px solid #2A7818;
      width: 10%;
    }
    .recuiter-head{
        color: #2A7818;
        text-align: center;
        font-size: 32px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-family: "Poppins", Sans-serif;
        padding: 5px 20px 0px 20px;
    }
    .recuiter-subhead{
       color: #333;
        text-align: center !important;
        font-size: 20px;
        font-weight: 500;
        text-transform: capitalize;
        letter-spacing: 1px;
        font-family: "Poppins", Sans-serif;
        padding: 0px 0px 0px 0px;
        margin: 5px;
    }
    .top-section{
        padding: 10px 10px;
        text-align: center;
    }
    .custom-width1{
        width: 170px;
        display: inline-block;
    }
    .custom-width2{
        width: 270px;
        display: inline-block;
    }
    .custom-border{
        border-bottom: 1px solid #000;
    }
    marquee {
        background: #e6e1e1;
    }
    .banner-image{
        width: 100% !important;
        height: 430px;
        object-fit: cover;
    }
    /* hide footer for enquire page */
    .page-id-6319 #FooterImportantLinks , .page-id-6319  .elementor-element-996f218{
        display:none;
    }
    .mainMenu,.btnSearch ,.boxApplyNow  {
        display: none;
    }
    .register-form{
        margin-top: 150px;
    }
    /*section.elementor-element.elementor-element-e1a8694.elementor-section-content-middle.mainHeader.elementor-section-boxed.elementor-section-height-default.elementor-section-height-default.elementor-section.elementor-top-section {
        display: none;
    }*/
    /* Mobile */
    @media (max-width: 767px) {
        .register-form{
            margin-top: 100px;
        }
        .bannerText {
            padding: 0px 20px;
        }
        .top-section {
            padding: 10px 20px;
        }

        .custom-width1{
                width: 95px;
            display: inline-block;
        }
        .custom-width2{
            width: 165px;
            display: inline-block;
        }
        .top-heading{
            font-size: 24px;
        }
        .recuiter-head{
            font-size: 20px;
        }
        .recuiter-subhead {
            font-size: 12px;
        }
        .banner-image{
            height: 160px;
        }
        .mainMenu,.btnSearch ,.boxApplyNow  {
            display: none;
        }
        .mainLogo {
            top: 0px;
            position: fixed !important;
            background-color: #FFF;
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }
    }
    /* Ipad */
    @media only screen 
    and (min-device-width : 768px) 
    and (max-device-width : 1024px)  { 
        .bannerText {
            padding: 0px 80px;
            margin-top: -180px;
        }
        .top-section {
            padding: 10px 20px;
        }

        .custom-width1{
                width: 150px;
            display: inline-block;
        }
        .custom-width2{
            width: 250px;
            display: inline-block;
        }
    }
     /* Ipad PRO*/
    @media only screen 
      and (min-width: 1024px) 
      and (max-height: 1366px) 
      and (-webkit-min-device-pixel-ratio: 1.5) {
        .bannerText {
            padding: 0px 80px;
            margin-top: -280px;
        }
        .top-section {
            padding: 10px 20px;
        }
        .custom-width1{
                width: 140px;
            display: inline-block;
        }
        .custom-width2{
            width: 260px;
            display: inline-block;
        }
    }
    
</style>


<div class="container register-form form-group">

    
    <div class="row" style="box-shadow: 0px 3px 30px -8px rgba(0, 0, 0, 0.2); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s; margin: 0px 0px 50px 0px; ">

        <div class="col-md-1"></div>
        <div class="col-md-10" style="padding: 20px 0px 40px 0px;">
            <!-- <div style="text-align: center;">
                <img class="cut-logo" src="https://renaissance.ac.in/wp-content/uploads/2020/01/logo.png">
            </div> -->
            <h2 style="padding: 25px 20px 30px 20px;" class="top-heading">
                ENQUIRE NOW 
            </h2>

            <?php echo do_shortcode( '[quform id="4" name="INQUIRE NOW FORM"]' );?>
        </div>
        <div class="col-md-1"></div>

    </div>

</div>


<div class="property-mobile">
    <marquee>
        <div class="custom-width1">
            <h4 class="recuiter-head"> 350 + </h4>
            <p class="recuiter-subhead">recruiters</p>
        </div>

        <div class="custom-width1">
            <h4 class="recuiter-head"> 75 + </h4>
            <p class="recuiter-subhead">courses</p>
        </div>

        <div class="custom-width1">
            <h4 class="recuiter-head">10000 +</h4>
            <p class="recuiter-subhead">alumni</p>
        </div>

        <div class="custom-width1">
            <h4 class="recuiter-head"> 200 +</h4>
            <p class="recuiter-subhead">faculty</p>
        </div>

        <div class="custom-width2">
            <h4 class="recuiter-head"> 100 +</h4>
            <p class="recuiter-subhead">global placements</p>
        </div>

        <div class="custom-width2">
            <h4 class="recuiter-head"> 95%</h4>
            <p class="recuiter-subhead">placement records</p>
        </div>

        <div class="custom-width2">
            <h4 class="recuiter-head"> 20 + </h4>
            <p class="recuiter-subhead">international collaborations</p>
        </div>
        
    </marquee>
</div>

  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<?php
//get_footer();
?>
