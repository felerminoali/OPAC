<?php
require_once('_header.php')
?>


<div class='container'>
    <div class='section friendly'>
        <h1><strong>OPAC | Welcome to your new app!</strong></h1>
        <div class='article'>
            <p>Developer: Felermino Ali</p>
            

            <h1>Patron</h1>
            <p>url: <?php echo Helper::encodeHTML("https://myopac.herokuapp.com/");?></p>
            <p><strong>login</strong>: guest</p>
            <p><strong>password</strong>: password</p>
            <p>OR</p>
            <p>you can register by providing a valid email</p>
            <p>After login into the system you can perform the following functionalities:
<br/>
                <strong>Catalogue</strong> - Search catalogue and place reservation
                <br/>
                <strong>My account</strong> - View and edit your personal details.
                <br/>
                <strong>My loans</strong>  - View your loans and renew.
                <br/>
                <strong>My reservations </strong>- View the status of any reservation that you have and provide feedback.</p>

            <p>Refer to the <a href="https://myopac.herokuapp.com/?page=about">link</a> if you need more info.</p>


            <h1>Library</h1>
            <p>url: <?php echo Helper::encodeHTML("https://myopac.herokuapp.com/library");?></p>
            <p><strong>login</strong>: admin</p>
            <p><strong>password</strong>: password</p>
        </div>
    </div>
</div>


<?php require_once('_footer.php') ?>



