<div class="modal fade" id="modal_es1_2" tabindex="-1" aria-labelledby="modal_es1_2Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <div class="d-flex align-items-center">
          <h5 class="modal-title" id="modal_es1_2Label">Editar Servicio General</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form_edit_mc_editar">
        <input type="hidden" name="modal_id_servicio_editar" id="modal_id_servicio_editar" class="form-control">
        <div class="modal-body">
          <div class="form-row">
            <div class="form-group col-md-10">
              <label class="font-weight-normal">Servicio General</label>
              <input type="text" name="servicio_general_editar" id="servicio_general_editar" class="form-control"
                required maxlength="255" placeholder="Escribe un servicio general">
            </div>
            <div class="form-group col-md-2 align-self-end">
              <button type="button" class="btn btn-danger my-0" id="borrar_sg"><i class="fas fa-trash-alt"></i></button>
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