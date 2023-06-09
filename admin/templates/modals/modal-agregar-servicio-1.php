<div class="modal fade" id="modal_add1" tabindex="-1" aria-labelledby="modal_add1Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex align-items-center">
          <h5 class="modal-title" id="modal_add1Label">Agregar Servicio General a <?php echo $ls['nombre_servicio']; ?>
          </h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit_mc">
        <input type="hidden" name="modal_id_servicio" id="modal_id_servicio1" class="form-control">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="font-weight-normal">Servicio General</label>
              <input type="text" name="servicio_general" id="servicio_general" class="form-control" required
                maxlength="255" placeholder="Escribe un servicio general">
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>