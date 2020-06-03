<form>
   Name <label>
        <input type="text" name="name"/>
    </label><br/>
   Phone number <label>
        <input type="text" name="phone"/>
    </label><br/>
   Age <label>
        <input type="text" name="age"/>
    </label><br/>
   Address <label>
        <input type="text" name="address"/>
    </label><br/>

    <input type="submit"/>
</form>

<?php
if (isset($_GET['name']) && isset($_GET['phone'])
    && isset($_GET['age']) && isset($_GET['address'])){

    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $age = $_GET['age'];
    $address = $_GET['address'];

    echo "<table border='2'>";
    echo "<tr> <td style='background-color: orange'>Name</td><td>$name</td></tr>";
    echo "<tr> <td style='background-color: orange'>Phone number</td><td>$phone</td></tr>";
    echo "<tr> <td style='background-color: orange'>Age</td><td>$age</td></tr>";
    echo "<tr> <td style='background-color: orange'>Address</td><td>$address</td></tr>";
    echo "</table>";
}