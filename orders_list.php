<?php

include "db.php";
include "head.php";
include  "navigation.php";

function orderCreate($conn)
{
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $cars_id = $_POST['cars_id'];
        $query = "INSERT INTO orders (name, email, address, cars_id)";
        $query .= "VALUES('$name','$email','$address','$cars_id')";
        $select_car = mysqli_query($conn,$query);

        if(!$select_car){
            die("QUERY FAILED" . mysqli_error($conn));
        }else{
            echo "RECORD CREATE";
        }
    }
}

orderCreate($conn);

function listOfOrders($conn)
{
    $query = "SELECT * FROM orders";
    $select_order = mysqli_query($conn,$query);
    $allOrder = [];
    while ($row = mysqli_fetch_assoc($select_order)) {
        $allOrder[$row['id']] =[
                'name' => $row['name'],
                'email' => $row['email'],
                'address' => $row['address'],
                'cars_id' => $row['cars_id']
        ];
    }
    return $allOrder;
}

$allOrder = listOfOrders($conn);

function listCars($conn)
{
    $query = "SELECT * FROM cars";
    $select_car = mysqli_query($conn,$query);
    $listCars = [];
    while ($row = mysqli_fetch_assoc($select_car)) {
        $listCars[$row['id']] = [
            'brand' => $row['brand'],
            'type' => $row['type'],
            'price' => $row['price'],
            'consumption' => $row['consumption']
        ];
    }
    return $listCars;
}

$listOfCars = listCars($conn);



?>

<form action="orders_list.php" method="post">
    <div class="form-group">
        <label for="name">Nev</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nevet kerlek add meg..">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Add meg az emailed...">
    </div>

    <div class="form-group">
        <label for="address">Cim</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Cimet ide add meg...">
    </div>
    <br>
    <div class="form-group">
        <label for="cars_id">Auto</label>
    <select class="form-control" id="cars_id" name="cars_id">
    <option>--Valassz autot--</option>
<?php
foreach ($listOfCars as $key => $car) {
    echo "<option value=".$key.">". $car['brand']. " " . $car['type']." ". number_format($car['price'],'0',' ',' ')." $ ". $car['consumption']."</option>";

}
            ?>

        </select>
        <br>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Rendeles</button>
</form>

    <br>

    <table class="table table-striped">

        <thead>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Rendelt Auto ID</th>
        </thead>
        <?php
        foreach ($allOrder as $key => $row) {

        ?>
        <tbody>
        <tr>
            <th scope="row"><?= $key?></th>
            <td><?= $row['name']?></td>
            <td><?= $row['email']?></td>
            <td><?= $row['address']?> </td>
            <td><?= strtoupper($row['cars_id'])?></td>
            <?php
            }
            ?>
        </tr>
        </tbody>
    </table>
<?php
include "footer.php";
?>

