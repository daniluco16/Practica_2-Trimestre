<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;

use Spipu\Html2Pdf\Html2Pdf;

class PdfController extends Controller {

    public function generar() {

        $html2pdf = new Html2Pdf();
        
        $users = User::orderBy('created_at', 'asc')->get();

        $html = "<h1 style='color: blue'>". 'Listado de usuarios activados' . "</h1>"."<table style='border:2px solid black'>" .
        "<thead>
                <tr>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
            </thead>"."<tbody>";


        foreach ($users as $user) {
            
            $html .= "<tr>
                    <td style='border:2px solid black'>".$user->nif."</td>
                    <td style='border:2px solid black'>".$user->name."</td>
                    <td style='border:2px solid black'>".$user->surname."</td>
                    <td style='border:2px solid black'>".$user->email."</td>
                    <td style='border:2px solid black'>".$user->rol."</td>                 
                </tr>";
                      
        }
        
        $html .=  "</tbody>".
        "</table>";
        
        $html2pdf->writeHTML($html);
        
        
        $html2pdf->output('Listado.pdf');
                
    }

}