<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/7/2016
 * Time: 11:27 AM
 */
class SearchForm
{

    public function getLibrariesSelect($libraries= null, $record = null)
    {

        if (!empty($libraries)) {

            $out = "<select name=\"library\" id=\"library\" class=\"sel\">";
            if (empty($record)) {
                $out .= "<option value=\"\">All libraries&hellip;</option>";
            }

            foreach ($libraries as $library) {
                $out .= "<option value=\"";
                $out .= $library['id'];
                $out .= "\"";
                $out .= $this->stickySelect('library', $library['id'], $record);
                $out .= ">";
                $out .= $library['name'];
                $out .= "</option>";
            }
            $out .= "</select>";
            return $out;

        }

    }

    public function stickyCheckedFilter()
    {
        return ' checked="checked"';
    }




    public function stickySelect($field, $value, $default = null) {
        if ($this->isPost($field) && $this->getPost($field) == $value) {
            return ' selected="selected"';
        } else {
            return !empty($default) && $default == $value ?
                ' selected="selected"' : null;
        }
    }

}