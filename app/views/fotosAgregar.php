<div class="container mt-5">
  <br>
  <h1>Subir Fotos</h1>
  <form action="fotosGrabar" method="POST" 
  enctype="multipart/form-data">
  <div class="mt-3 row">
      <label for="titulo" class="form-label">Título</label>
      <div class="col-4">
        <input type="text" class="form-control" name="titulo">
      </div>
  </div>
  <div class="mt-3 row">
      <label for="imagen" class="form-label">
        Selecciona la imagen</label>
      <div class="col-4">
        <input type="file" class="form-control" name="imagen">
      </div>
  </div>
  <div class="mt-3 row">
      <div class="col-4">
        <input type="submit" class="btn btn-primary">
      </div>
  </div>
  </form>
</div>