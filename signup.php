<?php
 include("top.html");
 require_once('init_connection.php');
?>


<div>
    <!-- form to create new account -->
    <form action="signup-submit.php" method="post">
        <fieldset>
            <legend>New User Signup:</legend>
            <strong class="column">Name:</strong>
            <input type="text" name="name" size="16" maxlength="16"><br>
            
            <!-- initially female must be checked -->
            <strong class="column">Gender:</strong>
            <input type="radio" name="gender" value="M">Male
            <input type="radio" name="gender" value="F" checked>Female<br>

            <strong class="column">Age:</strong>
            <input type="text" name="age" size="6" maxlength="2"><br>

            <strong class="column">Personality Type:</strong>
            <input type="text" name="persona_type" size="6" maxlength="4">
            (<a href="http://www.humanmetrics.com/cgi-win/jtypes2.asp">Don't know your type?</a>):
            <br>

            <strong class="column">Favorite OS:</strong>
            <select name="fav_os">
                <option value="Windows" selected>Windows</option>
                <option value="Mac OS X" >Mac OS X</option>
                <option value="Linux"> Linux</option>
            </select><br>

            <strong class="column">Seeking age:</strong>
            <input type="text" name="min_seek_age" size="6" maxlength="2" placeholder="min"> to
            <input type="text" name="max_seek_age" size="6" maxlength="2" placeholder="max"><br>

            <input type="submit" value="Sign Up">

        </fieldset>
        
    </form>
</div>

<?php include("bottom.html")?>
