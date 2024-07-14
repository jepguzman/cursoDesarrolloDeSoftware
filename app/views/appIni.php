<div id="app" class="container mt-3">
    
<div class="sticky-top text-success">
    <h1 >{{titulo}}</h1>
</div><!--fin sticky-->

<div class="row">
    <div class="col-3">
    <nav class="nav flex-column">
        <a class="nav-link active" aria-current="page" href="#">
            <i class="fa fa-home fa-2x" aria-hidden="true"></i>
            <i class="" aria-hidden="true"> Inicio</i>
        </a>
        <a class="nav-link" href="../app/login">
            <i class="fa fa-user fa-2x" aria-hidden="true"></i>
            <i class="" aria-hidden="true"> Acceso</i>
        </a>
        <a class="nav-link" href="../app/registro">
            <i class="fa fa-user fa-2x" aria-hidden="true"></i>
            <i class="fa fa-plus" aria-hidden="true"> Registro</i>
        </a>
        
    </nav>
    </div><!--fin col2-->    
    
    <div class="col-6">        
        <div v-for="item in fotos">
            <div class="card">
                <div class="card-header">
                <h3 class="text text-danger" >
                    <i class="fa fa-user text-danger" aria-hidden="true"></i>
                    {{item.nombre}}</h3>
                </i>                     
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{item.titulo}}</h5>
                    <img    v-bind:src="item.imagen" 
                            v-bind:alt="item.titulo" width="100%">
                            <p class="card-text">:)</p>
                    <a href="#" class="btn btn-danger disabled"><i class="fa fa-heart fa-2x" aria-hidden="true"></i>{{item.likes}}</a>
    
                </div>
                <div class="card-footer text-body-secondary text-end">
                    <span>Fecha de Creación: {{item.creado}}</span>
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