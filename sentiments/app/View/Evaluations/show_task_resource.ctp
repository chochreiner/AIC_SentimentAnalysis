<?php

// build resource
switch($evaluation['Evaluation']['type']) {
	case 0: //articletopic
		echo '<h1>' . $evaluation['Paragraph']['Article']['title'] . '</h1>';
		echo '<p>'  . $evaluation['Paragraph']['text'] . '</p>';
		break;
	case 1: //titlesentiment
		echo '<p>'  . $evaluation['Paragraph']['Article']['title'] . '</p>';
		break;
	case 2: //paragraphsentiment
		echo '<p>'  . $evaluation['Paragraph']['text'] . '</p>';
		break;
}
