<?php
/*
 Template Name: Register-From
*/
get_header();
?>

<div class="container register-form form-group">
	
<div class="row" style="box-shadow: 0px 3px 30px -8px rgba(0, 0, 0, 0.2); transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s; margin: 250px 0px 50px 0px; ">
<div class="col-md-1"></div>
<div class="col-md-10" style="padding: 40px 0px 40px 0px;">

<form id="productform" method="post" action="https://renaissance.ac.in/paytm-pages/">
<h2 style="padding: 0px 20px 35px 20px;color: #333;
    text-align: center;
    font-size: 32px;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 1px;"
     class="top-heading">
    Registration Form  
</h2>
<h5 class="title">Fullname of Student (required)</h5>
<div class="row">
    <div class=" col-md-6">
      <input class="half_width padding" placeholder="Fullname" type="text" name="firstname" required="required" />
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-6">
        <h5 class="title">Date Of Birth (required)</h5>
        <input class="half_width padding" placeholder="Ex: DD-MM-YYYY" type="date" name="dob2" />
    </div>
    <div class="col-md-6">
         <h5 class="title">Gender (required)</h5>
         <input type="radio" name="gender" value="male" checked> Male
         <input type="radio" name="gender" value="female"> Female
    </div>
</div>
<br>

<h5 class="title">Contact Number(required)</h5>
<div class="row">
    <div class=" col-md-6">
        <input class="half_width padding" placeholder="Contact Number" type="number" name="contact_number" required="required"/>
    </div>
</div>
<br>

<div class="row">
    <div class=" col-md-12 address">
        <label> 
            <input type="checkbox" name="whatsappCheckbox"
                   value="whats"> Check If your WhatsApp contact number same as contact number
        </label> 
    </div>
</div>

<div class="whats">
    <h5 class="title">Contact WhatsApp No. (required)</h5>
  <div class="row">
    <div class="col-md-6 address">
         <input class="half_width padding" placeholder="WhatsApp Contact Number" type="number" name="contact_whats" required="required"/>
    </div>
  </div>
    <br>
</div> 
<br>

<div class="row">
    <div class=" col-md-6">
        <h5 class="title">Your Email (required)</h5>
        <input class="half_width padding" placeholder="Email" type="email" name="email" />
    </div>
    <div class=" col-md-6 address">
        <h5 class="title">Category cast (required)</h5>
        <select name="cast" required="required" class="half_width padding">
            <option value="">  Select Cast </option>
            <option value="general">  General </option>
            <option value="obc">  OBC </option>
            <option value="st">  ST </option>
            <option value="sc">  SC </option>
        </select>
    </div>
</div>
<br>

<div class="row">
    <div class="col-md-6">
        <h5 class="title">Father Name (required)</h5>
        <input class="half_width padding" placeholder="Father Name" type="text" name="fathername" />
    </div>
    <div class="col-md-6">
        <h5 class="title">Mother Name (required)</h5>
        <input class="half_width padding" placeholder="Mother Name" type="text" name="mothername" />
    </div>
</div>
<br>

<h5 class="title">Parents contact Number (required)</h5>
<div class="row">
    <div class="col-md-6">
        <input class="half_width padding" placeholder="Please Enter Number" type="number" name="parent_number" required="required" />
    </div>
</div>
<br>

<h5 class="title">Address (required)</h5>
<div class="row">
<div class="col-md-4 address">
    <select name="country_p" class="padding full_width" id="country-dropdown">
        <option value="">Select Country</option>
        <?php
        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM n9dcB_countries");
        $i=0;
        foreach ($result as $row)
        {
        ?>
        <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
        <?php 
        $i++; 
    } ?>
    </select>

</div>

<div class=" col-md-4 address">
    <select class="padding full_width" id="state-dropdown" name="state_p">
        <option>First Select Country</option>
    </select>
</div>

<div class=" col-md-4 address">
    <select class="padding full_width" id="city-dropdown" name="city_p">
        <option>First Select State</option>
    </select>
