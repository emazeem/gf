<?php


function getTitleFromSlug($slug){
    return ucfirst(str_replace('-',' ',$slug));
}