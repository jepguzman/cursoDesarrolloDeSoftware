<div id="app" class="container text-center mt-3">
  <div class="row">
  <div><h1>Iniciar sesión</h1></div>
    <div class="col"></div>
    <div class="col">
    <form>
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario</label>
                <input type="text" class="form-control" v-model="usuario" />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Clave</label>
                <input type='password' class="form-control" v-model="password" />
            </div>
            <div class="mb-3">
                <input v-on:click="userLogin(usuario,password)" class="btn btn-primary" value="Iniciar" />
            </div>
        </form>
        {{usuario}}--{{password}}
    </div>
    <div class="col"></div>
  </div>
</div>
<script src="../app/js/bootstrap.js"></script>
<script src="../app/js/login.js"></script>