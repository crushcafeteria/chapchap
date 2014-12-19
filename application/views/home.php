<div class="container text-center" style="color:white;">
    <h1>Greetings, Human!</h1>
    <p class="lead text-center">
        Welcome to the <?= $this->config->item('appName')?> <br>
        We host your documentation so you can deploy your apps extremely fast!
    </p>

    <hr>

</div>

<?php $this->load->view('user/login')?>