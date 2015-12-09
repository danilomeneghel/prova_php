<!DOCTYPE html>
<html>
    <head>
        <?php echo $this->Html->charset(); ?>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <?php
        echo $this->Html->css('materialize.min');
        echo $this->Html->css('jquery-ui.min');
        echo $this->Html->css('adapt-geral');
        ?>

        <title>
            <?php echo $this->fetch('title'); ?>
        </title>
            <?php
            echo $this->Html->meta('icon');            
            echo $this->fetch('meta');
            echo $this->fetch('css');
            echo $this->fetch('script');
            ?>
        <script type="text/javascript">
            $URLSISTEMA = '<?php echo $urlsistema; ?>';
        </script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
        <header>
            <nav class="top-nav">
                <div class="container">
                    <div class="nav-wrapper"><a class="brand-logo">Sistema Administrativo</a></div>
                </div>
            </nav>
        </header>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <?php echo $this->Flash->render(); ?>
                        <?php echo $this->fetch('content'); ?>
                    </div>
                </div>
            </div>
        </main>

        <?php
        echo $this->element('sql_dump');
        echo $this->Html->script('jquery-2.1.1.min');
        echo $this->Html->script('jquery-ui.min');
        echo $this->Html->script('jquery.ui.touch-punch.min');
        echo $this->Html->script('materialize.min');
        echo $this->Html->script('geral');
        ?>
    </body>
</html>
