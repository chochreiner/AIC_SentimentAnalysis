<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php echo $this->Html->charset(); ?>
    <title>Sentiments Analysis Administration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
	<?php
		echo $this->Html->meta('icon');
		
        echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap-responsive.min');
		echo $this->Html->css('custom');
	?>
	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
	<?php
	    echo $this->Html->script('bootstrap.min');
	    echo $this->Html->script('highcharts');
	?>
	 <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<div id="container" class="container">
	    <div class="row">
	        <div class="span12">
	            <div class="navbar navbar-inverse">
                    <div class="navbar-inner">
                        <div class="container">
                            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                            </a>
                            <a class="brand" href="/">SentAlystics</a>
                            <div class="nav-collapse collapse">
                                <ul class="nav">
                                    <li ><?php echo $this->Html->link('Dashboard', '/dashboard'); ?></li>
                                    <li ><?php echo $this->Html->link('Admin', '/admin'); ?></li>
                                    <li><?php echo $this->Html->link('Results', '/results'); ?></li>
                                </ul>
                            </div><!--/.nav-collapse -->
                        </div>
                    </div>
                </div>
	        
			    <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
		    </div>	
	    </div>
	
		<hr>
		
		<footer>
		 <div class="row">
	        <div class="span12">
	            <div class="row">
	                <div class="offset1 span2">
	                SentAlystics &copy; 2012
	                </div>
	                <div class="9">
	                Alex Macovei, Andrei Staskevich, Christoph Hochreiner, Felix Rinker, Florian Eckerstorfer, Gabor Hernadi, Roland Schütz
	                </div>
			    </div>
            </div>
		</footer>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
