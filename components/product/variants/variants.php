<?php mgAddMeta('components/product/variants/variants.js'); ?>
<?php mgAddMeta('components/product/product.js'); ?>
<?php mgAddMeta('components/product/variants/variants.css'); ?>

<?php
if (!empty($data['variants'])) {
  MG::setSizeMapToData($data);
  $style = '';
  if (MG::getSetting('printVariantsInMini') != 'true' &&
    (MG::get('controller') == "controllers_catalog" || MG::get('controller') == "controllers_index" || MG::get('controller') == "controllers_group")
  ) {
    $style = "style='display:none'";
  }
  ?>
    <div class="c-variant block-variants" <?php echo $style; ?>>

        <div class="c-variant__title">
          <?php if ($data['sizeMap'] == '') { ?>
            <?php echo lang('variantTitle'); ?>
          <?php } ?>
        </div>

        <div class="c-variant__scroll">

          <?php
          // Цвето-размерная сетка
          component(
            'product/variants/sizemap',
            ['sizeMap' => $data['sizeMap']]
          ); ?>

            <table class="variants-table" <?php if ($data['sizeMap'] != '') echo "style='display:none;'" ?>>
              <?php
              $i = $j = 0;
              foreach ($data['variants'] as $variant) {
                $count = $variant['count'];
                if (!empty($variant['image'])) {
                  $src = mgImageProductPath($variant['image'], $variant['product_id'], 'small');
                }
                ?>
                  <tr class="c-variant__row variant-tr <?php echo !$j++ ? 'active-var' : '' ?>"
                      data-color="<?php echo $variant['color'] ?>"
                      data-size="<?php echo $variant['size'] ?>"
                      data-count="<?php echo $count; ?>"
                    <?php echo !empty($variant['image']) ? 'data-img="' . $src . '"' : '' ?>>
                      <td class="c-variant__column">
                          <label class="c-form <?php echo !$j++ ? 'active' : '' ?>">
                              <input type="radio"
                                     data-id="variant-<?php echo $variant['id']; ?>"
                                     class="js-onchange-price-recalc"
                                     data-count="<?php echo $count; ?>"
                                     data-code="<?php echo $variant['code']; ?>"
                                     name="variant"
                                     value="<?php echo $variant['id']; ?>" <?php echo !$i++ ? 'checked=checked' : '' ?>>
                            <?php
                            if (!empty($variant['image']) && empty($data['sizeMap'])) {
                              echo '<span class="c-variant__img"><img src="' . $src . '" alt="image"></span>';
                            }
                            ?>
                              <span class="c-variant__value">
                                <span class="c-variant__name variantTitle">
                                    <?php echo $variant['title_variant'] ?>
                                </span>
                                <span class="c-variant__price <?php if ($variant['activity'] === "0" || $variant['count'] == 0) {
                                  echo 'c-variant__price--none';
                                } ?>">
                                    <?php if ($variant["old_price"] != ""): ?>
                                        <s class="c-variant__price--old" <?php echo (!$variant['old_price']) ? 'style="display:none"' : '' ?>>
                                          <?php echo MG::priceCourse($variant['old_price']); ?>
                                          <?php echo MG::getSetting('currency') ?>
                                        </s>
                                    <?php endif; ?>
                                    <span class="c-variant__price--current">
                                        <?php echo $variant['price'] ?>
                                        <?php echo MG::getSetting('currency') ?>
                                    </span>
                                    <span class="c-variant__price--not-available">
                                      <?php echo lang('variantDepleted'); ?>
                                    </span>
                                </span>
                            </span>
                          </label>
                      </td>
                  </tr>
              <?php } ?>
            </table>
        </div>
    </div>
<?php } ?>