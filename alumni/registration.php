<?php
include_once 'header.php';
?>
    <div class="content" style="border:1px solid #ededed;">
        <form action="newMember.php" method="POST" enctype="multipart/form-data" style="width:900px; margin: auto;padding:10px;border-top:2px solid #ffffff;">
            <h3 style="text-align: center;"> Member Registration Form </h3>
            <div id="personal_info">
                <fieldset style="border:1px solid gray;">
                    <legend style="size:15px;">Personal Information</legend>
                    <div class="personal_left">
                        <table cellpadding="3">
                            <tr>
                                <td><span style="color:red;"> * </span> Name : </td>
                                <td><input type="text" name="member_name" required style="width:220px;height:30px;"/></td>
                            </tr>
                            <tr>
                                <td><span style="color:red;"> * </span> Roll No. : </td>
                                <td><input type="text" name="member_roll" required style="width:220px;height:30px;"/></td>
                            </tr>
                            <tr>
                                <td ><span style="color:red;">*</span>Faculty Member/Batch:</td>
                                <td>
                                    <select name="member_batch" required style="width:220px;height:30px;">
                                        <option value="CSE 2008-09">CSE 2008-09</option>
                                        <option value="CSE 2009-10">CSE 2009-10</option>
                                        <option value="CSE 2010-11">CSE 2010-11</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></span> Date of Birth :</td>
                                <td><input type="date" name="member_birth" style="width:220px;height:30px;"/></td>
                            </tr>
                            <tr>
                                <td><span style="color:red;"> * </span> Blood Group : </td>
                                <td>
                                    <select name="member_blood" required style="width:220px;height:30px;">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> Current Address : </td>
                                <td><textarea name="member_current_address" cols="27" rows="5" style="width:220px;"> </textarea></td>
                            </tr>
                            <tr>
                                <td> Permanent Address : </td>
                                <td><textarea name="member_permanent_address" cols="27" rows="5" style="width:220px;"> </textarea></td>
                            </tr>
                        </table>
                    </div>
                    <div class="personal_right">
                        <input type="file" name="photo"/>
                        <div id="show_photo"></div>
                    </div>
                </fieldset>
            </div>
            <div class="form_row">
                <div id="career_info">
                    <fieldset style="border:1px solid gray;">
                        <legend>Career Information</legend>
                        <table cellpadding="3">
                            <tr>
                                <td>Profession:</td>
                                <td><input type="text" name="member_work" style="width:220px;height:30px;"></td>
                            </tr>
                            <tr>
                                <td>Company Name:</td>
                                <td><input type="text" name="member_company" style="width:220px;height:30px;"></td>
                            </tr>
                            <tr>
                                <td> Company Address : </td>
                                <td><textarea name="member_company_address" cols="27" rows="5" style="width:220px;"> </textarea></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                <div id="contact_info">
                    <fieldset style="border:1px solid gray; ">
                        <legend>Contact and Login Information</legend>
                        <table cellpadding="3">
                            <tr>
                                <td><span style="color:red;"> * </span>Email:</td>
                                <td><input type="email" name="member_email" required style="width:220px;height:30px;"/></td>
                            </tr>
                            <tr>
                                <td><span style="color:red;"> * </span>Password:</td>
                                <td><input type="password" name="member_password" required style="width:220px;height:30px;"/></td>
                            </tr>
                            <tr>
                                <td><hr/></td>
                                <td><hr/></td>
                            </tr>
                            <tr>
                                <td>Facebook Profile:</td>
                                <td><input type="url" name="member_fb" style="width:220px;height:30px;/"></td>
                            </tr>
                            <tr>
                                <td> <span style="color:red;"> * </span>Phone : </td>
                                <td><input type="text" name="member_phone" required style="width:220px;height:30px;"/></td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
            </div>
            <input type="submit" value="Save" id="submit_button" style="margin-left: 830px;margin-top: 20px;"/>
        </form>
    </div>
<?php
include_once 'footer.php';
?>