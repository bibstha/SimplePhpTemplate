<?php
class SPT_View
{
    public function assign($vars)
    {
        foreach ($vars as $key => $value) {
            if ( '_' != substr($key, 0, 1)) $this->{$key} = $value;
        }
    }

    public function render($_template, $_return = false)
    {
        if ( $_return ) {
            ob_start();
            require_once($_template);
            $output = ob_get_clean();
            return $output;
        }
        require_once($_template);
    }
}

$view = new View();
$view->assign(array('a' => 'AA', 'b' => 'BB', 'c' => 'CC'));
print $view->render('file.tpl', true);
