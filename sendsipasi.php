<?php

function postData($url, $datasend) {
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($datasend));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


    $result = curl_exec($ch);

    curl_close($ch);

    return $result;
}

 $url_scada = array(
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_PAMUKKULU.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP1.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP2.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP4.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP5.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP8.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP13.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP15.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP17.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP19.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_JENEMARUNG.json',
		'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_CAKURA.json',
		);

	// Initialize an empty array to store the data
	$data = array();

	// Loop through the URLs and get the data
	foreach ($url_scada as $key => $urls) {
	$resp = file_get_contents($urls);
	$data[$key] = json_decode($resp, true);
	}

    // print_r($data); 

    date_default_timezone_set('Asia/Makassar');
	$dateNow = date('Y-m-d H:i:s');

	$wlbp0_1=$data[0]["WL-01 Read (cm)"];
	$s_wlbp0_1 = ($wlbp0_1 >= 32767) ? 0 : $wlbp0_1;
	$wlbp0_2=$data[0]["WL-02 Read (cm)"];
	$s_wlbp0_2 = ($wlbp0_2 >= 32767) ? 0 : $wlbp0_2;
	$debitbp0_p1=$data[0]["Debit Air WL-01"];
	$debitbp0_p2=$data[0]["Debit Air WL-02"];
	$USER_KEY_BP0_1 = 'bwpf4b73cc2d4hn48bj03mhswa8o9x1h';
    $USER_KEY_BP0_2 = '6d861392564e2444e7c1974a6360c0e7';
    $url_bp0_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP0_1;
	$url_bp0_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP0_2;

    $data_bp0_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP0_1,
			'name'=>'BP0-WL01-HULU',
			'fid'=>48,
			'location_id'=>'LIMPAS',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp0_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp0_p1,
			'cb'=>1,
    );

	 $data_bp0_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP0_2,
			'name'=>'BP0-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'INTAKE',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp0_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp0_p2,
			'cb'=>1,
    );

	$wlbp1_1=$data[1]["WL-01 Read (cm)"];
	$s_wlbp1_1 = ($wlbp1_1 >= 32767) ? 0 : $wlbp1_1/10;
	$wlbp1_2=$data[1]["WL-02 Read (cm)"];
	$s_wlbp1_2 = ($wlbp1_2 >= 32767) ? 0 : $wlbp1_2/10;
	$debitbp1_1=$data[1]["Debit Air WL-01"];
	$debitbp1_2=$data[1]["Debit Air WL-02"];
	$USER_KEY_BP1_1 = 'rvarmwr431yz0n42bt7uq46mp3mbjl5w';
    $USER_KEY_BP1_2 = '744c82f50b091990063ab6fc5117f799';
	$url_bp1_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP1_1;
    $url_bp1_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP1_2;

    $data_bp1_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP1_1,
			'name'=>'BP1-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp1_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp1_1,
			'cb'=>1,
    );

	$data_bp1_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP1_2,
			'name'=>'BP1-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp1_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp1_2,
			'cb'=>1,
    );

	$wlbp2_1=$data[2]["WL-01 Read (cm)"];
	$s_wlbp2_1 = ($wlbp2_1 >= 32767) ? 0 : $wlbp2_1/10;
	$wlbp2_2=$data[2]["WL-02 Read (cm)"];
	$s_wlbp2_2 = ($wlbp2_2 >= 32767) ? 0 : $wlbp2_2/10;
	$debitbp2_1=$data[2]["Debit Air WL-01"];
	$debitbp2_2=$data[2]["Debit Air WL-02"];
	$USER_KEY_BP2_1 = 'tia1zwbg3scvfuxtqpp1a98t7z61zx8g';
    $USER_KEY_BP2_2 = 'ea569d0f4853b744172494fdcf58995f';
	$url_bp2_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP2_1;
    $url_bp2_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP2_2;

    $data_bp2_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP2_1,
			'name'=>'BP2-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp2_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp2_1,
			'cb'=>1,
    );

	$data_bp2_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP2_2,
			'name'=>'BP2-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp2_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp2_2,
			'cb'=>1,
    );

	$wlbp4_1=$data[3]["WL-01 Read (cm)"];
	$s_wlbp4_1 = ($wlbp4_1 >= 32767) ? 0 : $wlbp4_1/10;
	$wlbp4_2=$data[3]["WL-02 Read (cm)"];
	$s_wlbp4_2 = ($wlbp4_2 >= 32767) ? 0 : $wlbp4_2/10;
	$debitbp4_1=$data[3]["Debit Air WL-01"];
	$debitbp4_2=$data[3]["Debit Air WL-02"];
	$USER_KEY_BP4_1 = 'xsz6waolg5xxasyh3g9c4xw51u22xxgn';
    $USER_KEY_BP4_2 = 'ab7af91e2ad5d47e882b45d68282fab8';
	$url_bp4_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP4_1;
    $url_bp4_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP4_2;

    $data_bp4_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP4_1,
			'name'=>'BP4-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp4_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp4_1,
			'cb'=>1,
    );

	$data_bp4_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP4_2,
			'name'=>'BP4-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp4_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp4_2,
			'cb'=>1,
    );

	$wlbp5_1=$data[4]["WL-01 Read (cm)"];
	$s_wlbp5_1 = ($wlbp5_1 >= 32767) ? 0 : $wlbp5_1/10;
	$wlbp5_2=$data[4]["WL-02 Read (cm)"];
	$s_wlbp5_2 = ($wlbp5_2 >= 32767) ? 0 : $wlbp5_2/10;
	$debitbp5_1=$data[4]["Debit Air WL-01"];
	$debitbp5_2=$data[4]["Debit Air WL-02"];
	$USER_KEY_BP5_1 = 'q8v05zosx5qd4yuorwapdxwqivi9jjfs';
    $USER_KEY_BP5_2 = '479c42b123837be6de6b64f00c573239';
	$url_bp5_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP5_1;
    $url_bp5_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP5_2;
    
	$data_bp5_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP5_1,
			'name'=>'BP5-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp5_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp5_1,
			'cb'=>1,
    );

	$data_bp5_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP5_2,
			'name'=>'BP5-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp5_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp5_2,
			'cb'=>1,
    );

	$wlbp8_1=$data[5]["WL-01 Read (cm)"];
	$s_wlbp8_1 = ($wlbp8_1 >= 32767) ? 0 : $wlbp8_1/10;
	$wlbp8_2=$data[5]["WL-02 Read (cm)"];
	$s_wlbp8_2 = ($wlbp8_2 >= 32767) ? 0 : $wlbp8_2/10;
	$debitbp8_1=$data[5]["Debit Air WL-01"];
	$debitbp8_2=$data[5]["Debit Air WL-02"];
	$USER_KEY_BP8_1 = 'sh8z0q7v7vicgr1atf50vpcglw5744ft';
    $USER_KEY_BP8_2 = '292628e9173b041424b899c611536f78';
	$url_bp8_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP8_1;
    $url_bp8_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP8_2;

    $data_bp8_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP8_1,
			'name'=>'BP8-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp8_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp8_1,
			'cb'=>1,
    );

	$data_bp8_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP8_2,
			'name'=>'BP8-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp8_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp8_2,
			'cb'=>1,
    );

	$wlbp13_1=$data[6]["WL-01 Read (cm)"];
	$s_wlbp13_1 = ($wlbp13_1 >= 32767) ? 0 : $wlbp13_1/10;
	$wlbp13_2=$data[6]["WL-02 Read (cm)"];
	$s_wlbp13_2 = ($wlbp13_2 >= 32767) ? 0 : $wlbp13_2/10;
	$debitbp13_1=$data[6]["Debit Air WL-01"];
	$debitbp13_2=$data[6]["Debit Air WL-02"];
	$USER_KEY_BP13_1 = '5hazk7wevfevmonplgmoaq73zj7oc2ss';
    $USER_KEY_BP13_2 = '936bdbaccfcd55d45d27494ec0f23e02';
	$url_bp13_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP13_1;
    $url_bp13_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP13_2;

    $data_bp13_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP13_1,
			'name'=>'BP13-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp13_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp13_1,
			'cb'=>1,
    );

	 $data_bp13_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP13_2,
			'name'=>'BP13-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp13_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp13_2,
			'cb'=>1,
    );

	$wlbp15_1=$data[7]["WL-01 Read (cm)"];
	$s_wlbp15_1 = ($wlbp15_1 >= 32767) ? 0 : $wlbp15_1/10;
	$wlbp15_2=$data[7]["WL-02 Read (cm)"];
	$s_wlbp15_2 = ($wlbp15_2 >= 32767) ? 0 : $wlbp15_2/10;
	$debitbp15_1=$data[7]["Debit Air WL-01"];
	$debitbp15_2=$data[7]["Debit Air WL-02"];
	$USER_KEY_BP15_1 = 'i6bnn29ndj1ks72gtppduyzzifj9mt9t';
    $USER_KEY_BP15_2 = 'ed0ecb71c1f62cae20f09243f42d8fc4';
	$url_bp15_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP15_1;
    $url_bp15_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP15_2;

    $data_bp15_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP15_1,
			'name'=>'BP15-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp15_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp15_1,
			'cb'=>1,
    );

	$data_bp15_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP15_2,
			'name'=>'BP15-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp15_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp15_2,
			'cb'=>1,
    );

	$wlbp17_1=$data[8]["WL-01 Read (cm)"];
	$s_wlbp17_1 = ($wlbp17_1 >= 32767) ? 0 : $wlbp17_1/10;
	$wlbp17_2=$data[8]["WL-02 Read (cm)"];
	$s_wlbp17_2 = ($wlbp17_2 >= 32767) ? 0 : $wlbp17_2/10;
	$debitbp17_1=$data[8]["Debit Air WL-01"];
	$debitbp17_2=$data[8]["Debit Air WL-02"];
	$USER_KEY_BP17_1 = 'wmi0us83h0upwlpkawkuh95fy6nbmzhh';
    $USER_KEY_BP17_2 = '915c5ea235386e2629001d48a7d4b496';
    $url_bp17_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP17_1;
	$url_bp17_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP17_2;

    $data_bp17_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP17_1,
			'name'=>'BP17-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp17_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp17_1,
			'cb'=>1,
    );

	$data_bp17_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP17_2,
			'name'=>'BP17-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp17_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp17_2,
			'cb'=>1,
    );

	$wlbp19_1=$data[9]["WL-01 Read (cm)"];
	$s_wlbp19_1 = ($wlbp19_1 >= 32767) ? 0 : $wlbp19_1/10;
	$wlbp19_2=$data[9]["WL-02 Read (cm)"];
	$s_wlbp19_2 = ($wlbp19_2 >= 32767) ? 0 : $wlbp19_2/10;
	$debitbp19_1=$data[9]["Debit Air WL-01"];
	$debitbp19_2=$data[9]["Debit Air WL-02"];
	$USER_KEY_BP19_1 = 'kt3xgwt04nojg5xjwarfn9ocpakesskb';
    $USER_KEY_BP19_2 = 'ab1db4e4026555f562bb47a0b7b17568';
	$url_bp19_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP19_1;
    $url_bp19_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BP19_2;

    $data_bp19_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP19_1,
			'name'=>'BP19-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp19_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp19_1,
			'cb'=>1,
    );

	 $data_bp19_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BP19_2,
			'name'=>'BP19-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbp19_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbp19_2,
			'cb'=>1,
    );

	$wlbj_1=$data[10]["WL-01 Read (cm)"];
	$s_wlbj_1 = ($wlbj_1 >= 32767) ? 0 : $wlbj_1/10;
	$wlbj_2=$data[10]["WL-02 Read (cm)"];
	$s_wlbj_2 = ($wlbj_2 >= 32767) ? 0 : $wlbj_2/10;
	$wlbj_3=$data[10]["WL-03 Read (cm)"];
	$s_wlbj_3 = ($wlbj_3 >= 32767) ? 0 : $wlbj_3/10;
	$debitbj_1=$data[10]["Debit Air WL-01"];
	$debitbj_2=$data[10]["Debit Air WL-02"];
	$debitbj_3=$data[10]["Debit Air WL-03"];
    $USER_KEY_BJ_KA = 'fa0b8a6b2a55aab8040e9f0c5ebeba7f';
	$USER_KEY_BJ_KI = 'gjuwrj9s5jltvw9a3vaydh0l58r314rv';
	$USER_KEY_BJ_0 = '048bcd00bzirhqikedy5u2gc22xqihx8';
    $url_bj_ka = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BJ_KA;
	$url_bj_ki = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BJ_KI;
	$url_bj_0 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BJ_0;

    $data_bj_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BJ_0,
			'name'=>'BJ-WL01',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbj_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbj_1,
			'cb'=>1,
    );

	 $data_bj_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BJ_KA,
			'name'=>'BJ-WL02-KA',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbj_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbj_2,
			'cb'=>1,
    );

	 $data_bj_3 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BJ_KI,
			'name'=>'BJ-WL03-KI',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbj_3,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbj_3,
			'cb'=>1,
    );

	$wlbc_1=$data[11]["WL-01 Read (cm)"];
	$s_wlbc_1 = ($wlbc_1 >= 32767) ? 0 : $wlbc_1/10;
	$wlbc_2=$data[11]["WL-02 Read (cm)"];
	$s_wlbc_2 = ($wlbc_2 >= 32767) ? 0 : $wlbc_2/10;
	$debitbc_1=$data[11]["Debit Air WL-01"];
	$debitbc_2=$data[11]["Debit Air WL-02"];
	$USER_KEY_BC_1 = 'luyo7eg3omfijejbukkbew29xqwnf19o';
    $USER_KEY_BC_2 = '066a2deef446a06feb33e0c3f6f839c3';
	$url_bc_1 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BC_1;
    $url_bc_2 = 'https://pamukkulu.sipasi.online/api?api_key='.$USER_KEY_BC_2;

    $data_bc_1 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BC_1,
			'name'=>'BC-WL01-HULU',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbc_1,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbc_1,
			'cb'=>1,
    );

	$data_bc_2 = array(
			'sensor'=>'AWLR',
			'client_id'=>$USER_KEY_BC_2,
			'name'=>'BC-WL02-HILIR',
			'fid'=>48,
			'location_id'=>'SALURAN',
			'time_record'=>$dateNow,
			'tma'=>$s_wlbc_2,
			'gate_number'=>'gate_1',
			'discharge'=>$debitbc_2,
			'cb'=>1,
    );

    $post_bp0 = postData($url_bp0_1, $data_bp0_1);
    print $post_bp0;
	$post_bp1 = postData($url_bp1_1, $data_bp1_1);
    print $post_bp1;
	$post_bp2 = postData($url_bp2_1, $data_bp2_1);
    print $post_bp2;
	$post_bp4 = postData($url_bp4_1, $data_bp4_1);
    print $post_bp4;
	$post_bp5 = postData($url_bp5_1, $data_bp5_1);
    print $post_bp5;
	$post_bp8 = postData($url_bp8_1, $data_bp8_1);
    print $post_bp8;
	$post_bp13 = postData($url_bp13_1, $data_bp13_1);
    print $post_bp13;
	$post_bp15 = postData($url_bp15_1, $data_bp15_1);
    print $post_bp15;
	$post_bp17 = postData($url_bp17_1, $data_bp17_1);
    print $post_bp17;
	$post_bp19 = postData($url_bp19_1, $data_bp19_1);
    print $post_bp19;
	$post_bj = postData($url_bj_0, $data_bj_1);
    print $post_bj;
	$post_bc = postData($url_bc_1, $data_bc_1);
    print $post_bc;

	$post_bp0_2 = postData($url_bp0_2, $data_bp0_2);
    print $post_bp0_2;
	$post_bp1_2 = postData($url_bp1_2, $data_bp1_2);
    print $post_bp1_2;
	$post_bp2_2 = postData($url_bp2_2, $data_bp2_2);
    print $post_bp2_2;
	$post_bp4_2 = postData($url_bp4_2, $data_bp4_2);
    print $post_bp4_2;
	$post_bp5_2 = postData($url_bp5_2, $data_bp5_2);
    print $post_bp5_2;
	$post_bp8 = postData($url_bp8_2, $data_bp8_2);
    print $post_bp8;
	$post_bp13_2 = postData($url_bp13_2, $data_bp13_2);
    print $post_bp13_2;
	$post_bp15_2 = postData($url_bp15_2, $data_bp15_2);
    print $post_bp15_2;
	$post_bp17_2 = postData($url_bp17_2, $data_bp17_2);
    print $post_bp17_2;
	$post_bp19_2 = postData($url_bp19_2, $data_bp19_2);
    print $post_bp19_2;
	$post_bj_2 = postData($url_bj_ka, $data_bj_2);
    print $post_bj_2;
	$post_bj_3 = postData($url_bj_ki, $data_bj_3);
    print $post_bj_3;
	$post_bc_2 = postData($url_bc_2, $data_bc_2);
    print $post_bc_2;
?>