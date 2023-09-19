<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
	function createPDF($html, $filename = '', $stream = false, $download = true, $paper = 'A4', $orientation = 'portrait')
	{
		// $dompdf = new Dompdf\DOMPDF();
		$dompdf = new Dompdf\Dompdf();
		$dompdf->load_html($html);
		$dompdf->set_paper($paper, $orientation);
		$dompdf->render();
		if ($stream) {
			file_put_contents('assets/pdf/' .  $filename . ".pdf", $dompdf->output());
		} else {
			$dompdf->stream($filename . '.pdf', array('Attachment' => 0));
		}

		// if ($download) {
		// 	$dompdf->stream($filename . '.pdf', array('Attachment' => 1));
		// } else {
		// 	$dompdf->stream($filename . '.pdf', array('Attachment' => 0));
		// }
	}
}
