<script type="text/javascript" src="<?php echo JS; ?>custom/productos.js"></script>

<h2 class="sub-header">Productos</h2>
<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" role="form" id="form_global" data-toggle="validator">
            <div class="form-group">
                <label for="perfil" class="col-lg-2 control-label">Categoria</label>
                <div class="col-lg-10">
                    <select class="form-control input-sm" id="id_categoria" name="id_categoria" aria-controls="datatable">
                    </select>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Nombre</label>
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="id_nombre" placeholder="Nombre" required autocomplete="off" name="nombre">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Precio</label>
                <div class="col-lg-10">
                    <input type="number" class="form-control" min="0.01" step="0.01" placeholder="Precio" id="id_precio" required autocomplete="off" name="precio">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>

            <div class="form-group has-feedback">
                <label for="descripcion" class="col-lg-2 control-label">Descripcion</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="5" id="id_descripcion" name="descripcion" required style="resize: none;" autocomplete=""off"></textarea>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group has-feedback">
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Especificaciones</label>
                <div class="col-lg-10">
                    <textarea class="form-control" rows="5" id="id_especificaciones" name="especificaciones" required style="resize: none;" autocomplete=""off"></textarea>
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group">
                <label for="ejemplo_email_3" class="col-lg-2 control-label">Imagenes</label>
                <div class="col-lg-10">
                    <input id="id_imagen" name="imagenes[]" multiple type="file" class="file-loading" accept="image/*">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
            </div>
            <div class="form-group" style="text-align: right;">
                <div class="col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" id="id_submit">Aceptar</button>
                    <button type="button" class="btn btn-primary" id="reset_button">Limpiar</button>
                </div>
            </div>
            <input type="hidden" id="submit_type" value="productos/add" />
            <input type="hidden" id="submit_id" />
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-body">
        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Categoria</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
        </table>
    </div>
</div>