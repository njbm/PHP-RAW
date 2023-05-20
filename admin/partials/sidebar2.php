

        <!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar content -->
			<div class="sidebar-content">

            <?php include_once($partials."profile.php"); ?>

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">


<?php

function generateMenuItems($items) {
    $html = '';
    foreach ($items as $item) {
        $html .= '<li class="nav-item-header">
        ';
        $html .= '<a href="' . $item['link'] . '">';
        
        $html .= $item['label'];
        $html .= '</a>';
        
        if (isset($item['subItems'])) {
            $html .= '<ul>';
            $html .= generateMenuItems($item['subItems']);
            $html .= '</ul>';
        }
        
        $html .= '</li>';
    }
    return $html;
}

$jsonData = file_get_contents($datasource.'sidebar.json');
$data = json_decode($jsonData, true);

$sidebarItems = $data['sidebarItems'];


echo generateMenuItems($sidebarItems);

?>



</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->