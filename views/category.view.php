<?php
require_once './libs/smarty-3.1.39/libs/Smarty.class.php';

class CategoryView
{
    private $smarty;

    function __construct()
    {
        $this->smarty = new Smarty();
    }

    function showCategories($categories)
    {
        $this->smarty->assign('title', 'Listado de Categorias');
        $this->smarty->assign('categories', $categories);
        $this->smarty->assign('userRole', $_SESSION ? $_SESSION["USER_ROLE"] : 'USER');
        $this->smarty->display('templates/categories-list.html');
    }

    function showCategoryForm($category, $mode)
    {
        $fromTitle = $mode === 'create' ? 'Agregar Categoria' : 'Editar Categoria - ' . $category->categoryName;
        $this->smarty->assign('title', $fromTitle);
        $this->smarty->assign('mode', $mode);
        $this->smarty->assign('category', $category);
        $this->smarty->display('templates/category-form.html');
    }
}
