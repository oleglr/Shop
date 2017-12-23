<?php
/**
 * Created by PhpStorm.
 * User: Роман
 * Date: 14.12.2017
 * Time: 21:37
 */

namespace app\services;


use app\base\App;
use app\interfaces\IRenderer;

/**
 * Рендеринг шаблона
 * Class Renderer
 * @package app\services
 */
class Renderer implements IRenderer
{
    public function render($template, $params)
    {
        ob_start();
        $templatePath = App::call()->config['root_dir'] . "/views/{$template}.php";
        extract($params);
        include $templatePath;
        return ob_get_clean();
    }
}
