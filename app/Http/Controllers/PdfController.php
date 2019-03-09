<?php

namespace App\Http\Controllers;

use App\User;
use App\Curriculum;
use Illuminate\Http\Request;
use Spipu\Html2Pdf\Html2Pdf;

class PdfController extends Controller {

    public function generar() {

        $html2pdf = new Html2Pdf();

        $users = User::orderBy('created_at', 'asc')->get();

        $html = "<h1 style='color: blue'>" . 'Listado de usuarios activados' . "</h1>" . "<table style='border:2px solid black'>" .
                "<thead>
                <tr>
                    <th>NIF</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
            </thead>" . "<tbody>";


        foreach ($users as $user) {

            $html .= "<tr>
                    <td style='border:2px solid black'>" . $user->nif . "</td>
                    <td style='border:2px solid black'>" . $user->name . "</td>
                    <td style='border:2px solid black'>" . $user->surname . "</td>
                    <td style='border:2px solid black'>" . $user->email . "</td>
                    <td style='border:2px solid black'>" . $user->rol . "</td>                 
                </tr>";
        }

        $html .= "</tbody>" .
                "</table>";

        $html2pdf->writeHTML($html);


        $html2pdf->output('Listado.pdf');
    }

    public function generar_perfil($id) {

        $html2pdf = new Html2Pdf();

        $user = User::find($id);
        
        $imagen = ($user->image_path == null) ? 'http://antiguos-alumnos.com/img/man.png' :  route('ver_imagen', ['filename' => $user->image_path]);
              
        $html = "<img src='" . $imagen . "' style='width:100px'>" .
                "<h4>Nombre y Apellidos: " . $user->name . $user->surname . "</h4>" .
                "<h4>Nick: " . $user->nick . "</h4>" .
                "<h4>Correo electrónico: " . $user->email . "</h4>" .
                "<hr>" .
                "<h5>GITHUB: " . $user->github . "</h5>" .
                "<h5>BLOG: " . $user->blog . "</h5>";

        $html2pdf->writeHTML($html);

        $html2pdf->output('Perfil.pdf');
    }
    
    public function generar_pdf_curriculum($id) {
        
        $html2pdf = new Html2Pdf();
        
        $curriculum = Curriculum::find($id);
        
        $html2pdf->writeHTML($curriculum->contenido);
        
        $html2pdf->output('Curriculum_Vitae.pdf');
        
        
    }

}
