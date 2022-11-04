<?php include '../view/header.php'; ?>

<main id=aligned>

<h1>Customer Search</h1>

    <form action="index.php" method="post" id="search_customer_form">
        <input type="hidden" name="action" value="search_customers">

        <label>Phone Number:</label>
        <input type="text" name="phone"/>
        <input type="submit" value="Search" />

    </form> 
        
</main>


<?php include '../view/footer.php'; ?>