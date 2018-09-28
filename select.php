<?php header('Access-Control-Allow-Origin: *'); ?>
<?php 
    $connect = mysqli_connect("localhost", "root", "", "project_1");
    $output = "";
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $result = mysqli_query($connect, $sql);

    $output .= '<table>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th></th>
                    </tr>';

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_array($result)) {
            $output .= '<tr>
                            <td>'.$row["id"].'</td>
                            <td class="firstName" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>
                            <td class="lastName" data-id2="'.$row["id"].'" contenteditable>'.$row["last_name"].'</td>
                            <td><button class="btnDelete" data-id3="'.$row["id"].'"><i class="fas fa-trash-alt"></i></button></td>';
        }

        $output .= '<tr>
                        <td></td>
                        <td id="firstName" contenteditable></td>
                        <td id="lastName" contenteditable></td>
                        <td><button id="btnAdd"><i class="fas fa-plus"></i></button></td>
                    </tr>';

    } else {
        $output .= '<tr>
                        <td></td>
                        <td id="firstName" contenteditable></td>
                        <td id="lastName" contenteditable></td>
                        <td><button id="btnAdd"><i class="fas fa-plus"></i></button></td>
                    </tr>';
                    
        $output .= '<tr>
                        <td colspan="4">Data Not Found</td>
                    </tr>';
    }

    $output .= '</table>';

    echo $output;            
?>