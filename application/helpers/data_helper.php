<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

//--------- Date formater----------//
function days_calculator($start, $end)
{
	$start_date = date_create($start);
	$end_date = date_create($end);
	$interval = date_diff($start_date, $end_date);
	return $interval->format('%a') + 1;
}

//--------- Date formater----------//
function date_formater($start, $end)
{
	$start_date = date_create($start);
	$end_date = date_create($end);
	$period = $start_date->diff($end_date);

	$result = '';
	if ($period->y) {
		$result .= $period->format("%y years ");
	}
	if ($period->m) {
		$result .= $period->format("%m months ");
	}
	if ($period->d) {
		$result .= $period->format("%d days");
	}

	return $result;
}

//--------- Calculate age----------//
function age_calculator($start, $end)
{
	$start_date = date_create($start);
	$end_date = date_create($end);
	$period = $start_date->diff($end_date);

	$result = '';
	if ($period->y > 0) {
		$result = $period->format("%y");
	} else {
		if ($period->m) {
			$result .= $period->format("%m months ");
		}
		if ($period->d) {
			$result .= $period->format("%d days");
		}
	}

	return $result;
}

//--------- Policy prefix----------//
function policy_prefix()
{
	return 45400;
}

//--------- Policy prefix----------//
function policy_number()
{
	$ci = &get_instance();
	$last = $ci->policy_model->last_policy();

	if ($last) {
		return (string)((int)$last->number + 1);
	} else {
		return policy_prefix() . '00001';
	}
}

//--------- Page seo---------//
function page_seo($slug)
{
	$ci = &get_instance();
	$ci->load->model('seo_model');
	$page = $ci->seo_model->get_page_by_id($slug);

	return [
		'title' => $page['title'],
		'meta_description' => $page['meta_description'],
		'keywords' => $page['keywords'],
	];
}

function imageToBase64($image)
{
	$type = pathinfo($image, PATHINFO_EXTENSION);
	$data = file_get_contents($image);
	$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
	return $base64;
}

function generate_qr_code($data, $filename, $size = 10, $level = 'L')
{
	require_once APPPATH . 'third_party/phpqrcode/qrlib.php';
	QRcode::png($data, $filename, $level, $size, 2);
}
