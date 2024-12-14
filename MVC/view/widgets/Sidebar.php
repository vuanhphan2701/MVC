 <!-- Sidebar -->
 <div class="sidebar" data-background-color="dark">
   <div class="sidebar-logo">
     <!-- Logo Header -->
     <div class="logo-header" data-background-color="dark">
       <a href="index.html" class="logo">
         <img
           src="public/assets/img/kaiadmin/logo_light.svg"
           alt="navbar brand"
           class="navbar-brand"
           height="20" />
       </a>
       <div class="nav-toggle">
         <button class="btn btn-toggle toggle-sidebar">
           <i class="gg-menu-right"></i>
         </button>
         <button class="btn btn-toggle sidenav-toggler">
           <i class="gg-menu-left"></i>
         </button>
       </div>
       <button class="topbar-toggler more">
         <i class="gg-more-vertical-alt"></i>
       </button>
     </div>
     <!-- End Logo Header -->
   </div>
   <div class="sidebar-wrapper scrollbar scrollbar-inner">
     <div class="sidebar-content">
       <div class="nav nav-secondary">

         <li class="nav-item active">
           <a
             data-bs-toggle="collapse"
             href="#dashboard"
             class="collapsed"
             aria-expanded="false">
             <i class="fas fa-home"></i>
             <p>Phan Anh Vu</p>
           </a>
         </li>
         <li class="nav-section">
           <span class="sidebar-mini-icon">
             <i class="fa fa-ellipsis-h"></i>
           </span>
           <h4 class="text-section">Information</h4>
         </li>
         <li class="nav-item">
           <a href="index.php?view=home">
             <i class="fa fa-home search-icon"></i>
             <p>Home</p>
           </a>
         </li>



         <li class="nav-item">
           <a data-bs-toggle="collapse" href="#base">
             <i class="fas fa-user-cog"></i>
             <p>Manage User</p>
             <span class="caret"></span>
           </a>
           <div class="collapse" id="base">
             <ul style="list-style-type:none;">
               <li>
                 <a href="<?= href('user', 'getAllUsers') ?>">
                   <i class="fas fa-list"></i>
                   <span class="sub-item">List User</span>
                 </a>
               </li>
               <li>
                 <a href="<?= href('user', 'addNewUser') ?>">
                   <i class="fas fa-plus-square add-icon"></i>
                   <span class="sub-item">Add User</i></span>
                 </a>
               </li>
               <li>
                 <a href="<?= href('user', 'listRemovedUsers') ?>">
                   <i class="fa fa-trash search-icon"></i>
                   <span class="sub-item">History</i></span>
                 </a>
               </li>
               <li>
               <li>
                 <a href="<?= href('role', 'list') ?>">
                   <i class="fa fa-users group-icon"></i>
                   <span class="sub-item">Role</span>
                 </a>
               </li>
             </ul>
           </div>
         </li>

         <!-- <?php
          // if ($this->parent_menu) {
          //   foreach ($this->parent_menu as $pr) {
          //     $childs = $this->role_model->list_function($_SESSION['login_id'], $pr->id);
          ?>
             <li class="nav-item">
               <a data-bs-toggle="collapse" href="#base1">
                 <i class="<?php //echo  $pr->icon ?>"></i>
                 <p><?php // $pr->name ?></p>
                 <span class="caret"></span>
               </a>
               <div class="collapse" id="base1">
                 <ul style="list-style-type:none;">
                   <?php //foreach ($childs as $ch) {
                    ?>

                     <li>
                       <a href="<?php // href($ch->controller, $ch->action) ?>">
                         <i class="<?php // $ch->icon ?>"></i>
                         <span><?php // $ch->name ?></span>
                       </a>
                     </li>
                   <?php //} ?>
                 </ul>
               </div>
             </li>
           <?php //}
         //} else { ?>
           <li class="nav-item">
               <i > you do not have permission
               </i>
             </a>
           </li>

         <?php  // } ?> -->
     
         <li class="nav-item">
           <a href="<?php echo href('user', 'logOut') ?>">
             <i class="fas fa-sign-out-alt"></i>
             <p>Sign out</p>
           </a>
         </li>



       </div>
     </div>
   </div>
 </div>
 <!-- End Sidebar -->