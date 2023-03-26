<div id="load_products">
    <div class="row gy-5">
<?php foreach ($list_products as $value) { ?>
    <div class="col-4">
        <div class="card mb-4 rounded-3 shadow-sm" id="<?php echo $value->id ?>">
            <div class="card-header py-3">
                <h4 class="my-0 fw-normal"><?php echo $value->name ?></h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title"><?php echo $value->price ?><small class="text-muted fw-light"></small></h1>
                <button type="button" class="w-100 btn btn-lg btn-outline-primary buy-products" data-bs-toggle="modal" data-bs-target="#cart">Buy</button>
            </div>
        </div>
    </div>
<?php } ?>
    </div>
</div>