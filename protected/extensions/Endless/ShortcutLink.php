<?php

class ShortcutLink extends CWidget {

    public $items = array();

    public function run() {
        if ($this->items == null)
            throw new CException('กลับไปกรอก items ก่อน ให้ไวเลย');

        echo '<div class="grey-container shortcut-wrapper">';
        $this->renderMenu($this->items);
        echo '</div>';
    }

    protected function renderMenu($items) {
        foreach ($items as $value) {
//            echo '<a class="shortcut-link" href="#">';
//            echo '<span class="shortcut-icon">';
//            echo '<i class="fa fa-bar-chart-o"></i>';
//            echo '</span>';
//            echo ' <span class="text"> ' . (isset($value['label'])) ? $value['label'] : 'ไม่มี Label' . '</span>';
//            echo ' </a>';

            echo "<a class=\"shortcut-link\" href=\"{$this->urlLink($value['url'])}\">";
            echo '<span class="shortcut-icon">';
            echo "<i class=\"fa {$value['icon']}\"></i>";
            echo '</span>';
            echo '<span class="text">' . $value['label'] . '</span>';
            echo '</a>';
        }
    }

    protected function urlLink($url) {
        if (is_array($url))
            return CHtml::normalizeUrl($url);
        else
            return $url;
    }

}