</div>
</div>

<div class="row">
    <div class="col-md-9">
        <h5 class="title">Full Address (required)</h5>
        <textarea class="full_width padding" placeholder="Please Enter Full Permanent Address" name="permanentaddress"></textarea>
    </div>
    <div class="col-md-3">
        <h5 class="title">Pin Code (required)</h5>
        <input class="half_width padding" placeholder="Pin Code" type="text" name="pincode" />
    </div>
</div>
<br>


<h5 class="title">Current Education (required)</h5>
<div class="row">
<div class="col-md-6">
  <select class="half_width padding" name="last_education" >
    <option value="12th">12th</option> 
    <option value="Graduation">Graduation</option>
    <option value="Post_Graduation">Post Graduation</option>   
  </select>
</div>
<div class=" col-md-6">
   <select class="half_width padding" name="education_status" >
    <option value="completed">Completed</option>
    <option value="pursuing">Pursuing</option>
  </select>
</div>
</div>
<br>

<h5 class="title">Session (required)</h5>
<div class="row">
    <div class=" col-md-6">
        <select class="half_width padding" name="session" required="required">
            <option value="Nothing">Select Session</option>
            <option value="2022">2022</option>
          </select>
    </div>
</div>
<br>

<h5 class="title">Select Course (required)</h5>
<div class="row">
    <div class="col-md-4">
      <select class="half_width padding" name="course_group" id="course"  onchange="myFunction()" style='width: 100%;'>
        <option>Select Course Category</option>
        <option value="SCHOOL-OF-MANAGEMENT">SCHOOL OF MANAGEMENT</option>
        <option value="SCHOOL-OF-FASHION">SCHOOL OF FASHION</option>
        <option value="SCHOOL-OF-SCIENCE">SCHOOL OF SCIENCE</option>  
        <option value="SCHOOL-OF-AGRICULTURE">SCHOOL OF AGRICULTURE</option>  
        <option value="SCHOOL-OF-SOCIAL-SCIENCE">SCHOOL OF SOCIAL SCIENCE</option>  
        <option value="SCHOOL-OF-COMMERCE">SCHOOL OF COMMERCE</option>  
        <option value="SCHOOL-OF-LAW">SCHOOL OF LAW</option>  
        <option value="SCHOOL-OF-JOURNALISM">SCHOOL OF JOURNALISM</option>  
        <option value="SCHOOL-OF-LIBRARY-SCIENCE">SCHOOL OF LIBRARY SCIENCE</option>  
        <option value="SCHOOL-OF-PERFORMING-ARTS">SCHOOL OF PERFORMING ARTS</option>
        <option value="SCHOOL-OF-NURSING">SCHOOL OF NURSING</option>
        <option value="SCHOOL-OF-RESEARCH">SCHOOL OF RESEARCH</option>
        <option value="SCHOOL-OF-HOTEL-MANAGEMET">SCHOOL OF HOTEL MANAGEMET</option>
      </select>
    </div>

    <!-- Inner Courses Drop Down -->
    <div class="col-md-4">
      <select class="half_width padding inner_course" name="inner_course"  id="inner_course" style='width: 100%;'>
        <option style="font-size: 16px; font-weight: 900;" value="">Select Course</option> 
      </select>
    </div>

    <!-- Course Amount -->
    <div class="col-md-4">
        <div id="price_filed" style="text-align:center;">
            <input class="submit_price padding course-price-style" type="text" name="course_fees" value="Course Fee-" readonly />
        </div>
    </div>

</div>
<br>

<h5 class="title">Counseled by (required)</h5>
<div class="row">
    <div class=" col-md-6">
        <input class="half_width padding" placeholder="Enter Name Teacher/Mentor" type="text" name="referred_by_name" />
    </div>
</div>
<br>

<div id="price_button" style="text-align:center;" class="col-md-12">
<input  class="submit_button" type="submit" name="register" value="Pay Registration Fee-" />
<br><br>
</div>

