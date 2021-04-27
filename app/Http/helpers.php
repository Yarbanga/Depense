<?php

  function checkRole($role){
    $userAccess = getMyRole(auth()->user()->role);
    foreach ($role as $key => $value) {
      if($value == $userAccess){
        return true;
      }
    }
    return false;
  }
  
  function getMyRole($id)
  {
    switch ($id) {
      case 1:
        return 'admin';
        break;
      case 2:
        return 'superadmin';
        break;
      default:
        return 'user';
        break;
    }
  }
?>