<div class="modal fade" id="modal_add4" tabindex="-1" aria-labelledby="modal_add3Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex align-items-center">
          <h5 class="modal-title" id="modal_add3Label">Agregar Opción de SubServicio a
            <?php echo $ls['nombre_servicio']; ?></h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit_mc4">
        <!-- id servicio principal -->
        <input type="hidden" name="modal_id_servicio" id="modal_id_servicio4" class="form-control">
        <!-- id servicio general -->
        <input type="hidden" name="modal_id_servicio_general" id="modal_id_servicio_general4" class="form-control">
        <!-- id subservicio -->
        <input type="hidden" name="modal_id_subservicio" id="modal_id_subservicio4" class="form-control">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-12">
              <label class="font-weight-normal">Opción de SubServicio</label>
              <input type="text" name="op_subservicio" id="op_subservicio" class="form-control" required maxlength="255"
                placeholder="Escribe una Opción de SubServicio">
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