</form>
</div>
<div class="col-md-1"></div>
</div>
</div>
  
<script>

function myFunction() {
    var x = document.getElementById("course").value;

    if(x == 'SCHOOL-OF-MANAGEMENT')
    {
        document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<br> <option value='MBA,2 years'>MBA,2 years</option>"+"<br> <option value='MBA(Hospital administration),2 years'>MBA(Hospital administration),2 years</option>"+"<br> <option value='MBA+PGP(Business Analytics),2-years'>MBA+PGP (Business Analytics),2 years</option>"+"<br> <option value='BBA (Hons.),3 years'>BBA (Hons.), 4 years with internship</option>"+"<br> <option value='BBA,3 years With Adv Certification'>BBA, 3 years With Adv Certification</option>"+"<br> <option value='BBA 3 years with internship'>BBA 3 years with internship</option>"+"<br> <option value='BBA(Hons)+MBA(IPM),5 years'> BBA+ MBA(IPM) 5 years with internship</option>"+"<br> <option value='PGDM Tricity,2 years'>PGDM Tricity,2 years</option>"+"<br> <option value='PGDM International,2 years'>PGDM International,2 years</option>";
    }
    else if(x == 'SCHOOL-OF-FASHION')
    {
        document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='B.Design (Fashion Technology and Accessory design),4 years'>B.Design (Fashion Technology and Accessory design),4 years</option>"+"<br> <option value='Advance diploma in fashion design,3 years'>Advance diploma in fashion design,3 years</option>"+"<br> <option value='Diploma in fashion design,2 years'>Diploma in fashion design,2 years</option>"+"<br> <option value='Certificate Program in FD,1 years'>Certificate Program in FD,1 years</option>"+"<br> <option value='Master in Fashion Management,2 years'>Master in Fashion Management,2 years</option>"+"<br> <option value='M. Design,2 years'>M. Design,2 years</option>";
    }
    else if(x == 'SCHOOL-OF-SCIENCE')
    {
        document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='B.Sc. (Biotechnology),3 years'>B.Sc. (Biotechnology),3 years</option>"+"<br> <option value='B.SC. Plain,3 years'>B.SC. Plain,3 years</option>"+"<br> <option value='B.Sc.(Hons) + M.Sc. Integrated Computer sience,5 years'>B.Sc.(Hons) + M.Sc. Integrated Computer sience,5 years</option>"+"<br> <option value='B.Sc.(Hons) + M.Sc. Integrated Big Data Analysis,5 years'>B.Sc.(Hons) + M.Sc. Integrated Big Data Analysis,5 years</option>"+"<br> <option value='B.Sc. Forensic science,3 years'>B.Sc. Forensic science,3 years</option>"+"<br> <option value='B.Sc. Animation and multimedia,3 years'>B.Sc. Animation and multimedia,3 years</option>"+"<br> <option value='MCA,2 years'>MCA,2 years</option>"+"<br> <option value='BCA,3 years'>BCA,3 years</option>"+"<br> <option value='M.Sc. Food Technology,2 years'>M.Sc. Food Technology,2 years</option>"+"<br> <option value='M.SC. Computer science,2 years'>M.SC. Computer science,2 years</option>"+"<br> <option value='M.SC. Plain,2 years'>M.SC. Plain,2 years</option>"+"<br> <option value='PGDCA, 1 year'>PGDCA, 1 year</option>";
    }
    else if(x == 'SCHOOL-OF-AGRICULTURE') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='B.Sc. (Agriculture),4 years'>B.Sc. (Agriculture),4 years</option>"+"<br> <option value='M.Sc. (Agriculture),2 years'>M.Sc. (Agriculture),2 years</option>";
    }
    else if(x == 'SCHOOL-OF-SOCIAL-SCIENCE') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='B.A. (Public Administration),3 years'>B.A. (Public Administration),3 years</option>"+"<br> <option value='B.A. (Psychology),3 years'>B.A. (Psychology),3 years</option>"+"<br>  <option value='B.A. (applied economics),3 years'>B.A. (applied economics),3 years</option>"+"<br> <option value='M.A. (Psychology),2 years'>M.A. (Psychology),2 years</option>"+"<br> <option value='MAPA ,2 years'>MAPA,2 years</option>";
    }
    else if(x == 'SCHOOL-OF-COMMERCE') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<br><option value='B.com Hons,4 years'>B.com Hons,4 years</option>"+"<br><option value='B.com (Adv. Certification in BA and Digital Marketing) 3 years'>B.com (Adv. Certification in BA and Digital Marketing) 3 years</option>"+"<br><option value='B.com Plain,3 years'>B.com Plain,3 years</option>"+"<br><option value='B.com Management,3 years'>B.com Management,3 years</option>"+"<br><option value='B.com Tax,3 years'>B.com Tax,3 years</option>"+"<br><option value='B.com Foreign Trade,3 years'>B.com Foreign Trade,3 years</option>"+"<br><option value='B.com sales and advertising,3 years'>B.com Sales And Advertising,3 years</option>"+"<br><option value='B.com Computer Application,3 years'>B.com Computer Application,3 years</option>";
    }
    else if(x == 'SCHOOL-OF-LAW') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='LLB,3 years'>LLB,3 years</option>"+"<br> <option value='LLM Criminology'>LLM Criminology</option>"+"<br> <option value='LLM Corporate Law'>LLM Corporate Law</option>"+"<br> <option value='LLM IPR'>LLM IPR</option>"+"<br> <option value='LLM Constitutional Law'>LLM Constitutional Law</option>";
    }
    else if(x == 'SCHOOL-OF-JOURNALISM') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='B.A. Hons. in Mass Communication,3 years'>B.A. Hons. in Mass Communication, 3 years</option>"+"<br> <option value='Bachelors of Journalism,1 year'>Bachelors of Journalism,1 year</option>"+"<br> <option value='Masters of Journalism,1 years'>Masters of Journalism,1 year</option>";
    }
    else if(x == 'SCHOOL-OF-LIBRARY-SCIENCE') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='B.Lib,1 years'>B.Lib,1 years</option>"+"<br> <option value='M.Lib., 1 years'>M.Lib., 1 years</option>";
    }
    else if(x == 'SCHOOL-OF-PERFORMING-ARTS') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='Diploma in Acting,15 month'>Diploma in Acting,15 month</option>";
    }
    else if(x == 'SCHOOL-OF-NURSING') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='General Nursing and Midwifery (GNM), 3 years'>General Nursing and Midwifery (GNM), 3 years</option>"+"<br> <option value='BSC Nursing, 4 years'>BSC Nursing, 4 years</option>"+"<br> <option value='Bachelors in Physiotherapy, 4 years'>Bachelors in Physiotherapy, 4 years</option>";
    }
    else if(x == 'SCHOOL-OF-RESEARCH') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='PHD in Law, 3 years'>PHD in Law, 3 years</option>"+"<br> <option value='PHD in Management, 3 years'>PHD in Management, 3 years</option>"+"<br> <option value='PHD in Commerce, 3 years'>PHD in Commerce, 3 years</option>"+"<option value='PHD in Fashion, 3 years'>PHD in Fashion, 3 years</option>"+"<br> <option value='PHD in Agriculture, 3 years'>PHD in Agriculture, 3 years</option>"+"<br> <option value='PHD in Computer Science, 3 years'>PHD in Computer Science, 3 years</option>"+"<br> <option value='PHD in Journalism, 3 years'>PHD in Journalism, 3 years</option>";
    }
    else if(x == 'SCHOOL-OF-HOTEL-MANAGEMET') {
    document.getElementById("inner_course").innerHTML = "<option value='Select-Course'>Select Course</option>"+"<option value='Bachelors in Hotel Management, 3 years'>Bachelors in Hotel Management, 3 years</option>";
    }
}
</script>

