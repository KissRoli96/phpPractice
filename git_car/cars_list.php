<?php

include "db.php";
include "head.php";
include  "navigation.php";


function allCars($conn){
    $query = "SELECT * FROM cars";
    $select_car = mysqli_query($conn,$query);
    $allCars = [];
    while($row = mysqli_fetch_assoc($select_car)){
        $allCars[$row['id']] = [
                'brand' => $row['brand'],
                'type' => $row['type'],
                'price' => $row['price'],
                'consumption' => $row['consumption']
        ];
    }

    return $allCars;
}

$allCars = allCars($conn);
?>
<table class="table table-striped">
    <thead>
    <th scope="col">Id</th>
    <th scope="col">Brand</th>
    <th scope="col">Type</th>
    <th scope="col">Price</th>
    <th scope="col">Consumption</th>
    </thead>
    <tbody>
    <?php
       foreach ($allCars as $key => $row){

        ?>
    <tbody>
    <tr>
        <th scope="row"><?= $key?></th>

        <td><?= strtoupper($row['brand'])?></td>
        <td><?= ucfirst($row['type'])?></td>
        <td><?= number_format($row['price'],'0',' ',' ')?> $</td>
        <td><?= strtoupper($row['consumption'])?></td>
    </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<br>
<?php
include "footer.php";
?>



