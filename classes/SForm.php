<?php

/**
 * Created by PhpStorm.
 * User: feler
 * Date: 12/7/2016
 * Time: 11:27 AM
 */
class SForm
{

    public function getLibrariesSelect($libraries = null, $record = null, $addFirst = true)
    {

        if (!empty($libraries)) {

            $out = "<select name=\"library\" id=\"library\" class=\"sel\">";

            if ($addFirst) {
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

    public function stickySelect($field, $value, $default = null)
    {
        if ($this->isPost($field) && $this->getPost($field) == $value) {
            return ' selected="selected"';
        } else {
            return !empty($default) && $default == $value ?
                ' selected="selected"' : null;
        }
    }

    public function isPost($field = null)
    {
        if (!empty($field)) {
            if (isset($_POST[$field])) {
                return true;
            }
            return false;
        } else {
            if (!empty($_POST)) {
                return true;
            }
            return false;
        }
    }

    public function getPost($field = null)
    {
        if (!empty($field)) {
            return $this->isPost($field) ? strip_tags($_POST[$field]) : null;
        }
    }

    public function stickyCheckedFilter()
    {
        return ' checked="checked"';
    }


}