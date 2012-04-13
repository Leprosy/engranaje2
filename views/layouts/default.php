<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>test - <?php echo $pageTitle ?></title>
        <link rel="stylesheet" href="<?php echo Lvc::url('css/master.css') ?>" type="text/css" media="all" charset="utf-8" />

        <!-- admin -->
        <script src="<?php echo Lvc::url('js/admin.js') ?>"></script>

        <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

        <!-- Ketchup form validator -->
        <script src="<?php echo Lvc::url('js/ketchup/jquery.ketchup.all.min.js') ?>"></script>
    </head>
    <body>

        <div id="page">
            <div id="header">
                <h1><a href="<?php echo Lvc::url() ?>">testing_cms</a></h1>
            </div>

            <div id="wrap">
                <div id="main_content">
                    <ul>
                        <li><a href="<?php echo Lvc::url('post') ?>">Post</a></li>
                    </ul>
                    <div>
                        <h2><?php echo $pageTitle ?></h2>
                        <?php echo $layoutContent ?>
                    </div>
                </div>

                <div id="sidebar">
                    <div class="block">
                        <h3>Titulo sidebar</h3>
                        Crap <input type="text" />
                        <p>aslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfd</p>
                    </div>
                    <div class="block">
                        <h3>Titulo sidebar</h3>
                        <p>aslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfd</p>
                        <p>aslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfd</p>
                        <p>aslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfd</p>
                    </div>
                    <div class="block">
                        <h3>Titulo sidebar</h3>
                        <p>aslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfd</p>
                        <p>aslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfdaslkd sifjsdoisodighslkgnsf lgnfd lgnfd lgkndf gkfd</p>
                    </div>
                </div>
            </div>

            <div id="footer">
            </div>
        </div>

        <script>        
            <?php $aux = Lvc_Session::getInstance(); if ($message = $aux->getFlash('message')) : ?>
            message_info('<?php echo $message ?>');
            <?php endif; ?>
            <?php if ($message = $aux->getFlash('error')) : ?>
            message_error('<?php echo $message ?>');
            <?php endif; ?>
        </script>
    </body>
</html>
