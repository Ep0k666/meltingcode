
<?php $this->layout('layout', ['title' => 'Perdu ?']) ?>
<?php $this->start('main_content'); ?>
<style>

    body {
        background: url(https://38.media.tumblr.com/546c0cd48d71f210f9b67a389003790d/tumblr_neq0yw9rMA1tm16jjo1_500.gif) no-repeat center center fixed;
        background-size: cover;

    }
    .error h1 {
        font-size: 16em;
        margin: 1.2em .5em;
        color: rgba(128, 194, 187, 0.7);
        margin-bottom: 0px;
    }
    .error h2 {
        font-size: 1.7em;
        margin: 1.2em .5em;
        color: rgba(128, 194, 187, 0.6);
    }
    .error div {
        margin-top: -8em;
        width: 100%;
        text-align: center;

    }

    footer{
        display: none;
    }

</style>
<div class="error">
    <h1>404</h1>
    <h2>Zut alors! Page Introuvable</h2>
</div>
<?php $this->stop('main_content'); ?>