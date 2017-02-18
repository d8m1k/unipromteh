<?php
defined('IN_SITE') or die;

class Menu{
    public $menu;
    private $db;
    private $menuVisible;

    function __construct() {
        $this->db = DbManager::GetInstance();

        $cur = $this->db->mysqli->query(
            'select m.*'."\r\n".
            'from menu m order by m.id'
        );
        $tree = [null=>['childs'=>[]]];
        $refs[null] = &$tree[null];
        while ($r = $cur->fetch_assoc()) {
            $r['childs'] = [];
            $r['hidden'] = intval($r['id'])<0;
            $refs[$r['parent_id']]['childs'][$r['url']] = $r;
            $refs[$r['id']] = &$refs[$r['parent_id']]['childs'][$r['url']];
        }
        $cur->free();
        $this->menu = $tree[null]['childs'];
    }
    function getOnlyVisible(){
        if (is_null($this->menuVisible))
            $this->fillOnlyVisible($this->menuVisible, $this->menu);
        return $this->menuVisible;
    }
    private function fillOnlyVisible(&$menuVisible, $menu){
        foreach ($menu as $url=>$item){
            if (!$item['hidden']) {
                $menuVisible[$url] = $item;
                $menuVisible[$url]['childs'] = [];
                $this->fillOnlyVisible($menuVisible[$url]['childs'], $menu[$url]['childs']);
            }
        }
    }
    function byUrl($url){
        $curMenu = ['childs'=>$this->menu];
        foreach ($url as $page) {
            if (!array_key_exists($page,$curMenu['childs']))
                throw new Exception('');
            $curMenu = $curMenu['childs'][$page];
        }
        return $curMenu;
    }
}