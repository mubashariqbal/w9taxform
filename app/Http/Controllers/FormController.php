<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

	public function create()
	{
		$source = app_path('Forms/2018-w9.pdf');
		$signature = app_path('Forms/signature.png');

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->SetImportUse();

		$pagecount = $mpdf->SetSourceFile($source);

		// Import the last page of the source PDF file
		$tplId = $mpdf->ImportPage(1);
		$mpdf->UseTemplate(1);

		$mpdf->WriteText(24, 37, 'John Doe');
		$mpdf->WriteText(24, 45, 'ACME Inc');

		$mpdf->Image($signature, 47, 190, 30, 10, 'png', '', true, false);

		$mpdf->Output();

	}

	public function store(Request $request)
	{
		# code...
	}

}
