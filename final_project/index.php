<?php include 'view/header.php'; ?>

<main id=aligned>
    <nav id=page_title>
        
    <h2>Login</h2>
        <form action="vehicle_manager/index.php" method="post" id="login_technician_form">
            <input type="hidden" name="action" value="login_technician">

            <label>Username:</label>
            <input type="text" name="username"/>
            <br>

            <label>Password:</label>
            <input type="text" name="password"/>
            <input type="submit" value="Login"/>

        </form> 
    </nav>
</section>


<?php include 'view/footer.php'; ?>