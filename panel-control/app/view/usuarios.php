<script type="text/javascript" src="<?php echo JS; ?>custom/usuarios.js"></script>
<script type="text/javascript" src="<?php echo JS; ?>md5.js"></script>


<h2 class="sub-header">Usuarios</h2>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" role="form" id="form_global" data-toggle="validator">
            <div class="form-group has-feedback">
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="id_nombre" placeholder="Nombre" required autocomplete="off" name="nombre">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Apellidos</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="id_apellidos" name="apellidos" placeholder="Apellidos" autocomplete="off" required>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" class="form-control" id="id_email" required name="email" placeholder="Email" autocomplete="off">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="ejemplo_password_3" class="col-lg-2 control-label">Contraseña</label>
                <div class="col-lg-10">
                    <input type="password" class="form-control" id="id_password" required placeholder="Contraseña" autocomplete="off">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>

                </div>
            </div>
            <div class="form-group">
                <label for="perfil" class="col-lg-2 control-label">Perfil</label>
                <div class="col-lg-10">
                    <select class="form-control input-sm" name="nivel" aria-controls="datatable">
                        <option value="0">Administrador</option>
                        <option value="1">Usuario</option>
                    </select>
                </div>
            </div>
            <div class="form-group" style="text-align: right;">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" id="id_submit">Aceptar</button>
                    <button type="button" class="btn btn-primary" id="reset_button">Limpiar</button>
                </div>
            </div>
            <input type="hidden" id="submit_type" value="usuarios/add" />
            <input type="hidden" id="submit_pw" />
            <input type="hidden" id="submit_id" />
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
</div>
