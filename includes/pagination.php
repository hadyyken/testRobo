<?php
function Pagination ($total_pages , $page_number ): string
{
    $output = '';
    for ($i = 1; $i <= $total_pages; $i++)
    {
        $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;";
        if ($i == $page_number) $output.= "background-color:  #72a5f7";
        $output.= "'id='".$i."'>".$i."</span>";
    }
    return $output;
};