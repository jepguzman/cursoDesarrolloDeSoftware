<div id="app" class="container mt-3 text-success">
<div class="sticky-top">
    <h1>{{titulo}}</h1>
</div><!--fin sticky-->

<div class="row">
    <div class="col-3">
    <nav class="nav flex-column">
        <a class="nav-link active" aria-current="page" href="../app/galeria">
            <i class="fa fa-home fa-2x" aria-hidden="true"></i>
            <i class="" aria-hidden="true"> Inicio</i>
        </a>
        <a class="nav-link" href="../app/fotosAgregar">
            <i class="fa fa-image fa-2x" aria-hidden="true"></i>
            <i class="fa fa-plus" aria-hidden="true"> Agregar imagen</i></a>
        <a class="nav-link" href="../app/salir">
            <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
            <i class="" aria-hidden="true">Salir</i>
        </a>
    </nav>
    </div><!--fin col2-->    
    
    <div class="col-6">        
        <div v-for="item in fotos">
            <div class="card">
                <div class="card-header text-danger">
                    <h4>
                        <i class="fa fa-user" aria-hidden="true"> {{item.nombre}}</i>
                    </h4> 
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{item.titulo}}</h5>
                    <img    v-bind:src="item.imagen" 
                            v-bind:alt="item.titulo" width="100%">
                    <a v-on:click="cambiaLikes(item.id,item.likes)" class="btn btn-danger">
                        <i class="fa fa-heart" aria-hidden="true"></i>{{item.likes}}
                    </a>
                </div>
                <div class="card-footer text-end">
                    <code>Fecha de Creación: {{item.creado}}</code>
                </div>
            </div>
            <br>
        </div>
    </div><!--fin col5-->

    <div class="col-3">
    <nav class="nav flex-column">
        <h4>CBTis No. 169</h4>
        <blockquote class="blockquote">
            <p>José María Morelos</p>
        </blockquote>
        <code>Cintalapa, Chiapas</code><hr>
        <h6 class="text text-center text-success">
            <i class="fa fa-user" aria-hidden="true">
            <?php 
            echo' [ '.$_SESSION['usuario'].' ] ';
            ?></i>
        </h6>
        <hr>
        <a class="nav-link" href="../app/acerca">
            <i class="fa fa-group fa-2x" aria-hidden="true"></i>
            <i class="fa fa-question-circle" aria-hidden="true">Acerca de...</i>
        </a>
    </nav>
    </div><!--fin col2-->
</div> <!--fin row-->
</div><!--fin container-->
<script src="../app/js/bootstrap.js"></script>
<script src="../app/js/galeria.js"></script>