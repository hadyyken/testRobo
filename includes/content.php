<?php
require_once('../config/DB.php');
require_once('pagination.php');



$page_number = $_POST['page_number'] ?? 1;
$radio = $_POST['radio'] ?? 'all';
$limit = 20;
$current_page = Database::getPage($radio, $page_number, $limit);
$output = "<table  class=table>
";
switch ($radio) {
    case 'all':
    case'trial':{
        $output.= "<tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Дата рождения</th>
                        <th>Создан</th>
                        <th>Изменение</th>
                        </tr>
            ";
        while ($row = $current_page->fetch_assoc()) {

            $output .= "<tr> 
                <td>" . $row['id'] . "</td>
                <td>" . $row['ФИО'] . "</td>
                <td>" . $row['data_of_birth'] . "</td>
                <td>" . $row['created_at'] . "</td>
                <td>" . $row['update_at'] . "</td>   
                </tr>";
        }
        break;
    }

    case 'fired':
    {
        $output.= "<tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Дата увольнения</th>
                        <th>Причина увольнения</th>
                        </tr>
            ";
        while ($row = $current_page->fetch_assoc()) {
            $output .= "<tr> 
                <td>" . $row['id'] . "</td>
                <td>" . $row['ФИО'] . "</td>
                <td>" . $row['Дата увольнения'] . "</td>
                <td>" . $row['description'] . "</td>
 
                </tr>";
        }
        break;
    }
    case 'chief':
    {
        $output.= "<tr>
                        <th>ID</th>
                        <th>ФИО</th>
                        <th>Отдел</th>
                        <th>Дата приема на работу</th>
                        <th>ФИО начальника</th>
                        </tr>
            ";
        while ($row = $current_page->fetch_assoc()) {
            $output .= "<tr> 
                <td>" . $row['id'] . "</td>
                <td>" . $row['ФИО'] . "</td>
                <td>" . $row['Описание'] . "</td>
                <td>" . $row['Дата приема на работу'] . "</td>
                <td>" . $row['ФИО начальника'] . "</td>
 
                </tr>";
        }
        break;
    }
}
$output .= '</table>
<div class="container-fluid" align="center">
<br>';
$total_pages = Database::getPageCount($radio, $limit);
$output.= Pagination($total_pages , $page_number );
$output .= "</div>";

echo $output;


