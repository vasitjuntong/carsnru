<?php

class LinkGridview {

    public static function showDetailBossCar($paper_approval_bus_id, $type_paper_id = 2) {
        return CHtml::link(CHtml::tag("i", array("class" => "fa fa-search")), "#", array(
                    "data-paper-id" => $paper_approval_bus_id,
                    "data-type-paper-id" => $type_paper_id,
                    "id" => "ajax_link_paper_approval_" . $paper_approval_bus_id,
                    "onClick" => "showDetailBossCar(this)",
        ));
    }

    public static function showDetailBossCar2($paper_approval_bus_id) {
        return CHtml::link(CHtml::tag("i", array("class" => "fa fa-search")), "#", array(
                    "data-paper-id" => $paper_approval_bus_id,
                    "data-type-paper-id" => 2,
                    "id" => "ajax_link_paper_approval_" . $paper_approval_bus_id,
                    "onClick" => "showDetailBossCar2(this)",
        ));
    }

    public static function showDetailDoing($paper_approval_bus_id, $type_paper_id = 2) {
        return CHtml::link(CHtml::tag("i", array("class" => "fa fa-search")), "#", array(
                    "data-paper-id" => $paper_approval_bus_id,
                    "data-type-paper-id" => $type_paper_id,
                    "id" => "ajax_link_paper_approval_" . $paper_approval_bus_id,
                    "onClick" => "showDetailDoing(this)",
        ));
    }

    public static function showDetailDoing3($paper_approval_bus_id, $type_paper_id = 2) {
        return CHtml::link(CHtml::tag("i", array("class" => "fa fa-search")), "#", array(
                    "data-paper-id" => $paper_approval_bus_id,
                    "data-type-paper-id" => $type_paper_id,
                    "id" => "ajax_link_paper_approval_" . $paper_approval_bus_id,
                    "onClick" => "showDetailDoing3(this)",
        ));
    }

    public static function showPaperDone($paper_approval_id, $type_paper_id = 2, $message = null) {
        if ($message == null)
            $message = CHtml::tag("i", array("class" => "fa fa-search"));

        return CHtml::link($message, "#", array(
                    "data-paper-id" => $paper_approval_id,
                    "data-type-paper-id" => $type_paper_id,
                    "id" => "ajax_link_paper_approval_" . $paper_approval_id,
                    'onClick' => 'showPaperDone(this)',
        ));
    }

}
