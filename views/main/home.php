<div class="main">
    <div class="d-flex flex-column flex-shrink-0 p-3" style="width: 280px;">
        <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"></svg>
            <span class="fs-4">Category</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <?php foreach ($category_list as $value) {?>
                <li>
                    <a href="#" id="<?php echo $value['category_id']?>" class="nav-link link-dark">
                        <svg class="bi me-2" width="16" height="16"></svg>
                        <?php echo $value['category_name'] . ' - ' . $value['product_count'] ?>
                    </a>
                </li>
                <hr>
            <?php } ?>
        </ul>
    </div>
    <div class="container overflow-hidden text-center">
        <div class="row gy-5" style="padding-top: 20px">
            <div class="col-2">
            <select class="form-select" aria-label="Filters" id="filters">
                <option selected disabled hidden>Filters</option>
                <option value="low-price">Low price</option>
                <option value="alphabet">Alphabet</option>
                <option value="new-products">New products</option>
            </select>
            </div>
        </div>
        <div id="products-list" style="padding-top: 20px">
        </div>
    </div>
</div>
<script>
    let id;
    const modal = $('#cart');
    const modalBody = modal.find('.modal-body');

    const table = $('<table>').addClass('table');
    const thead = $('<thead>');
    const tbody = $('<tbody>');
    const headRow = $('<tr>');
    const nameHeader = $('<th>').attr('scope', 'col').text('Name product');
    const priceHeader = $('<th>').attr('scope', 'col').text('Price');

    headRow.append(nameHeader, priceHeader);
    thead.append(headRow);
    table.append(thead, tbody);
    modalBody.append(table);

    $(document).ready(function () {
        if ($('#products-list').length > 0) {
            $(".nav-link").on('click', function () {
                id = $(this).attr('id');
                $.ajax({
                    url: '?controller=main&action=getProductsByIdCategory',
                    type: 'post',
                    data: {
                        'category_id': id,
                        'filter' : null
                    },
                    success: function (data) {
                        $('#load_products').remove();
                        let products = $(data)[18];
                        $('#products-list').prepend(products);
                    }
                });
            });

            $('#filters').on('change', function (){
                $.ajax({
                    url: '?controller=main&action=getProductsByIdCategory',
                    type: 'post',
                    data: {
                        'category_id' : id,
                        'filter' : $('#filters').val(),
                    },
                    success: function (data) {
                        $('#load_products').remove();
                        let products = $(data)[18];
                        $('#products-list').prepend(products);
                    }
                });
            });

        }
        $('#products-list').on('click', '.buy-products', function (){
            const productName = $(this).closest('.card').find('.card-header h4').text();
            const productPrice = $(this).closest('.card').find('.card-body h1').text();

            const modal = $('#cart');
            const modalBody = modal.find('.modal-body');

            const bodyRow = $('<tr>');
            const nameCell = $('<td>').text(productName);
            const priceCell = $('<td>').text(productPrice);

            bodyRow.append(nameCell, priceCell);
            tbody.append(bodyRow);

            modalBody.append(table);
        });
    });
</script>