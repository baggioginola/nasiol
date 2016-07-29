<script type="text/javascript" src="<?php echo JS; ?>custom/categorias.js"></script>
<div id="container2">
    <div id="scroll-down-target"></div>
    <div style="clear:both;"></div>
    <?php require_once TEMPLATE . 'left_column.php'; ?>

    <div id="content">
        <div id="breadcrumb-center" class="breadcrumb1">
            <a href="<?php echo DOMAIN; ?>">Inicio</a>
            &raquo; <a href="#" id="category-name" style="text-transform: uppercase"></a>
        </div>

        <?php require_once TEMPLATE . 'category_header.php'; ?>
        <p style="padding-bottom:8%;"></p>
        <div class="box">
            <div class="box-content">
                <div class="box-product">

                </div>
            </div>
        </div>
        <div class="pagination">
            <div class="results"></div>
        </div>
    </div>
</div>