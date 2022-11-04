<?php include '../view/header.php'; ?>

<main id=aligned>

        <label>Customer ID: </label>
        <span> <?php echo $customer['customer_id']; ?></span>
        <br>

        <label>First Name: </label>
        <span> <?php echo $customer['customer_firstname']; ?></span>
        <br>

        <label>Last Name: </label>
        <span> <?php echo $customer['customer_lastname']; ?></span>
        <br>

        
        <table>
        <h2>Vehicle(s):</h2>
            <tr>
                <th>Make</th>
                <th>Model</th>
                <th>Year</th>
                <th>&nbsp;</th>
            </tr>

            <?php foreach ($vehicles as $vehicle) : ?>
                <tr>
                    <td><?php echo $vehicle['make']; ?></td>
                    <td><?php echo $vehicle['model']; ?></td>
                    <td><?php echo $vehicle['year']; ?></td>

                    <td>
                        <form action="." method="post">
                        <input type="hidden" name="action"
                            value="view_vehicle">
                        <input type="hidden" name="vehicle_id"
                            value="<?php echo $vehicle['vehicle_id']; ?>">
                        <input type="submit" value="Select">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>


</main>

<?php include '../view/footer.php'; ?>