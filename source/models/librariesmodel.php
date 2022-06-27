<?php


class LibrariesModel extends BaseModel {


    function __construct() {
        $s = SETTINGS['libraries'];
        $this->url = "{$s['url']}?languages=php&api_key={$s['api_key']}&per_page={$s['per_page']}";
        $this->sort= $s['default_sort'];
        
    }

    function searchLibs($search) {
        $keyword = $search['keyword'];
        $platform = $search['platform'];
        $this->url = $this->url . "&keywords={$keyword}&platforms={$platform}";
        return $this->getLibraries();
    }

    function  getFirst10Libs() {
        return $this->getLibraries();
    }

    function getLibraries() {
        $url = $this->url . "&sort=" . $this->sort;
        //echo $url;
        $libs = file_get_contents($url);
        return json_decode($libs);
    }

    function getPlatformsHtml($selected) {
        /** Take the HTML heavy lifting out of the template */
        $allPlatforms = ['Packagist', 'NPM', 'GO', 'NuGET'];
        $output = "<select name=search[platform]>";
        $output .= "<option value=''>All</option>";
        foreach($allPlatforms as $p) {
            $output .= "<option value='" . strtolower($p) . "'";
            if(strtolower($p) == $selected ) $output .= " selected ";
            $output .= ">{$p}</option>";
        }
        $output .= "</select>";
        return $output;
    }
}