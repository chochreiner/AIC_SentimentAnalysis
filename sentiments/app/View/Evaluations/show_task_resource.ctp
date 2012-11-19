<?php

// build resource
switch($evaluation['Evaluation']['type']) {
	case 'articletopic':
		echo '<h1>' . $evaluation['Paragraph']['Article']['title'] . '</h1>';
		echo '<p>'  . $evaluation['Paragraph']['text'] . '</p>';
		break;
	case 'titlesentiment':
		echo '<p>'  . $evaluation['Paragraph']['Article']['title'] . '</p>';
		break;
	case 'paragraphsentiment':
		echo '<p>'  . $evaluation['Paragraph']['text'] . '</p>';
		break;
}
