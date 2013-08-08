<?php echo $_SERVER['REQUEST_METHOD']; ?>
<FORM action="form.php" method="post">
    <fieldset>
    <LABEL for="firstname">First name: </LABEL>
              <INPUT type="text" name="firstname" id="firstname"><BR>
    <LABEL for="lastname">Last name: </LABEL>
              <INPUT type="text" name="lastname" id="lastname"><BR>
    <LABEL for="email">email: </LABEL>
              <INPUT type="text" id="email"><BR>
    <INPUT type="radio" name="sex" value="Male"> Male<BR>
    <INPUT type="radio" name="sex" value="Female"> Female<BR>
    <INPUT type="submit" value="Send"> <INPUT type="reset">
    </fieldset>
 </FORM>

<?php print_r($_POST);?>
