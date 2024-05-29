<?php include("adminheader.php")?> 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Registro</h4>

<div class="col-md-15">
                  <div class="card mb-5">
                    <h5 class="card-header">Registro de Producto </h5>
                    <div class="card-body demo-vertical-spacing demo-only-element">
                    <label class="form-label" for="basic-default-nombre12">Nombre</label>

                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Nombre" aria-label="Nombre" id="nombre" />
                      </div>

                      <div class="form-password-toggle">
                        <label class="form-label" for="basic-default-precio12">Precio</label>
                        <div class="input-group">
                        <input type="number" step="0.01" class="form-control"  placeholder="Precio" max="10" id="precio" />
                          
                        </div>
                      </div>

                      <div class="input-group">
                        <label class="form-label" for="basic-default-name">Descripción</label>
                        <div class="input-group">
                            <textarea class="form-control" id="descripcion" placeholder="Descripción"></textarea>
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-firstname">Imagen</label>
                        <div class="input-group">
                          <input type="file" class="form-control" id="imagen"  />
                          
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-secondname">Stock</label>
                        <div class="input-group">
                          <input type="number" class="form-control" id="stock" placeholder="Stock" value="" />
                          
                        </div>
                      </div>
                      <div class="input-group">
                        <label class="form-label" for="basic-default-secondname">Orden</label>
                        <div class="input-group">
                          <select class="form-select" id="orden">
                            <option value="Decoracion">Decoración</option>
                            <option value="Accesorios">Accesorios</option>
                            <option value="Arco">Arco</option>
                            <option value="Pack">Pack</option>
                            <option value="Globos">Globos</option>
                            <option value="Dulces">Dulces</option>

                          </select>
                          
                        </div>
                      </div>
                      <div class="mt-2">
                          <button type="button" class="btn btn-primary me-2" onclick='AñadirFoto()'>Aplicar cambios</button>

                        </div>
                    </div>
                  </div>
                </div>
                </div>
                      
<?php include("adminfooter.php")?> 
<script>
    function AñadirFoto() {
     var nombre = $('#nombre').val();
     var precio = $('#precio').val();
     var stock = $('#stock').val();
   
     var orden = $('#orden').val();
     var descripcion = $('#descripcion').val();
  
     var file = $('#imagen')[0].files[0]; 

    var formData = new FormData();
    formData.append('fichero', file);
    formData.append('nombre', nombre);
    formData.append('precio', precio);
    formData.append('stock', stock);
    formData.append('orden', orden);
    formData.append('descripcion', descripcion);
   

    $.ajax({
        url: 'subirfotoproducto.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.includes("El producto se añadió correctamente."))
            Swal.fire({
                icon: 'success',
                title: 'Producto añadido.',
                showConfirmButton: false,
                timer: 1500
            });
            else if(response.includes("El fichero no es una imagen.")){
                Swal.fire({
                icon: 'error',
                title: 'El fichero solo admite imágenes.',
                showConfirmButton: false,
                timer: 2500
            });
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            Swal.fire({
                icon: 'error',
                title: 'Error al añadir el producto.',
                text: 'Por favor, inténtalo de nuevo más tarde.'
            });
        }
    });
}

</script>