<script>
    jQuery(document).on('change','#inner_course',function(){
    var selected_course = jQuery(this).val();


    if (selected_course == 'MBA,2 years')
    {
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-68,000/- Year'  readonly/>";
    }
    else if (selected_course == 'MBA(Hospital administration),2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-68,000/- Year' readonly/>";
    }
    else if (selected_course == 'MBA+PGP(Business Analytics),2-years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-2,75,000/- Year' readonly/>";
    }
    else if (selected_course == 'BBA (Hons.),3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-75,000/- Year' readonly/>";
    }
    else if (selected_course == 'BBA,3 years With Adv Certification'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-75,000/- Year' readonly/>";
    }
    else if (selected_course == 'BBA 3 years with internship'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-75,000/- Year' readonly/>";
    }
    else if (selected_course == 'BBA(Hons)+MBA(IPM),5 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-75,000/- Year' readonly/>";
    }
    else if (selected_course == 'PGDM Tricity,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-1,80,000/- Year' readonly/>";
    }
    else if (selected_course == 'PGDM International,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-3,25,000/- Year' readonly/>";
    }


    else if (selected_course == 'B.Design (Fashion Technology and Accessory design),4 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-1,30,000/- Year' readonly/>";
    }
    else if (selected_course == 'Advance diploma in fashion design,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-1,30,000/- Year' readonly/>";
    }
    else if (selected_course == 'Diploma in fashion design,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-1,30,000/- Year' readonly/>";
    }
    else if (selected_course == 'Certificate Program in FD,1 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-1,30,000/- Year' readonly/>";
    }
    else if (selected_course == 'Master in Fashion Management,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-60,000/- Year' readonly/>";
    }
    else if (selected_course == 'M. Design,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-60,000/- Year' readonly/>";
    }


    else if (selected_course == 'B.Sc. (Biotechnology),3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-55,000/- Year' readonly/>";
    }
    else if (selected_course == 'B.SC. Plain,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly/>";
    }
    else if (selected_course == 'B.Sc.(Hons) + M.Sc. Integrated Computer sience,5 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-35,000/- Year' readonly/>";
    }
    else if (selected_course == 'B.Sc.(Hons) + M.Sc. Integrated Big Data Analysis,5 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-40,000/- Year' readonly/>";
    }
    else if (selected_course == 'B.Sc. Forensic science,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-60,000/- Year' readonly/>";
    }
    else if (selected_course == 'B.Sc. Animation and multimedia,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-75,000/- Year' readonly/>";
    }
    else if (selected_course == 'MCA,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-65,000/- Year' readonly/>";
    }
    else if (selected_course == 'BCA,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-40,000/- Year' readonly/>";
    }
    else if (selected_course == 'M.Sc. Food Technology,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-40,000/- Year' readonly/>";
    }
    else if (selected_course == 'M.SC. Computer science,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-35,000/- Year' readonly/>";
    }
    else if (selected_course == 'M.SC. Plain,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly/>";
    }
    else if (selected_course == 'PGDCA, 1 year'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly/>";
    }

    else if (selected_course == 'B.Sc. (Agriculture),4 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-60,000/- Year' readonly/>";
    }
    else if (selected_course == 'M.Sc. (Agriculture),2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly/>";
    }

    else if (selected_course == 'B.A. (Public Administration),3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-1,00,000/- Year' readonly/>";
    }
    else if (selected_course == 'B.A. (Psychology),3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-60,000/- Year' readonly/>";
    }
    else if (selected_course == 'B.A. (applied economics),3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-60,000/- Year' readonly />";
    }
    else if (selected_course == 'M.A. (Psychology),2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly />";
    }
    else if (selected_course == 'MAPA ,2 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly />";
    }

    else if (selected_course == 'B.com Hons,4 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-45,000/- Year' readonly />";
    }
    else if (selected_course == 'B.com Plain,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-20,000/- Year' readonly />";
    }
    else if (selected_course == 'B.com (Adv. Certification in BA and Digital Marketing) 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-45,000/- Year' readonly />";
    }
    else if (selected_course == 'B.com Management,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly />";
    }
    else if (selected_course == 'B.com Tax,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly />";
    }
    else if (selected_course == 'B.com Foreign Trade,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly />";
    }
    else if (selected_course == 'B.com sales and advertising,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly />";
    }
    else if (selected_course == 'B.com Computer Application,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-25,000/- Year' readonly />";
    }
    


    else if (selected_course == 'LLB,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-35,000/- Year' readonly />";
    }
    else if (selected_course == 'LLM Criminology'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-50,000/- Year' readonly />";
    }
    else if (selected_course == 'LLM Corporate Law'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-50,000/- Year' readonly />";
    }
    else if (selected_course == 'LLM IPR'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-50,000/- Year' readonly />";
    }
    else if (selected_course == 'LLM Constitutional Law'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-50,000/- Year' readonly />";
    }

    else if (selected_course == 'B.A. Hons. in Mass Communication,3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-55,000/- Year' readonly/>";
    }
    else if (selected_course == 'Bachelors of Journalism,1 year'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-20,000/- Year' readonly/>";
    }
    else if (selected_course == 'Masters of Journalism,1 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-20,000/- Year' readonly/>";
    }

    else if (selected_course == 'B.Lib,1 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-20,000/- Year' readonly/>";
    }
    else if (selected_course == 'M.Lib., 1 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-20,000/- Year' readonly/>";
    }


    else if (selected_course == 'Diploma in Acting,15 month'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-1,00,000/- Year' readonly/>";
    }


    else if (selected_course == 'General Nursing and Midwifery (GNM), 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-55,000/- Year' readonly />";
    }
    else if (selected_course == 'BSC Nursing, 4 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price course-price-style padding' type='text' name='course_fees' value='Course Fee-90,000/- Year' readonly />";
    }
    else if (selected_course == 'Bachelors in Physiotherapy, 4 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price course-price-style padding' type='text' name='course_fees' value='Course Fee-60,000/- Year' readonly />";
    }


    else if (selected_course == 'PHD in Law, Management, Commerce,Agriculture, Fashion , Computer Science, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly />";
    }

    else if (selected_course == 'Bachelors in Hotel Management, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price course-price-style padding' type='text' name='course_fees' value='Course Fee-1,00,000/- Year' readonly />";
    }


    else if (selected_course == 'PHD in Law, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly />";
    }
    else if (selected_course == 'PHD in Management, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly />";
    }
    else if (selected_course == 'PHD in Commerce, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly/>";
    }
    else if (selected_course == 'PHD in Fashion, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly/>";
    }
    else if (selected_course == 'PHD in Agriculture, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly/>";
    }
    else if (selected_course == 'PHD in Computer Science, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly/>";
    }
    else if (selected_course == 'PHD in Journalism, 3 years'){
        document.getElementById("price_filed").innerHTML="<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee-80,000/- Year' readonly/>";
    }

    else{
        document.getElementById("price_filed").innerHTML = "<input class='submit_price padding course-price-style' type='text' name='course_fees' value='Course Fee' readonly />";
    }
});
</script> 

