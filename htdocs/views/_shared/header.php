<!DOCTYPE html>
<?php
session_start();
?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home/create">Create</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home/viewAll">AllStudents</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/subject/create">createSubject</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/subject/select">viewSubject</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home/delete">deleteStudent</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/Login">LogIn</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/registrate">registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/user/settings">Settings</a>
          </li>
      </div>
    </nav>