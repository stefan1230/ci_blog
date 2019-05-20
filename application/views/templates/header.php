<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <title>theLankaBloggers</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">

        <a class="navbar-brand" href="<?php echo base_url();?>">theLankaBloggers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"   aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>blogs">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>categories">Categories</a>
            </li>
            <?php if($this->session->userdata('loggedIn')):?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>blogs/create">Create</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>categories/create">Create Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>users/logout">logout</a>
            </li>
            <li class="nav-item">
            <?php else:?>
                <a class="nav-link" href="<?php echo base_url();?>users/register">Sign Up</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>users/login">Sign In</a>
            </li>
            <?php endif;?>
        </ul>
        </div>

    </div>
</nav>

<div class="container">

<?php if($this->session->flashdata('user_registered')):?>
    <?php echo "<p class='alert alert-success'>".$this->session->flashdata('user_registered')."</p>"?>
<?php endif;?>

<?php if($this->session->flashdata('blog_created')):?>
    <?php echo "<p class='alert alert-success'>".$this->session->flashdata('blog_created')."</p>"?>
<?php endif;?>

<?php if($this->session->flashdata('user_loggProb')):?>
    <?php echo "<p class='alert alert-danger'>".$this->session->flashdata('user_loggProb')."</p>"?>
<?php endif;?>

<?php if($this->session->flashdata('user_loggedout')):?>
    <?php echo "<p class='alert alert-success'>".$this->session->flashdata('user_loggedout')."</p>"?>
<?php endif;?>