<script>
    jQuery(document).on('change','#inner_course',function(){
    var selected_course = jQuery(this).val();
    if (selected_course == 'PHD in Law, 3 years')
    {
        document.getElementById("price_button").innerHTML="<input class='submit_button' type='submit' name='register' value='Registration fee-1000'/>";
    }
    else if (selected_course == 'PHD in Management, 3 years'){
        document.getElementById("price_button").innerHTML="<input class='submit_button' type='submit' name='register' value='Registration fee-1000'/>";
    }
    else if (selected_course == 'PHD in Commerce, 3 years'){
        document.getElementById("price_button").innerHTML="<input class='submit_button' type='submit' name='register' value='Registration fee-1000'/>";
    }
    else if (selected_course == 'PHD in Fashion, 3 years'){
        document.getElementById("price_button").innerHTML="<input class='submit_button' type='submit' name='register' value='Registration fee-1000'/>";
    }
    else if (selected_course == 'PHD in Agriculture, 3 years'){
        document.getElementById("price_button").innerHTML="<input class='submit_button' type='submit' name='register' value='Registration fee-1000'/>";
    }
    else if (selected_course == 'PHD in Computer Science, 3 years'){
        document.getElementById("price_button").innerHTML="<input class='submit_button' type='submit' name='register' value='Registration fee-1000'/>";
    }
    else if (selected_course == 'PHD in Journalism, 3 years'){
        document.getElementById("price_button").innerHTML="<input class='submit_button' type='submit' name='register' value='Registration fee-1000'/>";
    }
    else{
        document.getElementById("price_button").innerHTML = "<input  class='submit_button' type='submit' name='register' value='Registration fee-350'/>";
    }
});
</script> 

