<?php
mgAddMeta('components/filter/applied/applied.css');

if (empty($data)) {
    $style = ' style="display:none"';
} else {
    $style = '';
} ?>


<div class="filter-apply-wrapper">
    <div class="c-apply__title apply-filter-title" <?php echo $style ?>>
        <?php echo lang('filterApplied'); ?>
    </div>
    <form action="?" class="c-apply__form apply-filter-form"
          data-print-res="<?php echo MG::getSetting('printFilterResult') ?>" <?php echo $style ?>>
        <ul class="c-apply__tags filter-tags">
            <?php foreach ($data as $property) {
                $cellCount = 0;
                ?>
                <li class="c-apply__tags--item apply-filter-item">
                    <span class="c-apply__tags--name filter-property-name">
                        <?php echo $property['name'] . ": "; ?>
                    </span>
    
                    <?php if (in_array($property['values'][0], array('slider|easy', 'slider|hard', 'slider'))) {
                        ?>
                        <span class="c-apply__tags--value filter-price-range">
                            <?php echo lang('filterFrom') . " " . $property['values'][1] . " " . lang('filterTo') . " " . $property['values'][2]; ?>
                            <a role="button" href="javascript:void(0);" class="c-apply__tags--remove removeFilter">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                                        L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                                        c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                                        l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                                        L284.286,256.002z"/>
                                </g>
                            </g>
                            </svg>
                            </a>
                        </span>
    
                        <?php if ($property['code'] != "price_course"): ?>
                            <input name="<?php echo $property['code'] . "[" . $cellCount . "]" ?>"
                                   value="<?php echo $property['values'][0] ?>" type="hidden"/>
                            <?php $cellCount++; ?>
                        <?php endif; ?>
    
                        <input name="<?php echo $property['code'] . "[" . $cellCount . "]" ?>"
                               value="<?php echo $property['values'][1] ?>" type="hidden"/>
                        <input name="<?php echo $property['code'] . "[" . ($cellCount + 1) . "]" ?>"
                               value="<?php echo $property['values'][2] ?>" type="hidden"/>
                    <?php } else { ?>
                        <ul class="c-apply__tags--values filter-values">
                            <?php foreach ($property['values'] as $cell => $value) {
                                ?>
                                <li class="c-apply__tags--value apply-filter-item-value">
                                    <?php echo $value['name']; ?>
                                    <a role="button" href="javascript:void(0);"
                                       class="c-apply__tags--remove removeFilter">
                                       <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                                                    L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                                                    c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                                                    l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                                                    L284.286,256.002z"/>
                                            </g>
                                        </g>
                                        </svg>
                                    </a>
                                    <input name="<?php echo $property['code'] . "[" . $cell . "]" ?>"
                                           value="<?php echo $property['values'][$cell]['val'] ?>" type="hidden"/>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
    
                </li>
            <?php } ?>
        </ul>
        <div class="c-apply__refresh">
            <a href="<?php echo SITE . URL::getClearUri() ?>"
               class="c-button refreshFilter"><?php echo lang('filterReset'); ?></a>
        </div>
        <input type="hidden" name="applyFilter" value="1"/>
    </form>


</div>    

