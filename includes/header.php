<?php
include_once("includes/config.php");
include_once ("head.php"); ?>

<body>
          <div id="page-container">
                    <div id="mast-head-container">

                              <button class="navShowHide">
                                        <img src="./assets/images/icons/menu.png">
                              </button>

                              <a href="index.php" class="logoContainer">
                                        <img src="./assets/images/youtube-logo.png" title="logo" alt="site-logo">
                              </a>

                              <div class="searchBarContainer">
                                        <form action="search.php" method="GET">
                                                  <input type="text" class="searchBar" name="term" placeholder="Search...">
                                                  <button class="searchButton">
                                                            <img src="./assets/images/icons/search.png">
                                                  </button>
                                        </form>
                              </div>

                              <div class="rightIcon">
                                        <a href="upload.php">
                                                  <img class="upload" src="./assets/images/icons/upload.png">
                                        </a>
                                        <a href="#">
                                                  <img class="profile" src="./assets/images/profile.png">
                                        </a>
                              </div>

                    </div>
                    <div id="side-nav-container" style="display:none">
                              side nav container
                    </div>
                    <div id="main-section-container">
                              <div id="main-content-container">