<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
<script>
  $(document).ready(function() {
    $("#productform").validate({
        rules: {
            firstname: "required",
            fathername: "required",
            contact_number: {
                required: true,
                minlength: 10,
                number: true
            },
            email: {
                required: true,
                email: true
            },
            country_p: "required",
            state_p: "required",
            city_p: "required",
            referred_by_name: "required",
            inner_course: {
                required: true,
            }
        },
        messages: {
            firstname: "Please enter your firstname",
            fathername: "Please enter your fathername",
            mothername: "Please enter your mothername",
            permanentaddress: "Please enter your permanent address",
            email: "Please enter a valid email address",
            contact_number: {
                required: "Please enter your phone number",
                number: "Please enter only numeric value"
            },
            country_p: "Please enter your country",
            state_p: "Please enter your state",
            city_p: "Please enter your city",
            referred_by_name: "Please enter referred name",
            firstname: {
                required: "Please enter a username",
                minlength: "Your username must consist of at least 3 characters"
            },
        }
    });
});

  // Get state and cities
  $(document).ready(function() {
        $('#country-dropdown').on('change', function() {
            var country_id = this.value;
            console.log('country_id');
            $.ajax({
            url: 'https://renaissance.ac.in/get-state-template/',
            type: "POST",
            data: {
            country_id: country_id
            },
            cache: false,
            success: function(result){
            $("#state-dropdown").html(result);
            $('#city-dropdown').html('<option value="">Select State First</option>'); 
            }
            });
            });    
            $('#state-dropdown').on('change', function() {
            var state_id = this.value;
            $.ajax({
            url: 'https://renaissance.ac.in/get-city-template/',
            type: "POST",
            data: {
            state_id: state_id
            },
            cache: false,
            success: function(result){
            $("#city-dropdown").html(result);
            }
            });
        });
    });

    $(document).ready(function() {
        $('#second_country_dropdown').on('change', function() {
            var country_id = this.value;
            console.log('country_id');
            $.ajax({
            url: 'https://renaissance.ac.in/get-state-template/',
            type: "POST",
            data: {
            country_id: country_id
            },
            cache: false,
            success: function(result){
            $("#second_state_dropdown").html(result);
            $('#second_city_dropdown').html('<option value="">Select State First</option>'); 
            }
            });
            });    
            $('#second_state_dropdown').on('change', function() {
            var state_id = this.value;
            $.ajax({
            url: 'https://renaissance.ac.in/get-city-template/',
            type: "POST",
            data: {
            state_id: state_id
            },
            cache: false,
            success: function(result){
            $("#second_city_dropdown").html(result);
            }
            });
        });
    });

    $(document).ready(function() { 
        $('input[type="checkbox"]').click(function() { 
            var inputValue = $(this).attr("value"); 
            $("." + inputValue).toggle(); 
        }); 
    }); 
</script>  

<?php
get_footer();
?>
