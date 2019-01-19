<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{

	public function create()
	{

		$businessTypes = [
			'individual' => 'Individual'
		,	'c-corp' => 'C Corporation'
		,	's-corp' => 'S Corporation'
		,	'parntership' => 'Parntership'
		,	'trust' => 'Trust/Estate'
		,	'llc' => 'Limited liability company'
		,	'other' => 'Other'
		];

		$view_data = [
			'name' => 'John Hancock'
		,	'business_name' => 'Acme Corp'
		,	'business_type' => 'llc'
		,	'business_type_llc_classification' => 'S'

		,	'exempt_payee_code' => 'PAYEE'
		,	'factca' => 'fatcha'

		,	'address' => 'The White House'
		,	'address_2' => 'Washington, DC'

		,	'account_numbers' => '1111, 2222'

		,	'requestor_name' => 'Congress'
		,	'requestor_address' => 'Capitol Building'
		,	'requestor_address_2' => 'Washington, DC'

		,	'ssn' => '111-22-3333'
		,	'ein' => '110-1234567'
		
		,	'date' => date('m/d/Y')

		,	'businessTypes' => $businessTypes
		];

		return view('forms.create', $view_data);
	}

	public function store(Request $request)
	{
		$source = app_path('Forms/2018-w9.pdf');
		$signature = app_path('Forms/signature.png');

		$mpdf = new \Mpdf\Mpdf();
		$mpdf->SetImportUse();

		$pagecount = $mpdf->SetSourceFile($source);

		// Import the last page of the source PDF file
		$tplId = $mpdf->ImportPage(1);
		$mpdf->UseTemplate(1);

		$mpdf->WriteText(24, 37, $request->input('name'));
		$mpdf->WriteText(24, 45, $request->input('business_name'));

		$type = $request->input('business_type');
		if ($type == 'individual') {
			$mpdf->WriteText(23, 59, 'X');
		} else if ($type == 'c-corp') {
			$mpdf->WriteText(64, 59, 'X');
		} else if ($type == 's-corp') {
			$mpdf->WriteText(89, 59, 'X');
		} else if ($type == 'parntership') {
			$mpdf->WriteText(114, 59, 'X');
		} else if ($type == 'trust') {
			$mpdf->WriteText(140, 59, 'X');
		} else if ($type == 'llc') {
			$mpdf->WriteText(23, 68, 'X');
		} else if ($type == 'other') {
			$mpdf->WriteText(23, 84, 'X');
		}
		$mpdf->WriteText(147, 67, $request->input('business_type_llc_classification'));

		$mpdf->WriteText(191, 63, $request->input('exempt_payee_code'));
		$mpdf->WriteText(178, 75, $request->input('factca'));


		$mpdf->WriteText(23, 92, $request->input('address'));
		$mpdf->WriteText(23, 100, $request->input('address_2'));
		$mpdf->WriteText(23, 108, $request->input('account_numbers'));

		$mpdf->WriteText(138, 92, $request->input('requestor_name'));
		$mpdf->WriteText(138, 96, $request->input('requestor_address'));
		$mpdf->WriteText(138, 100, $request->input('requestor_address_2'));

		$mpdf->WriteText(148, 125, $request->input('ssn'));
		$mpdf->WriteText(148, 142, $request->input('ein'));

		$mpdf->WriteText(148, 196, $request->input('date'));

		$mpdf->Image($signature, 47, 190, 30, 10, 'png', '', true, false);

		$mpdf->Output();
	}

}
