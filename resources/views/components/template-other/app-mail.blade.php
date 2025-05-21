<div id="_modalChangeMail" class="modal-backdrop" style="display: none;">
    <div class="modal-content" style="width: 430px; height: 380px;">
        <h3
            style="font-weight: bold; color: #691B32; text-align: left; display: flex; align-items: center; margin-bottom: 20px;">
            <i class="fa fa-mail-forward" style="font-size: 20px; color: #691B32; margin-right: 10px;"></i>
            Enviar email
        </h3>

        <!-- id oculto -->
        <x-template-form.template-form-input-hidden name="id_tbl_correspondencia_email" value="" />

        <p>Ingresa el nombre y correo del destinatario para enviar la
            información del No. Turno: <label id="noTurnoSistemaEmail"></label>, para su seguimiento.</p>

        <div class="custom-input-container">
            <label class="custom-input-label" for="customTextInput">Nombre</label>
            <input type="text" id="emailName" class="custom-input-field">
        </div>

        <div class="custom-input-container">
            <label class="custom-input-label" for="customTextInput">Email</label>
            <input type="email" id="emailMail" name="newPassword" class="custom-input-field">
        </div>

        <div class="modal-buttons">
            <button type="button" id="_cancelEmail">Cancelar</button>
            <button onclick="validateEmail()" style="font-weight: bold; color: #BC955C;"
                id="_confirmAction">Confirmar</button>
        </div>
    </div>
</div>
