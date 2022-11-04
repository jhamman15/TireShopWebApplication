<?php include '../view/header.php'; ?>
<main id=aligned>
    <h1>Add Tire</h1>
    <form action="index.php" method="post" id="add_tire_form">
        <input type="hidden" name="action" value="add_tire">

        <input type="hidden" name="vehicle_id" value= "<?php echo $vehicle['vehicle_id']; ?>">
        <input type="hidden" name="tire_id" value= "<?php echo $tire['tire_id']; ?>">

        <label>Position:</label>
        <input type="text" name="position" />
        <br>

        <label>Size:</label>
        <input type="text" name="size" />
        <br>

        <label>Name:</label>
        <input type="text" name="name" />
        <br>

        <label>Date Installed:</label>
        <input type="text" name="date" />
        <br>

        <label>Number of Repairs:</label>
        <input type="text" name="number_of_repairs" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Tire" />
        <br>

        </form>

    <!-- <p class="last_paragraph">
        <a href="index.php?action=view_vehicle">View Vehicle Info</a>
    </p>     -->

</main>
<?php include '../view/footer.php'; ?>

