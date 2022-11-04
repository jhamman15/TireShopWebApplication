<?php include '../view/header.php'; ?>

    <main id=aligned>

        <label id=vehicle_info_label>Vehicle ID: </label>
        <span id=vehicle_info> <?php echo $vehicle['vehicle_id']; ?></span>
        <br>

        <label id=vehicle_info_label>VIN: </label>
        <span id=vehicle_info> <?php echo $vehicle['vehicle_vin']; ?></span>
        <br>

        <label id=vehicle_info_label>Make: </label>
        <span id=vehicle_info> <?php echo $vehicle['make']; ?></span>
        <br>

        <label id=vehicle_info_label>Model: </label>
        <span id=vehicle_info> <?php echo $vehicle['model']; ?></span>
        <br>

        <label id=vehicle_info_label>Mileage: </label>
        <span id=vehicle_info> <?php echo $vehicle['mileage']; ?></span>
        <br>

        <table>
            <h2>Tires</h2>
            <tr>
                <th>Position</th>
                <th>Tire Size</th>
                <th>Name</th>
                <th>Installation Date</th>
                <th>Times Serviced</th>
                <th>&nbsp;</th>
            </tr>
            
            <?php foreach ($tires as $tire) : ?>
            <tr>
                <td><?php echo $tire['position']; ?></td>
                <td><?php echo $tire['size']; ?></td>
                <td><?php echo $tire['name']; ?></td>
                <td><?php echo $tire['date']; ?></td>
                <td><?php echo $tire['number_of_repairs']; ?></td>

                <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                        value="view_tire_edit_form">
                    <input type="hidden" name="tire_id"
                        value="<?php echo $tire['tire_id']; ?>">
                    <input type="submit" value="Edit">
                    </form>
                </td>

                <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="delete_tire">
                    <input type="hidden" name="tire_id"
                           value="<?php echo $tire['tire_id']; ?>">
    <input type="hidden" name="vehicle_id" value="<?php echo $vehicle['vehicle_id']; ?>">
                    <input type="submit" value="Delete">
                    </form>
                </td> 
            </tr>
            <?php endforeach; ?>
            <td>
                    <form action="." method="post">
                    <input type="hidden" name="action"
                           value="show_add_tire_form">
                    <input type="hidden" name="vehicle_id"
                           value="<?php echo $vehicle['vehicle_id']; ?>">
                    <input type="submit" value="Add Tire">
                    </form>
                </td>
        </table>

    </main>

<?php include '../view/footer.php'; ?>