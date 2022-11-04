<?php include '../view/header.php'; ?>

    <main id=aligned>

    <h1>Update Tire</h1>
    <form action="index.php" method="post" id="update_tire_form">
        <input type="hidden" name="action" value="update_tire">

        <input type="hidden" name="vehicle_id" value= "<?php echo $tire['vehicle_id']; ?>">
        <input type="hidden" name="tire_id" value= "<?php echo $tire['tire_id']; ?>">

        <label>Position:</label>
        <input type="text" name="position" value= "<?php echo $tire['position']; ?>" />
        <br>

        <label>Size:</label>
        <input type="text" name="size" value= "<?php echo $tire['size']; ?>" />
        <br>

        <label>Name:</label>
        <input type="text" name="name" value= "<?php echo $tire['name']; ?>" />
        <br>

        <label>Installation Date:</label>
        <input type="text" name="date" value= "<?php echo $tire['date']; ?>" />
        <br>

        <label>Times Serviced:</label>
        <input type="text" name="number_of_repairs" value= "<?php echo $tire['number_of_repairs']; ?>" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Update Tire" />
        <br>

        </form>
    <!-- <p class="last_paragraph">
        <a href="index.php?action=list_customers">Search Customers</a>
    </p>  -->

<?php include '../view/footer.php'; ?>    