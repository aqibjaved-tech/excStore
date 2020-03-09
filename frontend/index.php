<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <base href="">
    <title>Exchange Collective - Page Builder</title>

    <link href="css/editor.css" rel="stylesheet">
    <link href="css/line-awesome.css" rel="stylesheet">
  </head>
<body>
  <?php
    include __DIR__."/function.php";
    // $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
   ?>
   <?php

   $module_name = array();
   $html_block = '';
   $singlemodule = '';
   $singlemodule11 = '';
   $iconimage =  '';
   $iconurl = '';

// demo/mark-selby-7/vue-need-to-be-complete.html
$site = $_GET['siteid'];
$page = $_GET['pageid'];

$url = 'http://staging.exchangecollective.com/api/v2/getPageById/'.$site.'/'.$page;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // get page details e.g folder, page name
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $data = curl_exec($ch);
        $content =json_decode($data);
        curl_close($ch);
        if(isset($content->status)){
            if($content->status === false){
                return redirect('/')->with('error','No page found.');
            }
        }
$pagename = $content->file_name;
$site_folder = $content->site_folder;

 $site_folder = 'demo/'.$site_folder.'/'.$pagename;

   ?>
<input type="hidden" name="site_url" id="siteUrl" value="<?php echo BASE_URL; ?>">
<form method="post" enctype="multipart/form-data">
	<div id="vvveb-builder">
		<div id="top-panel">
			<div class="row no-margin">
				<div class="logo col-md-3 col-sm-3 col-xs-12">
					<img src="img/logo.png" alt="Logo" id="logo">
				</div>
				<div class="col-md-9 col-sm-9 col-xs-12 right-panel">

					<div class="row">
						<div class="btn-group col-md-1 col-sm-1 col-xs-12 responsive-views text-left" role="group">
							<button id="desktop-view"  data-view="" class="btn btn-light"  title="Desktop view" data-vvveb-action="viewport">
								<!-- <i class="la la-laptop"></i> -->
								<svg width="37px" height="30px" viewBox="0 0 37 30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-260.000000, -25.000000)" fill="#FFFFFF">
											<path d="M293.636364,25 L263.363636,25 C261.496818,25 260,26.4833333 260,28.3333333 L260,48.3333333 C260,50.1666667 261.496818,51.6666667 263.363636,51.6666667 L271.772727,51.6666667 L271.772727,55 L285.227273,55 L285.227273,51.6666667 L293.636364,51.6666667 C295.486364,51.6666667 296.983182,50.1666667 296.983182,48.3333333 L297,28.3333333 C297,26.4833333 295.486364,25 293.636364,25 L293.636364,25 Z M293.636364,48.3333333 L263.363636,48.3333333 L263.363636,28.3333333 L293.636364,28.3333333 L293.636364,48.3333333 L293.636364,48.3333333 Z" id="Shape"></path>
										</g>
									</g>
								</svg>
							</button>

							<button id="tablet-view"  data-view="tablet" class="btn btn-light"  title="Tablet view" data-vvveb-action="viewport">
								<!-- <i class="la la-tablet"></i> -->
								<svg width="20px" height="26px" viewBox="0 0 20 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-317.000000, -25.000000)" fill="#FFFFFF">
											<path d="M334.142857,25 L319.857143,25 C318.285714,25 317,26.0636364 317,27.3636364 L317,48.6363636 C317,49.9363636 318.285714,51 319.857143,51 L334.142857,51 C335.714286,51 337,49.9363636 337,48.6363636 L337,27.3636364 C337,26.0636364 335.714286,25 334.142857,25 L334.142857,25 Z M335.571429,46.2727273 L318.428571,46.2727273 L318.428571,27.3636364 L335.571429,27.3636364 L335.571429,46.2727273 Z M327.588235,49.8181818 C326.938489,49.8181818 326.411765,49.2890638 326.411765,48.6363636 C326.411765,47.9836635 326.938489,47.4545455 327.588235,47.4545455 C328.237982,47.4545455 328.764706,47.9836635 328.764706,48.6363636 C328.764706,49.2890638 328.237982,49.8181818 327.588235,49.8181818 Z" id="Shape-Copy"></path>
										</g>
									</g>
								</svg>
							</button>

							<button id="mobile-view" data-view="mobile" class="btn btn-light"  title="Mobile view" data-vvveb-action="viewport">
								<!-- <i class="la la-mobile-phone"></i> -->
								<svg width="12px" height="22px" viewBox="0 0 12 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-357.000000, -27.000000)" fill="#FFFFFF">
											<path d="M367.285714,27 L358.714286,27 C357.771429,27 357,27.9 357,29 L357,47 C357,48.1 357.771429,49 358.714286,49 L367.285714,49 C368.228571,49 369,48.1 369,47 L369,29 C369,27.9 368.228571,27 367.285714,27 L367.285714,27 Z M368.142857,45 L357.857143,45 L357.857143,29 L368.142857,29 L368.142857,45 Z M363,48 C362.447715,48 362,47.5522847 362,47 C362,46.4477153 362.447715,46 363,46 C363.552285,46 364,46.4477153 364,47 C364,47.5522847 363.552285,48 363,48 Z" id="Shape-Copy-2"></path>
										</g>
									</g>
								</svg>
							</button>
						</div>
						<div class="col-md-7 col-sm-7 col-xs-12 extra-space">
							<!-- <button class="btn btn-light" title="Toggle file manager" id="toggle-file-manager-btn" data-vvveb-action="toggleFileManager" data-toggle="button" aria-pressed="false">
								<img src="libs/builder/icons/file-manager-layout.svg" width="20px" height="20px">
							</button> -->

							<button class="btn btn-light" title="Toggle left column" id="toggle-left-column-btn" data-vvveb-action="toggleLeftColumn" data-toggle="button" aria-pressed="false">
								<svg width="352px" height="354px" viewBox="0 0 352 354" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_04" transform="translate(-337.000000, -127.000000)">
											<g id="Group-5" transform="translate(337.000000, 127.000000)">
												<rect id="Rectangle" stroke="#5D5D5D" stroke-width="30" x="15" y="15" width="322" height="324"></rect>
												<path d="M176,30.5 L176,326" id="Line" stroke="#5D5D5D" stroke-width="30" stroke-linecap="square"></path>
												<rect id="Rectangle" fill-opacity="0.61" fill="#E9E9E9" x="30" y="30" width="131" height="294"></rect>
											</g>
										</g>
									</g>
								</svg>
							</button>

							<button class="btn btn-light" title="Toggle right column" id="toggle-right-column-btn" data-vvveb-action="toggleRightColumn" data-toggle="button" aria-pressed="false">
								<svg width="352px" height="354px" viewBox="0 0 352 354" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_04" transform="translate(-390.000000, -192.000000)">
											<g id="Group-5" transform="translate(390.000000, 192.000000)">
												<rect id="Rectangle" stroke="#5D5D5D" stroke-width="30" x="15" y="15" width="322" height="324"></rect>
												<path d="M176,30.5 L176,326" id="Line" stroke="#5D5D5D" stroke-width="30" stroke-linecap="square"></path>
												<rect id="Rectangle" fill-opacity="0.61" fill="#E9E9E9" x="191" y="30" width="131" height="294"></rect>
											</g>
										</g>
									</g>
								</svg>
							</button>
						</div>
						<div class="btn-group undo-redo col-md-1 col-sm-1 col-xs-12 undo-redo text-left" role="group">
							<button class="btn btn-light" title="Undo (Ctrl/Cmd + Z)" id="undo-btn" data-vvveb-action="undo" data-vvveb-shortcut="ctrl+z">
								<!-- <i class="la la-undo"></i> -->
								<svg width="15px" height="17px" viewBox="0 0 15 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-894.000000, -34.000000)" fill="#FFFFFF">
											<g id="ic_subdirectory_arrow_right_24px" transform="translate(894.000000, 30.000000)">
												<g id="Group">
													<polygon id="Shape-Copy-3" transform="translate(7.500000, 12.500000) scale(-1, 1) translate(-7.500000, -12.500000) " points="15 15 9 21 7.58 19.58 11.17 16 0 16 0 4 2 4 2 14 11.17 14 7.58 10.42 9 9"></polygon>
												</g>
											</g>
										</g>
									</g>
								</svg>
							</button>

							<button class="btn btn-light"  title="Redo (Ctrl/Cmd + Shift + Z)" id="redo-btn" data-vvveb-action="redo" data-vvveb-shortcut="ctrl+shift+z">
								<!-- <i class="la la-undo la-flip-horizontal"></i> -->
								<svg width="15px" height="17px" viewBox="0 0 15 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-948.000000, -34.000000)" fill="#FFFFFF">
											<g id="ic_subdirectory_arrow_right_24px" transform="translate(894.000000, 30.000000)">
												<g id="Group">
													<polygon id="Shape" points="69 15 63 21 61.58 19.58 65.17 16 54 16 54 4 56 4 56 14 65.17 14 61.58 10.42 63 9"></polygon>
												</g>
											</g>
										</g>
									</g>
								</svg>
							</button>
						</div>
						<div class="btn-group save-temp text-right border-left" role="group">
							<button class="btn btn-light settings-icon" title="Settings" data-vvveb-action="toggleSettingsPanel">
								<svg width="19px" height="20px" viewBox="0 0 19 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-1024.000000, -32.000000)" fill="#FFFFFF">
											<path d="M1040.75867,42.98 C1040.79774,42.66 1040.82704,42.34 1040.82704,42 C1040.82704,41.66 1040.79774,41.34 1040.75867,41.02 L1042.8194,39.37 C1043.00497,39.22 1043.0538,38.95 1042.9366,38.73 L1040.9833,35.27 C1040.8661,35.05 1040.60241,34.97 1040.38754,35.05 L1037.95568,36.05 C1037.44783,35.65 1036.9009,35.32 1036.30514,35.07 L1035.93402,32.42 C1035.90472,32.18 1035.69962,32 1035.45546,32 L1031.54886,32 C1031.30469,32 1031.0996,32.18 1031.0703,32.42 L1030.69917,35.07 C1030.10341,35.32 1029.55649,35.66 1029.04863,36.05 L1026.61677,35.05 C1026.39214,34.96 1026.13821,35.05 1026.02101,35.27 L1024.06771,38.73 C1023.94075,38.95 1023.99935,39.22 1024.18491,39.37 L1026.24564,41.02 C1026.20658,41.34 1026.17728,41.67 1026.17728,42 C1026.17728,42.33 1026.20658,42.66 1026.24564,42.98 L1024.18491,44.63 C1023.99935,44.78 1023.95051,45.05 1024.06771,45.27 L1026.02101,48.73 C1026.13821,48.95 1026.40191,49.03 1026.61677,48.95 L1029.04863,47.95 C1029.55649,48.35 1030.10341,48.68 1030.69917,48.93 L1031.0703,51.58 C1031.0996,51.82 1031.30469,52 1031.54886,52 L1035.45546,52 C1035.69962,52 1035.90472,51.82 1035.93402,51.58 L1036.30514,48.93 C1036.9009,48.68 1037.44783,48.34 1037.95568,47.95 L1040.38754,48.95 C1040.61217,49.04 1040.8661,48.95 1040.9833,48.73 L1042.9366,45.27 C1043.0538,45.05 1043.00497,44.78 1042.8194,44.63 L1040.75867,42.98 L1040.75867,42.98 Z M1033.50216,45.5 C1031.61722,45.5 1030.08388,43.93 1030.08388,42 C1030.08388,40.07 1031.61722,38.5 1033.50216,38.5 C1035.38709,38.5 1036.92043,40.07 1036.92043,42 C1036.92043,43.93 1035.38709,45.5 1033.50216,45.5 L1033.50216,45.5 Z" id="Shape"></path>
										</g>
									</g>
								</svg>
							</button>
							<button class="btn btn-light fullscreen-icon" title="Fullscreen (F11)" id="fullscreen-btn" data-toggle="button" aria-pressed="false" data-vvveb-action="fullscreen">
								<!-- <i class="la la-arrows"></i> -->
								<svg width="20px" height="20px" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-1076.000000, -31.000000)">
											<g id="ic_filter_none_24px" transform="translate(1076.000000, 31.000000)">
												<g id="Group">
													<polygon id="Shape" points="0 0 20 0 20 20 0 20"></polygon>
													<path d="M2.5,4.16666667 L0.833333333,4.16666667 L0.833333333,17.5 C0.833333333,18.4166667 1.58333333,19.1666667 2.5,19.1666667 L15.8333333,19.1666667 L15.8333333,17.5 L2.5,17.5 L2.5,4.16666667 L2.5,4.16666667 Z M17.5,0.833333333 L5.83333333,0.833333333 C4.91666667,0.833333333 4.16666667,1.58333333 4.16666667,2.5 L4.16666667,14.1666667 C4.16666667,15.0833333 4.91666667,15.8333333 5.83333333,15.8333333 L17.5,15.8333333 C18.4166667,15.8333333 19.1666667,15.0833333 19.1666667,14.1666667 L19.1666667,2.5 C19.1666667,1.58333333 18.4166667,0.833333333 17.5,0.833333333 L17.5,0.833333333 Z M17.5,14.1666667 L5.83333333,14.1666667 L5.83333333,2.5 L17.5,2.5 L17.5,14.1666667 L17.5,14.1666667 Z" id="Shape" fill="#FFFFFF"></path>
												</g>
											</g>
										</g>
									</g>
								</svg>
							</button>
							<button class="btn btn-light history-icon" title="History" data-vvveb-action="toggleHistoryPanel">
								<svg width="21px" height="18px" viewBox="0 0 21 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<g id="Desktop_01" transform="translate(-1123.000000, -32.000000)">
											<g id="ic_history_24px" transform="translate(1122.000000, 29.000000)">
												<g id="Group">
													<polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
													<path d="M13,3 C8.03,3 4,7.03 4,12 L1,12 L4.89,15.89 L4.96,16.03 L9,12 L6,12 C6,8.13 9.13,5 13,5 C16.87,5 20,8.13 20,12 C20,15.87 16.87,19 13,19 C11.07,19 9.32,18.21 8.06,16.94 L6.64,18.36 C8.27,19.99 10.51,21 13,21 C17.97,21 22,16.97 22,12 C22,7.03 17.97,3 13,3 L13,3 Z M12,8 L12,13 L16.28,15.54 L17,14.33 L13.5,12.25 L13.5,8 L12,8 L12,8 Z" id="Shape" fill="#FFFFFF"></path>
												</g>
											</g>
										</g>
									</g>
								</svg>
							</button>
						</div>
						<div class="btn-group col-md-2 col-sm-2 col-xs-12 border-left float-right responsive-btns" role="group">
							<button class="btn btn-light preview-btn" title="Preview" id="preview-btn" type="button" data-toggle="button" aria-pressed="false" data-vvveb-action="preview">
								<!-- <i class="la la-eye"></i> -->
								Preview
							</button>

							<button class="btn btn-light save-btn" title="Export (Ctrl + E)" id="save-btn" data-vvveb-action="saveAjax" data-vvveb-shortcut="ctrl+e">
								<!-- <i class="la la-save"></i> -->
								Publish
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="left-panel">
			<div class="drag-elements">
				<div class="header">
					<ul class="nav nav-tabs" id="elements-tabs" role="tablist">
						<li class="nav-item component-pages-tab">
							<a class="nav-link" data-vvveb-action="togglePagesPanel"><img src="img/custom-elements.png" alt="Pages" /><div><small>Pages</small></div></a>
						</li>
						<li class="nav-item blocks-tab active">
							<a class="nav-link active show" id="blocks-tab" data-toggle="tab" href="#blocks" role="tab" aria-controls="blocks" aria-selected="false"><img src="img/addblocks.png" alt="All Blocks" /> <div><small>Blocks</small></div></a>
						</li>
						<li class="nav-item component-tab">
							<a class="nav-link" id="components-tab" data-toggle="tab" href="#components" role="tab" aria-controls="components" aria-selected="true"><img src="img/all-elements.png" alt="All Elements" /> <div><small>Elements</small></div></a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade" id="components" role="tabpanel" aria-labelledby="components-tab">
							<div class="search">
								<input class="form-control form-control-sm component-search" placeholder="Search components" type="text" data-vvveb-action="componentSearch" data-vvveb-on="keyup">
								<button class="clear-backspace"  data-vvveb-action="clearComponentSearch">
									<i class="la la-close"></i>
								</button>
							</div>
							<div class="drag-elements-sidepane sidepane">
								<div>
									<ul class="components-list clearfix" data-type="leftpanel">
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane fade show active" id="blocks" role="tabpanel" aria-labelledby="blocks-tab">
							<div class="search">
								<input class="form-control form-control-sm block-search" placeholder="Search blocks" type="text" data-vvveb-action="blockSearch" data-vvveb-on="keyup">
								<button class="clear-backspace"  data-vvveb-action="clearBlockSearch">
									<i class="la la-close"></i>
								</button>
							</div>
							<div class="drag-elements-sidepane sidepane">
								<div>
									<ul class="blocks-list clearfix" data-type="leftpanel">
									</ul>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="properties" role="tabpanel" aria-labelledby="pages-tab">
							<div class="component-properties-sidepane">

								<!-- <div>
									<div class="component-properties">
										<div class="mt-4 text-center">Click on an element to edit.</div>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="canvas">
			<div id="iframe-wrapper">
				<div id="iframe-layer">
					<div id="highlight-box">
						<div id="highlight-name"></div>
						<div id="section-actions">
							<a id="add-section-btn" href="" title="Add element"><i class="la la-plus"></i></a>
						</div>
					</div>

					<div id="select-box">
						<div id="wysiwyg-editor">
							<a id="bold-btn" href="" title="Bold"><i><strong>B</strong></i></a>
							<a id="italic-btn" href="" title="Italic"><i>I</i></a>
							<a id="underline-btn" href="" title="Underline"><u>u</u></a>
							<a id="strike-btn" href="" title="Strikeout"><del>S</del></a>
							<a id="link-btn" href="" title="Create link"><strong>a</strong></a>
						</div>
						<div id="select-actions">
							<a id="drag-btn" href="" title="Drag element"><i class="la la-arrows"></i></a>
							<a id="parent-btn" href="" title="Select parent"><i class="la la-level-down la-rotate-180"></i></a>
							<a id="child-btn" href="" title="Select Child"><i class="la la-level-down"></i></a>
							<a id="up-btn" href="" title="Move element up"><i class="la la-arrow-up"></i></a>
							<a id="down-btn" href="" title="Move element down"><i class="la la-arrow-down"></i></a>
							<a id="clone-element-btn" title="Clone element"><i class="la la-copy"></i></a>
							<a id="delete-btn" href="" title="Remove element"><i class="la la-trash"></i></a>
						</div>
					</div>

					<div id="add-section-box" class="drag-elements">
						<div class="header">
							<ul class="nav nav-tabs" id="box-elements-tabs" role="tablist">
								<li class="nav-item component-tab">
									<a class="nav-link active" id="box-components-tab" data-toggle="tab" href="#box-components" role="tab" aria-controls="components" aria-selected="true"><i class="la la-lg la-cube"></i> <div><small>Elements</small></div></a>
								</li>
								<li class="nav-item blocks-tab">
									<a class="nav-link" id="box-blocks-tab" data-toggle="tab" href="#box-blocks" role="tab" aria-controls="blocks" aria-selected="false"><i class="la la-lg la-image"></i> <div><small>Blocks</small></div></a>
								</li>
							</ul>

							<div class="section-box-actions">
								<div id="close-section-btn" class="btn btn-light btn-sm bg-white btn-sm float-right"><i class="la la-close"></i></div>
								<div class="small mt-1 mr-3 float-right">
									<!-- <div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="add-section-insert-mode-before" value="before" checked="checked" name="add-section-insert-mode" class="custom-control-input">
										<label class="custom-control-label" for="add-section-insert-mode-before">Before</label>
									</div> -->
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="add-section-insert-mode-after" value="after" checked="checked" name="add-section-insert-mode" class="custom-control-input">
										<label class="custom-control-label" for="add-section-insert-mode-after">After</label>
									</div>
									<div class="custom-control custom-radio custom-control-inline">
										<input type="radio" id="add-section-insert-mode-inside" value="inside" name="add-section-insert-mode" class="custom-control-input">
										<label class="custom-control-label" for="add-section-insert-mode-inside">Inside</label>
									</div>
								</div>
							</div>

							<div class="tab-content">
								<div class="tab-pane fade show active" id="box-components" role="tabpanel" aria-labelledby="components-tab">
										<div class="search">
											<input class="form-control form-control-sm component-search" placeholder="Search components" type="text" data-vvveb-action="addBoxComponentSearch" data-vvveb-on="keyup">
											<button class="clear-backspace"  data-vvveb-action="clearComponentSearch">
												<i class="la la-close"></i>
											</button>
										</div>
									<div>
										<div>
											<ul class="components-list clearfix" data-type="addbox">
											</ul>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="box-blocks" role="tabpanel" aria-labelledby="blocks-tab">
									<div class="search">
										<input class="form-control form-control-sm block-search" placeholder="Search blocks" type="text" data-vvveb-action="addBoxBlockSearch" data-vvveb-on="keyup">
										<button class="clear-backspace"  data-vvveb-action="clearBlockSearch">
											<i class="la la-close"></i>
										</button>
									</div>
									<div>
										<div>
											<ul class="blocks-list clearfix"  data-type="addbox">
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<iframe src="about:none" id="iframe1"></iframe>
			</div>
		</div>

		<div id="right-panel">
			<div class="component-properties">
				<ul class="nav nav-tabs nav-fill" id="properties-tabs" role="tablist">
					<li class="nav-item content-tab">
						<a class="nav-link active" data-toggle="tab" href="#content-tab" role="tab" aria-controls="components" aria-selected="true">
							<i class="la la-lg la-cube"></i> <div><span>Content</span></div>
						</a>
					</li>
					<li class="nav-item style-tab">
						<a class="nav-link" data-toggle="tab" href="#style-tab" role="tab" aria-controls="blocks" aria-selected="false">
							<i class="la la-lg la-image"></i> <div><span>Style</span></div>
						</a>
					</li>
					<li class="nav-item advanced-tab" style="display:none">
						<a class="nav-link" data-toggle="tab" href="#advanced-tab" role="tab" aria-controls="blocks" aria-selected="false">
							<i class="la la-lg la-cog"></i> <div><span>Advanced</span></div>
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="content-tab" role="tabpanel" aria-labelledby="content-tab">
					</div>
					<div class="tab-pane fade show" id="style-tab" role="tabpanel" aria-labelledby="style-tab">
					</div>
					<div class="tab-pane fade show" id="advanced-tab" role="tabpanel" aria-labelledby="advanced-tab">
					</div>
				</div>
			</div>
		</div>

		<div id="settings">
			<a href="#" data-vvveb-action="removeSettingsPanel" class="close-settings"><span></span></a>
			<h2 class="page-heading">Page Setting</h2>
			<fieldset>
				<div class="panel-section">
					<h3>Page Action</h3>
					<button class="btn">Unpublish</button>
					<button class="btn">Set as homepage</button>
				</div>
				<div class="panel-section">
					<h3>General Setting</h3>
					<div class="form-group">
						<label for="Page name">Page name</label>
						<input type="text" name="page_name" id="page_name" placeholder="home page test">
					</div>
					<div class="form-group">
						<label for="Meta Description">Meta Description</label>
						<textarea name="meta_description" id="meta_description" placeholder="text type here"></textarea>
						<span class="characters_count"></span>
					</div>
					<div class="form-group">
						<label for="Page path">Page path</label>
						<span class="path">Pages</span>
						<input type="text" name="page_path" id="page_path" class="overlap-input" placeholder="home page test">
					</div>
					<p class="text">Tempus arcu et finibus diam sed et felis sit amet felis efficitur mollis et at enim. Phasellus sodales</p>
				</div>
				<div class="panel-section">
					<p class="text nomargin">Enter your page details and then click <a href="#save">Save Page.</a> <br><br></p>
					<h3>SEO Tags</h3>
					<p>Rollis et at enim phasellus sodales </p>
					<div class="form-group">
						<label for="Meta name">Meta name</label>
						<input type="text" name="page_name" id="page_name" placeholder="home page test">
					</div>
					<div class="form-group">
						<label for="Meta Description">Meta Description</label>
						<textarea name="meta_description" id="meta_description" placeholder="text type here"></textarea>
						<span class="characters_count"></span>
					</div>
					<div class="form-group">
						<label for="Robots and Crawling">Robots and Crawling</label>
						<select name="robots_crawling" id="robots_crawling">
							<option value="noindex">No Index</option>
							<option value="index">index</option>
							<option value="nofollow">No Follow</option>
						</select>
					</div>
					<p class="text">Tempus arcu et finibus diam sed et felis sit amet felis efficitur mollis et at enim. Phasellus sodales </p>
				</div>
				<div class="panel-section">
					<input type="submit" class="btn" id="save" value="Save Page">
				</div>
			</fieldset>
		</div>

		<div id="history">
			<a href="#" data-vvveb-action="removeHistoryPanel" class="close-settings"><span></span></a>
			<div class="panel-section">
				<h2 class="page-heading">Scheduling</h2>
				<p class="text nomargin">Enter the start and end date and time for your page.</p>
			</div>
			<fieldset>
				<div class="panel-section">
					<h3>Publish Page</h3>
					<div class="form-group">
						<label for="Publish date and time">Publish date and time</label>
						<input type="text" name="publish_date" id="publish_date" data-vvveb-action="openDateTimePicker" class="dateTimePicker" placeholder="xxx-MM-DD">
						<p class="text nomargin">Tempus arcu et finibus diam sed et felis sit amet felis efficitur mollis et at enim. Phasellus sodales</p>
					</div>
				</div>
				<div class="panel-section">
					<div class="form-group">
						<h3>Un Publish Page (Optional)</h3>
						<label for="Unpublish date and time">Unpublish date and time</label>
						<input type="text" name="unpublish_date" id="unpublish_date" data-vvveb-action="openDateTimePicker" class="dateTimePicker" placeholder="xxx-MM-DD">
						<p class="text nomargin">Tempus arcu et finibus diam sed et felis sit amet felis efficitur mollis et at enim. Phasellus sodales`</p>
					</div>
				</div>
				<div class="panel-section">
					<div class="row">
						<div class="col-md-6 col-xs-12">
							<input type="submit" class="btn" value="Save">
						</div>
						<div class="col-md-6 col-xs-12">
							<input type="reset" class="btn" value="Cancel">
						</div>
					</div>
				</div>
			</fieldset>
		</div>

		<div id="pages">
			<a href="#" data-vvveb-action="removePagesPanel" class="close-settings"><span></span></a>
			<div class="panel-section">
				<h2 class="page-heading">Pages</h2>
			</div>
			<fieldset>
				<div class="panel-section">
					<div id="filemanager">
						<div class="header">
							<div class="btn-group responsive-btns mr-4 float-left" role="group">
								<button class="btn" id="new-file-btn" data-vvveb-action="newPage" data-vvveb-shortcut="">
									<i class="la la-file"></i> <small>New page</small>
								</button>
									&ensp;
								<button class="btn" id="delete-file-btn" data-vvveb-action="deletePage" data-vvveb-shortcut="">
									<i class="la la-trash"></i> <small>Delete</small>
								</button>
							</div>
						</div>
						<div class="tree">
							<ol>
							</ol>
						</div>
					</div>
				</div>
			</fieldset>
		</div>

		<div id="bottom-panel">
			<div class="btn-group" role="group">
				<button id="code-editor-btn" data-view="mobile" class="btn btn-sm btn-light btn-sm"  title="Code editor" data-vvveb-action="toggleEditor">
					<i class="la la-code"></i> Code editor
				</button>

				<div id="toggleEditorJsExecute" class="custom-control custom-checkbox mt-1" style="display:none">
					<input type="checkbox" class="custom-control-input" id="customCheck" name="example1" data-vvveb-action="toggleEditorJsExecute">
					<label class="custom-control-label" for="customCheck"><small>Run javascript code on edit</small></label>
				</div>
			</div>

			<div id="vvveb-code-editor">
				<textarea class="form-control"></textarea>
				<div>
				</div>
			</div>
		</div>

		<!-- templates -->
		<script id="vvveb-input-textinput" type="text/html">
			<div>
				<input name="{%=key%}" type="text" class="form-control"/>
			</div>
		</script>
		<script id="vvveb-input-checkboxinput" type="text/html">
			<div class="custom-control custom-checkbox">
				<input name="{%=key%}" class="custom-control-input" type="checkbox" id="{%=key%}_check">
				<label class="custom-control-label" for="{%=key%}_check">{% if (typeof text !== 'undefined') { %} {%=text%} {% } %}</label>
			</div>
		</script>
		<script id="vvveb-input-radioinput" type="text/html">
			<div>
				{% for ( var i = 0; i < options.length; i++ ) { %}
				<label class="custom-control custom-radio  {% if (typeof inline !== 'undefined' && inline == true) { %}custom-control-inline{% } %}"  title="{%=options[i].title%}">
					<input name="{%=key%}" class="custom-control-input" type="radio" value="{%=options[i].value%}" id="{%=key%}{%=i%}" {%if (options[i].checked) { %}checked="{%=options[i].checked%}"{% } %}>
					<label class="custom-control-label" for="{%=key%}{%=i%}">{%=options[i].text%}</label>
				</label>
				{% } %}
			</div>
		</script>
		<script id="vvveb-input-radiobuttoninput" type="text/html">
			<div class="btn-group btn-group-toggle  {%if (extraclass) { %}{%=extraclass%}{% } %} clearfix" data-toggle="buttons">
				{% for ( var i = 0; i < options.length; i++ ) { %}
				<label class="btn  btn-outline-primary  {%if (options[i].checked) { %}active{% } %}" for="{%=key%}{%=i%} " title="{%=options[i].title%}">
					<input name="{%=key%}" class="custom-control-input" type="radio" value="{%=options[i].value%}" id="{%=key%}{%=i%}" {%if (options[i].checked) { %}checked="{%=options[i].checked%}"{% } %}>
					{%if (options[i].icon) { %}<i class="{%=options[i].icon%}"></i>{% } %}
					{%=options[i].text%}
				</label>
				{% } %}
			</div>
		</script>
		<script id="vvveb-input-toggle" type="text/html">
			<div class="toggle">
				<input type="checkbox" name="{%=key%}" value="{%=on%}" data-value-off="{%=off%}" data-value-on="{%=on%}" class="toggle-checkbox" id="{%=key%}">
				<label class="toggle-label" for="{%=key%}">
					<span class="toggle-inner"></span>
					<span class="toggle-switch"></span>
				</label>
			</div>
		</script>
		<script id="vvveb-input-header" type="text/html">
			<h6 class="header">{%=header%}</h6>
		</script>
		<script id="vvveb-input-select" type="text/html">
			<div>
				<select class="form-control custom-select">
					{% for ( var i = 0; i < options.length; i++ ) { %}
					<option value="{%=options[i].value%}">{%=options[i].text%}</option>
					{% } %}
				</select>
			</div>
		</script>
		<script id="vvveb-input-listinput" type="text/html">
			<div class="row">
				{% for ( var i = 0; i < options.length; i++ ) { %}
				<div class="col-6">
					<div class="input-group">
						<input name="{%=key%}_{%=i%}" type="text" class="form-control" value="{%=options[i].text%}"/>
						<div class="input-group-append">
							<button class="input-group-text btn btn-sm btn-danger">
								<i class="la la-trash la-lg"></i>
							</button>
						</div>
					</div>
					<br/>
				</div>
				{% } %}
				{% if (typeof hide_remove === 'undefined') { %}
				<div class="col-12">
					<button class="btn btn-sm btn-outline-primary">
						<i class="la la-trash la-lg"></i> Add new
					</button>
				</div>
				{% } %}
			</div>
		</script>
		<script id="vvveb-input-grid" type="text/html">
			<div class="row">
				<div class="mb-1 col-12">
					<label>Flexbox</label>
					<select class="form-control custom-select" name="col">
						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
						<option value="{%=i%}" {% if ((typeof col !== 'undefined') && col == i) { %} selected {% } %}>{%=i%}</option>
						{% } %}
					</select>
					<br/>
				</div>
				<div class="col-6">
					<label>Extra small</label>
					<select class="form-control custom-select" name="col-xs">
						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
							<option value="{%=i%}" {% if ((typeof col_xs !== 'undefined') && col_xs == i) { %} selected {% } %}>{%=i%}</option>
						{% } %}
					</select>
					<br/>
				</div>
				<div class="col-6">
					<label>Small</label>
					<select class="form-control custom-select" name="col-sm">
						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
							<option value="{%=i%}" {% if ((typeof col_sm !== 'undefined') && col_sm == i) { %} selected {% } %}>{%=i%}</option>
						{% } %}
					</select>
					<br/>
				</div>
				<div class="col-6">
					<label>Medium</label>
					<select class="form-control custom-select" name="col-md">
						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
							<option value="{%=i%}" {% if ((typeof col_md !== 'undefined') && col_md == i) { %} selected {% } %}>{%=i%}</option>
						{% } %}
					</select>
					<br/>
				</div>
				<div class="col-6 mb-1">
					<label>Large</label>
					<select class="form-control custom-select" name="col-lg">
						<option value="">None</option>
						{% for ( var i = 1; i <= 12; i++ ) { %}
							<option value="{%=i%}" {% if ((typeof col_lg !== 'undefined') && col_lg == i) { %} selected {% } %}>{%=i%}</option>
						{% } %}
					</select>
					<br/>
				</div>
				{% if (typeof hide_remove === 'undefined') { %}
				<div class="col-12">
					<button class="btn btn-sm btn-outline-light text-danger">
						<i class="la la-trash la-lg"></i> Remove
					</button>
				</div>
				{% } %}
			</div>
		</script>
		<script id="vvveb-input-textvalue" type="text/html">
			<div class="row">
				<div class="col-6 mb-1">
					<label>Value</label>
					<input name="value" type="text" value="{%=value%}" class="form-control"/>
				</div>
				<div class="col-6 mb-1">
					<label>Text</label>
					<input name="text" type="text" value="{%=text%}" class="form-control"/>
				</div>
				{% if (typeof hide_remove === 'undefined') { %}
					<div class="col-12">
						<button class="btn btn-sm btn-outline-light text-danger">
							<i class="la la-trash la-lg"></i> Remove
						</button>
					</div>
				{% } %}
			</div>
		</script>
		<script id="vvveb-input-rangeinput" type="text/html">
			<div>
				<input name="{%=key%}" type="range" min="{%=min%}" max="{%=max%}" step="{%=step%}" class="form-control"/>
			</div>
		</script>
		<script id="vvveb-input-imageinput" type="text/html">
			<div>
				<div class="img-container">
					<button class="btn btn-sm text-danger">
						<i class="la la-trash la-lg"></i> Remove
					</button>
					<img src="" alt="uploaded image" class="image-uploaded">
				</div>
				<?php
				$siteData = get_records_where('sites','name','id',$_GET['siteid']);
                $row=mysqli_fetch_array($siteData,MYSQLI_ASSOC);
                $sitefoldername = str_replace(' ','-',strtolower($row['name'])).'-'.$_GET['siteid'];
                ?>
                <input type="hidden" name="siteid" id="siteid" value="<?php echo $_GET['siteid']; ?>">
				<input name="{%=key%}" type="text" class="form-control file-input"/>

				<input type="hidden" name="foldername" id="foldername" value="<?php echo $sitefoldername; ?>">
				<input name="file" type="file" class="form-control"/>
			</div>
		</script>
		<script id="vvveb-input-colorinput" type="text/html">
			<div>
				<input name="{%=key%}" type="color" {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}" {% } %}  pattern="#[a-f0-9]{6}" class="form-control"/>
			</div>
		</script>
		<script id="vvveb-input-bootstrap-color-picker-input" type="text/html">
			<div>
				<div id="cp2" class="input-group" title="Using input value">
					<input name="{%=key%}" type="text" {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}" {% } %}	 class="form-control"/>
					<span class="input-group-append">
					<span class="input-group-text colorpicker-input-addon"><i></i></span>
					</span>
				</div>
			</div>
		</script>
		<script id="vvveb-input-numberinput" type="text/html">
			<div>
				<input name="{%=key%}" type="number" value="{%=value%}"
					{% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}"{% } %}
					{% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}"{% } %}
					{% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}"{% } %}
				class="form-control"/>
			</div>
		</script>
		<script id="vvveb-input-button" type="text/html">
			<div>
				<button class="btn btn-sm btn-primary">
					<i class="la  {% if (typeof icon !== 'undefined') { %} {%=icon%} {% } else { %} la-plus {% } %} la-lg"></i> {%=text%}
				</button>
			</div>
		</script>
		<script id="vvveb-input-cssunitinput" type="text/html">
			<div class="input-group" id="cssunit-{%=key%}">
				<input name="number" type="number"  {% if (typeof value !== 'undefined' && value != false) { %} value="{%=value%}" {% } %}
					{% if (typeof min !== 'undefined' && min != false) { %}min="{%=min%}"{% } %}
					{% if (typeof max !== 'undefined' && max != false) { %}max="{%=max%}"{% } %}
					{% if (typeof step !== 'undefined' && step != false) { %}step="{%=step%}"{% } %}
				class="form-control"/>
				<div class="input-group-append">
				<select class="form-control custom-select small-arrow" name="unit">
					<option value="em">em</option>
					<option value="px">px</option>
					<option value="%">%</option>
					<option value="rem">rem</option>
					<option value="auto">auto</option>
				</select>
				</div>
			</div>
		</script>
		<script id="vvveb-filemanager-page" type="text/html">
			<li data-url="{%=url%}" data-page="{%=name%}" data-id="{%=pageid%}">
				<label for="{%=name%}"><span>{%=title%}</span></label> <input type="checkbox" checked id="{%=name%}" />
				<ol></ol>
			</li>
		</script>
		<script id="vvveb-filemanager-component" type="text/html">
			<li data-url="{%=url%}" data-component="{%=name%}" class="file">
				<a href="{%=url%}"><span>{%=title%}</span></a>
			</li>
		</script>
		<script id="vvveb-input-sectioninput" type="text/html">
				<label class="header" data-header="{%=key%}" for="header_{%=key%}"><span>&ensp;{%=header%}</span> <div class="header-arrow"></div></label>
				<input class="header_check" type="checkbox" {% if (typeof expanded !== 'undefined' && expanded == false) { %} {% } else { %}checked="true"{% } %} id="header_{%=key%}">
				<div class="section" data-section="{%=key%}"></div>
		</script>
		<script id="vvveb-property" type="text/html">
			<div class="form-group {% if (typeof col !== 'undefined' && col != false) { %} col-sm-{%=col%} d-inline-block {% } else { %}row{% } %}" data-key="{%=key%}" {% if (typeof group !== 'undefined' && group != null) { %}data-group="{%=group%}" {% } %}>
				{% if (typeof name !== 'undefined' && name != false) { %}<label class="{% if (typeof inline === 'undefined' ) { %}col-sm-4{% } %} control-label" for="input-model">{%=name%}</label>{% } %}
				<div class="{% if (typeof inline === 'undefined') { %}col-sm-{% if (typeof name !== 'undefined' && name != false) { %}8{% } else { %}12{% } } %} input"></div>
			</div>
		</script>
		<script id="vvveb-input-autocompletelist" type="text/html">
			<div>
				<input name="{%=key%}" type="text" class="form-control"/>
				<div class="form-control autocomplete-list" style="min=height: 150px; overflow: auto;">
					<div id="featured-product43"><i class="la la-close"></i> MacBook
						<input name="product[]" value="43" type="hidden">
					</div>
					<div id="featured-product40"><i class="la la-close"></i> iPhone
						<input name="product[]" value="40" type="hidden">
					</div>
					<div id="featured-product42"><i class="la la-close"></i> Apple Cinema 30"
						<input name="product[]" value="42" type="hidden">
					</div>
					<div id="featured-product30"><i class="la la-close"></i> Canon EOS 5D
						<input name="product[]" value="30" type="hidden">
					</div>
				</div>
			</div>
		</script>
		<!--// end templates -->
		<!-- export html modal-->
		<div class="modal fade" id="textarea-modal" tabindex="-1" role="dialog" aria-labelledby="textarea-modal" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<p class="modal-title text-primary"><i class="la la-lg la-save"></i> Export html</p>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><small><i class="la la-close"></i></small></span>
						</button>
					</div>
					<div class="modal-body">
						<textarea rows="25" cols="150" class="form-control"></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="la la-close"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- message modal-->
		<div class="modal fade" id="message-modal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<p class="modal-title text-primary"><i class="la la-lg la-comment"></i> Page Builder</p>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true"><small><i class="la la-close"></i></small></span>
						</button>
					</div>
					<div class="modal-body">
						<p>Page was successfully saved!.</p>
					</div>
					<div class="modal-footer">
						<!-- <button type="button" class="btn btn-primary">Ok</button> -->
						<button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal"><i class="la la-close"></i> Close</button>
					</div>
				</div>
			</div>
		</div>
		</form>
		<!-- new page modal-->
    <div class="modal fade" id="new-page-modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <!-- <form method="post" action="create-page.php" id="create_page_form"> -->
          <input type="hidden" name="siteid" value="<?php echo $_GET['siteid']; ?>" id="siteID">
		  <input type="hidden" name="siteid" value="<?php echo $_GET['pageid']; ?>" id="pageID">
          <div class="modal-content">
            <div class="modal-header">
              <p class="modal-title text-primary"><i class="la la-lg la-file"></i> New page</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><small><i class="la la-close"></i></small></span>
              </button>
            </div>
            <div class="modal-body text">
              <div class="form-group row" data-key="type">
                <label class="col-sm-3 control-label">
                  Template
                  <abbr class="badge badge-pill badge-secondary" title="This template will be used as a start">?</abbr>
                </label>
                <div class="col-sm-9 input">
                  <div>
                    <select class="form-control custom-select" name="startTemplateUrl" id="startTemplateUrl">
                      <option value="new-page-blank-template.html">Blank Template</option>
                      <option value="demo/narrow-jumbotron/index.html">Narrow jumbotron</option>
                      <option value="demo/album/index.html">Album</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group row" data-key="href">
                <label class="col-sm-3 control-label">Page name</label>
                <div class="col-sm-9 input">
                  <div>
                    <input name="pageTitle" type="text" class="form-control" placeholder="My page" id="pageTitle" required>
                  </div>
                </div>
              </div>
              <div class="form-group row" data-key="href">
                <label class="col-sm-3 control-label">File name</label>
                <div class="col-sm-9 input">
                  <div>
                    <input name="pageFileName" type="text" class="form-control" placeholder="my-page.html" id="pageFileName" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary btn-lg" type="submit" data-vvveb-action="createNewPage"><i class="la la-check"></i> Create page</button>
              <button class="btn btn-secondary btn-lg" type="reset" data-dismiss="modal"><i class="la la-close"></i> Cancel</button>
            </div>
          </div>
      </div>
    </div>
	</div>
<?php //echo $site_folder; exit; ?>

<!-- jquery-->
<script src="js/jquery.min.js"></script>
<script src="js/jquery.hotkeys.js"></script>

<!-- bootstrap-->
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Date and Time Picker -->
<link href="css/jquery.datetimepicker.min.css" rel="stylesheet"/>
<script src="js/jquery.datetimepicker.full.min.js"></script>
<script>
	jQuery(document).ready(function($) {
		$('.dateTimePicker').datetimepicker({
			ownerDocument: document,
			contentWindow: window,

			value: '',
			rtl: false,

			format: 'Y/m/d H:i',
			formatTime: 'H:i',
			formatDate: 'Y/m/d',

			startDate:  false, // new Date(), '1986/12/08', '-1970/01/05','-1970/01/05',
			step: 60,
			monthChangeSpinner: true,

			closeOnDateSelect: false,
			closeOnTimeSelect: true,
			closeOnWithoutClick: true,
			closeOnInputClick: true,
			openOnFocus: true,

			timepicker: true,
			datepicker: true,
			weeks: false,

			defaultTime: false, // use formatTime format (ex. '10:00' for formatTime: 'H:i')
			defaultDate: false, // use formatDate format (ex new Date() or '1986/12/08' or '-1970/01/05' or '-1970/01/05')

			minDate: false,
			maxDate: false,
			minTime: false,
			maxTime: false,
			minDateTime: false,
			maxDateTime: false,

			allowTimes: [],
			opened: false,
			initTime: true,
			inline: false,
			theme: '',
			touchMovedThreshold: 5,

			onSelectDate: function () {},
			onSelectTime: function () {},
			onChangeMonth: function () {},
			onGetWeekOfYear: function () {},
			onChangeYear: function () {},
			onChangeDateTime: function () {},
			onShow: function () {},
			onClose: function () {},
			onGenerate: function () {},

			withoutCopyright: true,
			inverseButton: false,
			hours12: false,
			next: 'xdsoft_next',
			prev : 'xdsoft_prev',
			dayOfWeekStart: 0,
			parentID: 'body',
			timeHeightInTimePicker: 25,
			timepickerScrollbar: true,
			todayButton: true,
			prevButton: true,
			nextButton: true,
			defaultSelect: true,

			scrollMonth: true,
			scrollTime: true,
			scrollInput: true,

			lazyInit: false,
			mask: false,
			validateOnBlur: true,
			allowBlank: true,
			yearStart: 1950,
			yearEnd: 2050,
			monthStart: 0,
			monthEnd: 11,
			style: '',
			id: '',
			fixed: false,
			roundTime: 'round', // ceil, floor
			className: '',
			weekends: [],
			highlightedDates: [],
			highlightedPeriods: [],
			allowDates : [],
			allowDateRe : null,
			disabledDates : [],
			disabledWeekDays: [],
			yearOffset: 0,
			beforeShowDay: null,

			enterLikeTab: true,
			showApplyButton: false
		});
	});
</script>

<!-- builder code-->
<script src="libs/builder/builder.js"></script>

<!-- undo manager-->
<script src="libs/builder/undo.js"></script>

<!-- inputs-->
<script src="libs/builder/inputs.js"></script>

<!-- bootstrap colorpicker //uncomment bellow scripts to enable -->

<!-- <script src="libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<link href="libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
<script src="libs/builder/plugin-bootstrap-colorpicker.js"></script> -->

<!-- components-->
<script src="libs/builder/components-bootstrap4.js"></script>
<script src="libs/builder/components-widgets.js"></script>

<!-- blocks-->
<script src="libs/builder/blocks-bootstrap4.js"></script>

<!-- plugins -->

<!-- code mirror - code editor syntax highlight -->
<link href="libs/codemirror/lib/codemirror.css" rel="stylesheet"/>
<link href="libs/codemirror/theme/material.css" rel="stylesheet"/>
<script src="libs/codemirror/lib/codemirror.js"></script>
<script src="libs/codemirror/lib/xml.js"></script>
<script src="libs/codemirror/lib/formatting.js"></script>
<script src="libs/builder/plugin-codemirror.js"></script>

<!-- jszip - download page as zip -->
<!-- script src="libs/jszip/jszip.min.js"></script>
<script src="libs/builder/plugin-jszip.js"></script -->

<script>
$(document).ready(function()
{
	//if url has #no-right-panel set one panel demo
	if (window.location.hash.indexOf("no-right-panel") != -1)
	{
		$("#vvveb-builder").addClass("no-right-panel");
		$(".component-properties-tab").show();
		Vvveb.Components.componentPropertiesElement = "#left-panel .component-properties";
	} else
	{
		$(".component-properties-tab").hide();
	}

	Vvveb.Builder.init('<?php echo $site_folder; ?>', function() {
		//run code after page/iframe is loaded
	});

	Vvveb.Gui.init();
	Vvveb.FileManager.init();
	Vvveb.FileManager.addPages(
		[
// 			{name:"narrow-jumbotron", title:"Jumbotron",  url: "demo/narrow-jumbotron/index.html", assets: ['demo/narrow-jumbotron/narrow-jumbotron.css']},
// 			{name:"landing-page", title:"Landing page",  url: "demo/startbootstrap-landing-page/index.html", assets: ['demo/startbootstrap-landing-page/css/landing-page.min.css']},
// 			{name:"album", title:"Album",  url: "demo/album/index.html", assets: ['demo/album/album.css']},
// 			{name:"blog", title:"Blog",  url: "demo/blog/index.html", assets: ['demo/blog/blog.css']},
// 			{name:"carousel", title:"Carousel",  url: "demo/carousel/index.html", assets: ['demo/carousel/carousel.css']},
// 			{name:"offcanvas", title:"Offcanvas",  url: "demo/offcanvas/index.html", assets: ['demo/offcanvas/offcanvas.css','demo/offcanvas/offcanvas.js']},
// 			{name:"pricing", title:"Pricing",  url: "demo/pricing/index.html", assets: ['demo/pricing/pricing.css']},
// 			{name:"product", title:"Product",  url: "demo/product/index.html", assets: ['demo/product/product.css']},
// 			{name:"ecommerce", title:"eCommerce homepage",  url: "ecommerce_demo/index.html"},
      <?php
          $records = get_records_where('pages','id,title,filepath,filecontent,filename','siteid',$_GET['siteid']);
          if ($records->num_rows > 0) {
              // output data of each row
              while($row = $records->fetch_assoc()) {
                  ?>
                  {name:"<?php echo ucfirst($row['filename']);?>", title:"<?php echo $row['title']; ?>",  url: "<?php echo $row['filepath']; ?>", assets: ['demo/<?php echo $row['filepath']; ?>/style.css'], pageid:"<?php echo $row['id']; ?>"},
                  <?php
              }
          }
      ?>


			//uncomment php code below and rename file to .php extension to load saved html files in the editor
			<?php
    			$htmlFiles = glob("*.html");
    			foreach ($htmlFiles as $file) {
    				if (in_array($file, array('new-page-blank-template.html', 'index.php'))) continue;//skip template files
    				$pathInfo = pathinfo($file);
    				?>
    				{name:"<?php echo ucfirst($pathInfo['filename']);?>", title:"<?php echo ucfirst($pathInfo['filename']);?>",  url: "<?php echo $pathInfo['basename'];?>"},
    				<?php
    			}
			?>

			// {name:"test", title:"test",  url: "http://vvveb_install.givan.ro/"},
		]
	);

	Vvveb.FileManager.loadPage('<?php echo $pagename; ?>');
});
</script>
</body>
</html>
