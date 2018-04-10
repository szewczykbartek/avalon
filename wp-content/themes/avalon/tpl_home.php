<?php
$items = wp_get_nav_menu_items('Menu');
foreach ($items as $item) {
    $menuArrayId[$item->ID] = $item->object_id;
    $menuArray[$item->ID] = $item->attr_title;
}
?>

<div class="Page Home">
    <div class="Cl Slider animBoxOrder" data-animboxorder="0">
        <div class="PhotoContainer animBackground">
            <div class="Photo Photo1 SliderItem  active"><div class="Text animOpacity animDelay900">
              Nowa inwestycja<br />
              w Warszawie<br />
              już w sprzedaży
            </div></div>
            <div class="Photo Photo2 SliderItem"><div class="Text animOpacity animDelay900">
              Termin oddania<br />
              do użytku<br />
              III kwartał 2018
            </div></div>
            <div class="Photo Photo3 SliderItem"><div class="Text animOpacity animDelay900">
              Cena już od<br />5628zł/m<sup>2</sup>
            </div></div>
        </div>
        <div class="SliderNavArrow animOpacity animDelay600"">
            <div class="Side Prev actSliderArrowChange"></div>
            <div class="Side Next actSliderArrowChange"></div>
        </div>
        <div class="SliderNav animOpacity animDelay600">
            <a class="active actSliderChange"></a>
            <a class="actSliderChange"></a>
            <a class="actSliderChange"></a>
        </div>
    </div>
</div>
