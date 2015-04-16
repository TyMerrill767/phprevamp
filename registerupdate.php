<form action="maillist.php" method="post">
    <label for="firstnamefield">First Name</label>
    <input type="text" name="firstname">

    <label for="lastnamefield">Last Name</label>
    <input type="text" name="lastname">

    <label for="addressfield">Address</label>
    <input type="text" name="address">

    <label for="cityfield">City</label>
    <input type="text" name="city">

    <label for="statefield">State</label>
    <input type="text" name="state">

    <label for="zipfield">Zip</label>
    <input type="text" name="zip">

    <label for="emailfield">Email</label>
    <input type="email" name="email">

    <div class="htmlbutton">
        <label for="htmlbutton">HTML</label>
        <input id="htmlbutton" type="radio" name="emailpref" value="HTML" checked>
    </div>

    <div class="plaintextbutton">
        <label for="plaintextbutton">Plain Text</label>
        <input id="plaintextbutton" type="radio" name="emailpreference" value="Plain Text"><br/>
    </div>

    <label for="dobfield">Date of Birth</label>
    <input type="date" name="dob">

    <label for="comments">Comments</label>
    <textarea name="comment" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="Submit">
</form>
