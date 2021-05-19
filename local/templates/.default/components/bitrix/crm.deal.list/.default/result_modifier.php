<?php
foreach ($arResult['DEAL'] as &$deal) {
    $colorclass = '';
    if($deal[PROB_UF]==PROB_1_VAL) {
        $colorclass = PROB_1_class;
    } elseif($deal[PROB_UF]==PROB_2_VAL) {
        $colorclass = PROB_2_class;
    } elseif($deal[PROB_UF]==PROB_3_VAL) {
        $colorclass = PROB_3_class;
    }
    if($deal[PLAN_UF]==NO_PLAN_VAL) {
        $colorclass = NO_PLAN_VAL_class;
    }
    if($colorclass) {
        foreach ($arResult['HEADERS'] as $header) {
            $deal['columnClasses'][$header['id']] = $colorclass;
        }
    }
}