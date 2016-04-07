<?php
session_start();
if(isset($_SESSION['s_id'])&& isset($_SESSION['s_name']) && isset($_SESSION['s_email'])){
    include_once 'memberHeader.php';
    ?>
    <div class="member_content" style="text-align: center; color:#2F2FA1; font-family: arial,Helvetica,Sans-serif;">
        <h3>Add New Event</h3>
        <form action="insertEvent.php" method="post" enctype="multipart/form-data" style="border:1px solid gray;padding: 20px; width: 600px;margin-left:305px;margin-top: 40px;margin-bottom: 30px; ">
            <table cellpadding="4">
                <tr>
                    <td>Event Title:</td>
                    <td><input type="text" name="eventTitle" required style="height: 35px; width:400px;"/></td>
                </tr>
                <tr>
                    <td>Event Date:</td>
                    <td><input type="date" required name="eventDate" style="height: 35px; width:200px;" /></td>
                </tr>
                <tr>
                    <td>Event Description:</td>
                    <td><textarea type="text" name="eventDesc" rows="15" required style=" width:400px;" placeholder="Date,  Venue,  Description,  Schedule,  For Whom"></textarea></td>
                </tr>
                <tr>
                    <td>Cover Photo:</td>
                    <td><input type="file" name="cover" style="" accept="image/*" /></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" id="submit_button" value="Save" /></td>
                </tr>
            </table>
        </form>
    </div>
    <?php
    include_once 'footer.php';
}else{
    echo "You Are Not Logged In. Please Login First. ";
    echo "<a href='index.php'> Go Back</a>";
}