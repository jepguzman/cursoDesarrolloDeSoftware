<div class="container mt-5">
    <br>
    <h1>Cerrando la Sesión</h1>
    <?php
    //session_start();
    //UNSET Borra TODAS las variables Globales de $_SESSION
        session_unset();
    ?>
<script>
        window.location.replace("../public");
</script>
</div>