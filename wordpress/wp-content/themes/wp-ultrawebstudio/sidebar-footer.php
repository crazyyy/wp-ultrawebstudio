<?php
global $theme_sidebars;
$places = array();
foreach ($theme_sidebars as $sidebar){
    if ($sidebar['group'] !== 'footer')
        continue;
    $widgets = theme_get_dynamic_sidebar_data($sidebar['id']);
    if (!is_array($widgets) || count($widgets) < 1)
        continue;
    $places[$sidebar['id']] = $widgets;
}
$place_count = count($places);
$needLayout = ($place_count > 1);
if (theme_get_option('theme_override_default_footer_content')) {
    if ($place_count > 0) {
        $centred_begin = '<div class="my-center-wrapper"><div class="my-center-inner">';
        $centred_end = '</div></div><div class="clearfix"> </div>';
        if ($needLayout) { ?>
<div class="my-content-layout">
    <div class="my-content-layout-row">
        <?php 
        }
        foreach ($places as $widgets) { 
            if ($needLayout) { ?>
            <div class="my-layout-cell my-layout-cell-size<?php echo $place_count; ?>">
            <?php 
            }
            $centred = false;
            foreach ($widgets as $widget) {
                 $is_simple = ('simple' == $widget['style']);
                 if ($is_simple) {
                     $widget['class'] = implode(' ', array_merge(explode(' ', theme_get_array_value($widget, 'class', '')), array('my-footer-text')));
                 }
                 if (false === $centred && $is_simple) {
                     $centred = true;
                     echo $centred_begin;
                 }
                 if (true === $centred && !$is_simple) {
                     $centred = false;
                     echo $centred_end;
                 }
                 theme_print_widget($widget);
            } 
            if (true === $centred) {
                echo $centred_end;
            }
            if ($needLayout) {
           ?>
            </div>
        <?php 
            }
        } 
        if ($needLayout) { ?>
    </div>
</div>
        <?php 
        }
    }
?>
<div class="my-footer-text">
<?php
global $theme_default_options;
echo do_shortcode(theme_get_option('theme_override_default_footer_content') ? theme_get_option('theme_footer_content') : theme_get_array_value($theme_default_options, 'theme_footer_content'));
} else { 
?>
<div class="my-footer-text">

<div class="my-content-layout">
    <div class="my-content-layout-row">
    <div class="my-layout-cell" style="width: 50%">
        <p>Здесь будет текст футера</p>
    </div><div class="my-layout-cell" style="width: 50%">
        <p style="text-align: right;">Социальные кнопки</p>
    </div>
    </div>
</div>


<?php } ?>

</div>
