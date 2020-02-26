<?php
if (EDITION == 'gipermarket') {
    $opFieldsM = new Models_OpFieldsProduct($data['id']);
    $fields = $opFieldsM->get();

    foreach ($fields as $key => $value) {
        if ($value['active'] == 0 || (empty($value['value']) && empty($value['variant']) )) continue;
        echo 'asdasd';
        if ($data['variant']) { ?>
            <div class="product-opfield">
                <span class="product-opfield__name">
                    <?php echo $value['name'] ?>
                </span>
                <span class="product-opfield__value">
                    <?php echo $value['variant'][$data['variant']]['value'] ?>
                </span>
            </div>
        <?php } else { ?>
            <div class="product-opfield">
                <span class="product-opfield__name">
                    <?php echo $value['name'] ?>
                </span>
                <span class="product-opfield__value">'
                    <?php echo $value['value'] ?>
                </span>
            </div>
      <?php } ?>
    <?php } ?>
    <?php } ?>